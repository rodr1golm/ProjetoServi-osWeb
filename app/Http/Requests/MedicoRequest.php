<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MedicoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'erros' => $validator->errors(),
        ], 422));
    }


    public function rules(): array
    {
        $medicoId = $this->route('medico');

        return [
            'nome' => 'required',
            'registro' => 'required',
            'cpf' => 'required|size:11|unique:medicos,cpf,' . ($medicoId ? $medicoId->id : null),
            'especializacao' => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return[
            'nome.required' => 'Campo nome é obrigatório!',
            'registro.required' => 'Campo registro do conselho é obrigatório!',
            'cpf.required' => 'Campo CPF é obrigatório!',
            'cpf.size' => 'Informar somente os :size números do CPF!',
            'cpf.unique' => 'O CPF informado já está cadastrado!',
            'especializacao.required' => 'Campo especializacao é obrigatório!',
        ];
    }
}
