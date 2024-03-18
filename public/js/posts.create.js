document.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('button');
    const mediaInput = document.getElementById('mediaInput');
    const imgVisualizate = document.getElementById('imgViualizate');

    button.addEventListener('click', function() {
        mediaInput.click();
    });

    mediaInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imgVisualizate.src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});
