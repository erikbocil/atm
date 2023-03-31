<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected function flash($message, $alertType = 'alert-danger',)
    {
        Session::flash('alert-class', $alertType);
        Session::flash('message', $message);
    }
}
