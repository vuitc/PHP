<?php
    class ContactModel{
        public $connect;
        public function __construct()
        {
            $this->connect=new BaseModel();
        }
        public function getAll(){
            // return [
            //     'id'=>12,
            //     'name'=>'iphone',
            // ];
        }
        
    }
?>