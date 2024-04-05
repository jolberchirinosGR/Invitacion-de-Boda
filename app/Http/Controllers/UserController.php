<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    /**
     * Display the specified resource.
     */
    public function index_unpaged_name(Request $request)
    {
        $query = User::query();

        //Ubicar los selects con el nombre que viene del request<
        if ($request->has('name')) {
            $nameQuery = $request->input('name');
            $query->where(function ($query) use ($nameQuery) {
                $query->where('name', 'like', "%{$nameQuery}%");
            });
        }

        // Obtener los resultados paginados
        $result = $query->with(['responsable', 'responsables'])->orderBy('name', 'asc')->get();

        return $result;
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
        $user->phone = $request->phone;
        $user->arrival = $request->arrival;
        $user->confirm = $request->confirm;
        $user->id_role = $request->id_role;
        $user->id_responsable = $request->id_responsable;

        $user->save();

        return $user;
    }

    public function update(UserRequest $request, User $user)
    {
        $update = User::find($user->id);

        $update->name = $request->name;
        $update->phone = $request->phone;
        $user->arrival = $request->arrival;
        $user->confirm = $request->confirm;
        $user->id_role = $request->id_role;
        $user->id_responsable = $request->id_responsable;
                
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

    /**
     * Cambiar el estado de confirmado
     */
    public function change_status($id)
    {
        $update = User::find($id);
        $update->confirm = $update->confirm  === 0 ? 1 : 0; //Cambia al opuesto que esta en BD de 1 a 0 y de 0 a 1
        $update->save();

        return $update;
    }

    /**
     * Cambiar la fecha de llegada al evento
     */
    public function change_arrival($id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    
        $arrival_time_caracas = now()->setTimezone('America/Caracas');
        $user->arrival = $arrival_time_caracas;
        $user->save();

        return $user;
    }
}
