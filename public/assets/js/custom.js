$("#addimg").change(function () {
    previewImage(this);
});

function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-view').attr('src', e.target.result);
            $('.img-default').hide(); // Menyembunyikan ikon plus
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#img-view').attr('src', ''); // Set source to empty string
        $('.img-default').show(); // Menampilkan kembali ikon plus jika input kosong
    }
}
