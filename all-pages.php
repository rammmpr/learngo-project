<?php
include('koneksi.php');

session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Session expired. Please log in again.!');window.location='login.php';</script>";
    exit();
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

        <title>All Pages - LearnGo</title>

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
            <?php include "sidebar-db.php"?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include "navbar-db.php"?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Pages</h1>
                            <a href="add-new-pages.php"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Add New</a>
                        </div>

                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-12 col-lg-7">
                                <div class="d-flex justify-content-end" style="margin-right: 5px">
                                    <?php
                                        $mengambil = "SELECT COUNT(*) AS total FROM pages";
                                        $hasil = mysqli_query($koneksi, $mengambil);
                                        $data = mysqli_fetch_assoc($hasil);
                                        $total = $data['total'];
                                    ?>
                                    <span style="font-size: 13px">
                                        <?php echo $total; ?> items
                                    </span>
                                </div>
                                <div class="card shadow mb-4">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th><input type="radio" name="pilih"></th>
                                                    <th style=" width: 60%;">Title</th>
                                                    <th>Author</th>
                                                    <th>Date</th>
                                                    <th><i class="fas fa-edit"></i></th>
                                                    <th><i class="fas fa-trash-alt"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $mengambil = "SELECT * FROM pages ORDER BY id ASC";
                                                $hasil = mysqli_query($koneksi, $mengambil);

                                                if (!$hasil) {
                                                    die("Hasil Error" . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                                                }

                                                $no = 1;

                                                while ($data = mysqli_fetch_assoc($hasil)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="pilih">
                                                    </td>
                                                    <td style="font-size: 15px">
                                                        <?php echo $data['title']; ?>
                                                    </td>
                                                    <td style="font-size: 15px">
                                                        <?php echo $data['author']; ?>
                                                    </td>
                                                    <td style="font-size: 15px">
                                                        <?php echo $data['date']; ?>
                                                    </td>
                                                    <td style="font-size: 15px">
                                                        <a href="edit-pages.php?id=<?php echo $data['id'] ?>"
                                                            class=""><i class="fas fa-edit"></i></a>
                                                    </td>
                                                    <td><a href="delete-pages.php?id=<?php echo $data['id'] ?>"><i
                                                                class="fas fa-trash-alt"></i></a></td>
                                                </tr>
                                                <?php
                                                $no++;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="margin-top: -1.2rem; margin-right: 5px">
                                    <?php
                                            $mengambil = "SELECT COUNT(*) AS total FROM pages";
                                            $hasil = mysqli_query($koneksi, $mengambil);
                                            $data = mysqli_fetch_assoc($hasil);
                                            $total = $data['total'];
                                        ?>

                                    <span>
                                        <?php echo $total; ?> items
                                    </span>
                                </div>
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
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
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

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

    </body>

</html>