<?php

class Account extends Controller
{
    public function index($name = '')
    {
    $user =  $this->model('User');
    $user->name = $name;
    $this->view('/account', ['name'=> $user->name]);
    }
}
