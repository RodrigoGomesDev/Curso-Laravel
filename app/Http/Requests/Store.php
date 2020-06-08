<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(2);

        return [
            'name' => "required|min:3|max:255",
            'description' => 'required|min:3|max:10000',
            'price' => 'required',
            'image' => 'required|image'
            
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O nome do produto é obrigatório',
            'name.min' => 'Ops! o mínimo de carácteres no nome é 3',
            'name.max' => 'Ops! o máximo de carácteres no nome foi excedido (255)',

            'description.min' => 'Ops! o mínimo de carácteres na descrição é 3',
            'description.max' => 'Ops! o máximo de carácteres na descrição foi excedido (10000)',
            'description.required' => 'Uma descrição do produto é obrigatória',

            'price.required' => 'Um preço para o produto é obrigatório',

            'image.required' => 'Uma imagem do seu produto é necessária'
        ];
    }
}
