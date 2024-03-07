<?php
    class PageModel{
        public $limit=6;
        function __construct()
        {
            
        }
        function countPage($count){
            $pages=(($count%$this->limit)==0?($count/$this->limit):ceil($count/$this->limit));
            return $pages;
        }
        function pageStart(){
            if(!isset($_GET['pages'])||$_GET['pages']==1){
                $start=0;
            }else{
                $start=($_GET['pages']-1)*$this->limit;
            }
            return $start;
        }
    }
?>