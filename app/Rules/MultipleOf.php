<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MultipleOf implements ValidationRule
{
	public function __construct(private int $devider)
	{	  
	}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value % $this->devider !== 0) {
            $fail("The :attribute must be multiple of {$this->devider}.");
        }
    }
}
