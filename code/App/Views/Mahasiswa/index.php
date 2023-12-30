<style>
  /* Add CSS for the "d-flex-between" class */
  .d-flex-between {
    display: flex;
    justify-content: space-between;
    /* This pushes the elements to opposite ends */
    align-items: center;
    /* This centers the items vertically */
  }

  /* Add CSS to position the notifications dropdown */
  #notifications-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    z-index: 1000;
    display: none;
    min-width: 250px;
    padding: 0.5rem 1rem;
    margin: 0.125rem 0 0;
    font-size: 0.875rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 0.25rem;
  }

  /* Show the dropdown when it has the "show" class */
  #notifications-dropdown.show {
    display: block;
  }

  /* Add CSS to hide rows with class 'd-none' */
  table.table tbody tr.d-none {
    display: none;
  }
</style>
<section class="home">
  <div class="container-md d-flex-between">
    <div class="text fw-bold">Sistem Magang</div>
    <div class="dropdown">
      <div id="notification-icon" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bx bx-bell" style="font-size: 24px;"></i>
      </div>
      <div id="notifications-dropdown" class="dropdown-menu dropdown-menu">
        <?php foreach ($data['notifications'] as $notification) : ?>
          <div class="notification"> <!-- Move this opening tag here -->
            <span class="notification-timestamp"><?= $notification['created_at']; ?></span>
            <span class="notification-message"><?= $notification['message']; ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  </div>
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
                      <button class="btn btn-primary py-1 fw-bold">Daftar</button>
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
                  <th>No</th>
                  <th>Aktifitas</th>
                  <th>Kuo.</th>
                  <th>Durasi</th>
                  <th>Pemberi Lowongan</th>
                  <th>Tanggal Post</th>
                  <th>Status Magang</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($data['riwayat'] as $row) :
                ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['aktifitas']; ?></td>
                    <td><?= $row['kuota']; ?></td>
                    <td><?= $row['durasi_magang']; ?></td>
                    <td><?= $row['inisial']; ?></td>
                    <td><?= $row['tanggal_post']; ?></td>
                    <td>
                      <?php if ($row['status_magang'] == 'WAITING') : ?>
                        <span class="badge bg-warning text-dark"><?= $row['status_magang']; ?></span>
                      <?php elseif ($row['status_magang'] == 'ACTIVE') : ?>
                        <span class="badge bg-success text-light"><?= $row['status_magang']; ?></span>
                      <?php elseif ($row['status_magang'] == 'DONE') : ?>
                        <span class="badge bg-info"><?= $row['status_magang']; ?></span>
                      <?php elseif ($row['status_magang'] == 'DECLINED') : ?>
                        <span class="badge bg-danger"><?= $row['status_magang']; ?></span>
                      <?php endif; ?>
                    </td>
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
            <p class="fw-bold" id="statusLabel">Status</p>
            <span id="modalStatus"></span>
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
  function populateModal(rowData, isTab2Active) {
    document.getElementById("modalAktifitas").innerText = rowData.aktifitas;
    document.getElementById("modalDeskripsi").innerText = rowData.deskripsi;
    document.getElementById("modalDurasiMagang").innerText = rowData.durasi_magang;
    document.getElementById("modalDurasiLowongan").innerText = rowData.durasi_lowongan;
    document.getElementById("modalKuota").innerText = rowData.kuota;
    document.getElementById("modalInisial").innerText = rowData.inisial;
    document.getElementById("modalTanggalMagang").innerText = rowData.tanggal_magang;
    document.getElementById("modalTanggalPost").innerText = rowData.tanggal_post;

    const modalStatusElement = document.getElementById("modalStatus");
    const statusLabelElement = document.getElementById("statusLabel");

    if (isTab2Active) {
      if (rowData.status_magang === "WAITING") {
        modalStatusElement.innerText = rowData.status_magang;
        modalStatusElement.classList.add("badge", "bg-warning", "text-dark");
      } else {
        modalStatusElement.innerText = rowData.status_magang;
        modalStatusElement.classList.remove("badge", "bg-warning", "text-dark");
        modalStatusElement.classList.add("badge", "bg-success", "text-light");
      }
      statusLabelElement.innerText = "Status Magang";
    } else {
      modalStatusElement.innerText = rowData.status_lowongan;
      statusLabelElement.innerText = "Status Lowongan";
      modalStatusElement.classList.remove("badge", "bg-warning", "text-dark");
      modalStatusElement.classList.add("badge", "bg-success", "text-white");
    }
  }

  function daftarLowongan(id_lowongan) {
    // Use the id_lowongan parameter in your code to perform the necessary action.
    // For example, you can use it to redirect to the appropriate URL for the lowongan:
    window.location.href = "<?= URL; ?>/Mahasiswa/daftar/" + id_lowongan;
  }

  // JavaScript function to handle the click event on table rows
  document.addEventListener("DOMContentLoaded", function() {
    const tableRowsTab1 = document.querySelectorAll("#table tbody tr");
    const tableRowsTab2 = document.querySelectorAll("#table2 tbody tr");

    tableRowsTab1.forEach(function(row, index) {
      row.addEventListener("click", function() {
        const rowData = <?= json_encode($data['lowongan']); ?>;
        populateModal(rowData[index], false); // Pass 'false' to indicate Tab 1 is active
      });
    });

    tableRowsTab2.forEach(function(row, index) {
      row.addEventListener("click", function() {
        const rowData = <?= json_encode($data['riwayat']); ?>;
        populateModal(rowData[index], true); // Pass 'true' to indicate Tab 2 is active
      });
    });

    // Function to check if the status_magang in Tab 2 is "ACTIVE"
    function isStatusMagangActiveInTab2() {
      const riwayatData = <?= json_encode($data['riwayat']); ?>;
      for (const row of riwayatData) {
        if (row.status_magang === "ACTIVE") {
          return true;
        }
      }
      return false;
    }

    const daftarButtonsTab1 = document.querySelectorAll("#table tbody button.btn-primary");
    daftarButtonsTab1.forEach(function(button, index) {
      button.addEventListener("click", function() {
        const rowData = <?= json_encode($data['lowongan']); ?>;
        const lowonganData = rowData[index];

        // Check if status_magang in Tab 2 is "ACTIVE"; if yes, disable the button
        if (isStatusMagangActiveInTab2()) {
          Swal.fire({
            title: "Tidak Bisa Mendaftar",
            text: "Magang Anda Sudah Active",
            icon: "info",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
          });
          return;
        }

        // Show the SweetAlert2 alert
        Swal.fire({
          title: "Daftar Lowongan Magang",
          text: `Anda ingin mendaftar lowongan ini?`,
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, Daftar",
          cancelButtonText: "Cancel",
        }).then((result) => {
          // If the user clicks the "Yes, Daftar" button
          if (result.isConfirmed) {
            // Pass the id_lowongan value to the daftarLowongan function
            daftarLowongan(lowonganData.id_lowongan);
          }
        });
      });
    });
  });

  // Function to update the notifications/messages container with new messages
  function updateNotificationsContainer(messages) {
    const notificationsItem = document.getElementById('notification-item');
    let newHTML = '';
    messages.forEach(message => {
      newHTML += `<div class="notification">
                  <span class="notification-timestamp">${formattedTimestamp}</span>
                  <span class="notification-message">${message.text}</span>
                  </div>`;
    });
    notificationsItem.innerHTML = newHTML;
  }

  // Function to check for new notifications/messages using AJAX
  function checkNotifications() {
    // Send an AJAX request to retrieve the notifications/messages
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '<?= URL; ?>/Mahasiswa/getNotifications', true);

    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          const messages = response.messages;
          updateNotificationsContainer(messages);
        } else {
          // Handle error if needed
        }
      }
    };

    xhr.send();
  }

  // Set an interval to check for new notifications/messages every 5 seconds
  setInterval(checkNotifications, 5000);

  document.addEventListener("DOMContentLoaded", function() {
    // Function to toggle the visibility of the notifications dropdown
    function toggleNotificationsDropdown() {
      const dropdownMenu = document.getElementById('notifications-dropdown');
      dropdownMenu.classList.toggle('show');
    }

    // Add a click event listener to the notification icon
    const notificationIcon = document.getElementById('notification-icon');
    notificationIcon.addEventListener('click', toggleNotificationsDropdown);
  });
</script>