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
            </div>
        </nav>
<br>

<div class="d-flex align-items-center flex-column">
<div  class="container" align="center" >
    <div align="center">
        <br>
        <div>
            <p class="alert alert-primary"><font size="5">Viewing Time Table</font></p>
        </div>
<style>
    table {
        margin-top: 20px;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 2px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #ffffff;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }
</style>
<style>
    .container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center;
        padding: 20px;
    }
    </style>
<div id="TT" style="background-color: #FFFFFF">
    <table border="2" cellspacing="3" align="center" id="timetable">
        <caption>
            <strong><br><br>
                <?php
                if (isset($_POST['select_semester'])) {
                    echo "COMPUTER ENGINEERING DEPARTMENT SEMESTER " . $_POST['select_semester'] . " ";
                    $year = (int)($_POST['select_semester'] / 2) + $_POST['select_semester'] % 2;
                    $r = mysqli_fetch_assoc(mysqli_query(mysqli_connect("localhost", "root", "", "ttms"), "SELECT * from classrooms
                                WHERE status = '$year'"));
                    echo " ( " . $r['name'], " ) ";
                }
                ?>
            </strong>
        </caption>
        <tr>
            <td style="text-align:center">WEEKDAYS</td>
            <td style="text-align:center">8:00-8:50</td>
            <td style="text-align:center">8:55-9:45</td>
            <td style="text-align:center">9:50-10:40</td>
            <td style="text-align:center">10:45-11:35</td>
            <td style="text-align:center">11:40-12:30</td>
            <td style="text-align:center">12:30-1:30</td>
            <td style="text-align:center">1:30-4:00</td>
        </tr>
        <tr>
            <?php
            $table = null;
            if (isset($_POST['select_semester'])) {
                $table = " semester" . $_POST['select_semester'] . " ";
            } else
                echo '</table>';
            if (isset($_POST['select_semester']) && $_POST['select_semester'] % 2 !== 0) {
                $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                    "SELECT * FROM" . $table);
                $qq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                    "SELECT * FROM subjects");
                $days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY');
                $i = -1;
                $str = "<br>";
                if (isset($_POST['select_semester'])) {
                    while ($r = mysqli_fetch_assoc($qq)) {
                        if ($r['isAlloted'] == 1 && $r['semester'] == $_POST['select_semester']) {
                            $str .= $r['subject_code'] . ": " . $r['subject_name'] . " ";
                            if (isset($r['allotedto'])) {
                                $id = $r['allotedto'];
                                $qqq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                                    "SELECT * FROM teachers WHERE faculty_number = '$id'");
                                $rr = mysqli_fetch_assoc($qqq);
                                $str .= " " . $rr['alias'] . ": " . $rr['name'] . " ";
                            }
                            if ($r['course_type'] !== "LAB") {
                                $str .= "<br>";
                                continue;
                            } else {
                                $str .= ", ";
                            }
                            if (isset($r['allotedto2'])) {
                                $id = $r['allotedto2'];
                                $qqq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                                    "SELECT * FROM teachers WHERE faculty_number = '$id'");
                                $rr = mysqli_fetch_assoc($qqq);
                                $str .= " " . $rr['alias'] . ": " . $rr['name'] . ", ";
                            }
                            if (isset($r['allotedto3'])) {
                                $id = $r['allotedto3'];
                                $qqq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                                    "SELECT * FROM teachers WHERE faculty_number = '$id'");
                                $rr = mysqli_fetch_assoc($qqq);
                                $str .= " " . $rr['alias'] . ": " . $rr['name'] . "<br>";
                            }
                        }
                    }
                }

                while ($row = mysqli_fetch_assoc($q)) {
                    $i++;
                    echo "
                 <tr><td style=\"text-align:center\">$days[$i]</td>
                 <td style=\"text-align:center\">{$row['period1']}</td>
                <td style=\"text-align:center\">{$row['period2']}</td>
                <td style=\"text-align:center\">{$row['period3']}</td>
                 <td style=\"text-align:center\">{$row['period4']}</td>
                  <td style=\"text-align:center\">{$row['period5']}</td>
                  <td style=\"text-align:center\">LUNCH</td>
                  <td style=\"text-align:center\">{$row['period6']}</td>
                </tr>\n";
                }
                echo '</table>';
                if (isset($_POST['select_semester'])) {
                    echo "<div align=\"center\">" . "<br>" . $str . "<br>
                            <strong>" . "<br></strong></div>";
                }
                unset($_GET['generated']);
            } else {
                header("location:index.php?generated=false");

            }
            ?>
</div>
<script type="text/javascript">
    function gendf() {
        var doc = new jsPDF();
        doc.addHTML(document.getElementById('TT'), function () {
            doc.save('<?php echo "ttms semester " . $_POST["select_semester"]?>' + '.pdf');
            alert("Downloaded!");
        });
    }
</script>
<div align="center" style="margin-top: 10px">
    <button id="saveaspdf" class="btn btn-warning" onclick="gendf()">SAVE AS PDF</button>
</div>

</div>
</div>
</div>
<br><br>
</body>
</html>