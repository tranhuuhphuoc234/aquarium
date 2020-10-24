<?php
    include_once("header.php");
    include_once("..\util\DBConnection.php");
    include_once("../dao/type.php");
    include_once("../dao\includeWithVar.php");
 ?>
<?php

     if(isset($_GET["submit"]))
     {
         if(isset($_GET["location"]))
        {
           
        $var = $_GET["location"];
        if(!checkExist("type","typename",$var))
        {
        $location = new type();
        $location -> settypename($var);
        $location -> settypestatus(1);
        if(Create($location))
        {
            includeWithVariables("popup.php",array('title'=>'Sucessfully Added','color'=>'#28a745','content' =>$var.' has been added to database'));

        }
        else
        {
            includeWithVariables("popup.php",array('title'=>'Failed to Add ','color'=>'#dc3545','content' =>'Please try again later!'));

        }
    }
    else{
        includeWithVariables("popup.php",array('title'=>'Failed to Add ','color'=>'#dc3545','content' =>'Type name has already existed'));

    }
    }
    }
?>
<div class="space"></div>
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="" method="get">
                    <div class="form-group">
                        <label  for="location">Type</label>
                        <input type="location" class="form-control" id="" aria-describedby=""
                            placeholder="Enter type" name="location" required>
                    </div>
                    <div class="center-item"><button name="submit" value="submit" type="submit"
                            class="btn-sm btn-dark button-size">Add</button></div>

                </form>
           

            </div>
            <div class="col-4"></div>

            </form>
        </div>
    </div>
</div>
<?php
    include_once("footer.php");
 ?>