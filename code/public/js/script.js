// $(".buttonEdit").on("click", function () {
//   const id = $(this).data("id");

//   $.ajax({
//     url: "http://localhost/Project/code/public/dosen/edit", // Change the URL to the correct endpoint
//     data: { id: id },
//     method: "post",
//     dataType: "json",
//     success: function (data) {
//       $("#editIdLowongan").val(data.id_lowongan); // Set the hidden field to store the lowongan ID
//       $("#editAktifitas").val(data.aktifitas);
//       $("#editKuota").val(data.kuota);
//       $("#editDurasiMagang").val(data.durasi_magang);
//       $("#editDurasiLowongan").val(data.durasi_lowongan);
//       $("#editTanggalMagang").val(data.tanggal_magang);
//       $("#editDeskripsi").val(data.deskripsi);
//     },
//     error: function (xhr, status, error) {
//       // Handle the error if needed
//       console.log(xhr.responseText);
//     },
//   });
// });

$(document).ready(function () {
  // Initialize DataTable for the table in tab 1
  $("#table").DataTable();

  $("#table2").DataTable();
});

const body = document.querySelector("body"),
  sidebar = body.querySelector("nav"),
  toggle = body.querySelector(".toggle");

toggle.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});
