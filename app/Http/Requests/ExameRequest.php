<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;


use Illuminate\Foundation\Http\FormRequest;

class ExameRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permite que qualquer usuário faça a requisição
    }

    public function rules()
{
    return [
        'paciente' => ['required', 'string', 'max:100'],
        'exame_id' => [
            'required',
            'alpha_num',
            Rule::unique('exames', 'exame_id')->ignore($this->route('exame')),
        ],
        'tipo' => ['required', Rule::in(['Sequenciamento', 'PCR', 'Microarray'])],
        'data_coleta' => ['required', 'date', 'before_or_equal:today'],
        'laudo' => ['nullable', 'string', 'max:500'],
    ];
}

    public function messages()
    {
        return [
            'paciente.required' => 'O nome do paciente é obrigatório.',
            'paciente.max' => 'O nome do paciente não pode ter mais que 100 caracteres.',
            'exame_id.required' => 'O número do exame é obrigatório.',
            'exame_id.alpha_num' => 'O número do exame deve conter apenas letras e números.',
            'exame_id.unique' => 'Este número de exame já está cadastrado.',
            'tipo.required' => 'O tipo de exame é obrigatório.',
            'tipo.in' => 'O tipo de exame deve ser Sequenciamento, PCR ou Microarray.',
            'data_coleta.required' => 'A data de coleta é obrigatória.',
            'data_coleta.date' => 'A data de coleta deve ser uma data válida.',
            'data_coleta.before_or_equal' => 'A data de coleta não pode ser futura.',
            'laudo.max' => 'O laudo pode ter no máximo 500 caracteres.',
        ];
    }
}
