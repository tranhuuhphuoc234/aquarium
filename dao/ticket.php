<?php
    class ticket{
        public $ticketname;
        public $ticketprice;
        public $ticketstatus;
        public function __construct()
        {
         $this ->ticketname = "";
         $this ->ticketprice = 0 ;
         $this ->ticketstatus = "";
        }
        public function setticketname ($ticketname){
           $this->ticketname = $ticketname;
        }
        public function getticketname(){
           return $this ->ticketname;
        }
        public function setticketstatus ($ticketstatus){
           $this->ticketstatus = $ticketstatus;
        }
        public function getticketstatus(){
           return $this ->ticketstatus;
        }
        public function setticketprice ($ticketprice){
           $this->ticketprice = $ticketprice;
        }
        public function getticketprice(){
           return $this ->ticketprice;
        }
    }
 ?>