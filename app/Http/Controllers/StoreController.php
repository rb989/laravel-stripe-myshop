<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests, View;

class StoreController extends Controller
{

    public function address()
    {

        View::make('account.address');

    }
}
