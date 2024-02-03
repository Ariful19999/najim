<!--Bismillahir Rahmanir Rahim-->
<!--Bismillahir Rahmanir Rahim-->

<?php


include "function.php";
include_once "admin_detected.php";

$category_add_obj = new BrittoAdmin();
$result = $category_add_obj->department_show();

if (isset($_POST['btn'])) {

    $name = $_POST['name'];
    $dpt_id = $_POST['dpt_id'];

    $result = $category_add_obj->add_unit($name, $dpt_id);
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Department</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="./css/admin_post.css" />
    <link rel="stylesheet" href="./css/admin_add_post.css" />
    <link rel="stylesheet" href="./Responsive.css/admin_post_responsive.css" />
    <link rel="stylesheet" href="./Responsive.css/admin_add_post_responsive.css" />

    <style>
        /*---------Bismillahir Rahamanir Rahim---------*/
        * {
            margin: 0;
            padding: 0;
        }

        body,
        p,
        span,
        a {
            font-family: "Roboto", sans-serif;
        }

        /* --Admin Post Add-- */
        .add_post {
            margin-top: 50px;
        }

        .add_post_row {
            box-shadow: 0px 0px 60px 0px #e9e9e9;
        }

        .add_post_row h2 {
            font-size: 34px;
            font-weight: 700;
            font-family: initial;
            letter-spacing: 2px;
            text-align: center;
            margin-bottom: 30px;
            margin-top: 20px;
        }

        .add_post_row form {}
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
                    <div class="container add_post">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 add_post_row">
                                <h2>Add New Department</h2>
                                <form action="#" method="post" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">name</label>
                                        <div class="col-sm-10">
                                            <input required type="text" name="name" class="form-control" id="colFormLabel" placeholder="Enter  name" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Faculty</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="dpt_id" aria-label="Default select example">

                                                <?php while ($row = mysqli_fetch_assoc($result)) {  ?>
                                                    <tr>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                    </tr>

                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>



                                    <input type="submit" value=" Add Department " class="btn btn-success" name="btn" id="" style="margin: 13px 46px 9px 192px" />
                                </form>
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