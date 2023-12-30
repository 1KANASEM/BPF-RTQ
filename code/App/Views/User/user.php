<style>
    /* Google Font Import - Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    section {
        background-color: #E4E9F7;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }

    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 350px;
    }

    h1 {
        text-align: center;
    }

    button {
        height: 50px;
        width: 320px;
        margin-top: 25px;
        background-color: #8C94AB;
        border-color: #AB9D7B;
        border-radius: 15px;
    }

    button:hover {
        background-color: #695CFE;
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
        <div class="container">
            <h1 class="fw-bold">Login Sebagai</h1>
            <a href="<?= URL; ?>/Mahasiswa/index"><button class="text-white fw-bold">Mahasiswa</button></a>
            <a href="<?= URL; ?>/Dosen/index"><button class="text-white fw-bold">Dosen</button></a>
            <a href="<?= URL; ?>/Kaprodi/index"><button class="text-white fw-bold">Kaprodi</button></a>
        </div>
    </div>
    </div>
    </div>
</section>