<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
//        dd($this->user, $this->route());
        // TODO: make password nullable when update, and username unique when update
        return [
            'name' => 'required',
            'username' => ['required',],
            'password' => ['nullable', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'role' => ['required', 'in:admin,superadmin'],
        ];
    }
}
