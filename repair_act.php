<?php
   if (isset($_POST['btn_ok'])) {
    // $type_work = $_POST['type_work'];
    // $problem = $_POST['problem'];
    // $invt = $_POST['invt'];
    // $urgency = $_POST['urgency'];
    // $problem_work = $_POST['problem_work'];

    $targetDir = "img_inventory/";
    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath);
        }
    }
}
?>