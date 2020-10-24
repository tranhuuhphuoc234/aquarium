<?php
include_once("..\util\DBConnection.php");
include_once("../dao\includeWithVar.php");
include_once("../dao/event.php");
$eventname = $_POST['eventname'];
$eventdetail = $_POST["eventdetail"];
$eventtime = $_POST['eventtime'] ;  

        $event = new event();
        $event -> seteventname($eventname);
        $event -> seteventdetail($eventdetail);
        $event -> seteventtime($eventtime);
        $event -> seteventimg($eventname+".jpg");
        $event -> seteventstatus(0);
        $eventid = getId('event',$eventname);
        if(Update($event,$eventid,'eventid'))
        {
            includeWithVariables("popup.php",array('title'=>'Sucessfully Added','color'=>'#28a745','content' =>$eventname.' has been updated'));

        }
        else
        {
         
        }
   
   
   
?>