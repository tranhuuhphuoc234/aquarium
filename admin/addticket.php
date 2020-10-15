<?php
    include_once("header.php");
    include_once("..\util\DBConnection.php");
    include_once("../dao/ticket.php")
 ?>
<?php
$statusTrue = false;
$statusFalse = false;
$stuatusExist = false; 
     if(isset($_GET["submit"]))
     {
         if(isset($_GET["ticket"]))
        {
           
        $var = $_GET["ticket"];
        $price = $_GET["price"];
        $number = substr($price, 1); 
        if(!checkExist("ticket","ticketname",$var))
        {
        $ticket = new ticket();
        $ticket -> setticketname($var);
        $ticket -> setticketprice($number);
        $ticket -> setticketstatus(1);
        if(Create($ticket))
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
                        <label  for="ticket">Ticket</label>
                        <input type="ticket" class="form-control" id="" aria-describedby=""
                            placeholder="Enter ticket name" name="ticket" required>
                         <label for="currency-field">Price</label>
                         <input class="form-control" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency"  aria-describedby="" placeholder="Enter price" name="price" required>   
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
                        echo" <p class=\"text-danger center-item\">Ticket name already exists </p>";
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