<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Time Table Admin Dashboard</title>
        <link rel="icon" type="image/x-icon" href="logo.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">

        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid"> 
			<a class="navbar-brand" href="#"><img src="logo.png" width="30"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
            </div>
            <div class="navbar-collapse collapse move-me">
            <ul class="navbar-nav">
				<li class="naitem">
                    <a class="nav-link active, btn btn-outline-secondary" aria-current="page" href="admindashboard.php"><i class="fa fa-fw fa-dashboard"></i>Menu</a>
                </li>
				<li class="naitem">
                    <a class="nav-link active, btn btn-outline-secondary" aria-current="page" href="addteachers.php"><i class="fa fa-fw fa-dashboard"></i>Lectures</a>
                </li>
				<li class="naitem">
                    <a class="nav-link active, btn btn-outline-secondary" aria-current="page" href="addsubjects.php"><i class="fa fa-fw fa-dashboard"></i>Modules</a>
                </li>
                <li class="naitem">
                    <a class="nav-link active, btn btn-outline-secondary" aria-current="page" href="addclassrooms.php"><i class="fa fa-fw fa-dashboard"></i>Add Classes</a>
                </li>
                <li class="naitem">
                    <a class="nav-link active, btn btn-outline-secondary" aria-current="page" href=allotsubjects.php><i class="fa fa-fw fa-dashboard"></i>Theory</a>
                </li>
				<li class="naitem">
                    <a class="nav-link active, btn btn-outline-secondary" aria-current="page" href=allotpracticals.php><i class="fa fa-fw fa-dashboard"></i>Practical</a>
                </li>
				<li class="naitem">
                    <a class="nav-link active, btn btn-outline-secondary" aria-current="page" href=allotclasses.php><i class="fa fa-fw fa-dashboard"></i>Department</a>
                </li>
				<li class="naitem">
                    <a class="nav-link active, " aria-current="page" href="generatetimetable.php"><i class="fa fa-fw fa-dashboard"></i>Generate Table</a>
                </li>
                </ul>
        </div>
		<div>
		<ul class="nav navbar-nav navbar-right">
                <li><a class="btn btn-danger" href="index.php">Logout</a></li>
            	</ul>
		</div>
        </nav>
        <div id="myModal" class="modal">
<br>
<br>
<br>

<div class="container">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close btn btn-danger">&times</span>
            <h2 id="popupHead">Modal Header</h2>
        </div>
        <div class="modal-body" id="LoginType">

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

        <div style="display:none" id="facultyForm">
            <form action="facultyformvalidation.php" method="POST" style="overflow: hidden">
                <div class="form-group">
                    <label for="facultyno">Staff No.</label>
                    <input type="text" class="form-control" id="facultyno" name="FN">
                </div>
                <div align="right">
                        <input type="submit" class="btn btn-secondary" name="LOGIN" value="LOGIN">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var teacherLoginBtn = document.getElementById("teacherLoginBtn");
    var adminLoginBtn = document.getElementById("adminLoginBtn");
    var heading = document.getElementById("popupHead");
    var facultyForm = document.getElementById("facultyForm");
    var adminForm = document.getElementById("adminForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    adminLoginBtn.onclick = function () {
        modal.style.display = "block";
        heading.innerHTML = "Admin Login";
        adminForm.style.display = "block";
        facultyForm.style.display = "none";

    }
    teacherLoginBtn.onclick = function () {
        modal.style.display = "block";
        heading.innerHTML = "Staff Login";
        facultyForm.style.display = "block";
        adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        adminForm.style.display = "none";
        facultyForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Welcome Admin You have successfully Loged in</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">as the admin the system provides ways to alter data and generate tables that can be viewed by an indivdual schedules for staff members and view entire semester schedules for specific department</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section" id="services">
            <div class="container2 px-4 px-lg-5">
                <h2 class="text-center mt-0">Activites</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
				<div class="card-group">
						<div class="card" style="width: 100rem;">
							<img src="img/department.png" class="card-img-top" alt="...">
							<div class="card-body">
							<h5 class="card-title"></h5>
							</div>
							<div class="card-footer">
							<a href="subject.php" class="btn btn-warning">Class</a>
							</div>
						</div>
						<div class="card">
							<img src="img/semester.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<br>
							<h5 class="card-title"></h5>
							</div>
							<div class="card-footer">
							<a href="addclassrooms.php" class="btn btn-warning">Classes</a>
							</div>
						</div>
						<div class="card">
							<img src="img/module.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<br>
							<h5 class="card-title"></h5>
							</div>
							<div class="card-footer">
							<a href="addsubjects.php" class="btn btn-warning">Module</a>
							</div>
						</div>
						<div class="card">
							<img src="img/user.png" class="card-img-top" alt="...">
							<div class="card-body">
							<h5 class="card-title"></h5>
							</div>
							<div class="card-footer">
							<a href=allotclasses.php class="btn btn-warning">Department</a>
							</div>
						</div>
						<div class="card">
							<img src="img/staff.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<br>
							<h5 class="card-title"></h5>
							</div>
							<div class="card-footer">
							<a href="addteachers.php" class="btn btn-warning">Staff</a>
							</div>
						</div>
						</div>
                </div>
				<br><br>
            </div>
        </section>

</style>  <style>
    .container2 {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center;
		max-width: 2000px;
		align-items: center;
    }
</style>

        <section class="page-section bg-dark text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">Generate Schedules Here!</h2>
                <a class="btn btn-light btn-xl" href="generatetimetable.php">Generate Now!</a>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>