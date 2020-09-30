<?php
    class type{
        public $typename;
        public $typestatus;
        
        public function __construct()
        {
         $this ->typename = "";
         $this ->typestatus = 0 ;
        }
        public function settypename ($typename){
           $this->typename = $typename;
        }
        public function gettypename(){
           return $this ->typename;
        }
        public function settypestatus ($typestatus){
           $this->typestatus = $typestatus;
        }
        public function gettypestatus(){
           return $this ->typestatus;
        }
    }
 ?>