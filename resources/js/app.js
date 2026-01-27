import './bootstrap';




window.previewFoto = function (event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (e) {
        const img = new Image();
        img.onload = function () {

            const SIZE = 300;
            const minSize = Math.min(img.width, img.height);
            const sx = (img.width - minSize) / 2;
            const sy = (img.height - minSize) / 2;

            const canvas = document.createElement('canvas');
            canvas.width = SIZE;
            canvas.height = SIZE;
            const ctx = canvas.getContext('2d');

            ctx.drawImage(img, sx, sy, minSize, minSize, 0, 0, SIZE, SIZE);

            const croppedBase64 = canvas.toDataURL('image/jpeg', 0.9);

            const preview = document.getElementById('preview-foto');
            const placeholder = document.getElementById('upload-placeholder');
            const inputHidden = document.getElementById('foto_cropped');

            if (preview) {
                preview.src = croppedBase64;
                preview.classList.remove('hidden');
            }

            if (placeholder) {
                placeholder.classList.add('hidden');
            }

            if (inputHidden) {
                inputHidden.value = croppedBase64;
            }
        };
        img.src = e.target.result;
    };
    reader.readAsDataURL(file);
};

