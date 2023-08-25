<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TermsAccepted implements ValidationRule
{
    /**
     * Run the validation rule.  
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     public function validate($attribute, $value, $fail) 
     {
         return $value === true;
     }
    

    public function message() 
    {
        return 'Please accept the Terms and Conditions';
    }
}
