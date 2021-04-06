<?php

class LeaderBoard extends Controller
{
    public function index($name = '')
    {
    $user =  $this->model('User');
    $user->name = $name;
    $this->view('/leaderBoard', ['name'=> $user->name]);
    }
}