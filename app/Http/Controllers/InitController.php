<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitController extends Controller
{
    public function init()
    {
        $auth = auth()->guard('api');

        return [
            'user_is_authenticated' => $auth->check(),
            'user' => $auth->user()
        ];
    }
}
