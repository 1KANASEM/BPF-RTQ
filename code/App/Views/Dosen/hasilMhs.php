<section class="home">
    <div class="text fw-bold">Laporan Hasil</div>
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
                        <th>Hasil</th>
                        <th>Status Magang</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data['hasil'] as $row) :
                    ?>
                        <?php if ($row['status_magang'] == 'ACTIVE' || $row['status_magang'] == 'DONE') : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['nim'] ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['aktifitas']; ?></td>
                                <td>
                                    <?php $row['file_path'] = '../../hasil/' . $row['hasil']; ?>
                                    <?php if ($row['hasil'] !== 'NONE') : ?>
                                        <a href="<?= $row['file_path'] ?>" target="_blank" style="text-decoration: none;"><?= $row['hasil'] ?></a>
                                    <?php else : ?>
                                        No file uploaded
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($row['status_magang'] == 'ACTIVE') : ?>
                                        <span class="badge bg-success text-light"><?= $row['status_magang']; ?></span>
                                    <?php elseif ($row['status_magang'] == 'DONE') : ?>
                                        <span class="badge bg-info"><?= $row['status_magang']; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($row['status_magang'] == 'ACTIVE' && $row['hasil'] !== 'NONE') : ?>
                                        <button class="btn btn-success py-1 fw-bold">Terima</button>
                                        <button class="btn btn-danger py-1 fw-bold">Tolak</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php
                        $i++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    function terimaHasil(id) {
        window.location.href = '<?= URL; ?>/Dosen/terimaHasil/<?= $row['id']; ?>';
    }

    function tolakHasil(id) {
        window.location.href = '<?= URL; ?>/Dosen/tolakHasil/<?= $row['id']; ?>';
    }

    document.addEventListener("DOMContentLoaded", function() {
        const terimaButton = document.querySelectorAll("#table tbody button.btn-success");
        const tolakButton = document.querySelectorAll("#table tbody button.btn-danger")
        terimaButton.forEach(function(link) {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                const id = link.getAttribute("data-id");
                const aktifitas = link.getAttribute("data-aktifitas");

                // Show SweetAlert2 confirmation alert
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda ingin menerima hasil ini?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, terima!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        terimaHasil(id);
                    }
                });
            });
        });

        tolakButton.forEach(function(link) {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                const id = link.getAttribute("data-id");
                const aktifitas = link.getAttribute("data-aktifitas");

                // Show SweetAlert2 confirmation alert
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda ingin menolak hasil ini?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, tolak!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        tolakHasil(id);
                    }
                });
            });
        });
    });
</script>