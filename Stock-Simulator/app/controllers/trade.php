<?php

class Trade extends Controller
{
    public function index($name = '')
    {
    $user =  $this->model('User');
    $user->name = $name;
    $this->view('/trade', ['name'=> $user->name]);
    }
}