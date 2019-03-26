<?php

namespace App\Http\Requests\Validation;

use app\admin\controller\Auth;
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
        // 所有请求都不能通过验证
        // return false;

        // 只允许 user_id 为1的用户执行 store 方法
        // return Auth::id() === 1 ? true : false;

        // 不需要验证身份
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
            'tag' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    // 翻译 tag => 标签
    public function attributes()
    {
        return [
            'tag' => '标签',
        ];
    }

    // 修改提示信息
    public function messages(){
        return [
            'tag.required' => '必须选择标签',
        ];
    }

}
