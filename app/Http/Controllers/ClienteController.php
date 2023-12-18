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

    public function cadastrarCliente(Request $request){
      

        return view("cadastrarCliente");

    }


    public function cadastrarCliente_do(Request $request){
        $password = password_hash($request->password, PASSWORD_BCRYPT, ['cost' => 12]);
         
        $produto = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $password,
            'role' => $request->role,
        ]);
        
        return redirect('/cliente');
    }


    public function update_client(Request $request, $id){
        $user = User::find($id);

        return view("clientes_uptade",compact('user'));

    }

    
    public function delete_client(Request $request, $id){
        $user = User::find($id);

         $user->delete();
    }


    public function update_client_do(Request $request){
        $user = User::find($request->id);

        $user->name  = $request->name;
        $user->email  = $request->email;  
        $user->phone  = $request->phone;
        $user->role  = $request->role;
    
       
        $password = password_hash($request->password, PASSWORD_BCRYPT, ['cost' => 12]);

                
       $user->password =  $password;


       $user->save();

       return redirect()->back()->with('success', 'Usurário atualizado com Sucesso!');    

   }

    public function info(Request $request){
       $user_logado = auth()->user();

       
       return view("info",compact('user_logado'));
   }

   public function update_account(Request $request){
        $user = User::find($request->id);

        $user->name  = $request->name;
        $user->email  = $request->email;  
        $user->phone  = $request->phone;

        $user->save();

        return redirect()->back()->with('success', 'Seu Perfil foi atualizado com Sucesso!');   

   }

   
}
