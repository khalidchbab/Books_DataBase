<?php

$id = $_POST['id'];
$name = $_POST['bkname'];
$author = $_POST['author'];
$date = $_POST['date'];
$desc = $_POST['description'];
$fileName = $_POST['bkfile'];
$mysqli = new mysqli("localhost","root","","bibliotheque");
if ($mysqli == false) {
    die("ERROR: Could not connect. ".$mysqli->connect_error);
}
$sql = "UPDATE `bibliotheque`.`books` SET `Name`='$name',`Author`='$author',`Date`='$date',`Name_file`='$fileName',`Description`='$desc' WHERE `id`=$id";
if ($mysqli->query($sql) == true)
{
  echo "<br>";
  echo "book Updated successfully.";
}
else
{
    echo "ERROR: Could not able to execute $sql. "
        .mysqli_error($mysqli);
}

mysqli_close($mysqli);
?>
