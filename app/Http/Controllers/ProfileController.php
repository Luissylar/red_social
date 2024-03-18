<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Procesar archivo, si existe
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            // Verificar si el usuario ya tiene un archivo de avatar y eliminarlo
            if ($request->user()->avatar) {
                // Obtener la ruta del archivo existente
                $existingAvatarPath = public_path($request->user()->avatar);

                // Verificar si el archivo existe y eliminarlo
                if (file_exists($existingAvatarPath)) {
                    unlink($existingAvatarPath); // Eliminar el archivo físico de la antigua foto del servidor
                }
            }
            
            // Mover el nuevo archivo a la ubicación deseada
            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Generar un nombre de archivo único
            $file->move(public_path('/users/img/'), $fileName);

            // Establecer la ruta completa del archivo para almacenar en la base de datos
            $filePath = '/users/img/' . $fileName;
        } else {
            // Si no se proporciona un nuevo archivo, mantener la ruta existente del avatar
            $filePath = $request->user()->avatar;
        }

        // Eliminar la ruta del avatar antiguo de la base de datos
        if ($request->user()->avatar) {
            $request->user()->avatar = null;
        }

        // Guardar la nueva ruta del avatar en la base de datos
        $request->user()->avatar = $filePath;
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }





    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
