<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RFC2822 implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $email_matches = array();

        $from_regex   = '[a-zA-Z0-9_,\s\-\.\+\^!#\$%&*+\/\=\?\`\|\{\}~\']+';
        $user_regex   = '[a-zA-Z0-9_\-\.\+\^!#\$%&*+\/\=\?\`\|\{\}~\']+';
        $domain_regex = '(?:(?:[a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.?)+';
        $ipv4_regex   = '[0-9]{1,3}(\.[0-9]{1,3}){3}';
        $ipv6_regex   = '[0-9a-fA-F]{1,4}(\:[0-9a-fA-F]{1,4}){7}';

        preg_match("/^$from_regex\s\<(($user_regex)@($domain_regex|(\[($ipv4_regex|$ipv6_regex)\])))\>$/", $value, $matches_2822);
        preg_match("/^($user_regex)@($domain_regex|(\[($ipv4_regex|$ipv6_regex)\]))$/", $value, $matches_normal);

        if (empty($matches_normal) && !empty($matches_2822) && !empty($matches_2822[3])) {
            $fail("The {$attribute} must be a valid email address.");
        }

    }
}
