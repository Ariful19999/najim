<?php

header("Content-Type: application/json");

// Read the incoming JSON data
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);
include_once './connection.php';

if ($data === null) {
    // $groupId = $data['groupId'];


    $sentData = array();
    $departments = array();
    $units = array();
    $contacts = array();

    // Process the received JSON data
    $sql = "SELECT *,(SELECT category.name FROM `category` WHERE category.id=department.cat_id) AS category FROM `department`;";

    $res = mysqli_query($con, $sql);

    //{"id": 1, "code": "101", "name": "Faculty Of Engineering", "category": "Faculty","icon": "0xe185"},

    while ($row = mysqli_fetch_assoc($res)) {
        $allData = array();
        $allData['id'] = $row['id'];
        $allData['code'] = $row['code'];
        $allData['name'] = $row['name'];
        $allData['category'] = $row['category'];
        $allData['icon'] = $row['img_url'];


        if (!empty($allData)) {
            $departments[] = $allData;
        }
    }

    // Process the received JSON data
    $sql = "SELECT * FROM `units`;";

    $res = mysqli_query($con, $sql);

    // {"id": 1,  "departmentId":1,"name": "Department of Computer Science and Engineering"},

    while ($row = mysqli_fetch_assoc($res)) {
        $allData = array();
        $allData['id'] = $row['id'];
        $allData['departmentId'] = $row['dpt_id'];
        $allData['name'] = $row['name'];

        if (!empty($allData)) {
            $units[] = $allData;
        }
    }

    // Process the received JSON data
    $sql = "SELECT * FROM `people`;";

    $res = mysqli_query($con, $sql);

    //  {"id": 1, "name": "Kamal Hosain","profile":"https://randomuser.me/api/portraits/thumb/men/10.jpg", "phone":"01930250051","designation":"Chairman","orderBy":1,"email":"mkubd212@gmail.com","unitId": 9 },

    while ($row = mysqli_fetch_assoc($res)) {
        $allData = array();
        $allData['id'] = $row['id'];
        $allData['name'] = $row['name'];
        $allData['profile'] = $row['profile'];
        $allData['phone'] = $row['phone'];
        $allData['designation'] = $row['designation'];
        $allData['orderBy'] = $row['order_by'];
        $allData['email'] = $row['email'];
        $allData['unitId'] = $row['unit_id'];

        if (!empty($allData)) {
            $contacts[] = $allData;
        }
    }

    mysqli_close($con);

    $response = array(
        'departments' => $departments,
        'units' => $units,
        'contacts' => $contacts,
    );
} else {
    // Error in decoding JSON data
    $response = array(
        'status' => 'error',
        'message' => 'Invalid JSON data received'
    );
}

// Send JSON response back to the client
echo json_encode($response);
