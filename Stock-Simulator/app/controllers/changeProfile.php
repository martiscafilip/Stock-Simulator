<?php

class ChangeProfile extends Controller
{
    public function index($name = '')
    {
    $user =  $this->model('User');
    $user->name = $name;
    $this->view('/changeProfile', ['name'=> $user->name]);
    }
}
