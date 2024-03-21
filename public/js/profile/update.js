document.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('button');
    const mediaInput = document.getElementById('mediaInput');
    const imgVisualizate = document.getElementById('imgViualizate');


    button.addEventListener('click', function() {
        mediaInput.click();
    });

    mediaInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const fileType = file.type;
                if (fileType.includes('video')) {
                    // Es un video
                    imgVisualizate.style.display = 'none'; // Oculta la imagen
                
                } else {

                    imgVisualizate.style.display = 'block'; // Muestra la imagen
                    imgVisualizate.src = e.target.result;
                }

                button.style.display = "none";
            }

            reader.readAsDataURL(file);
        }
    });
});
