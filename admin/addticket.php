<?php
    include_once("header.php");
    include_once("..\util\DBConnection.php");
    include_once("../dao\includeWithVar.php");
    include_once("../dao/ticket.php")
 ?>
<?php
     if(isset($_GET["submit"]))
     {
         if(isset($_GET["ticket"]))
        {
           
        $var = $_GET["ticket"];
        $price = $_GET["price"];
        if(!is_numeric($price))
{
$price = substr($price, 1);
}

        if(!checkExist("ticket","ticketname",$var))
        {
        $ticket = new ticket();
        $ticket -> setticketname($var);
        $ticket -> setticketprice($price);
       
        $ticket -> setticketstatus(1);
        if(Create($ticket))
        {
            includeWithVariables("popup.php",array('title'=>'Sucessfully Added','color'=>'#28a745','content' =>$var.' has been added to database'));

        }
        else
        {
            includeWithVariables("popup.php",array('title'=>'Failed to Add ','color'=>'#dc3545','content' =>'Please try again later!'));

        }
    }
    else{
        includeWithVariables("popup.php",array('title'=>'Failed to Add ','color'=>'#dc3545','content' =>'Ticket name has already existed'));

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
                        <label for="ticket">Ticket</label>
                        <input type="ticket" class="form-control" id="" aria-describedby=""
                            placeholder="Enter ticket name" name="ticket" required>
                        <label for="currency-field">Price</label>
                        <input class="form-control" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value=""
                            data-type="currency" aria-describedby="" placeholder="Enter price" name="price" required>
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