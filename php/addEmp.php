<?php

// database connection
session_start();
include('dbconn.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Employee Details || Admin</title>

    <?php include('header.php'); ?>
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-10">
                    <i class="fa-regular fa-map"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><sup>Printing Expert</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- Nav Item - Employee Collapse Menu -->
            <li class="nav-item">
            <a class="nav-link collapsed" href="viewEmp.php" data-target="#collapseEmployee"
                    aria-expanded="true" aria-controls="collapseEmployee">
                    <i class="bi bi-people-fill"></i>
                    <span>Employee</span>
                </a>
            </li>

            <!-- Nav Item - Report Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
                    aria-expanded="true" aria-controls="collapseReport">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Sale Reports</span>
                </a>
                <div id="collapseReport" class="collapse" aria-labelledby="headingReport"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Analyze Data By:</h6>
                        <!-- href will be change later cus its for overall page modification -->
                        <a class="collapse-item" href="YearReport.php">Year</a>
                        <a class="collapse-item" href="MonthReport.php">Month</a>
                        <a class="collapse-item" href="WeekReport.php">Week</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="admin_login.php" data-target="#collapseEmployee"
                    aria-expanded="true" aria-controls="collapseEmployee">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Log Out</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar round button) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>

                        <!-- Topbar Navbar Divider -->
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-4 d-none d-lg-inline text-gray-600 small">ADMIN</span>
                                    <i class="fa-lg bi bi-person-circle"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="AdminProfile.php">
                                    <i class="bi bi-person-lines-fill fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

<!---------------------------------------------------------------------------------------------------------------------->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php include('message.php'); ?>

                    <!-- Employee Details Form -->
                    <div class="card shadow mb-4 border-primary rounded-4">
                        <div class="card-body">
                        <br><h1 class="h3 mb-2 text-gray-800 text-center text-sm-start text-uppercase">
                            <b>Employee Form</b></h1><br>
                            <form action="empDb.php" method="POST" >
                                <div class="row mb-3">
                                    <label for="inputId" class="col-sm-2 col-form-label">Employee ID</label>
                                    <div class="col-sm-10">
                                        <input required type="text" class="form-control" id="inputEmpolyeeID" name="id">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col">
                                        <input required type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstName">
                                    </div>
                                    <div class="col">
                                        <input required type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastName">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input required type="email" class="form-control" placeholder="Abc123@gmail.com" id="inputEmail" name="email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPhoneNum" class="col-sm-2 col-form-label">Phone Number (60+)</label>
                                    <div class="col-sm-10">
                                    <input required type="phoneNum" class="form-control" placeholder="17888999" id="inputPhoneNum" name="phoneNumber">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                    <input required type="username" class="form-control" placeholder="Abc123" id="inputUsername" name="username">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input required type="password" class="form-control" id="inputPassword" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="role" name="role">
                                        <option>-- Choose Role --</option>
                                        <option>Senior</option>
                                        <option>Junior</option>
                                    </select>
                                    </div>
                                </div>
                                <tr>
                                    <br>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a class="btn btn-primary me-md-2"  href="viewEmp.php" role="button">Back</a>

                                        <!-- Button trigger modal -->
                                        <button type="submit" name="addEmp_btn" onclick="checker()"
                                        class="btn btn-success">Add</button>

                                    </div> 
                                </tr>
                            </form>
                        </div>
                    </div>
                </div>
                 <!-- End of Main Content -->
<!---------------------------------------------------------------------------------------------------------------------->

            <!-- Footer -->
            <?php include('footer.php'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<!---------------------------------------------------------------------------------------------------------------------->
    <!-- Logout Alert Message-->
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <!-- <span aria-hidden="true">Ã—</span> -->
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php" role="button">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    <?php include('script.php'); ?>
    <script>
        function checker(){
            var result = confirm("Add New Employee?");
            if(result == false){
                event.preventDefault();
            }
        }
    </script>

</body>

</html>