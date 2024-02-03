<!--Bismillahir Rahmanir Rahim-->

<!--Bismillahir Rahmanir Rahim-->
<?php


include "function.php";
include_once "admin_detected.php";

$post_show_obj = new BrittoAdmin();
$post_add_obj = new BrittoAdmin();

$result = $post_show_obj->unit_show();

if ($_GET['status'] == 'edit') {
    $result1 = $post_show_obj->people_unique($_GET['id']);
}

//`name`, `email`, `phone`, `designation`, `unit_id`, `order_by`, `profile`

while ($row = mysqli_fetch_assoc($result1)) {
    $name = $row['name'];
    $id = $row['id'];
    $email = $row['email'];
    $phone = $row['phone'];
    $designation = $row['designation'];
    $unit_id = $row['unit_id'];
    $order_by = $row['order_by'];
    $profile = $row['profile'];
}

if (isset($_POST['btn'])) {


    $currentDateTime = new DateTime();
    $formattedDateTime = $currentDateTime->format('Y-m-d_H-i-s');
    $md5FileName = md5($formattedDateTime);

    // Create a folder based on the current year and month
    $uploadFolder = "upload/member_image/" . $currentDateTime->format('Y/m/');
    if (!file_exists($uploadFolder)) {
        mkdir($uploadFolder, 0777, true);
    }

    // Get the file extension
    $fileExtension = pathinfo($_FILES['img_name']['name'], PATHINFO_EXTENSION);

    // Generate the new file name with MD5 hash and original file extension
    $newFileName = $md5FileName . '.' . $fileExtension;

    // Move the uploaded file to the destination folder
    move_uploaded_file($_FILES['img_name']['tmp_name'], $uploadFolder . $newFileName);

    // Now $newFileName contains the MD5 hashed file name, and $uploadFolder contains the folder path
    $fileUrl = $post_add_obj->server  . $post_add_obj->project_name . '/' . $uploadFolder . $newFileName;


    // Get the file extension
    $fileExtension = pathinfo($_FILES['img_name']['name'], PATHINFO_EXTENSION);

    // Check if the file extension is empty
    if (empty($fileExtension)) {
        $fileUrl = $_POST['old_img'];
    }


    //add_people($name, $email, $phone, $designation, $unit_id, $order_by, $profile)


    $post_show_obj->edit_people($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['designation'], $_POST['unit_id'], $_POST['order_by'], $fileUrl);
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add People</title>

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
                                <h2>Edit People</h2>
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label"> Name</label>
                                        <div class="col-sm-10">
                                            <input required type="text" value="<?php echo $name; ?>" name="name" class="form-control" id="colFormLabel" placeholder="People Name" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input required value="<?php echo $email; ?>" type="email" name="email" class="form-control" id="colFormLabel" placeholder="Enter Your Email" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input value="<?php echo $phone; ?>" type="text" name="phone" class="form-control" id="colFormLabel" placeholder="Enter Your Mobile Number" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Designation</label>
                                        <div class="col-sm-10">
                                            <input value="<?php echo $designation; ?>" required type="text" name="designation" class="form-control" id="colFormLabel" placeholder="Enter Your Designation" />
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Unit</label>
                                        <div class="col-sm-10">
                                            <select required class="form-select" name="unit_id" aria-label="Default select example">

                                                <?php while ($row = mysqli_fetch_assoc($result)) {  ?>
                                                    <tr>
                                                        <option <?php if ($unit_id == $row['id']) echo "selected"; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                    </tr>

                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="colFormLabel" class="col-sm-2 col-form-label">Order By</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="order_by" aria-label="Default select example">

                                                <option <?php if ($order_by == 1) echo "selected"; ?> value="1">oredr-1</option>
                                                <option <?php if ($order_by == 2) echo "selected"; ?> value="2">oredr-2</option>
                                                <option <?php if ($order_by == 3) echo "selected"; ?> value="3">oredr-3</option>
                                                <option <?php if ($order_by == 4) echo "selected"; ?> value="4">oredr-4</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="formFile" class="col-sm-2 col-form-label">Upload Photo</label>

                                        <div class="col-sm-10">
                                            <input name="img_name" class="form-control" type="file" id="formFile" accept="image/jpeg, image/png, image/gif" />
                                        </div>
                                    </div>
                                    <input type="hidden" name="old_img" value="<?php echo $profile;  ?>">
                                    <input type="hidden" name="id" value="<?php echo $id;  ?>">


                                    <input type="submit" value=" Edit People " class="btn btn-success" name="btn" id="" style="margin: 13px 46px 9px 192px" />
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