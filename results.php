<html>
<body>
<?php
    $line = file('config');
    $credentials = array();
    $line = trim(str_replace(": ", ':', $line));
    $lineArr = explode(' ', $line);
    $database = explode(':', $lineArr[0]);
    $database = array_pop($database);
    $username = explode(':', $lineArr[1]);
    $username = array_pop($username);
    $password = explode(':', $lineArr[2]);
    $password = array_pop($password);

    $link = mysql_connect($database, $username, $password);
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    echo 'Connected successfully<p>';
    mysql_select_db($username, $link);

    $query = "SELECT * FROM professor WHERE ssn=" . $_POST["sno"];
    $result = mysql_query($query,$link);

    printf("SSN: %s<br>\n", mysql_result($result, 0, "ssn"));
    printf("First NAME: %s<br>\n", mysql_result($result, 0, "name"));

    mysql_close($link);
?>
</body>
</html>