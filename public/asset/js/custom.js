// File: custom.js
$(document).ready(function () {
    // Saat input file berubah di halaman kategori
    $('#gambar_kategori').on('change', function (e) {
        previewImage(this, '#img_view');
    });    

    // Saat input file berubah di halaman produk
    $('#gambar_produk').on('change', function (e) {
        previewImage(this, '#imgView');
    });
});

function previewImage(input, imgId) {
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(imgId).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        console.log('Mengganti gambar...');
    }
}


