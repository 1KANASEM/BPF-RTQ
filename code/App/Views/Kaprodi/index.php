<style>
  /* Add CSS to hide rows with class 'd-none' */
  table.table tbody tr.d-none {
    display: none;
  }
</style>

</style>
<section class="home">
  <div class="text">Sistem Magang</div>
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
  </script>