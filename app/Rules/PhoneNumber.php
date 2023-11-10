<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check if the phone number starts with '011', '01', or '04'
        if (strpos($value, '011') === 0) {
            if (strlen($value) == 11) {
                return true;
            }
        }
        elseif (strpos($value, '01') === 0) {
            if (strlen($value) == 10) {
                return true;
            }
        }
        elseif (strpos($value, '04') === 0) {
            if (strlen($value) == 9) {
                return true;
            }
        }
        
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The phone number is in an incorrect format.';
    }
}
