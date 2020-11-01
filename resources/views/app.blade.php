
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MakeSumo Admin[Production]- Dashboard</title>
    @routes
    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

@inertia
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Assets</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Asset Components:</h6>
                    <a class="collapse-item" href="cards.html">Item</a>
                    <a class="collapse-item" href="buttons.html">Set</a>
                    <a class="collapse-item" href="cards.html">Tag</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Users</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Filters:</h6>
                    <a class="collapse-item" href="utilities-color.html">All user</a>
                    <a class="collapse-item" href="utilities-border.html">Paid subscribers</a>
                    <a class="collapse-item" href="utilities-animation.html">Trail subscribers</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mailsubscribers" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Mail subscriber</span>
            </a>
            <div id="mailsubscribers" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Filters:</h6>
                    <a class="collapse-item" href="utilities-color.html">Send mail</a>
                    <a class="collapse-item" href="utilities-color.html">Mailing list</a>
                    <a class="collapse-item" href="utilities-border.html">Subscribers</a>
                    <a class="collapse-item" href="utilities-animation.html">Outbox</a>
                </div>
            </div>
        </li>


        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Transactions</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
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

                <h2>Users</h2>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                    </li>


                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <!--                <a class="dropdown-item" href="#">-->
                            <!--                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>-->
                            <!--                  Profile-->
                            <!--                </a>-->
                            <!--                <a class="dropdown-item" href="#">-->
                            <!--                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
                            <!--                  Settings-->
                            <!--                </a>-->
                            <!--                <div class="dropdown-divider"></div>-->
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">



                <div class="card" style="margin-bottom:15px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                            </div>
                            <div class="col">
                                <div class="float-right">
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Pending Item</a>
                                            <a class="dropdown-item" href="#">Publish</a>
                                        </div>
                                    </div>
                                </div>
                                <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                                <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                                <div>Background Color: #eee</div>
                                <div>Total Items: 1200</div>


                            </div>
                        </div>
                    </div>
                </div>


                <div class="card bg-white" style="margin-bottom: 20px">


                    <div class="card-body" >
                        <style type="text/css">
                            /*.set-cards>.card:not(:last-child),*/
                            .set-cards>.card:not(:first-child) {
                                border-top-left-radius: 0;
                                border-top-right-radius: 0;
                                border-top: 0px;
                            }
                            .set-cards>.card:not(:last-child) {
                                border-bottom-left-radius: 0;
                                border-bottom-right-radius: 0;
                            }
                        </style>
                        <div class="set-cards" style="margin-bottom: 20px;">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="#"><img src="https://picsum.photos/350" style="border-radius: 5px"></a>
                                        </div>
                                        <div class="col">
                                            <h4><a href="#">Spercial Shoe</a></h4>
                                            <style type="text/css">
                                                .color{
                                                    width: 30px;
                                                    height: 30px;
                                                    margin-left: 4px;
                                                    border-radius: 50%;
                                                }
                                            </style>
                                            <div style="display: flex">Detected colours:
                                                <div class="color" style="background-color: #333"></div>
                                                <div class="color" style="background-color: #737322"></div>
                                                <div class="color" style="background-color: #3629a3"></div>
                                                <div class="color" style="background-color: #3aa9a3"></div>
                                                <div class="color" style="background-color: #a72a3a"></div>
                                            </div>
                                            <br>
                                            <div style="display: flex">Editable colours:
                                                <div class="color" style="background-color: #333"></div>
                                                <div class="color" style="background-color: #737322"></div>
                                                <div class="color" style="background-color: #3629a3"></div>
                                                <div class="color" style="background-color: #3aa9a3"></div>
                                                <div class="color" style="background-color: #a72a3a"></div>
                                            </div>

                                            <br>
                                            <input placeholder="Type your tag here...." type="text" class="form-control" aria-label="Text input with dropdown button">

                                            <div>Tags:

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>







                        <button class="btn btn-primary">Select All</button>
                        <button class="btn btn-primary">Publish Selected Items</button>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; MakeSumo 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

</body>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>

</html>
