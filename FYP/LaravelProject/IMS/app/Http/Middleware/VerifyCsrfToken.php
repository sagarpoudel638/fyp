<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://127.0.0.1:8000/add', 'http://127.0.0.1:8000/check','http://127.0.0.1:8000/AddTotal','http://127.0.0.1:8000/edit_action_customer','http://127.0.0.1:8000/edit_action_book','http://127.0.0.1:8000/AddOrder','http://127.0.0.1:8000/CreateOrder','http://127.0.0.1:8000/registerCustomer','http://127.0.0.1:8000/edit_action','http://127.0.0.1:8000/registerStudent','http://127.0.0.1:8000/update_password_action','http://127.0.0.1:8000/update_adminpassword','http://127.0.0.1:8000/editstudent','http://127.0.0.1:8000/edit_action_student','http://127.0.0.1:8000/pay_action_student','http://127.0.0.1:8000/registerBook','http://127.0.0.1:8000/generatebarcodeAction'
    ];
}
