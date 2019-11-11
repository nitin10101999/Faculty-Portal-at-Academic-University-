<?php
include("tool/header.php");
include("tool/functions.php");
?>
<link rel="stylesheet" href="http://localhost/practice/project/css/facultypage.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<div id="csedivfaculty"></div>
<script type="text/javascript">
            $.ajax({
                type: "POST",
                url: "http://localhost/practice/project/actions.php?action=CSE",
                data: "dept=" + "CSE",
                success: function(result) {
                    $('#csedivfaculty').html(result);
                }
            }) 
</script>