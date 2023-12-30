<section class="home">
    <div class="text fw-bold">Laporan Hasil</div>
    <div class="container-md p-2">
        <?php Flasher::flash(); ?>
        <div class="d-flex justify-content-end mb-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Upload Hasil</button>
        </div>
        <div class="container-md p-2">
            <table id="table" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aktifitas</th>
                        <th>Hasil</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data['hasil'] as $row) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
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
                                <?php if ($row['hasil'] !== 'NONE') : ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-id="<?= $row['id_lowongan']; ?>" data-aktifitas="<?= $row['aktifitas']; ?>">
                                        <i class='bx bx-edit-alt'></i>
                                    </button>
                                    <button class="btn btn-danger" style="margin-left: 10px;"><i class='bx bx-trash icon'></i></button>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Upload Hasil</h5>
                </div>
                <div class="modal-body">
                    <form action="<?= URL; ?>/Mahasiswa/uploadHasil/" method="post" enctype="multipart/form-data">
                        <label for="progress">Upload Laporan Hasil</label><br>
                        <input type="file" name="hasil"><br>
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
                    <form action="<?= URL; ?>/Mahasiswa/uploadHasil/" method="POST" enctype="multipart/form-data">
                        <label for="hasil">Edit Laporan Hasil</label><br>
                        <input type="file" id="editHasil" name="hasil"><br>
                        <button type="submit" class="btn btn-primary mt-3" name="submit">Upload File</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteHasil(id) {
            window.location.href = ' <?= URL; ?>/Mahasiswa/hapusHasil/<?= $row['id']; ?>';
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
                        text: `Anda ingin menghapus hasil ini?`,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, hapus!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user clicks "Yes," execute the delete action
                            deleteHasil(id);
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