<?php
    include_once("header.php");
    include_once("..\util\DBConnection.php");
    include_once("../dao/type.php");
 ?>
<?php
$statusTrue = false;
$statusFalse = false;
$stuatusExist = false; 
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
            $statusTrue = true;
        }
        else
        {
            $statusFalse = true;
        }
    }
    else{
        $stuatusExist = true; 
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
                <?php
                    if($statusTrue == true)
                    {
                       echo "<p class=\"text-success center-item\">Succesfully Added</p>";

                    }
                    if($statusFalse == true)
                    {
                        echo" <p class=\"text-danger center-item\">Failed To Add</p>";
                    }
                    if($stuatusExist == true)
                    {
                        echo" <p class=\"text-danger center-item\">Type name already exists </p>";
                    }
                 ?>

            </div>
            <div class="col-4"></div>

            </form>
        </div>
    </div>
</div>
<?php
    include_once("footer.php");
 ?>