<?php
include("../tool/functions.php");

$error = "";
if ($_GET["action"] == "registerfaculty") {
    $fname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['confirmpassword'];
    $department = $_POST['department'];
    $role = $_POST['role'];
    $startDate = $_POST['startDate'];
    if (!$email or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email id is empty or invalid";
    }
    if (!$password) {
        $error = "Please enter password";
    }
    if (!$password2) {
        $error = "Please enter Confirm password";
    }
    if ($password != $password2) {
        $error = "Password and Confirm password are not matching";
    }
    if (!$fname) {
        $error = "Enter username";
    }
    if (!$department) {
        $error = "Enter department name";
    }
    if ($error == "") {
        $query = "SELECT * FROM faculty WHERE email= '$email'";
        $res = mysqli_query($mySql_db, $query);
        if (mysqli_num_rows($res) > 0) {
            $error = "Email already exists";
        } else {
            $sql = "INSERT INTO faculty(email, password,username,department,role,startDate) VALUES('$email','$password','$fname','$department','$role','$startDate')";
            if (mysqli_query($mySql_db, $sql)) {
                $id = mysqli_insert_id($mySql_db);
                /* $qry = "UPDATE myguests SET password = ".md5(md5($id).$password)."
                 WHERE id = ".$id." LIMIT 1";*/
                // mysqli_query($mySql_db, $qry);
                echo 1;
                $collection = $database->user;
                $user = array('email' => $email, 'biography' => " ", 'research_area' => " ", 'education' => " ", 'experience' => " ", 'patents' => " ");
                $collection->save($user);
            } else {
                $error =  "Could not create user - Please try again later.";
            }
        }
    }
    if ($error != "") {
        echo $error;
    }
} else if ($_GET["action"] == "registerhod" || $_GET["action"] == "registerdean" || $_GET["action"] == "registerdirector") {
    $fname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['confirmpassword'];
    $department = $_POST['department'];
    $startDate = $_POST['startDate'];
    $Fid = $_POST['Fid'];
    if (!$email or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email id is empty or invalid";
    }
    if (!$password) {
        $error = "Please enter password";
    }
    if (!$password2) {
        $error = "Please enter Confirm password";
    }
    if ($password != $password2) {
        $error = "Password and Confirm password are not matching";
    }
    if (!$fname) {
        $error = "Enter username";
    }
    if (!$department) {
        $error = "Enter department name";
    }
    if (!$Fid) {
        $error = "Enter Faculty email";
    }
    if ($error == "") {
        if ($_GET["action"] == "registerhod") {
            $query = "SELECT * FROM hod WHERE email= '$email'";
        }
        if ($_GET["action"] == "registerdean") {
            $query = "SELECT * FROM dean WHERE email= '$email'";
        }
        if ($_GET["action"] == "registerdirector") {
            $query = "SELECT * FROM director WHERE email= '$email'";
        }
        $res = mysqli_query($mySql_db, $query);
        $query1 = "SELECT * FROM faculty WHERE email= '$Fid' and department= '$department'";
        $res1 = mysqli_query($mySql_db, $query1);
        if (mysqli_num_rows($res) > 0) {
            $error = "Email already exists";
        } else if (mysqli_num_rows($res1) == 0) {
            $error = "Wrong email or department";
        } else {
            if ($_GET["action"] == "registerhod") {
                $sql = "INSERT INTO hod(email, password,username,department,startDate,Fid) VALUES('$email','$password','$fname','$department','$startDate','$Fid')";
            }
            if ($_GET["action"] == "registerdean") {
                $sql = "INSERT INTO dean(email, password,username,department,startDate,Fid) VALUES('$email','$password','$fname','$department','$startDate','$Fid')";
            }
            if ($_GET["action"] == "registerdirector") {
                $sql = "INSERT INTO director(email, password,username,department,startDate,Fid) VALUES('$email','$password','$fname','$department','$startDate','$Fid')";
            }
            if (mysqli_query($mySql_db, $sql)) {
                echo 1;
            } else {
                $error =  "Could not create user - Please try again later.";
            }
        }
    }
    if ($error != "") {
        echo $error;
    }
} else if ($_GET["action"] == "changehod" || $_GET["action"] == "changedean" || $_GET["action"] == "changedirector") {
    $department = $_POST['department'];
    $startDate = $_POST['startDate'];
    $Fid = $_POST['Fid'];
    $name = $_POST['username'];
    if (!$department) {
        $error = "Enter department name";
    }
    if (!$Fid) {
        $error = "Enter Faculty email";
    }
    if ($error == "") {
        $query = "SELECT * FROM faculty WHERE email= '$Fid'";
        $res = mysqli_query($mySql_db, $query);
        if ($_GET["action"] == "changehod") {
            $myqry = "SELECT * FROM hod WHERE department='$department'";
            $result = mysqli_query($mySql_db, $myqry);
            $row = mysqli_fetch_assoc($result);
            $var1 = $row['Fid'];
            $var2 = $row['username'];
            $var3 = $row['startDate'];
            $sq1 = "UPDATE hod SET Fid='$Fid', username='$name', password='1234', startDate='$startDate' WHERE department='$department'";
            $donot1 = mysqli_query($mySql_db, $sq1);
            if (mysqli_num_rows($res) > 0) {
                $sq2 = "UPDATE faculty SET role='hod' WHERE email='$Fid'";
                $sq3 = "UPDATE faculty SET role='faculty' WHERE email='$var1'";
                $donot3 = mysqli_query($mySql_db, $sq3);
            } else {
                $sq2 = "INSERT INTO faculty(email, password,username,department,role,startDate) VALUES('$Fid','1234','$name','$department','hod','$startDate')";
            }
            $sq4 = "INSERT INTO old_hod(name,email,startDate,endDate) VALUES('$var2','$var1','$var3','$startDate')";
            $donot4 = mysqli_query($mySql_db, $sq4);
        }
        if ($_GET["action"] == "changedean") {
            $myqry = "SELECT * FROM dean";
            $result = mysqli_query($mySql_db, $myqry);
            $row = mysqli_fetch_assoc($result);
            $var1 = $row['Fid'];
            $var2 = $row['username'];
            $var3 = $row['startDate'];
            $sq1 = "UPDATE dean SET Fid='$Fid', username='$name', password='1234', department='$department', startDate='$startDate'";
            $donot1 = mysqli_query($mySql_db, $sq1);
            if (mysqli_num_rows($res) > 0) {
                $sq2 = "UPDATE faculty SET role='deanfaa' WHERE email='$Fid'";
                $sq3 = "UPDATE faculty SET role='faculty' WHERE email='$var1'";
                $donot3 = mysqli_query($mySql_db, $sq3);
            } else {
                $sq2 = "INSERT INTO faculty(email, password,username,department,role,startDate) VALUES('$Fid','1234','$name','$department','deanfaa','$startDate')";
            }
            $sq4 = "INSERT INTO old_dean(name,email,startDate,endDate) VALUES('$var2','$var1','$var3','$startDate')";
            $donot4 = mysqli_query($mySql_db, $sq4);
        }
        if ($_GET["action"] == "changedirector") {
            $myqry = "SELECT * FROM director";
            $result = mysqli_query($mySql_db, $myqry);
            $row = mysqli_fetch_assoc($result);
            $var1 = $row['Fid'];
            $var2 = $row['username'];
            $var3 = $row['startDate'];
            $sq1 = "UPDATE director SET Fid='$Fid', username='$name', password='1234', department='$department', startDate='$startDate'";
            $donot1 = mysqli_query($mySql_db, $sq1);
            if (mysqli_num_rows($res) > 0) {
                $sq2 = "UPDATE faculty SET role='dean' WHERE email='$Fid'";
                $sq3 = "UPDATE faculty SET role='faculty' WHERE email='$var1'";
                $donot3 = mysqli_query($mySql_db, $sq3);
            } else {
                $sq2 = "INSERT INTO faculty(email, password,username,department,role,startDate) VALUES('$Fid','1234','$name','$department','director','$startDate')";
            }
            $sq4 = "INSERT INTO old_director(name,email,startDate,endDate) VALUES('$var2','$var1','$var3','$startDate')";
            $donot4 = mysqli_query($mySql_db, $sq4);
        }
        if (mysqli_query($mySql_db, $sq2)) {
            echo 1;
        }
    } else {
        $error =  "Could not create user - Please try again later.";
    }
}
if ($error != "") {
    echo $error;
}
?>