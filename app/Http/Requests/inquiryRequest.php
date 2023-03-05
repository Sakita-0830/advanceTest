<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class inquiryRequest extends FormRequest
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
        return [
            'surname' => 'required',
            'name' => 'required',
            'sex' => 'required',
            'email' => 'required|email',
            'post' => 'required|string|regex:/^[0-9]{3}-[0-9]{4}$/',
            'address' => 'required',
            'building' => 'nullable',
            'opinion' => 'required|max:120'
        ];
    }

    public function messages(){
        return [
            'surname.required' => '苗字を入力してください',
            'name.required' => '名前を入力してください',
            'sex.required' => '性別を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスを入力してください',
            'post.required' => '郵便番号を入力してください',
            'post.regex' => 'ハイフンありの半角8文字で入力してください',
            'address.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max' => '120文字以内で入力してください'
        ];
    }

    public function prepareForValidation(){
        $this->merge(['post' => mb_convert_kana($this->post, 'as')]);
    }
}
