<?php
    class location{
        public $locationname;
        public $locationstatus;
    public function __construct()
        {
         $this ->locationname = "";
         $this ->locationstatus = 0 ;
        }
        public function setlocationname ($locationname){
           $this->locationname = $locationname;
        }
        public function getlocationname(){
           return $this ->locationname;
        }
        public function setlocationstatus ($locationstatus){
           $this->locationstatus = $locationstatus;
        }
        public function getlocationstatus(){
           return $this ->locationstatus;
        }
    }
 ?>