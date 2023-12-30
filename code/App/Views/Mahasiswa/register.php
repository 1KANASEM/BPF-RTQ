<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>
<section class="vh-100">
    </div>
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
        <img src="https://pcr.ac.id/assets/frontend/layout/img/logos/logo-pcr.png" alt="Logo PCR">
    </div>
    <!-- Copyright -->
    </div>
    <div>
        <p class="h1 text-center mb-5 fw-bold">Sign Up</p>
    </div>
    <div class="container-fluid h-100">
        <div class="row d-flex justify-content-center align-items-center">

            <div class="col-lg-6 off set-xl-1">
                <form action="<?= URL; ?>/Mahasiswa/register" enctype="multipart/form-data" method="POST">
                    <?php Flasher::flash(); ?>
                    <!-- Name input -->
                    <div class="row mb-3">
                        <div class="form-floating col">
                            <input type="text" name="nama" id="floatingNama" class="form-control form-control-lg" placeholder="Email" required />
                            <label class="form-label" style="margin-left: 10px;" for="floatingNama">Nama</label>
                        </div>
                        <div class="form-floating col">
                            <input type="text" name="nim" id="floatingNim" class="form-control form-control-lg" placeholder="NIM" required />
                            <label class="form-label" style="margin-left: 10px;" for="floatingNim">NIM</label>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-floating col">
                            <input type="text" name="kelas" id="floatingKelas" class="form-control form-control-lg" placeholder="Kelas" required />
                            <label class="form-label" style="margin-left: 10px;" for="floatingKelas">Kelas</label>
                        </div>
                        <div class="form-floating col">
                            <input type="number" name="tak" id="floatingTak" class="form-control form-control-lg" placeholder="Tak" required />
                            <label class="form-label" style="margin-left: 10px;" for="floatingTak">TAK</label>
                        </div>
                    </div>

                    <div class="form-floating mb-3 mb-4">
                        <input type="email" name="email" id="floatingEmail" class="form-control form-control-lg" placeholder="Email" required />
                        <label class="form-label" style="margin-left: 10px;" for="floatingEmail">Email</label>
                    </div>
                    <div class="form-floating mb-3 mb-4">
                        <input type="password" name="password" id="floatingPass" class="form-control form-control-lg" placeholder="Password" required />
                        <label class="form-label" style="margin-left: 10px;" for="floatingPass">Password</label>
                    </div>
                    <div class="form-floating mb-3 mb-4">
                        <input type="password" name="confirmPassword" id="floatingConfirmPass" class="form-control form-control-lg" placeholder="Confirm Password" required />
                        <label class="form-label" style="margin-left: 10px;" for="floatingConfirmPass">Confirm Password</label>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign Up</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="<?= URL; ?>/Mahasiswa/index" class="link-danger">Login </a></p>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</section>

<script>
    // Validate password and confirm password fields
    function validatePassword() {
        var email = document.getElementById("floatingEmail").value;
        var password = document.getElementById("floatingPass").value;
        var confirmPassword = document.getElementById("floatingConfirmPass").value;

        // Check if the email domain is valid
        if (!email.endsWith("ti@mahasiswa.pcr.ac.id")) {
            Swal.fire({
                icon: "error",
                title: "Domain email salah",
                text: 'Email harus menggunakan domain "ti@mahasiswa.pcr.ac.id".',
            });
            return false;
        }


        if (password != confirmPassword) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: '"Password dan Confirm Password berbeda."',
            });
            return false;
        }

        // Check if the password meets the minimum length requirement
        if (password.length < 8) {
            Swal.fire({
                icon: "error",
                title: "Password terlalu pendek",
                text: "Password minimal 8 karakter.",
            });
            return false;
        }

        return true;
    }

    // Attach the validation to the form submission
    document.querySelector("form").addEventListener("submit", function(event) {
        if (!validatePassword()) {
            event.preventDefault(); // Prevent the form from submitting
        }
    });
</script>