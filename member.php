<!--Bismillahir Rahmanir Rahim-->

<!--Bismillahir Rahmanir Rahim-->
<?php


include "function.php";
include_once "admin_detected.php";

$post_show_obj = new BrittoAdmin();

$result = $post_show_obj->member_show();






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blog</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="./css/admin_post.css">
    <link rel="stylesheet" href="./Responsive.css/admin_post_responsive.css"> -->

    <style>
        /* --Admin post table--*/



        .admin_post_up {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .admin_post_up h2 {
            font-size: 34px;
            font-weight: 700;
            font-family: initial;
            letter-spacing: 2px;
            text-align: center;
            margin-bottom: 30px;
            margin-top: 20px;
        }

        .admin_post_up a {
            text-decoration: none;
        }

        .admin_post_up a span {
            background: black;
            padding: 10px 30px;
            border-radius: 5px;
            color: white;
            font-weight: 500;
            transition: 0.4s;
        }

        .admin_post_up a:hover span {
            background-color: red;

        }

        .admin_post_down {
            box-shadow: 0px 0px 60px 0px #e9e9e9;
        }

        .img-size {
            width: 10%;
            margin: auto;
        }

        @media(max-width:1024px) {
            .img-size {
                width: 17%;
                margin: auto;
            }
        }

        @media(max-width:768px) {
            .img-size {
                width: 30%;
                margin: auto;
            }
        }

        @media(max-width:650px) {
            .img-size {
                width: 55%;
                margin: auto;
            }
        }

        @media(max-width:538px) {
            .img-size {
                width: 84%;
                margin: auto;
            }
        }

        @media(max-width:510px) {
            .img-size {
                width: 110%;
                margin: auto;
            }
        }

        @media(max-width:425px) {
            .img-size {
                width: 121%;
                margin: auto;
            }
        }
    </style>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />


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
                    <div class="container-fluid admin_post">
                        <div class="row justify-content-center">
                            <div class="col-xl-12 admin_post_up">
                                <h2>All Member</h2>
                            </div>
                            <!-- <div class="col-xl-6 admin_post_up">
                    <a href="./admin_add_post.php"><span>ADD POST</span></a>
                </div> -->
                        </div>
                        <div class="row justify-content-center align-content-center">
                            <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 admin_post_down">
                                <table class="table table-hover table-striped table-responsive-sm text-center">

                                    <thead>
                                        <th>Name</th>
                                        <th>Institute</th>
                                        <th>Designation</th>
                                        <th>Picture</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </thead>
                                    <tbody>

                                        <?php while ($row = mysqli_fetch_assoc($result)) {  ?>
                                            <tr>
                                                <td><?php echo $row['name'];   ?></td>
                                                <td><?php echo  $row['institute'];   ?></td>
                                                <td><?php echo $row['designation'];  ?></td>
                                                <td>
                                                    <div class="img-size">
                                                        <img class=" img-thumbnail img-fluid" src="./upload/member_image/<?php echo $row['image']; ?>" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="./edit_member.php?status=edit&&id=<?php echo $row['id'];  ?>" role="button">EDIT</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger" href="./member_delete.php?status=delete&&id=<?php echo $row['id'];  ?>" role="button">DELETE</a>
                                                </td>
                                            </tr>

                                        <?php  } ?>



                                    </tbody>

                                </table>
                            </div>
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