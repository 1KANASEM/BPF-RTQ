<section class="home">
  <div class="text">Sistem Magang</div>
  <div class="container-md p-2">
    <?php Flasher::flash(); ?>

    <table id="table" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Aktifitas</th>
          <th class="text-center">Kuo.</th>
          <th class="text-center">Durasi Magang (hari)</th>
          <th class="text-center">Pemberi Lowongan</th>
          <th class="text-center">Tanggal Post</th>
          <th class="text-center">Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($data['lowongan'] as $row) :
        ?>
          <tr class="text-center">
            <td><?= $i ?></td>
            <td><?= $row['aktifitas']; ?></td>
            <td><?= $row['kuota']; ?></td>
            <td><?= $row['durasi_magang']; ?></td>
            <td><?= $row['inisial']; ?></td>
            <td><?= $row['tanggal_post']; ?></td>
            <td><span class="badge bg-warning text-dark"><?= $row['status_lowongan']; ?></span></td>
            <td>
              <button class="btn btn-success py-1 fw-bold">Terima</button>
              <button class="btn btn-danger py-1 fw-bold">Tolak</button>
            </td>
          </tr>
        <?php
          $i++;
        endforeach;
        ?>
      </tbody>

    </table>
  </div>
</section>

<script>
  function terimaLowongan(id) {
    window.location.href = '<?= URL; ?>/Kaprodi/terima/<?= $row['id_lowongan']; ?>';
  }

  function tolakLowongan(id) {
    window.location.href = '<?= URL; ?>/Kaprodi/tolak/<?= $row['id_lowongan']; ?>';
  }

  document.addEventListener("DOMContentLoaded", function() {
    const terimaButton = document.querySelectorAll("#table tbody button.btn-danger");
    terimaButton.forEach(function(link) {
      link.addEventListener("click", function(event) {
        event.preventDefault();
        const id = link.getAttribute("data-id");
        const aktifitas = link.getAttribute("data-aktifitas");

        // Show SweetAlert2 confirmation alert
        Swal.fire({
          title: "Confirmation",
          text: `You want to decline this?`,
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, decline it!",
        }).then((result) => {
          if (result.isConfirmed) {
            tolakLowongan(id);
          }
        });
      });
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    const terimaButton = document.querySelectorAll("#table tbody button.btn-success");
    terimaButton.forEach(function(link) {
      link.addEventListener("click", function(event) {
        event.preventDefault();
        const id = link.getAttribute("data-id");
        const aktifitas = link.getAttribute("data-aktifitas");

        // Show SweetAlert2 confirmation alert
        Swal.fire({
          title: "Konfirmasi",
          text: `Anda ingin menerima lowongan ini?`,
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, terima!",
        }).then((result) => {
          if (result.isConfirmed) {
            terimaLowongan(id);
          }
        });
      });
    });
  });
</script>