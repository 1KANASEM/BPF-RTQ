<section class="home">
    <div class="text fw-bold">Laporan Progress</div>
    <div class="container-md p-2">
        <?php Flasher::flash(); ?>
        <div class="container-md p-2">
            <table id="table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Aktifitas</th>
                        <th>Tanggal</th>
                        <th>Progress</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data['progress'] as $row) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['nim'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['aktifitas'] ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td>
                                <?php $row['file_path'] = '../../progress/' . $row['progress']; ?>
                                <?php if (!empty($row['file_path'])) : ?>
                                    <a href="<?= $row['file_path'] ?>" target="_blank" style="text-decoration: none;"><?= $row['progress'] ?></a>
                                <?php else : ?>
                                    No file uploaded
                                <?php endif; ?>
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