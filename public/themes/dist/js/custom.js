$(document).ready(function () {
  $("#tabelData").DataTable({
    lengthMenu: [
      [5, 10, 25, -1],
      [5, 10, 25, "Semua"],
    ],

    language: {
      lengthMenu: "Tampilkan _MENU_ data per halaman",
      zeroRecords: "Maaf, tidak ada data yang ditemukan",
      info: "Menampilkan _PAGE_ dari _PAGES_ halaman",
      infoEmpty: "Tidak ada data yang tersedia",
      infoFiltered: "(filtered from _MAX_ total records)",
    },

    dom: '<"d-flex justify-content-between"fl>t<"d-flex justify-content-between"ip>',
  });
});

function previewFoto() {
  const foto = document.querySelector("#gambar_produk");
  const fotoPreview = document.querySelector("#gambar_preview");

  const fileFoto = new FileReader();
  fileFoto.readAsDataURL(foto.files[0]);

  fileFoto.onload = function (e) {
    fotoPreview.src = e.target.result;
  };
}
