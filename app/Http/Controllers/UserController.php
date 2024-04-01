<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Obtener los usuarios paginados para las vistas
    public function index(Request $request)
    {
        $query = User::query();
        $sortBy = $request->input('column');
        $order = $request->input('order');

        //Paginacion para la tabla
        if ($request->has('pagination')) {
            $pagination = $request->input('pagination');
        }

        // Aplicar la búsqueda si se proporciona un término de búsqueda
        if ($request->has('name')) {
            $nameQuery = $request->input('name');
            $query->where('name', 'like', "%{$nameQuery}%");
        }

        if ($request->has('email')) {
            $emailQuery = $request->input('email');
            $query->where('email', 'like', "%{$emailQuery}%");
        }

        if ($request->has('date')) {
            $dateQuery = $request->input('date');
            $query->whereDate('created_at', $dateQuery);
        }

        if ($request->has('role')) {
            $roleQuery = $request->input('role');
            $roleQuery == 'null' ? null : $query->where('id_role',  $roleQuery);
        }

        //Odernar la tabla
        if($sortBy) {
            if($sortBy === 'id_role'){
                $query->with(['role' => function ($query) use ($order) {
                    $query->orderBy('name', $order);
                }])->orderBy($sortBy, $order);  
            }else{
                $query->orderBy($sortBy, $order);
            }
        }

        // Obtener los resultados paginados
        $users = $query->latest()->paginate($request->pagination);

        return $users;
    }

    /**
     * Display a listing of the resource.
     */
    public function index_unpaged()
    {
        return User::orderBy('name', 'asc')->get();
    }

    //Obtener usuario logeado y su rol
    public function profile(Request $request)
    {
        return $request->user()->only(['id', 'name', 'email', 'role']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // Inicializa un nuevo objeto Server con los datos del UserRequest
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  bcrypt($request->password);
        $user->id_role = $request->id_role;

        $user->save();

        return $user;
    }

    public function update(UserRequest $request, User $user)
    {
        $update = User::find($user->id);

        $update->name = $request->name;
        $update->email = $request->email;
        
        if ($request->password !== null && $request->password !== '') { //Comprobar contraseña vacia
            $update->password = bcrypt($request->password);
        }

        $update->id_role = $request->id_role;
        $update->save();

        return $update;
    }

    public function destory(User $user)
    {
        $user->delete();

        return response()->noContent();
    }

    /**
     * Obtener todos los roles
     */
    public function getRoles()
    {
        return Role::orderBy('name', 'asc')->get();
    }
}
