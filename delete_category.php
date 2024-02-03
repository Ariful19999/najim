<?php

include "function.php";
// include_once "admin_detected.php";



$post_edit_obj = new BrittoAdmin();

if ($_GET['status'] == 'delete') {
    $result = $post_edit_obj->delete_category($_GET['id']);
}
