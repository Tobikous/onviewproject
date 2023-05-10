document.getElementById('image').addEventListener('change', function(e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
        document.getElementById('initial').style.display = 'none';
        document.getElementById('preview').style.display = 'flex';
        document.getElementById('previewImage').src = e.target.result;
        document.getElementById('previewText').textContent = file.name;
    }

    reader.readAsDataURL(file);
});
