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
<div class="d-flex justify-content-center align-items-center flex-column">
<div class="container " align="center" >
<?php
if (isset($_POST['in_class'])) {
    include 'connection.php';
    $year = $_POST['course'];
    $class = $_POST['in_class'];
    $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
        "UPDATE classrooms SET status = '$year' WHERE name = '$class'");
}
?>
<form action="allotclasses.php" method="post" style="margin-top: 100px">

    <div align="center">
        <select name="course" class="btn btn-secondary">
            <option selected disabled>Select Course</option>
            ';
            <option value="2">BSC 2nd Year</option>
            <option value="3">BSC 3rd Year</option>
            <option value="4">BSC 4rth Year</option>
        </select>
    </div>

    <div align="center" style="margin-top: 5px">
        <select name="in_class" class="btn btn-secondary">
            <?php
            include 'connection.php';
            $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                "SELECT * FROM classrooms");
            $row_count = mysqli_num_rows($q);
            if ($row_count) {
                $mystring = '
             <option selected disabled>Select Classroom</option>';
                while ($row = mysqli_fetch_assoc($q)) {
                    if ($row['status'] != 0)
                        continue;
                    $mystring .= '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                }
                echo $mystring;
            }
            ?>
        </select>
    </div>
    <div align="center" style="margin-top: 10px;">
        <button type="submit" class="btn btn-warning">Allocate</button>
    </div>
</form>

<script>
    function deleteHandlers() {
        var table = document.getElementById("allotedsubjectstable");
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
                            window.location.href = "deleteallotment.php?name=" + id;

                        }

                    };
                };

            currentRow.cells[2].onclick = createDeleteHandler(currentRow);
        }
    }
</script>
<div align="center">
    <style>
        table {
            margin-top: 70px;
            margin-bottom: 50px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-left: 80px;
            width: 90%;
            border-radius: 5px;
        }

        td, th {
            border-radius: 5px;
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
            background-color: white;
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

    <table>
        <caption><font size="1.5"> CLASS ALLOCATION </font></caption>
        <tr>
            <th width="250">Class</th>
            <th width="400">Allocated To</th>
            <th width="60">Delete</th>
        </tr>
        <tbody>
        <?php
        include 'connection.php';
        $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
            "SELECT * FROM classrooms ");
        $courses = array('B.Tech 2nd Year', 'B.Tech 3rd Year', 'B.Tech 4rth Year', 'BSC 3rd Year', 'BSC 2nd Year', 'BSC 6th Year', 'BSW 3rd Year');
        while ($row = mysqli_fetch_assoc($q)) {
            if ($row['status'] == 0)
                continue;

            echo "<tr><td>{$row['name']}</td>
                    <td>{$courses[$row['status']-2]}</td>
                <td><button class='btn btn-danger'>Delete</button></td>
                    </tr>\n";
        }
        echo "<script>deleteHandlers();</script>";
        ?>
        </tbody>
    </table>
</div>

</div>
</div>

<!--  Jquery Core Script -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="assets/js/bootstrap.js"></script>
</body>
</html>
