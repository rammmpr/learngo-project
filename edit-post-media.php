<?php
include('koneksi.php');

session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Session expired. Please log in again.!');window.location='login.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
	$id = ($_GET['id']);

	$query = "SELECT * FROM post WHERE id='$id'";
	$hasil = mysqli_query($koneksi, $query);

	if (!$hasil) {
		die("Query Error: " . mysqli_errno($koneksi) .
			" - " . mysqli_error($koneksi));
	}

	$data = mysqli_fetch_assoc($hasil);

	if (!count($data)) {
		echo "<script>alert('Data tidak ditemukan pada database');window.location='library.php';</script>";
	}
} else {
	echo "<script>alert('Masukkan data id.');window.location='library.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Media Library - LearnGo</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion " id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Learn Go <sup>1</sup></div>
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
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-thumbtack"></i>
                        <span>Posts</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="all-post.php">All Posts</a>
                            <a class="collapse-item" href="add-new-post.php">Add New</a>
                            <a class="collapse-item" href="categories.php">Categories</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMedia"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-photo-video"></i>
                        <span>Media</span>
                    </a>
                    <div id="collapseMedia" class="collapse show" aria-labelledby="headingMedia"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item active" href="library.php">Library</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pages</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="all-pages.php">All Pages</a>
                            <a class="collapse-item" href="add-new-pages.php">Add New</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFeedback"
                        aria-expanded="true" aria-controls="collapseFeedback">
                        <i class="fas fa-fw fa-comments"></i>
                        <span>User Feedback</span>
                    </a>
                    <div id="collapseFeedback" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="comments.php">Comments</a>
                            <a class="collapse-item" href="message.php">Message</a>
                        </div>
                    </div>
                </li>


                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourse"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fab fa-fw fa-discourse"></i>
                        <span>Course</span>
                    </a>
                    <div id="collapseCourse" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="all-course.php">All Course</a>
                            <a class="collapse-item" href="add-new-course.php">Add New</a>
                            <a class="collapse-item" href="type-course.php">Type Of Course</a>
                            <a class="collapse-item" href="add-new-type-course.php">Add New Type Course</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Users</span>
                    </a>
                    <div id="collapseUsers" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="all-user.php">All Users</a>
                            <a class="collapse-item" href="add-new-user.php">Add New</a>
                            <a class="collapse-item" href="profile.php">Profile</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-cogs"></i>
                        <span>Settings</span>
                    </a>
                    <div id="collapseSettings" class="collapse" aria-labelledby="headingPages"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php
                            $pages = "SELECT * FROM pages ORDER BY id ASC";
                            $jadi = mysqli_query($koneksi, $pages);

                            while ($page = mysqli_fetch_assoc($jadi)) {
                                $active_page = basename($_SERVER['PHP_SELF'], ".php");

                                $class = ($page['src_db'] == $active_page . ".php") ? "collapse-item active" : "collapse-item";

                                echo '<a href="' . $page['src_db'] . '" class="' . $class . '">' . $page['title'] . '</a>';
                            }
                            ?>
                            <a class="collapse-item" href="footer-page.php">Footer</a>
                            <a class="collapse-item" href="all-pages.php">Other</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

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

                        <!-- Topbar Search -->
                        <!-- <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form> -->

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['firstname'] ?></span>
                                    <img class="img-profile rounded-circle"
                                        src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['image']); ?>">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
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

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Media Library From Posts</h1>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#staticBackdrop">
                                Add New
                            </button>

                            <!-- Modal -->
                        </div>

                        <!-- Content Row -->

                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $query = "SELECT * FROM post WHERE id = $id";
                                    $result = mysqli_query($koneksi, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $image = $row['image'];
                                    echo "<img src='show-image-blog.php?id=$id' alt='image' width='500' height='auto'>";
                                }
                                ?>
                                <div class="mt-4">
                                    <a href="hapus-library.php?id=<?php echo $data['id'] ?>"
                                        class="btn btn-primary">Hapus Media</a>
                                </div>
                            </div>
                            <!-- /.container-fluid -->

                        </div>
                        <!-- End of Main Content -->

                        <!-- Footer -->
                        <footer class="sticky-footer bg-white">
                            <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                                    <span>Copyright &copy; LearnGo 2023</span>
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

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- For Auto Check Button -->
                <script>
                const optionA = document.querySelector('#option-A');
                const optionB = document.querySelector('#option-B');

                optionA.addEventListener('click', event => {
                    optionB.checked = true;
                });
                </script>

                <script>
                $(document).ready(function() {
                    $('#myModal').on('show.bs.modal', function(e) {
                        var image = $(e.relatedTarget).attr('src');
                        $(".modal-body").html('<img src="' + image + '" class="img-fluid"/>');
                    });
                });
                </script>

                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src='js/sb-admin-2.min.js'></script>

                <!-- Page level plugins -->
                <script src="vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>

    </body>

</html>