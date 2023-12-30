<style>
  /* Add CSS to hide rows with class 'd-none' */
  table.table tbody tr.d-none {
    display: none;
  }
</style>

<section class="home">
  <div class="text fw-bold">Sistem Magang</div>
  <div class="container-md p-2 bg-white">
    <?php Flasher::flash(); ?>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active rounded" data-toggle="tab" href="#tab1">Daftar Lowongan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link rounded" data-toggle="tab" href="#tab2">Riwayat Lowongan</a>
      </li>
    </ul>
    <div class=" tab-content">
      <div id="tab1" class="tab-pane fade show active">
        <div class="container-md p-2">
          <div class="container-md p-2">
            <table id="table" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aktifitas</th>
                  <th>Kuo.</th>
                  <th>Durasi</th>
                  <th>Pemberi Lowongan</th>
                  <th>Tanggal Post</th>
                  <th>Status Lowongan</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($data['lowongan'] as $row) :
                  // Check if the kuota is 0
                  $isKuotaZero = $row['kuota'] == 0;
                ?>
                  <!-- Add a condition to add the 'd-none' class if kuota is 0 -->
                  <tr class="<?= $isKuotaZero ? 'd-none' : ''; ?>">
                    <td><?= $i ?></td>
                    <td><?= $row['aktifitas']; ?></td>
                    <td><?= $row['kuota']; ?></td>
                    <td><?= $row['durasi_magang']; ?></td>
                    <td><?= $row['inisial']; ?></td>
                    <td><?= $row['tanggal_post']; ?></td>
                    <td><span class="badge bg-success text-white"><?= $row['status_lowongan']; ?></span></td>
                    <td>
                      <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class='bx bx-info-circle icon'></i></button>
                    </td>
                  </tr>
                <?php
                  $i++;
                endforeach;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div id="tab2" class="tab-pane fade">
        <div class="container-md p-2">
          <div class="container-md p-2">
            <table id="table2" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Aktifitas</th>
                  <th class="text-center">Kuo.</th>
                  <th class="text-center">Durasi</th>
                  <th class="text-center">Pemberi Lowongan</th>
                  <th class="text-center">Tanggal Post</th>
                  <th class="text-center">Status Lowongan</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($data['riwayat'] as $row) :
                ?>
                  <tr class="text-center">
                    <td><?= $i ?></td>
                    <td><?= $row['aktifitas']; ?></td>
                    <td><?= $row['kuota']; ?></td>
                    <td><?= $row['durasi_magang']; ?></td>
                    <td><?= $row['inisial']; ?></td>
                    <td><?= $row['tanggal_post']; ?></td>
                    <td>
                      <?php if ($row['status_lowongan'] == 'WAITING') : ?>
                        <span class="badge bg-warning text-dark"><?= $row['status_lowongan']; ?></span>
                      <?php elseif ($row['status_lowongan'] == 'OPEN') : ?>
                        <span class="badge bg-success text-light"><?= $row['status_lowongan']; ?></span>
                      <?php elseif ($row['status_lowongan'] == 'DECLINED') : ?>
                        <span class="badge bg-danger"><?= $row['status_lowongan']; ?></span>
                      <?php endif; ?>
                    </td>
                    <td class="d-flex justify-content-end">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-id="<?= $row['id_lowongan']; ?>" data-aktifitas="<?= $row['aktifitas']; ?>">
                        <i class='bx bx-edit-alt'></i>
                      </button>
                      <button class="btn btn-danger" style="margin-left: 10px;"><i class='bx bx-trash icon'></i></button>
                    </td>
                  </tr>
                <?php
                  $i++;
                endforeach;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Lowongan Magang</h5>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label fw-bolder">Aktifitas</label>
          <p id="modalAktifitas"></p>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label fw-bolder">Deskripsi</label>
          <p id="modalDeskripsi"></p>
        </div>

        <div class="row mb-3">
          <div class="form-floating col">
            <p class="fw-bold">Durasi Magang</p>
            <p id="modalDurasiMagang"></p>
          </div>
          <div class="form-floating col">
            <p class="fw-bold">Durasi Lowongan</p>
            <p id="modalDurasiLowongan"></p>
          </div>
        </div>

        <div class="row mb-3">
          <div class="form-floating col">
            <p class="fw-bold">Kuota</p>
            <p id="modalKuota"></p>
          </div>
          <div class="form-floating col">
            <p class="fw-bold">Pemberi Lowongan</p>
            <p id="modalInisial"></p>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col">
            <p class="fw-bold">Tanggal Magang</p>
            <p id="modalTanggalMagang"></p>
          </div>
          <div class="form-floating col">
            <p class="fw-bold">Tanggal Post</p>
            <p id="modalTanggalPost"></p>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-floating col">
            <p class="fw-bold">Status</p>
            <span class="badge bg-success text-white" id="modalStatus"></span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Lowongan Magang</h5>
      </div>
      <!-- Add this input fields inside the editModal to display and edit lowongan details -->
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="<?= URL; ?>/Dosen/editLowongan/">
          <input type="hidden" name="id_lowongan" id="editIdLowongan" value="<?= $row['id_lowongan']; ?>"> <!-- Hidden field to store the lowongan ID -->
          <input type="text" name="aktifitas" id="editAktifitas" class="form-control mb-3" value="" required placeholder="Aktifitas">
          <input type="number" name="kuota" id="editKuota" class="form-control mb-3" value="" required placeholder="Kuota">
          <input type="number" name="durasi_magang" id="editDurasiMagang" class="form-control mb-3" value="" required placeholder="Durasi Magang">
          <input type="number" name="durasi_lowongan" id="editDurasiLowongan" class="form-control mb-3" value="" required placeholder="Durasi Lowongan">
          <input type="text" name="tanggal_magang" id="editTanggalMagang" class="form-control mb-3" value="" onfocus="(this.type='date')" required placeholder="Tanggal Magang">
          <input type="text" name="deskripsi" id="editDeskripsi" class="form-control mb-3" value="" required placeholder="Deskripsi">
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    // JavaScript function to populate the modal with data based on the clicked row
    function populateModal(rowData) {
      document.getElementById("modalAktifitas").innerText = rowData.aktifitas;
      document.getElementById("modalDeskripsi").innerText = rowData.deskripsi;
      document.getElementById("modalDurasiMagang").innerText = rowData.durasi_magang;
      document.getElementById("modalDurasiLowongan").innerText = rowData.durasi_lowongan;
      document.getElementById("modalKuota").innerText = rowData.kuota;
      document.getElementById("modalInisial").innerText = rowData.inisial;
      document.getElementById("modalTanggalMagang").innerText = rowData.tanggal_magang;
      document.getElementById("modalTanggalPost").innerText = rowData.tanggal_post;
      document.getElementById("modalStatus").innerText = rowData.status_lowongan;
    }

    // JavaScript function to handle the click event on table rows
    document.addEventListener("DOMContentLoaded", function() {
      const tableRows = document.querySelectorAll("#table tbody tr");
      tableRows.forEach(function(row, index) {
        row.addEventListener("click", function() {
          const rowData = <?= json_encode($data['lowongan']); ?>;
          populateModal(rowData[index]);
        });
      });
    });

    // Function to handle the delete action
    function deleteLowongan(id) {
      window.location.href = ' <?= URL; ?>/Dosen/hapus/<?= $row['id_lowongan']; ?>';
    }


    // JavaScript function to handle the click event on the delete links in tab 2
    document.addEventListener("DOMContentLoaded", function() {
      const deleteLinks = document.querySelectorAll("#table2 tbody button.btn-danger");
      deleteLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
          event.preventDefault();
          const id = link.getAttribute("data-id");
          const aktifitas = link.getAttribute("data-aktifitas");

          // Show SweetAlert2 confirmation alert
          Swal.fire({
            title: "Konfirmasi?",
            text: `Anda ingin menghapus lowongan ini?`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
          }).then((result) => {
            if (result.isConfirmed) {
              // If user clicks "Yes," execute the delete action
              deleteLowongan(id);
            }
          });
        });
      });
    });

    function populateEditModal(rowData) {
      document.getElementById("editIdLowongan").value = rowData.id_lowongan;
      document.getElementById("editAktifitas").value = rowData.aktifitas;
      document.getElementById("editKuota").value = rowData.kuota;
      document.getElementById("editDurasiMagang").value = rowData.durasi_magang;
      document.getElementById("editDurasiLowongan").value = rowData.durasi_lowongan;
      document.getElementById("editTanggalMagang").value = rowData.tanggal_magang;
      document.getElementById("editDeskripsi").value = rowData.deskripsi;
    }

    document.addEventListener("DOMContentLoaded", function() {
      const editButtons = document.querySelectorAll("#table2 tbody button.btn-primary");
      const closeButton = document.querySelector("#editModal button[data-dismiss='modal']");

      editButtons.forEach(function(button, index) {
        button.addEventListener("click", function() {
          const rowData = <?= json_encode($data['riwayat']); ?>;
          populateEditModal(rowData[index]);
          $('#editModal').modal('show'); // Open the editModal
        });
      });

      closeButton.addEventListener("click", function() {
        // Manually close the editModal using jQuery
        $('#editModal').modal('hide');
      });
    });
  </script>