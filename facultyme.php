<?php
include("tool/header.php");
include("tool/functions.php");
?>
<link rel="stylesheet" href="http://localhost/practice/project/css/facultypage.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<div id="medivfaculty"></div>
<script type="text/javascript">
            $.ajax({
                type: "POST",
                url: "http://localhost/practice/project/actions.php?action=ME",
                data: "dept=" + "ME",
                success: function(result) {
                    $('#medivfaculty').html(result);
                }
            }) 
</script>

