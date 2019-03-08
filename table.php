<html>
 <head>
   <style>
  #form1div { display: none; }
  #deletediv{ display: none;}
   .modal-content {
       background-color: #fefefe;
       margin: 4% auto 15% auto;
       border: 1px solid #888;
       width: 40%;
   	padding-bottom: 30px;
   }

   /* The Close Button (x) */
   .close {
       position: absolute;
       right: 25px;
       top: 0;
       color: #000;
       font-size: 35px;
       font-weight: bold;
   }
   .close:hover,.close:focus {
       color: red;
       cursor: pointer;
   }

   /* Add Zoom Animation */
   .animate {
       animation: zoom 0.6s
   }
   @keyframes zoom {
       from {transform: scale(0)}
       to {transform: scale(1)}
   }
   </style>
  <title>Books managment</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:1100px;
   padding:20px;
   background-color:#fff;
   border:1px solid #ccc;
   border-radius:5px;
   margin-top:25px;
   box-sizing:border-box;
  }
  </style>
 </head>
 <body>

  <div class="container box">
   <h1 align="center">Books</h1>
   <br />
   <div>
   <br />
    <br />
    <div id="alert_message"></div>
    <table id="book_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Book'Id</th>
       <th>Books Name</th>
       <th>Book's Author</th>
       <th>Date of release</th>
       <th>Description</th>
       <th>Options</th>
      </tr>
     </thead>
       <div id="rows">

         <?php
         $connect = mysqli_connect("localhost", "root", "", "bibliotheque");

         $query = "SELECT * FROM books ";


         $result = mysqli_query($connect, $query);


         while($row = mysqli_fetch_array($result))
         {?>
           <tr>
             <td id="id"><?php echo($row['id']) ?></td>
             <td id="name"><?php echo($row['Name']) ?></td>
             <td id="author"><?php echo($row['Author']) ?></td>
             <td id="author"><?php echo($row['Date']) ?></td>
             <td id="desc"><?php echo($row['Description']) ?></td>
             <td>
                 <input id="modfy" onclick="showandhide('<?php echo($row['id'])."','".$row['Name']."','".$row['Author']."','".$row['Date']."','".$row['Description']?>')" type="button" name="modify" value="modify" class="btn btn-primary">
                 <input type="button" name="delete" onclick="showandhidedelete(<?php echo($row['id']) ?>)" id="del"value="Delete" class="btn btn-primary">
             </td>
           </tr>

         <?php  }?>
       </div>

    </table>
    <td> <br>
    <br> </td>
  </div>
</div>
   <div id="form1div" class="container">
     <script type="text/javascript">
       $(document).ready(function() {
         var $form = $('form#modifyform');
         $form.submit(function() {
           if(validate())
             $.post($(this).attr('action'), $(this).serialize(), function(response) {
               alert("Books Updated successfully");
             });
             $("#divBooks").load("table.php");

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

     <script type="text/javascript">
     function validate()
     {
      var nom_livre = document.forms["modifyform"]["bkname"];

      var id = document.forms["modifyform"]["id"];
      var nom_auteur = document.forms["modifyform"]["author"];



      if (id.value == "")
      {
        window.alert("Please enter the ID");
        id.focus();
        return false;
      }

      if(nom_livre.value=="")
      {
         alert("entre le nom Svp");
         nom_livre.focus();
         return false;
      }

      if(nom_auteur.value=="")
      {
         alert("entre le nom d'auteur SVP");
         nom_auteur.focus();
         return false;
      }


      var reg2 = /[a-zA-Z]$/
      if (reg2.exec(nom_livre.value) == null) {
         alert("le nom du livre n'est pas convenable");
      nom_livre.focus();
      return false;
       }

         var reg1= /[a-zA-Z]$/
         if(reg1.exec(nom_auteur.value)==null) {
         alert("le nom d'auteur n'est pas convenable");
         nom_auteur.focus();
      return false;
      }

      return true;
     }

     </script>

     <div class="container">
       <div class="row main">
         <div class="main-login main-center">
           <form name="modifyform" id="modifyform" action="update.php" method="post" >
             <caption ><h1 align="center" class="formTitle">MODIFY A BOOK</h1></caption>
             <div class="form-group">
               <label for="name" class="cols-sm-2 control-label">Book's ID :</label>
               <div class="cols-sm-10">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-book fa-lg" aria-hidden="true"></i></span>
                   <input type="text" name="id" value="" id="idmodify" class="form-control"  placeholder="Enter Book's ID" />
                 </div>
               </div>
             </div>
             <div class="form-group">
               <label for="name" class="cols-sm-2 control-label">Book's Name :</label>
               <div class="cols-sm-10">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-book fa-lg" aria-hidden="true"></i></span>
                   <input type="text" name="bkname" value="" id="bknmodify" class="form-control"  placeholder="Enter Book's Name" />
                 </div>
               </div>
             </div>

             <div class="form-group">
               <label for="Author" class="cols-sm-2 control-label">Author's Name:</label>
               <div class="cols-sm-10">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                   <input type="text" name="author" value="" id="bkamodify" size="50" placeholder="Enter Author's Name" class="form-control" />
                 </div>
               </div>
             </div>

             <div class="form-group">
               <label for="username" class="cols-sm-2 control-label">Edition's Date :</label>
               <div class="cols-sm-10">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-calendar fa-lg" aria-hidden="true"></i></span>
                   <input type="date" name="date" value="" id="bkdmodify" size="50" placeholder="Release Date Name" class="form-control">
                 </div>
               </div>
             </div>

             <div class="form-group">
               <label for="url" class="cols-sm-2 control-label">Description :</label>
               <div class="cols-sm-10">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-align-justify fa-lg" aria-hidden="true"></i></span>
                   <textarea name="description" id="bkdescmodify" size="50" placeholder="Description" class="form-control"></textarea>
                 </div>
               </div>
             </div>

             <div class="form-group">
               <label for="confirm" class="cols-sm-2 control-label">URL :</label>
               <div class="cols-sm-10">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-globe fa-lg" aria-hidden="true"></i></span>
                   <input type="text" name="bkfile" size="50" id="fileToUploadmodify" placeholder="https:www......com/book.pdf" class="form-control">
                 </div>
               </div>
             </div>
             <div class="form-group ">
             </div>
             <br>
               <input type="submit" name="submit" id="submit" value="MODIFY" class="btn btn-primary">
               <button type="reset" class="btn btn-primary">Reset</button>
               <br><br>
           </form>
         </div>
       </div>
     </div>
   </div>

  <div id="deletediv">
    <script type="text/javascript">
      $(document).ready(function() {
        var $form = $('form#deletebook');
        $form.submit(function() {
            $.post($(this).attr('action'), $(this).serialize(), function(response) {
              alert("Books Deleted successfully");
            });
            $("#divBooks").load("table.php");
          return false;
        });
      });

    </script>

    <div class="container">
      <div class="row main">
        <div class="main-login main-center">
          <form form name="deletebook" id="deletebook" method="post" action="delete.php">
            <caption ><h1 align="center" class="formTitle">ENTER BOOK's ID To CONFIRM</h1></caption>

            <div class="form-group">
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book fa-lg" aria-hidden="true"></i></span>
                  <input type="text" name="id" value="" id="iddel" class="form-control"  placeholder="Enter Book's ID" />
                </div>
              </div>
            </div>
            <br>
              <input type="submit" name="submit" id="submit" onclick="showandhidedelete()" value="Delete" class="btn btn-primary">
              <button type="reset" class="btn btn-primary">Reset</button>
              <br><br>
          </form>
          </div>
        </div>
      </div>
  </div>
  <script type="text/javascript">
  function showandhide(id,name,author,date,description) {
    $("#idmodify").val(id);
    $("#bknmodify").val(name);
    $("#bkamodify").val(author);
    $("#bkdmodify").val(date);
    $("#bkdescmodify").val(description);


  var x = document.getElementById("form1div");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

}
  </script>
  <script type="text/javascript">
  function showandhidedelete(id) {
    $("#id").val(id);
  var x = document.getElementById("deletediv");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
  </script>
 </body>
</html>
