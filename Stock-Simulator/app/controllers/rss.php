<?php

class Rss extends Controller
{
    public function index($name = '')
    {
    $user =  $this->model('User');
    $user->name = $name;
    $this->view('/rss', ['name'=> $user->name]);
    }
}

?>