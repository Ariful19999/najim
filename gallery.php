<!--Bismillahir Rahmanir Rahim-->
<?php


include "function.php";
include_once "admin_detected.php";

$post_show_obj = new BrittoAdmin();

$result = $post_show_obj->gallery_show();



?>


<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Post</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />



    <style>
        /* ------Our_Gallery---------*/

        .Gallery {}

        .Gallery_row {
            margin-bottom: 30px;
        }

        .Gallery_row span {
            color: red;
            font-family: "Constantia", Times, serif;
        }

        .Gallery_inner {
            padding: 8px 8px;
            transition: 0.4s;
        }

        .Gallery_inner:hover {
            box-shadow: 0px 0px 60px 0px #dfdfdf;
            position: relative;
        }

        .Gallery_inner a {}

        .uniq_button {
            position: absolute;
            visibility: hidden;
        }

        .Gallery_inner a img {
            width: 100%;
        }

        .Gallery_inner:hover .uniq_button {
            visibility: visible;
        }

        /*---------Image Unique Page-----*/
        .image_unique {
            text-align: center;

        }

        .image_unique_inner {
            width: 60%;
            margin-top: 70px;
        }

        .image_unique_inner img {
            width: 100%;
        }

        .image_unique_inner span {
            color: red;
            font-family: "Constantia", Times, serif;
            font-size: 20px;
        }



        /*------------------------*/
    </style>

    <style>
        /* Bishmillahir Rahamanir Rahim */

        @media(max-width:975px) {

            .h_2 {
                opacity: 0;
            }

            .image_unique_inner {
                width: 70%;
            }

        }


        @media(max-width:575px) {

            .Gallery_row {
                width: 50%;
            }

            .h_1 {
                opacity: 0;
            }

            .image_unique_inner {
                width: 90%;
            }

        }

        @media(max-width:375px) {

            .Gallery_row {
                width: 80%;
            }
        }

        @media(max-width:320px) {

            .Gallery_row {
                width: 90%;
            }

        }
    </style>


</head>


<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once "sidebar.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include_once "./nav.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <!--Our_Gallery-->


                <section>
                    <div class="container-fluid Gallery">
                        <div class="row justify-content-center">
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 Gallery_row">
                                    <div class="Gallery_inner">
                                        <a class="btn btn-success uniq_button" href="./gallery_delete.php?status=delete&&id=<?php echo $row['id']; ?>" role="button">DELETE</a>
                                        <a href="#">
                                            <img src="./upload/album_image/<?php echo $row['image'];   ?>" alt="">
                                        </a>
                                    </div>
                                    <span><?php echo $row['title'];   ?></span>
                                </div>
                            <?php }  ?>

                        </div>
                    </div>
                </section>

                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once "./footer.php" ?>

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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

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

    <!--Java script-->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>


</html>