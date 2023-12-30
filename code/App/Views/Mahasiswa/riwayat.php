<section class="home">
  <div class="text">Sistem Magang</div>
  <div class="container-md p-2">
    <table id="table" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>Aktifitas</th>
          <th>Kuota</th>
          <th>Durasi</th>
          <th>Pemberi Lowongan</th>
          <th>Tanggal Post</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($data['lowongan'] as $row) :
        ?>
          <tr>
            <td class="text-center"><?= $i ?></td>
            <td class="text-center"><?= $row['aktifitas']; ?></td>
            <td class="text-center"><?= $row['kuota']; ?></td>
            <td class="text-center"><?= $row['durasi_magang']; ?></td>
            <td class="text-center"><?= $data['inisial']; ?></td>
            <td><?= $row['tanggal_post']; ?></td>
            <td><?= $row['status_lowongan']; ?></td>
          </tr>
        <?php
          $i++;
        endforeach;
        ?>
      </tbody>
    </table>
  </div>
</section>