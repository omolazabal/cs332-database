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
		<div class="uk-flex uk-flex-center uk-flex-middle uk-background-secondary uk-height-viewport uk-light">
			<div class="uk-position-bottom-center uk-position-small uk-visible@m">
				<span class="uk-text-small uk-text-muted">© 2018 Marianne foundation - <a href="#">Created by Michael Rozsypal, Oscar Olazabal, Marianne Tolentino</a></span>
			</div>
			<div class="uk-width-medium uk-padding-small">
                <?php
                    $link = mysql_connect('', '', '');
                    if (!$link) {
                        die('Could not connect: ' . mysql_error());
                    }
                    echo 'Connected successfully<p>';
                    mysql_select_db('', $link);

                    if(isset($_POST['prof_a'])) {
                        // $query = "SELECT * FROM professor WHERE ssn=" . $_POST["sno"];
                        $query = "SELECT * FROM professor";
                        if (!$query) {
                            die('Error: ' . mysql_error());
                        }
                        $result = mysql_query($query,$link);
                        if (!$result) {
                            die('Error: ' . mysql_error());
                        }
                        else {
                            echo '<table class="uk-table uk-table-hover uk-table-divider">
                            <thead>
                                <tr>
                                    <th>ssn</th>
                                    <th>name</th>
                                    <th>sex</th>
                                    <th>street</th>
                                    <th>zip</th>
                                    <th>city</th>
                                    <th>state</th>
                                    <th>salary</th>
                                    <th>title</th>
                                    <th>phone area code</th>
                                    <th>phone digits</th>
                                </tr>
                            </thead>';
                            while($row = mysqli_fetch_array($response)) {
                                echo '<tbody>
                                    <tr>
                                        <td>' . $row['ssn'] . '</td>
                                        <td>' . $row['name'] . '</td>
                                        <td>' . $row['sex'] . '</td>
                                        <td>' . $row['street'] . '</td>
                                        <td>' . $row['zip'] . '</td>
                                        <td>' . $row['city'] . '</td>
                                        <td>' . $row['state'] . '</td>
                                        <td>' . $row['salary'] . '</td>
                                        <td>' . $row['title'] . '</td>
                                        <td>' . $row['phone_area_code'] . '</td>
                                        <td>' . $row['phone_digits'] . '</td>
                                    </tr>
                                </tbody>';
                            }
                        echo '</table>';
                        }
                    }
                    elseif(isset($_POST['prof_b'])) {
                        $query = "SELECT * FROM professor";

                    }
                    elseif(isset($_POST['stu_a'])) {
                        $query = "SELECT * FROM student";

                    }
                    else {  // stu_b
                        $query = "SELECT * FROM student";

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

