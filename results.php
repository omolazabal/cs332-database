<html>
<body>
<?php
    $link = mysql_connect('', '', '');
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    echo 'Connected successfully<p>';
    mysql_select_db('', $link);

    $query = "SELECT * FROM professor WHERE ssn=" . $_POST["sno"];
    if (!$query) {
        die('Error: ' . mysql_error());
    }

    $result = mysql_query($query,$link);
    if (!$result) {
        die('Error: ' . mysql_error());
    }

    printf("SSN: %s<br>\n", mysql_result($result, 0, "ssn"));
    printf("First NAME: %s<br>\n", mysql_result($result, 0, "name"));

    mysql_close($link);
?>
</body>
</html>
