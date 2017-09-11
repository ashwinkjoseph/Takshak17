<?php
class dp extends controller{

    public function index(){
        header('Access-Control-Allow-Origin: *');
        $this->view("dp");
    }

}