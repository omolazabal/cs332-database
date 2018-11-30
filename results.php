<html>
<body>
<?php
    $lines = file('config');
    $link = mysql_connect($lines[0], $lines[1], $lines[2]);
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    echo 'Connected successfully<p>';
    mysql_select_db($username, $link);

    $query = "SELECT * FROM professor WHERE ssn=" . $_POST["sno"];
    if (!$sql) {
        die('Error: ' . mysql_error());
    }
    $result = mysql_query($query,$link);

    printf("SSN: %s<br>\n", mysql_result($result, 0, "ssn"));
    printf("First NAME: %s<br>\n", mysql_result($result, 0, "name"));

    mysql_close($link);
?>
</body>
</html>