<?php
include("tool/functions.php");



$error = "";
if ($_GET["action"] == "login") 
{
    $email = $_POST['email'];
    $password =$_POST['password'];
    if (!$email) 
    {
        $error = "Email id is empty!";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error = "Email id is invalid!";
    }
    if (!$password) {
        $error = "Password cannot be empty!";
    }
    if($error=="")
    {
        $query = "SELECT * FROM faculty1 WHERE email= '$email'";
        $res=mysqli_query($mySql_db,$query);
        $row = mysqli_fetch_assoc($res);
        if($row["password"]==$password)
        {
            $_SESSION["email"]=$email;
            echo 1;
        }
        else{
            $error ="Invalid Email or Password!";           
        }
    }
    if($error!=""){
        echo $error;
    }
} 
else if ($_GET["action"] == "register") {
    $fname = $_POST['username'];
    $email = $_POST['email'];
    $password =$_POST['password'];
    $password2 = $_POST['confirmpassword'];
    $department = $_POST['department'];
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
    if ($error == "") 
    {
        $query = "SELECT * FROM faculty1 WHERE email= '$email'";
        $res=mysqli_query($mySql_db,$query);
        if (mysqli_num_rows($res) > 0) 
        {
            $error = "Email already exists";
        }
        else
        {
            $sql = "INSERT INTO faculty1 (email, password,username,department) VALUES('$email','$password','$fname','$department')";
            if (mysqli_query($mySql_db, $sql)) 
            {
                $id = mysqli_insert_id($mySql_db);
                $qry = "UPDATE myguests SET password = ".md5(md5($id).$password)."
                 WHERE id = ".$id." LIMIT 1";
                mysqli_query($mySql_db, $qry);
                $_SESSION["email"]=$email;
                echo 1;
               
                $collection = $database->user;
                $user = array('email' => $email, 'biography' => " ",'research_area' => " " ,'education' => " ",'experience' => " ",'patents' => " ");
                $collection->save($user);
                
            } 
            else
            {
                $error =  "Could not create user - Please try again later.";
            }
        }
    }
    if($error!=""){
        echo $error;
    }
}
else if($_GET['action']=="save_profile")
{
    $collection = $database->user;
    $data = array('email' => $_SESSION["email"]);
    $count = $collection->findOne($data);
    if (!count($count)) 
    {
        $user = array('email' => $_SESSION["email"], 'biography' => $_POST["biography"],'research_area' => $_POST["research_area"] ,'education' => $_POST["education"],'experience' => $_POST["experience"],'patents' => $_POST["patents"]);
        $collection->save($user);
    }
    else 
    {
        $newdata = array('$set' => array('biography' => $_POST["biography"],'research_area' => $_POST["research_area"] ,'education' => $_POST["education"],'experience' => $_POST["experience"],'patents' => $_POST["patents"]));
        $collection->update(array("email" =>$_SESSION["email"]), $newdata);
    }
    echo $_SESSION["email"];
}
else if($_GET['action']=="unset")
{
    unset($_SESSION['email']);
    echo 1;
}
else if ($_GET["action"] == "CSE" || $_GET["action"] == "EE" || $_GET["action"] == "ME") 
{
    echo '<div id="primaryContent1">';
    if($_GET["action"] == "CSE"){
    $query = "SELECT * FROM faculty1 WHERE department='cse'";
    }
    if($_GET["action"] == "EE"){
        $query = "SELECT * FROM faculty1 WHERE department='ee'";
    }
    if($_GET["action"] == "ME"){
            $query = "SELECT * FROM faculty1 WHERE department='me'";
    }
    $res=mysqli_query($mySql_db,$query);
    $count=0;
    while($row = mysqli_fetch_assoc($res))
    {
        $count=1;
        echo '<div class="fac_row">
        <div class="fac_img">
        <img style="border:1px #e5e5e5 solid;" src="http://cse.iitrpr.ac.in/sites/default/files/abhinav.jpeg">
        </div>';     
        echo '<p> <a  href="http://localhost/practice/project/view_profile.php?action='.$row['email'].'">
                        <strong>'. $row['username'].'</strong></a>
                    <br><i>'. $row['department'].'</i>
                    <br>'.$row['email'].'</p>
              </div>';
    }
    echo '</div>';
    if($count==0)
        echo '<p><strong>No faculty</strong><br></p>';
}
?>