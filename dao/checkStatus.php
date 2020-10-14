<?php
      include_once("..\util\DBConnection.php");
      include_once("..\dao\includeWithVar.php");
      $checked= $_POST['checked'];
      $id = $_POST['id'];
      $table = $_POST['table'];
      $valuecheck = $_POST['valuecheck'];
      $idname = $table.'id';
          $conn = OpenConnection();
          if($checked == "true")
          {
          $tsql = "UPDATE $table SET $valuecheck= 1 WHERE $idname = $id";
          }
          else if ($checked == "false"){
              $tsql = "UPDATE $table SET $valuecheck= 0 WHERE $idname =$id";
          }
         $getProducts = sqlsrv_query($conn,$tsql);
         
      
 ?>