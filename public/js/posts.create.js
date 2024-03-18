document.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('button');
    const mediaInput = document.getElementById('mediaInput');
    const imgVisualizate = document.getElementById('imgViualizate');
    const videoVisualizate = document.getElementById('videoViualizate');

    imgVisualizate.style.display = "none";
    videoVisualizate.style.display = "none";

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
                    videoVisualizate.style.display = 'block'; // Muestra el video
                    videoVisualizate.src = e.target.result;
                    videoVisualizate.play(); // Reproduce el video automáticamente
                } else {
                    // Es una imagen
                    videoVisualizate.style.display = 'none'; // Oculta el video
                    imgVisualizate.style.display = 'block'; // Muestra la imagen
                    imgVisualizate.src = e.target.result;
                }

                button.style.display = "none";
            }

            reader.readAsDataURL(file);
        }
    });
});
