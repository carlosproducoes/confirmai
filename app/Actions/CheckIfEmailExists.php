<?php

namespace App\Actions;

use App\Models\User;

class CheckIfEmailExists{
    public static function execute (String $email) {
        $user = User::where("email", $email)->first();

        if ($user) {
            return true;
        }

        return false;
    }
}