<?php
session_start();
require("../src/library/employeeManager.php");
if (!isset($_SESSION['useremail'])) {
    header("Location: ../index.php?invalid_permission");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Team</title>
    <?php include '../assets/html/header.html'; ?>
    <!-- Custom JS -->
    <script src="../assets/js/index.js" type="module"></script>
    <script src="../assets/js/automatic.js" type="module"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header" style="height: 50px;margin-top: -30px">
                    <div class="logo"><img src="../assets/images/Assembler-Logo.png"></div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item ">
                            <a href="../assets/html/dashboard-info.html" class='sidebar-link'>
                                <i class="fa fa-home text-success"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="./dashboard.php" class='sidebar-link'>
                                <i class="fa-solid fa-people-group text-success"></i>
                                <span>Manage Team</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./employee.php" class='sidebar-link'>
                                <i class="fa-solid fa-user-plus text-success"></i>
                                <span>Add Player</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../assets/html/team.html" class='sidebar-link'>
                                <i class="fa fa-users text-success"></i>
                                <span>The Team</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i><span class="badge bg-info">2</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">

                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="../assets/images/admin.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Admin</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./library/loginController.php"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>MANAGE TEAM</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-success">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage Team</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class='table' id="table1">
                                <thead>
                                    <tr>
                                        <th>PLAYER</th>
                                        <th>NICKNAME</th>
                                        <th>DORSAL</th>
                                        <th>TEAM</th>
                                        <th>POSITION</th>
                                        <th>AGE</th>
                                        <th>NATIONALITY</th>
                                        <th> <i id="add-new-user" class="fa-solid fa-user-plus add-new-user"></i> </th>
                                    </tr>
                                </thead>
                                <tbody id='dashboard-body'>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal👇🏻 -->
    <div class="modal fade" id="confirmation-delete" tabindex="-1" aria-labelledby="confirmation-delete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmation-delete">Caution</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want delete this player?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" id='delete-playerButton' data-bs-dismiss="modal" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../assets/html/footer.html'; ?>
</body>

</html>