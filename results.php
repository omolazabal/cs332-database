<html lang="en" class="uk-height-1-1">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>School Database</title>
		<link rel="icon" href="img/favicon.ico">
		<!-- CSS FILES -->
		<link rel="stylesheet" type="text/css" href="css/uikit.min.css">
	</head>
	<body class="uk-height-1-1">
		<div class="uk-flex uk-flex-center uk-flex-middle uk-height-viewport">
			<div class="uk-position-bottom-center uk-position-small uk-visible@m">
				<span class="uk-text-small uk-text-muted">© 2018 Marianne foundation - <a href="#">Created by Michael Rozsypal, Oscar Olazabal, Marianne Tolentino</a></span>
			</div>
			<div class="uk-padding-small">
                <?php
                    $link = mysql_connect('', '', '');
                    if (!$link) {
                        echo 'Could not connect: ' . mysql_error();
                    }
                    mysql_select_db('', $link);

                    if(isset($_POST['prof_a'])) {
                        $query = "SELECT title, classroom, meeting_dates, begin_time, end_time
                                  FROM professor p, section s
                                  WHERE s.professor_ssn = " . $_POST["social_security_number"];
                        if (!$query) {
                            echo 'Error: ' . mysql_error();
                        }
                        $result = mysql_query($query,$link);
                        if (!$result) {
                            echo 'Error: ' . mysql_error();
                        }
                        else {
                            echo '<table class="uk-table uk-table-hover uk-table-divider">
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>classroom</th>
                                    <th>meeting dates</th>
                                    <th>begin time</th>
                                    <th>end time</th>
                                </tr>
                            </thead>
			    <tbody>';
                            while($row = mysql_fetch_array($result)) {
                                echo '<tr>
                                        <td>' . $row['title'] . '</td>
                                        <td>' . $row['classroom'] . '</td>
                                        <td>' . $row['meeting_dates'] . '</td>
                                        <td>' . $row['begin_time'] . '</td>
                                        <td>' . $row['end_time'] . '</td>
                                    </tr>';
                            }
			    echo '</tbody>';
                            echo '</table>';
                        }
                    }
                    elseif(isset($_POST['prof_b'])) {
                        $query = "SELECT distinct grade, count(student_cwid) as student_count
                                  FROM enrollment e
                                  WHERE e.course_number = " . $_POST["course_number"] .
                                       "e.section_number = " . $_POST["section_number"] .
                                 "GROUP BY grade";
                        if (!$query) {
                            echo 'Error: ' . mysql_error();
                        }
                        $result = mysql_query($query,$link);
                        if (!$result) {
                            echo 'Error: ' . mysql_error();
                        }
                        else {
                            echo '<table class="uk-table uk-table-hover uk-table-divider">
                            <thead>
                                <tr>
                                    <th>grade</th>
                                    <th>student count</th>
                                </tr>
                            </thead>
			    <tbody>';
                            while($row = mysql_fetch_array($result)) {
                                echo '<tr>
                                        <td>' . $row['grade'] . '</td>
                                        <td>' . $row['student_count'] . '</td>
                                    </tr>';
                            }
			    echo '</tbody>';
                            echo '</table>';
                        }
                    }
                    elseif(isset($_POST['stu_a'])) {
                    }
                    else {  // stu_b
                        $query = "SELECT grade, title, e.course_number
                                  FROM enrollment e, course c
                                  WHERE e.course_number = c.course_number AND
                                        e.student_cwid = " . $_POST["cwid"];
                        if (!$query) {
                            echo 'Error: ' . mysql_error();
                        }
                        $result = mysql_query($query,$link);
                        if (!$result) {
                            echo 'Error: ' . mysql_error();
                        }
                        else {
                            echo '<table class="uk-table uk-table-hover uk-table-divider">
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>course_number</th>
                                    <th>grade</th>
                                </tr>
                            </thead>
			    <tbody>';
                            while($row = mysql_fetch_array($result)) {
                                echo '<tr>
                                        <td>' . $row['title'] . '</td>
                                        <td>' . $row['course_number'] . '</td>
                                        <td>' . $row['grade'] . '</td>
                                    </tr>';
                            }
			    echo '</tbody>';
                            echo '</table>';
                        }
                    }
                    mysql_close($link);
                ?>
            </div>
        </div>

		<!-- JS FILES -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit-icons.min.js"></script>
	</body>
</html>

