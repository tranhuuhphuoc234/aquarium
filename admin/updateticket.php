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
        $detail = $_GET['ticket-detail'];
        $number = substr($price, 1); 
        if(!checkExist("ticket","ticketname",$var))
        {
        $ticket = new ticket();
        $ticket -> setticketname($var);
        $ticket -> setticketprice($number);
        $ticket -> setticketdetail($detail);
        $ticket -> setticketstatus(1);
        $ticketid = getId('ticket',$var);
        if(Update($ticket,$ticketid,'ticketid'))
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