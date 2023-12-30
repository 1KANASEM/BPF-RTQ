<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="http://localhost/Project/code/public/css/navbar.css">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Dashboard Sidebar Menu</title>
</head>

<body class="light">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="https://akademik.pcr.ac.id/assets/layouts/layout/img/profile-pic.jpg" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name"><?= $data['nama']; ?></span>
                    <span class="profession">Dosen</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="nav-link">
                    <a href="<?= URL; ?>/Dosen/home/">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="<?= URL; ?>/Dosen/formLowongan/">
                        <i class='bx bx-plus-circle icon'></i>
                        <span class="text nav-text">Create Lowongan</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="<?= URL; ?>/Dosen/progressPage">
                        <i class='bx bx-bar-chart-alt-2 icon'></i>
                        <span class="text nav-text">Laporan Progress</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="<?= URL; ?>/Dosen/hasilPage/">
                        <i class='bx bx-task icon'></i>
                        <span class="text nav-text">Laporan Hasil</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="<?= URL; ?>/Dosen/approval/">
                        <i class='bx bx-check-circle icon'></i>
                        <span class="text nav-text">Approval</span>
                    </a>
                </li>

                <div class="bottom-content">
                    <li class="">
                        <a href="<?= URL; ?>/User/user/">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>

                </div>
            </div>

    </nav>