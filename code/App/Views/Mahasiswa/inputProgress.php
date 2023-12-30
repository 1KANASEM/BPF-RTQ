<section class="home">
    <div class="text fw-bold">Laporan Progress</div>
    <div class="container-md p-2">
        <?php Flasher::flash(); ?>
        <div class="d-flex justify-content-end mb-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Upload Progress</button>
        </div>
        <div class="container-md p-2">
            <table id="table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aktifitas</th>
                        <th>Tanggal</th>
                        <th>Progress</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data['progress'] as $row) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['aktifitas']; ?></td>
                            <td><?= $row['tanggal']; ?></td>
                            <td>
                                <?php $row['file_path'] = '../../progress/' . $row['progress']; ?>
                                <?php if (!empty($row['file_path'])) : ?>
                                    <a href="<?= $row['file_path'] ?>" target="_blank" style="text-decoration: none;"><?= $row['progress'] ?></a>
                                <?php else : ?>
                                    No file uploaded
                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-id="<?= $row['id_progress']; ?>" data-aktifitas="<?= $row['aktifitas']; ?>">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Upload Progress</h5>
                </div>
                <div class="modal-body">
                    <form action="<?= URL; ?>/Mahasiswa/uploadProgress/" method="post" enctype="multipart/form-data">
                        <label for="progress">Upload Laporan Progress</label><br>
                        <input type="file" name="progress"><br>
                        <button type="submit" class="btn btn-primary mt-3" name="submit">Upload File</button>
                    </form>
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
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Edit Hasil</h5>
                </div>
                <div class="modal-body">
                    <form action="<?= URL; ?>/Mahasiswa/editProgress/<?= $row['id_progress']; ?>" method="POST" enctype="multipart/form-data">
                        <label for="progress">Edit Laporan Progress</label><br>
                        <input type="file" name="progress"><br>
                        <button type="submit" class="btn btn-primary mt-3" name="submit">Upload File</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function deleteProgress(id) {
            window.location.href = ' <?= URL; ?>/Mahasiswa/hapusProgress/<?= $row['id_progress']; ?>';
        }

        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll("#table tbody button.btn-primary");
            const closeButton = document.querySelector("#editModal button[data-dismiss='modal']");
            const deleteLinks = document.querySelectorAll("#table tbody button.btn-danger");
            deleteLinks.forEach(function(link) {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    const id = link.getAttribute("data-id");
                    const aktifitas = link.getAttribute("data-aktifitas");

                    // Show SweetAlert2 confirmation alert
                    Swal.fire({
                        title: "Konfirmasi?",
                        text: `Anda ingin menghapus laporan ini?`,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, hapus!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user clicks "Yes," execute the delete action
                            deleteProgress(id);
                        }
                    });
                });
            });

            closeButton.addEventListener("click", function() {
                // Manually close the editModal using jQuery
                $('#editModal').modal('hide');
            });
        });
    </script>