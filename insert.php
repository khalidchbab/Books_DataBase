<?php
$name = $_POST['bkname'];
$author = $_POST['author'];
$date = $_POST['date'];
$desc = $_POST['description'];
$fileName = $_POST['bkfile'];

$mysqli = new mysqli("localhost","root","","bibliotheque");
if ($mysqli == false) {
    die("ERROR: Could not connect. ".$mysqli->connect_error);
}
$sql = "INSERT INTO `bibliotheque`.`books` (`id`, `Name`, `Author`, `Date`, `Name_file`, `Description`) VALUES (NULL, '$name', '$author', '$date', '$fileName', '$desc');";
if ($mysqli->query($sql) == true)
{
  echo "book inserted successfully.";
}
else
{
    echo "ERROR: Could not able to execute $sql. "
        .mysqli_error($mysqli);
}

mysqli_close($mysqli);
?>
