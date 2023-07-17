<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

// class TestController extends Controller
// {
//   public function func() {
//     $user = new User;
//     $value = $user->find(1);
//     $arr = ['Snome1', 'Snome2', 'Snome3'];
//     return view('sample', compact('value', 'arr'));
//   }
// }

