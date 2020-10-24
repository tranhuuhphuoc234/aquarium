<?php
    class event{
        public $eventname;
        public $eventdetail;
        public $eventtime;
        public $eventstatus;
        public $eventimg;

        public function __construct()
        {
        }
        public function seteventname ($eventname){
           $this->eventname = $eventname;
        }
        public function geteventname(){
           return $this ->eventname;
        }
        public function seteventdetail ($eventdetail){
           $this->eventdetail = $eventdetail;
        }
        public function geteventdetail(){
           return $this ->eventdetail;
        }
        public function seteventtime ($eventtime){
           $this->eventtime = $eventtime;
        }
        public function geteventtime(){
           return $this ->eventtime;
        }public function seteventstatus ($eventstatus){
           $this->eventstatus = $eventstatus;
        }
        public function geteventstatus(){
           return $this ->eventstatus;
        }public function seteventimg ($eventimg){
           $this->eventimg = $eventimg;
        }
        public function geteventimg(){
           return $this ->eventimg;
        }
      
    }
 ?>