<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicoRequest;
use App\Models\Medico;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    
    /**
     * index
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $medicos = Medico::orderBy('nome', 'ASC')->paginate(10); 

        return response()->json([
            'status' => true,
            'medicos' => $medicos,
        ], 200);
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function store(MedicoRequest $request) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $medico = Medico::create([
                'nome' => $request->nome,
                'registro' => $request->registro,
                'cpf' => $request->cpf,
                'especializacao' => $request->especializacao
            ]);
            DB::commit();

            return response()->json([
                'status' => true,
                'medico' => $medico,
                'message' => "Médico cadastrado com sucesso!"
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
     * @param  mixed $medico
     * @return JsonResponse
     */
    public function show(Medico $medico) : JsonResponse
    {
        return response()->json([
            'status' => true,
            'medico' => $medico,
        ], 200);

    }
    
    /**
     * showByCpf
     *
     * @param  mixed $cpf
     * @return JsonResponse
     */
    public function showByCpf($cpf): JsonResponse
    {
        $medico = Medico::where('cpf', $cpf)->first();

        if ($medico) {
            return response()->json([
                'status' => true,
                'medico' => $medico,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Médico não encontrado para o CPF informado!',
            ], 404);
        }
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $medico
     * @return JsonResponse
     */
    public function update(MedicoRequest $request, Medico $medico) : JsonResponse
    {
        DB::beginTransaction();

        try {
            $medico->update([
                'nome' => $request->nome,
                'registro' => $request->registro,
                'cpf' => $request->cpf,
                'especializacao' => $request->especializacao,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'medico' => $medico,
                'message' => "Medico editado com sucesso!"
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
     * @param  mixed $medico
     * @return JsonResponse
     */
    public function destroy(Medico $medico) : JsonResponse
    {
        try {
            $medico->delete();

            return response()->json([
                'status' => true,
                'medico' => $medico,
                'message' => "Médico deletado com sucesso!"
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Cadastro não deletado!",
            ], 400);
        }
    }
}
