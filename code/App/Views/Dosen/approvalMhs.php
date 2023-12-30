<section class="home">
    <div class="text fw-bold">Permintaan Mahasiswa</div>
    <div class="container-md p-2 bg-white">
        <?php Flasher::flash(); ?>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active rounded" data-toggle="tab" href="#tab1">Daftar Permintaan Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded" data-toggle="tab" href="#tab2">Daftar Mahasiswa Magang</a>
            </li>
        </ul>
        <div class=" tab-content">
            <div id="tab1" class="tab-pane fade show active">
                <div class="container-md p-2">
                    <div class="container-md p-2">
                        <table id="table" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NIM Mahasiswa</th>
                                    <th class="text-center">Nama Mahasiswa</th>
                                    <th class="text-center">Aktifitas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data['mhs'] as $row) :
                                ?>
                                    <tr class="text-center">
                                        <td><?= $i ?></td>
                                        <td><?= $row['nim'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['aktifitas']; ?></td>
                                        <td>
                                            <button class="btn btn-success py-1 fw-bold" data-id="<?= $row['id']; ?>" data-aktifitas="<?= $row['aktifitas']; ?>">Terima</button>
                                            <button class="btn btn-danger py-1 fw-bold" data-id="<?= $row['id']; ?>" data-aktifitas="<?= $row['aktifitas']; ?>">Tolak</button>
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
                                    <th class="text-center">NIM Mahasiswa</th>
                                    <th class="text-center">Nama Mahasiswa</th>
                                    <th class="text-center">Aktifitas</th>
                                    <th class="text-center">Status Magang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data['daftar'] as $row) :
                                ?>
                                    <tr class="text-center">
                                        <td><?= $i ?></td>
                                        <td><?= $row['nim'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['aktifitas']; ?></td>
                                        <td>
                                            <?php if ($row['status_magang'] == 'ACTIVE') : ?>
                                                <span class="badge bg-success text-light"><?= $row['status_magang']; ?></span>
                                            <?php elseif ($row['status_magang'] == 'DONE') : ?>
                                                <span class="badge bg-info"><?= $row['status_magang']; ?></span>
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
            </div>
        </div>
    </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const terimaButton = document.querySelectorAll("#table tbody button.btn-danger");
        terimaButton.forEach(function(link) {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                const id = link.getAttribute("data-id");
                const aktifitas = link.getAttribute("data-aktifitas");

                // Show SweetAlert2 confirmation alert
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda ingin menolak permintaan ini?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, tolak!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `<?= URL; ?>/Dosen/tolakMahasiswa/${id}`;
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
                    text: `Anda ingin menerima permintaan ini?`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, terima!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to the server route with the id parameter
                        window.location.href = `<?= URL; ?>/Dosen/terimaMahasiswa/${id}`;
                    }
                });
            });
        });
    });
</script>