    <!----======== CSS ======== -->
    <link rel="stylesheet" href="http://localhost/Project/code/public/css/navbar.css">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <body>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="https://akademik.pcr.ac.id/assets/layouts/layout/img/profile-pic.jpg" alt="">
                    </span>

                    <div class="text logo-text">
                        <span style="font-size: 14px; font-weight: 600;"><?= $data['nama']; ?></span>
                        <span class="profession">Mahasiswa</span>
                    </div>
                </div>

                <i class='bx bx-chevron-right toggle'></i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <li class="nav-link">
                        <a href="<?= URL; ?>/Mahasiswa/home/">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="<?= URL; ?>/Mahasiswa/progressPage/">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Laporan Progress</span>

                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="<?= URL; ?>/Mahasiswa/hasilPage/">
                            <i class='bx bx-task icon'></i>
                            <span class="text nav-text">Laporan Hasil</span>

                        </a>
                    </li>
                    <div class="bottom-content">
                        <li class="">
                            <a href="<?= URL; ?>/User/user/">
                                <i class='bx bx-log-out icon'></i>
                                <span class="text nav-text">Logout</span>
                            </a>
                        </li>

                        </li>

                    </div>
                </div>

        </nav>