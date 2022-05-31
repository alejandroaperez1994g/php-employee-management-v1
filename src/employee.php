<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Player</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <script defer src="../assets/fontawesome/js/all.min.js"></script>
    <script src="https://kit.fontawesome.com/24229652dd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <style type="text/css">
        .notif:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header" style="height: 50px;margin-top: -30px">
                    <i class="fa fa-users text-success me-4"></i>
                    <span>ELMS</span>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item ">
                            <a href="../assets/html/dashboard-info.html" class='sidebar-link'>
                                <i class="fa fa-home text-success"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./dashboard.php" class='sidebar-link'>
                                <i class="fa fa-users text-success"></i>
                                <span>Manage Team</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="./employee.php" class='sidebar-link'>
                                <i class="fa fa-users text-success"></i>
                                <span>Add Player</span>
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
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="row mb-2">
                                            <div class="col-md-12 notif">
                                                <a href="leave_details.html">
                                                    <h6 class='text-bold'>John Doe</h6>
                                                    <p class='text-xs'>
                                                        applied for leave at 05-21-2021
                                                    </p>
                                                </a>
                                            </div>
                                            <div class="col-md-12 notif">
                                                <a href="leave_details.html">
                                                    <h6 class='text-bold'>Jane Doe</h6>
                                                    <p class='text-xs'>
                                                        applied for leave at 05-21-2021
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
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
                                <a class="dropdown-item" href="login.html"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>ADD PLAYER</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-success">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Player</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>


                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">PLAYER</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="PLAYER NAME" id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="fa-solid fa-futbol"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">POSITION</label>
                                                        <div class="position-relative">
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect">
                                                                    <option>SELECT YOUR POSITION</option>
                                                                    <option>GOALKEEPER</option>
                                                                    <option>DEFENDER</option>
                                                                    <option>MIDFIELDER</option>
                                                                    <option>FOWARD</option>
                                                                    <option>CENTERBACK</option>
                                                                    <option>WINGER</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">FIRST NAME</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="FIRST NAME" id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">NICKNAME</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="NICKNAME" id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">LAST NAME</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="LAST NAME" id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">AGE</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="AGE" id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">NATIONALITY</label>
                                                        <div class="position-relative">
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect">
                                                                    <option>SELECT YOUR COUNTRY</option>
                                                                    <option>SPAIN</option>
                                                                    <option>USA</option>
                                                                    <option>ARGENTINA</option>
                                                                    <option>CUBA</option>
                                                                    <option>VENEZUELA</option>
                                                                    <option>FRANCE</option>
                                                                    <option>RUSSIA</option>
                                                                    <option>BELARUS</option>
                                                                    <option>ISRAEL</option>
                                                                    <option>BRAZIL</option>
                                                                    <option>PORTUGAL</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">CONTACT</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="LINKEDIN PROFILE" id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="fa fa-phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">PROFILE</label>
                                                        <div class="position-relative">
                                                            <input type="file" class="form-control" placeholder="" id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">PRICE</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="PRICE" id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="fa-solid fa-sack-dollar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">TEAM</label>
                                                        <div class="position-relative">
                                                            <fieldset class="form-group">
                                                                <select class="form-select" id="basicSelect">
                                                                    <option>SELECT YOUR TEAM</option>
                                                                    <option>FRONTEND</option>
                                                                    <option>BACKEND</option>
                                                                    <option>FULLSTACK</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->
            </div>

        </div>
    </div>
    <script src="../assets/js/feather-icons/feather.min.js"></script>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>

    <script src="../assets/js/main.js"></script>
</body>

</html>