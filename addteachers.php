<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href= "css/style.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin/Teacher</title>

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
                    <ul class="navbar-nav me-right mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a href="index.php" class="btn btn-danger"><b>Log Out</b></a>
                        </li>
                </ul>
            </div>
        </nav>
<br>

<div>
    <div  class="container" align="center" >
        <div align="centre">
             <br>
    <form name="import" method="post" enctype="multipart/form-data">
        <input type="file" name="file"/>
        <input type="submit" name="teacherexcel" id="teacherexcel" class="btn btn-info" value="IMPORT EXCEL"/>
    </form>
    <?php
    if (isset($_POST['teacherexcel'])) {
        if (empty($_FILES['file']['tmp_name'])) {
            echo '<script>alert("Select a file first! ");</script>';
        } else {
            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, 'r');
            $headings = true;
            while (!feof($handle)) {
                $filesop = fgetcsv($handle, 1000);

                $facno = $filesop[0];
                $name = $filesop[1];
                $alias = $filesop[2];
                $designation = $filesop[3];
                $contact = $filesop[4];
                $email = $filesop[5];
                if ($facno == "" || $facno == "Faculty No.") {
                    continue;
                }
                $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                    "INSERT INTO teachers VALUES ('$facno','$name','$alias','$designation','$contact','$email')");
                if ($q) {
                    $sql = "CREATE TABLE " . $facno . " (
                day VARCHAR(10) PRIMARY KEY, 
                period1 VARCHAR(30),
                period2 VARCHAR(30),
                period3 VARCHAR(30),
                period4 VARCHAR(30),
                period5 VARCHAR(30),
                period6 VARCHAR(30)
                )";
                    mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), $sql);
                    $days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
                    for ($i = 0; $i < 6; $i++) {
                        $day = $days[$i];
                        $sql = "INSERT into " . $facno . " VALUES('$day','','','','','','')";
                        mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), $sql);
                    }
                }
            }
        }
    }
    ?>
</div>
<div align="center" style="margin-top:20px">
    <button id="teachermanual" class="btn btn-warning">ADD TEACHER</button>
</div>
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="container mt-5">
        <div class="modal-header">
            <span class="close btn btn-danger">&times</span>
            <h2 id="popupHead">Add Teacher</h2>
        </div>
        <div class="modal-body" id="EnterTeacher">
            <!--Admin Login Form-->
            <div style="display:none" id="addTeacherForm">
                <form action="addteacherFormValidation.php" method="POST">
                    <div class="form-group">
                        <label for="teachername">Teacher's Name</label>
                        <input type="text" class="form-control" id="teachername" name="TN">
                    </div>
                    <div class="form-group">
                        <label for="TF">Staff No</label>
                        <input type="text" class="form-control" id="facultyno" name="TF">
                    </div>
                    <div class="form-group">
                        <label for="TF">Short Form</label>
                        <input type="text" class="form-control" id="alias_name" name="AL"  placeholder="J.S.M">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>

                        <select class="form-control" id="designation" name="TD">
                            <option selected disabled>Select</option>
                            <option value="Professor">Professor</option>
                            <option value="Assistant Professor">Assistant Professor</option>
                            <option value="Associate Professor">Associate Professor</option>
                            <option value="Guest Faculty">Guest Faculty</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="teachercontactnumber">Contact No.</label>
                        <input type="text" class="form-control" id="teachercontactnumber" name="TP"
                               placeholder="+265 *** *** ***">
                    </div>

                    <div class="form-group">
                        <label for="teacheremailid">Email-ID</label>
                        <input type="text" class="form-control" id="teacheremailid" name="TE">
                    </div>
                    <div align="right">
                        <input type="submit" class="btn btn-warning" name="ADD" value="ADD">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
<style>
    .container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center;
    }
</style>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var addteacherBtn = document.getElementById("teachermanual");
    var heading = document.getElementById("popupHead");
    var facultyForm = document.getElementById("addTeacherForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    addteacherBtn.onclick = function () {
        modal.style.display = "block";
        //heading.innerHTML = "Faculty Login";
        facultyForm.style.display = "block";
        //adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        //adminForm.style.display = "none";
        facultyForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


<div>
    <br>
    <style>
        table {
            margin-top: 10px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-left: 30px;
            width: 90%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
            background-color: white;
        }
    </style>

    <script>
        function deleteHandlers() {
            var table = document.getElementById("teacherstable");
            var rows = table.getElementsByTagName("tr");
            for (i = 0; i < rows.length; i++) {
                var currentRow = table.rows[i];
                //var b = currentRow.getElementsByTagName("td")[0];
                var createDeleteHandler =
                    function (row) {
                        return function () {
                            var cell = row.getElementsByTagName("td")[0];
                            var id = cell.innerHTML;
                            var x;
                            if (confirm("Are You Sure?") == true) {
                                window.location.href = "deleteteacher.php?name=" + id;

                            }

                        };
                    };
                currentRow.cells[6].onclick = createDeleteHandler(currentRow);
            }
        }
    </script>

    <table id=teacherstable style="margin-left: 80px">
        <caption><strong>Staff's Information </strong></caption>
        <tr>
            <th width="130">Staff No</th>
            <th width=290>Name</th>
            <th width=50>Short Form</th>
            <th width="190">Designation</th>
            <th width="190">Contact No.</th>
            <th width="290">Email ID</th>
            <th width="40">Action</th>
        </tr>
        <tbody>
        <?php
        include 'connection.php';
        $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
            "SELECT * FROM teachers ORDER BY faculty_number ASC");

        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr><td>{$row['faculty_number']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['alias']}</td>
                    <td>{$row['designation']}</td>
                    <td>{$row['contact_number']}</td>
                    <td>{$row['emailid']}</td>
                   <td>
                    <button class='btn btn-danger'>Delete</button></td>
                    </tr>\n";
        }
        echo "<script>deleteHandlers();</script>";
        ?>
        </tbody>
    </table>

</div>
</div>
<br><br>
</div>

<!--  Jquery Core Script -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="assets/js/bootstrap.js"></script>
</body>
</html>
