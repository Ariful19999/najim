<?php



class BrittoAdmin
{

    public $conn;
    public $project_name = "najim";
    public  $server = 'http://localhost/';

    public function __construct()
    {


        // host   user  pass dbName



        $host = "localhost";
        $user = "root";
        $pass = "11135984";
        $dbName = "teachers_info";
        $this->conn = mysqli_connect($host, $user, $pass, $dbName) or die("Connection Fail");
    }

    ///////////// CATEGORY /////////////


    public function category_show()
    {
        $query = "SELECT * FROM `category`";
        return mysqli_query($this->conn, $query);
    }

    public function unique_category($id)
    {
        $query = "SELECT * FROM `category` WHERE category.id='$id'";
        return mysqli_query($this->conn, $query);
    }

    public function edit_category($name, $id)
    {
        $query = "UPDATE `category` SET `name`='$name' WHERE id='$id'";
        mysqli_query($this->conn, $query);
        header("Location:./category.php");
    }

    public function delete_category($id)
    {
        $query = "DELETE FROM `category` WHERE id='$id'";
        mysqli_query($this->conn, $query);
        header("Location:./category.php");
    }



    public function category_add($data)
    {
        $name = strtoupper($data);

        $query = "INSERT INTO `category`(`name`) VALUES ('$name');";
        mysqli_query($this->conn, $query);
        header("Location:./category.php");
    }

    public function category_delete($data)
    {

        $query = "DELETE FROM blog_category WHERE id=$data;";
        mysqli_query($this->conn, $query);
        header("Location:./blog_category.php");
    }


    //// Department ////
    public function add_department($name, $code, $cat_id, $img_url)
    {


        $query = "INSERT INTO `department`(`name`, `code`, `cat_id`, `img_url`) VALUES ('$name','$code','$cat_id','$img_url');";
        mysqli_query($this->conn, $query);
        header("Location:./department.php");
    }

    public function department_show()
    {
        $query = "SELECT `id`, `name`, `code`, (SELECT category.name FROM `category` WHERE category.id=department.cat_id) AS category, `img_url` FROM `department` WHERE 1 ORDER BY id DESC";
        return mysqli_query($this->conn, $query);
    }

    public function unique_department($id)
    {
        $query = "SELECT `id`, `name`, `code`, `cat_id`, `img_url` FROM `department` WHERE department.id='$id'";
        return mysqli_query($this->conn, $query);
    }

    public function edit_department($id, $name, $code, $cat_id, $img_url)
    {
        $query = "UPDATE `department` SET `name`='$name',`code`='$code',`cat_id`='$cat_id',`img_url`='$img_url' WHERE department.id='$id'";
        mysqli_query($this->conn, $query);
        header("Location:./department.php");
    }

    public function dpt_delete($data)
    {

        $query = "DELETE FROM department WHERE id=$data;";
        mysqli_query($this->conn, $query);
        header("Location:./department.php");
    }

    public function unit_show()
    {
        $query = "SELECT `id`, (SELECT department.name FROM `department` WHERE department.id=units.dpt_id) AS dpt_name, `name` FROM `units` WHERE 1";
        return mysqli_query($this->conn, $query);
    }


    //// Units ////
    public function add_unit($name, $dpt_id)
    {

        $query = "INSERT INTO `units`(`dpt_id`, `name`) VALUES ('$dpt_id','$name');";
        mysqli_query($this->conn, $query);
        header("Location:./units.php");
    }

    public function unique_unit($id)
    {
        $query = "SELECT * FROM `units` WHERE id='$id'";
        return mysqli_query($this->conn, $query);
    }

    public function edit_unit($id, $name, $dpt_id)
    {
        $query = "UPDATE `units` SET `dpt_id`='$dpt_id',`name`='$name' WHERE units.id='$id'";
        mysqli_query($this->conn, $query);
        header("Location:./units.php");
    }

    public function unit_delete($data)
    {

        $query = "DELETE FROM units WHERE id=$data;";
        mysqli_query($this->conn, $query);
        header("Location:./units.php");
    }


    /////// Add People /////////

    public function add_people($name, $email, $phone, $designation, $unit_id, $order_by, $profile)
    {
        // Assuming $name, $email, $phone, $designation, $unit_id, $order_by, and $profile are already defined

        // SQL query with placeholders for parameters
        $query = "INSERT INTO `people`(`name`, `email`, `phone`, `designation`, `unit_id`, `order_by`, `profile`) VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt) {
            // Bind parameters to the statement
            mysqli_stmt_bind_param($stmt, "ssssiss", $name, $email, $phone, $designation, $unit_id, $order_by, $profile);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Close the statement
            mysqli_stmt_close($stmt);

            // Redirect to the desired location
            header("Location: ./people.php");
            exit(); // Make sure to exit after redirection
        } else {
            // Handle the case where the statement preparation failed
            // echo "Error: Unable to prepare SQL statement.";
        }
    }

    public function people_show()
    {

        $query = "SELECT `id`, `name`, `email`, `phone`, `designation`, (SELECT units.name FROM `units` WHERE units.id=people.unit_id) AS unit_name, `order_by`, `profile` FROM `people` WHERE 1;";

        return  mysqli_query($this->conn, $query);
    }


    public function people_unique($id)
    {

        $query = "SELECT `id`, `name`, `email`, `phone`, `designation`, `unit_id`, `order_by`, `profile` FROM `people` WHERE id='$id'";
        return  mysqli_query($this->conn, $query);
    }

    public function edit_people($id, $name, $email, $phone, $designation, $unit_id, $order_by, $profile)
    {

        // Assuming $id, $name, $email, $phone, $designation, $unit_id, $order_by, and $profile are already defined

        // SQL query with placeholders for parameters
        $query = "UPDATE `people` SET `name`=?, `email`=?, `phone`=?, `designation`=?, `unit_id`=?, `order_by`=?, `profile`=? WHERE id=?";

        // Prepare the statement
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt) {
            // Bind parameters to the statement
            mysqli_stmt_bind_param($stmt, "ssssissi", $name, $email, $phone, $designation, $unit_id, $order_by, $profile, $id);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Close the statement
            mysqli_stmt_close($stmt);

            // Redirect to the desired location
            header("Location: ./people.php");
            exit(); // Make sure to exit after redirection
        } else {
            // Handle the case where the statement preparation failed
            //  echo "Error: Unable to prepare SQL statement.";
        }
    }

    public function delete_people($data)
    {

        $query = "DELETE FROM people WHERE id=$data;";
        mysqli_query($this->conn, $query);
        header("Location:./people.php");
    }




    /////////// Blog ///////////


    public function add_blog($data)
    {

        $name = $data['name'];
        $title = $data['title'];
        $category = $data['category'];
        $description = $data['description'];
        $img_name = $data['image'];

        $query = "INSERT INTO blog(`name`, `title`, `category`, `description`, `image`) VALUES('$name','$title','$category','$description','$img_name');";
        mysqli_query($this->conn, $query);
        header("Location:./blog.php");
    }

    public function post_show()
    {
        $query = "SELECT * FROM `blog` WHERE 1 ORDER BY id DESC;";
        return mysqli_query($this->conn, $query);
    }



    public function post_delete($data)
    {
        $query = "SELECT * FROM `blog` WHERE id=$data;";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        unlink("upload/blog_image/" . $row['image']);

        $query = "DELETE FROM blog WHERE id=$data;";
        mysqli_multi_query($this->conn, $query);
        header("Location:./blog.php");
    }

    public function post_edit($data)
    {
        $query = "SELECT * FROM `blog` WHERE id=$data;";
        return mysqli_query($this->conn, $query);
    }

    public function post_edit_change($data)
    {


        $id = $data['id'];
        $name = $data['name'];
        $category = $data['category'];
        $title = $data['title'];
        $description = $data['description'];
        $img_name = $data['image'];

        $query = "UPDATE blog SET name='$name',title='$title',category='$category',description='$description',image='$img_name' WHERE id=$id;";
        mysqli_query($this->conn, $query);
        header("Location:./blog.php");
    }

    /////////// Member //////////

    function add_member($name, $institute, $designation, $blood, $image)
    {

        $query = "INSERT INTO member(`name`, `institute`, `designation`, `blood`, `image`) VALUES('$name','$institute','$designation','$blood','$image');";
        mysqli_query($this->conn, $query);
        header("Location:./member.php");
    }

    public function member_show()
    {
        $query = "SELECT * FROM `member` WHERE 1 ORDER BY id DESC;";
        return mysqli_query($this->conn, $query);
    }

    public function member_edit($data)
    {
        $query = "SELECT * FROM `member` WHERE id=$data;";
        return mysqli_query($this->conn, $query);
    }
    public function member_edit_change($name, $institute, $designation, $blood, $image, $id)
    {

        $query = "UPDATE member SET name='$name',institute='$institute',designation='$designation',blood='$blood',image='$image' WHERE id=$id;";
        mysqli_query($this->conn, $query);
        header("Location:./member.php");
    }
    public function member_delete($data)
    {
        $query = "SELECT * FROM `member` WHERE id=$data;";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        unlink("upload/member_image/" . $row['image']);

        $query = "DELETE FROM member WHERE id=$data;";
        mysqli_multi_query($this->conn, $query);
        header("Location:./member.php");
    }

    ///////// Project ///////////

    function add_project($name, $description, $status, $image)
    {

        $query = "INSERT INTO project(`name`, `description`, `status`,`image`) VALUES('$name','$description','$status','$image');";
        mysqli_query($this->conn, $query);
        header("Location:./project.php");
    }
    public function project_show()
    {
        $query = "SELECT * FROM `project` WHERE 1 ORDER BY id DESC;";
        return mysqli_query($this->conn, $query);
    }
    public function project_edit($data)
    {
        $query = "SELECT * FROM `project` WHERE id=$data;";
        return mysqli_query($this->conn, $query);
    }
    public function project_edit_change($name, $description, $status, $image, $id)
    {

        $query = "UPDATE project SET `name`='$name',`description`='$description',`status`='$status',`image`='$image' WHERE id='$id';";
        mysqli_query($this->conn, $query);
        header("Location:./project.php");
    }
    public function project_delete($data)
    {
        $query = "SELECT * FROM `project` WHERE id=$data;";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        unlink("upload/project_image/" . $row['image']);

        $query = "DELETE FROM project WHERE id=$data;";
        mysqli_multi_query($this->conn, $query);
        header("Location:./project.php");
    }

    ///////////Album //////////////

    function add_album($title, $image)
    {

        $query = "INSERT INTO album(`title`,`image`) VALUES('$title','$image');";
        mysqli_query($this->conn, $query);
        header("Location:./gallery.php");
    }
    public function gallery_show()
    {
        $query = "SELECT * FROM `album` WHERE 1 ORDER BY id DESC;";
        return mysqli_query($this->conn, $query);
    }
    public function gallery_delete($data)
    {
        $query = "SELECT * FROM `album` WHERE id=$data;";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        unlink("upload/album_image/" . $row['image']);

        $query = "DELETE FROM album WHERE id=$data;";
        mysqli_multi_query($this->conn, $query);
        header("Location:./gallery.php");
    }

    ///// Admin /////////

    public function admin_login($user_name, $pass)
    {
        $query = "SELECT * FROM `user` WHERE 1;";
        $result = mysqli_query($this->conn, $query);

        $true = 0;
        $admin = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['user_name'] == $user_name && $row['pass'] == $pass) {


                $true = 1;
                $admin = 1;
                break;
            }
        }

        if ($true == 1 && $admin == 1) {
            // Check if the session is not started
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Assign session variables
            $_SESSION['Admin_Name'] = $user_name;


            // Redirect to the desired location
            header("Location: ./people.php");
            exit();
        }

        if ($true == 0) {
            return 1;
        }
    }
}
