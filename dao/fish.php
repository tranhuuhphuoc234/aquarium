<?php
    class fish {
        public $fishname;
        public $typeid;
        public $locationid;
        public $fishscientificname;
        public $habitat;
        public $diet;
        public $status;
        public $size;
        public $weight;
        public $gestationperiod;
        public $achievableage;
        public $fishstatus;
        public $fishdetail;
    public function __construct()
    {
        $this ->fishname = "";
        $this ->typeid = 0;
        $this ->locationid = 0;
        $this ->fishscientificname = "";
        $this ->habitat = "";
        $this ->diet = "";
        $this ->status = "";
        $this ->size = 0;
        $this ->weight = 0;
        $this ->gestationperiod = "";
        $this ->achievableage = "";
        $this ->fishstatus = 0;
        $this ->fishdetail = "";
    }
    public function setfishname ($fishname){
       $this->fishname = $fishname;
    }
    public function getfishname(){
       return $this ->fishname;
    }
    public function settypeid ($typeid){
       $this->typeid = $typeid;
    }
    public function gettypeid(){
       return $this ->typeid;
    }
    public function setlocationid ($locationid){
       $this->locationid = $locationid;
    }
    public function getlocationid(){
       return $this ->locationid;
    }
    public function setfishscientificname ($fishscientificname){
       $this->fishscientificname = $fishscientificname;
    }
    public function getfishscientificname(){
       return $this ->fishscientificname;
    }
    public function sethabitat ($habitat){
       $this->habitat = $habitat;
    }
    public function gethabitat(){
       return $this ->habitat;
    }
    public function setdiet ($diet){
       $this->diet = $diet;
    }
    public function getdiet(){
       return $this ->diet;
    }
    public function setstatus ($status){
       $this->status = $status;
    }
    public function getstatus(){
       return $this ->status;
    }
    public function setsize ($size){
       $this->size = $size;
    }
    public function getsize(){
       return $this ->size;
    }
    public function setgestationperiod ($gestationperiod){
       $this->gestationperiod = $gestationperiod;
    }
    public function getgestationperiod(){
       return $this ->gestationperiod;
    }
    public function setweight ($weight){
       $this->weight = $weight;
    }
    public function getweight(){
       return $this ->weight;
    }
    public function setfishstatus ($fishstatus){
       $this->fishstatus = $fishstatus;
    }
    public function getfishstatus(){
       return $this ->fishstatus;
    }
    public function setachievableage ($achievableage){
       $this->achievableage = $achievableage;
    }
    public function getachievableage(){
       return $this ->achievableage;
    }
    public function setfishdetail ($fishdetail){
       $this->fishdetail = $fishdetail;
    }
    public function getfishdetail(){
       return $this ->fishdetail;
    }

    }
 ?>