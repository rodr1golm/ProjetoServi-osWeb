<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{   
        
    /**
     * index
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $users = User::orderBy('id', 'ASC')->paginate(10); 

        return response()->json([
            'status' => true,
            'users' => $users,
        ], 200);
    }
          
    /**
     * store
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function store(UserRequest $request) : JsonResponse
    {
        // dd($request);
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
            DB::commit();

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário cadastrado com sucesso!"
            ], 201);
        
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Cadastro não realizado!",
            ], 400);
        }
    }

    /**
     * show
     *
     * @param  mixed $user
     * @return JsonResponse
     */
    public function show(User $user) : JsonResponse
    {
        return response()->json([
            'status' => true,
            'user' => $user,
        ], 200);

    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return JsonResponse
     */
    public function update(UserRequest $request, User $user) : JsonResponse
    {
        DB::beginTransaction();

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário editado com sucesso!"
            ], 200);

        } catch (Exception $e) {
        
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Cadastro não alterado!",
            ], 400);
        }
        
    }
    
    /**
     * destroy
     *
     * @param  mixed $user
     * @return JsonResponse
     */
    public function destroy(User $user) : JsonResponse
    {
        try {
            $user->delete();

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário deletado com sucesso!"
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Cadastro não deletado!",
            ], 400);
        }

    }
    
}