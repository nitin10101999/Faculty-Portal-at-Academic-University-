<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <style>
        .top_div {
            font-family: Serif, Arial, Helvetica, sans-serif;
            font-size: 40px;
            font-weight: bold;
            background-color: #008B8B;
            color: white;
            padding-top: 10px;
            padding-right: 30px;
            padding-bottom: 10px;
            padding-left: 30px;
        }
    </style>


</head>

<body>
    <div class="top_div">
        <h2>Leave Management System</h2>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Hod Portal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" id="home" href="#">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" id="MyProfile" href="#">My Profile</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" id="ApplyLeave" href="../apply_leave.php">Apply Leave</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" id="ApplyLeave" href="#">Leave Requests</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="LeaveRecord" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Leave Record
                    </a>
                    <div class="dropdown-menu" aria-labelledby="LeaveRecord">
                        <a class="dropdown-item" href="#">Remaining leaves</a>
                        <a class="dropdown-item" href="#">Current leave status</a>
                        <a class="dropdown-item" href="#">Past record</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="logout">Logout</button>
            </form>
        </div>
    </nav>

    </bod>

</html>