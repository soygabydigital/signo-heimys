<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;


class UsuarioController extends Controller 
{
    function __construct()
    {
        $this->middleware('permission:ver-user|crear-user|editar-user|borrar-user')->only('index');
        $this->middleware('permission:crear-user')->only('create, store');
        $this->middleware('permission:editar-user')->only('edit, update');
        $this->middleware('permission:borrar-user')->only('destroy');
    }
    
    public function index()
    {
        $usuarios=User::paginate(5);
        return view('usuarios.index',compact('usuarios'));
    }

    
    public function create()
    {
        $roles=Role::pluck('name','name')->all();
        return view('usuarios.crear',compact('roles'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email', 
            'password'=>'required',
            'confirm-password' => 'required',
            'roles'=>'required'
        ],
        [
          'name.required'=>'Nombre de usuario es requerido.',
          'email.required'=>'E-mail es requerido.',
          'email.email'=>'E-mail debe ser válido.',
          'email.unique'=>'E-mail único es requerido.',  
          'password.required'=>'Password es requerida.',
          'confirm-password.required'=>'Confirme password',       
          'roles.required'=>'Rol es requerido.' 
        ]
    );

        $input=$request->all();
        $input['password']=Hash::make($input['password']);

        $user=User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index')->with('message','Usuario ha sido creado');
    }

   
    public function edit($id)
    {
        $user=User::find($id);
        $roles=Role::pluck('name','name')->all();
        $userRole=$user->roles->pluck('name','name')->all();
        return view('usuarios.editar',compact('user','roles','userRole'));
    }  

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email', 
            'password'=>'required',
            'confirm-password' => 'required',
            'roles'=>'required'
        ],
        [
          'name.required'=>'Nombre de usuario es requerido.',
          'email.required'=>'E-mail es requerido.',
          'email.email'=>'E-mail debe ser válido.',
          'password.required'=>'Password es requerida.',
          'confirm-password.required'=>'Confirme password',       
          'roles.required'=>'Rol es requerido.'
        ]
    );
        
        $input=$request->all();
        if (!empty($input['password'])){
            $input['password']=Hash::make($input['password']);
        }else{
            $input=Arr::except($input,array('password'));            
        }

        $user=User::find($id); 
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index')->with('message','Usuario ha sido editado');
    }

   
    public function destroy($id)
    {
        user::find($id)->delete();
        return redirect()->route('usuarios.index')->with('message', 'Usuario ha sido eliminado');
    }
}
