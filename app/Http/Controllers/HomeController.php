<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //php artisan make:policy UserPolicy
    public function index(Request $request)
    {
        $datos=User::when($request->search, function ($query) use ($request) {
            $query
                ->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        })->paginate(5)->withQueryString();
        return inertia('Home', [
            'users' => $datos,

            'searchTerm' => $request->search,

            'can' => [
                'delete_user' =>
                Auth::user() ?
                    Auth::user()->can('delete', User::class) :
                    null
            ]
        ]);
    }
}
