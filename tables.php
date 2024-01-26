<?php
if (isset($_GET['generated']) && $_GET['generated'] == "false") {
    unset($_GET['generated']);
    echo '<script>alert("Timetable not generated yet!!");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href= "css/style.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Time table Admin Dashboard</title>

</head>

<body class="admindash">
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid"> 
			<a class="navbar-brand" href="#"><img src="logo.png" width="30"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="navbar-nav">
				<li class="naitem">
                    <a class="btn btn-danger" aria-current="page" href="index.php"><i class="fa fa-fw fa-dashboard"></i>Home</a>
                </li>
                <div>
                <li class="naitem">
                    <a class="btn btn-secondary" aria-current="page" href="tables.php"><i class="fa fa-fw fa-dashboard"></i>Load other tables</a>
                </li>
                </div>
                </ul>
            </div>
        </nav>
<br>
<div class="d-flex align-items-center flex-column margin" style="margin-top: 250px">
<div  class="container" align="center" >
    <div align="center">
    <br>

<script type="text/javascript">
    function genpdf() {
        var doc = new jsPDF();

        doc.addHTML(document.getElementById('TT'), function () {
            doc.save('demo timetable.pdf');
        });
        window.alert("Downloaded!");
    }
</script>
<br>
<div id="myModal" class="modal">

<div class="login">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close btn btn-danger">&times</span>
            <h2 id="popupHead">Modal Header</h2>
        </div>
        <div class="modal-body" id="LoginType">
            <!--Admin Login Form-->
            <div style="display:none" id="adminForm">
                <form action="admindashboard.php" method="POST">
                    <div class="form-group">
                        <label for="adminname">Username</label>
                        <input type="text" class="form-control" id="adminname" name="UN">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="PASS">
                    </div>
                    <div align="right">
                        <input type="submit" class="btn btn-secondary" name="LOGIN" value="LOGIN">
                    </div>
                </form>
            </div>
        </div>
        <!--Faculty Login Form-->
        <div style="display:none" id="facultyForm">
            <form action="facultyformvalidation.php" method="POST" style="overflow: hidden">
                <div class="form-group">
                    <label for="facultyno">Staff No.</label>
                    <input type="text" class="form-control" id="facultyno" name="FN">
                </div>
                <div align="right">
                    <button type="submit" class="btn btn-warning" name="LOGIN">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<div align="center" class="">
    <form data-scroll-reveal="enter from the bottom after 0.2s" action="studentvalidation.php" method="post">
        <select id="select_semester" name="select_semester" class="list-group-item">
            <option selected disabled>Select Semester</option>
            <option value="3"> BSC II Year ( Semester III )</option>
            <option value="4"> BSC II Year ( Semester IV )</option>
            <option value="5"> BSC III Year ( Semester V )</option>
            <option value="6"> BSC III Year ( Semester VI )</option>
            <option value="7"> BSC IV Year ( Semester VII )</option>
            <option value="8"> BSC IV Year ( Semester VIII )</option>
        </select>
        <br>
        <button type="submit" class="btn btn-info btn-lg">View</button>
    </form>
</div>
<style>
    .container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        padding: 20px;
        width: 400px;
    }
    </style>
    <script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</div>
</div>
</div>

</div>
</body>
</html>