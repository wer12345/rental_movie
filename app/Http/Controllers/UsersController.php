<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
  private $customer;

  public function ___construct(User $customer) 
  {
    $this->user = $customer;
  }

  public function index() 
  {
    return view('index');
  }

  public function create()
  {
    return view('register');
  }


}
