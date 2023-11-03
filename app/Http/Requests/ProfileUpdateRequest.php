<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $user = Auth::user()->load('role');

        if ($user->role->role_name == 'User') {
            return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
                'user_info.phone' => ['numeric', 'digits_between:9,11', new \App\Rules\PhoneNumber],
            ];
        }
        else if ($user->role->role_name == 'Vendor') {
            return [
                'name' => ['string', 'max:255'],
                'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            ];
        }
       
    }

    public function messages()
    {
        return [
            'user_info.phone' => 'The phone number is in an incorrect format.',
        ];
    }
}
