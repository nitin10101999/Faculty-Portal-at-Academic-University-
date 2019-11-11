<?php
include("tool/header.php");
?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Faculty Portal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="DeptDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Department
        </a>
        <div class="dropdown-menu" aria-labelledby="DeptDropdown">
          <a class="dropdown-item" id="CSE">CSE</a>
          <a class="dropdown-item" id="EE">Electrical</a>
          <a class="dropdown-item" id="ME">Mechanical</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="login">Login</button>
    </form>
  </div>
</nav>
<script type="text/javascript">
  $("#login").click(function() {
                window.location.href = "http://localhost/practice/project/login.php";
        })
</script>

<script type="text/javascript">
  $("#CSE").click(function() {
         window.location.href = "http://localhost/practice/project/facultycse.php";
        })
  $("#EE").click(function() {
         window.location.href = "http://localhost/practice/project/facultyee.php";
        })
  $("#ME").click(function() {
         window.location.href = "http://localhost/practice/project/facultyme.php";
        })
</script>

</body>
</html>