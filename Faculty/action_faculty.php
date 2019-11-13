<?php
    include("../tool/functions.php");

    $error = "";
    $leaveType = $_POST['leaveType'];
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    $message = $_POST['message'];
    if (!$fromDate) {
        $error = "From Date is Required!";
    }
    if (!$toDate) {
        $error = "To Date is Required!";
    }
    if (!$message) {
        $error = "message is Required!";
    }
    $role = $_SESSION['role'];
    $fid = $_SESSION['email'];
    $qry = "";
    if($role == 'hod'){
        $qry = "SELECT * FROM hod WHERE  email = '$fid'";
    }
    else if($role=='deanfaa'){
        $qry = "SELECT * FROM dean WHERE  email = '$fid'";
    }
    else if($role = 'director'){
        $qry = "SELECT * FROM director WHERE  email = '$fid'";
    }
    if($role == 'hod'||$role=='deanfaa'||$role = 'director'){
        $res1 = mysqli_query($mySql_db, $qry);
        $result = mysqli_fetch_assoc($res1);
        $fid = $result['Fid'];
    }
    $sqlcheck = "SELECT * FROM leaveapplication WHERE Fid = '$fid'";
    $res = mysqli_query($mySql_db, $sqlcheck);
    if(mysqli_num_rows($res)>0){
        $error = "Your previous request is in Pending";
    }
    if ($error == "") {
        $sql = "INSERT INTO leaveapplication(Ltype, startDate,endDate,Fid) VALUES('$leaveType','$fromDate','$toDate','$fid')";
        mysqli_query($mySql_db, $sql);
        echo 1;

    }
    if($error!="") {
        echo $error;
    }
?>