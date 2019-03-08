<?php
$connect = mysqli_connect("localhost","root","","bibliotheque");
if(isset($_POST["id"]))
  {
     $query = "DELETE FROM books WHERE id = '".$_POST["id"]."'";
     if(mysqli_query($connect, $query))
  {
    echo 'Book Deleted';
  }
}
?>
