<script type="text/javascript">
  $(document).ready(function() {
    var $form = $('form#modifyform');
    $form.submit(function() {
        $.post($(this).attr('action'), $(this).serialize(), function(response) {
          alert("Books Updated successfully");
        });
      return false;
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#submit").click(function(){
    $("#divBooks").load("table.php");
  });
  });

</script>
<form name="modifyform" id="modifyform"action="update.php" method="post">
  <table>
    <tr>
      <td>ID:</td>
      <td><input type="text" name="id" value="" placeholder="Enter the ID"></td>
    </tr>
    <tr>
      <td>Book's Name :</td>
      <td><input type="text" placeholder="Book's name" name="bkname"></td>
    </tr>
    <tr>

      <td>Author :</td>
      <td><input type="text" placeholder="Author" name="author">
    </td>
  </tr>
  <tr>

      <td>Date :</td>
      <td>
        <input type="date" placeholder="" name="date">
    </td>
  </tr>
  <tr>
    <td>Description :
    </td>
    <td><input type="text" placeholder="Description" name="description"></td>
  </tr>
  <tr>
    <td>URL :</td>
    <td><input type="text" placeholder="URL" name="bkfile"></td>
  </tr>
  <tr>
    <td>
      <input type="submit" id="submit" name="submit" value="Modify">
    </td>
  </tr>
</table>
</form>
