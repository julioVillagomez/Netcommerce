<?php

namespace App\Rules;

use App\Repositories\UserRepository;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TaskValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $repository = new UserRepository();
        $user = $repository->pending_task($value);
        if($user && count($user->tasks) >= 5){
            $fail('The user must have less than 5 pending tasks');
        }

    }
}
