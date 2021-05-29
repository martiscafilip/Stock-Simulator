<?php

class UserTrades extends Controller
{
    public function index($name = '')
    {
    $user =  $this->model('User');
    $user->name = $name;
    $this->view('/viewTrades', ['name'=> $user->name]);
    }
}
