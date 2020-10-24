<?php
include_once("..\util\DBConnection.php");
include_once("../dao\includeWithVar.php");
include_once("../dao/ticket.php");
$var = $_POST['ticketname'];
$price = $_POST["price"];   
if(!is_numeric($price))
{
$price = substr($price, 1);
}
        $ticket = new ticket();
        $ticket -> setticketname($var);
        $ticket -> setticketprice($price);
        $ticket -> setticketstatus(1);
        $ticketid = getId('ticket',$var);
        if(Update($ticket,$ticketid,'ticketid'))
        {
            includeWithVariables("popup.php",array('title'=>'Sucessfully Added','color'=>'#28a745','content' =>$var.' has been updated'));

        }
        else
        {
         
        }
   
   
   
?>