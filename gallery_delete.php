<?php

include "function.php";
 include_once "admin_detected.php";
$category_del = new BrittoAdmin();

if ($_GET['status'] == 'delete') {


    //echo $_GET['id'];

    $category_del->gallery_delete($_GET['id']);
}
