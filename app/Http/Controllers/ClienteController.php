<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClienteController extends Controller
{
    public function index(Request $request){
         $users = User::where('role','user')->get();
           
        
        return view("clientes",compact('users'));
    }
}
