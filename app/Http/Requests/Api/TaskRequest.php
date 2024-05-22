<?php

namespace App\Http\Requests\Api;

use App\Repositories\UserRepository;
use App\Rules\TaskValidation;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'company_id' => 'required|exists:companies,id',
            'user_id' => ['required','exists:users,id', new TaskValidation],
        ];
    }
}
