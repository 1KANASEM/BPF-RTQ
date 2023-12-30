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

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="https://akademik.pcr.ac.id/assets/layouts/layout/img/profile-pic.jpg" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name fw-bold h6"><?= $data['nama']; ?></span>
                    <span class="profession">Kaprodi</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="nav-link">
                    <a href="<?= URL; ?>/Kaprodi/home/">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="<?= URL; ?>/Kaprodi/approval/">
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
                </div>
            </div>

    </nav>