<?php
    class images{
        public $imagename;
        public $fishid;
        
        public function __construct()
        {
         $this ->imagename = "";
         $this ->fishid = 0 ;
        }
        public function setimagename ($imagename){
           $this->imagename = $imagename;
        }
        public function getimagename(){
           return $this ->imagename;
        }
        public function setfishid ($fishid){
           $this->fishid = $fishid;
        }
        public function getfishid(){
           return $this ->fishid;
        }
    }
 ?>