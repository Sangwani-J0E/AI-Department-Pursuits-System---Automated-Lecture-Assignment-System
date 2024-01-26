
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
<div class="d-flex align-items-center flex-column">
    <div  class="container" align="center" >
        <br>
<div align="center">
    <form name="import" method="post" enctype="multipart/form-data">
        <input type="file" name="file"/>
        <input type="submit" name="subjectexcel" id="subjectexcel" class="btn btn-info" value="IMPORT EXCEL"/>
    </form>
    <?php
    if (isset($_POST['subjectexcel'])) {
        if (empty($_FILES['file']['tmp_name'])) {
            echo '<script>alert("Select a file first! ");</script>';
        } else {
            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, 'r');
            while (!feof($handle)) {
                $filesop = fgetcsv($handle, 1000);
                $code = $filesop[0];
                $name = $filesop[1];
                $type = $filesop[2];
                $semester = $filesop[3];
                $department = $filesop[4];
                if ($code == "" || $code == "Subject Code") {
                    continue;
                }
                $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                    "INSERT INTO subjects VALUES ('$code','$name','$type','$semester','$department',0,'','','')");
            }
        }
    }
    ?>
</div>
<div align="center" style="margin-top: 20px">

    <button id="subjectmanual" class="btn btn-warning">ADD SUBJECT</button>
</div>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="container mt-5">
        <div class="modal-header">
            <span class="close btn btn-danger">&times</span>
            <h2 id="popupHead">Add Subject</h2>
        </div>
        <div class="modal-body" id="EnterSubject">
            <!--Admin Login Form-->
            <div style="display:none" id="addSubjectForm">
                <form action="addsubjectFormValidation.php" method="POST">
                    <div class="form-group">
                        <label for="subjectname">Subject Name</label>
                        <input type="text" class="form-control" id="subjectname" name="SN"
                               placeholder="Subject's Name ...">
                    </div>
                    <div class="form-group">
                        <label for="subjectcode">Subject Code</label>
                        <input type="text" class="form-control" id="subjectcode" name="SC" placeholder="e.g. 351 CS 52">
                    </div>
                    <div class="form-group">
                        <label for="subjecttype">Course Type</label>
                        <select class="form-control" id="subjecttype" name="ST">
                            <option selected disabled>Select</option>
                            <option value="THEORY">THEORY</option>
                            <option value="LAB">LAB</option>

                        </select>

                    </div>
                    <div class="form-group">
                        <label for="subjectsemester">Semester</label>
                        <select class="form-control" id="subjectsemester" name="SS">
                            <option selected disabled>Select</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subjectdepartment">Department</label>
                        <select class="form-control" id="subjectdepartment" name="SD">
                            <option selected disabled>Select</option>
                            <option value="Computer Engg.">Computer Engg.</option>
                            <option value="Electronics Engg.">Electronics Engg.</option>
                            <option value="Electrical Engg.">Electrical Engg.</option>
                            <option value="Mechanical Engg.">Mechanical Engg.</option>
                        </select>
                    </div>
                    <div align="right" class="form-group">
                        <input type="submit" class="btn btn-success mt-3" name="ADD" value="ADD">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var addsubjectBtn = document.getElementById("subjectmanual");
    var heading = document.getElementById("popupHead");
    var subjectForm = document.getElementById("addSubjectForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    addsubjectBtn.onclick = function () {
        modal.style.display = "block";
        //heading.innerHTML = "Faculty Login";
        subjectForm.style.display = "block";
        //adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        //adminForm.style.display = "none";
        subjectForm.style.display = "none";

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
            margin-left: 50px;
            width: 90%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
      <style>
    .container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center;
    }
    </style>

    <script>
        function deleteHandlers() {
            var table = document.getElementById("subjectstable");
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
                                window.location.href = "deletesubject.php?name=" + id;

                            }

                        };
                    };

                currentRow.cells[5].onclick = createDeleteHandler(currentRow);
            }
        }
    </script>
    <table id=subjectstable style="margin-left: 90px">
        <caption><strong> Subject's Information</strong></caption>
        <tr>
            <th width="150">Code</th>
            <th width=300>Title</th>
            <th width=150>Course Type</th>
            <th width="150">Semester</th>
            <th width="350">Department</th>
            <th width="40">Action</th>
        </tr>
        <?php
        include 'connection.php';
        $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
            "SELECT * FROM subjects ORDER BY subject_code ASC ");
        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr><td>{$row['subject_code']}</td>
                    <td>{$row['subject_name']}</td>
                    <td>{$row['course_type']}</td>
                    <td>{$row['semester']}</td>
                     <td>{$row['department']}</td>
                     <td><button class='btn btn-danger'>Delete</button></td>
                    </tr>\n";
        }
        echo "<script>deleteHandlers();</script>";
        ?>
    </table>
</div>
<br>
</div>
</div>

</div>
<br><br>

</body>
</html>
