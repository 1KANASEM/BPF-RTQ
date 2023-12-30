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
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5">
        <div class="text-white mb-3 mb-md-0">
            <img src="https://psti.pcr.ac.id/front-end/assets/img/logo-2.png" alt="Logo PCR">
            <img src="https://psti.pcr.ac.id/front-end/assets/img/logo-3.png" alt="Logo PSTI" style="margin-left: 10px;">
            <img src="<?= URL; ?>/img/Logo ITSA.png" style="width: 70px; height: 70px; margin-left: 10px;" alt="Logo ITSA">
        </div>
    </div>
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="<?= URL; ?>/img/Intern.jpg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 off set-xl-1">
                <form action="<?= URL; ?>/Kaprodi/login" method="POST">
                    <p class="h1 text-center mb-4 fw-bold">Log In</p>
                    <?php Flasher::flash(); ?>
                    <!-- Email input -->
                    <div class="form-floating mb-3 mb-4">
                        <input type="email" name="email" id="floatingInput" class="form-control form-control-lg" placeholder="Enter a valid email address" required />
                        <label class="form-label" for="floatingInput">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-floating mb-3">
                        <input type="password" name="password" id="floatingPass" class="form-control form-control-lg" placeholder="Enter password" />
                        <label class="form-label" for="floatingPass">Password</label>
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>