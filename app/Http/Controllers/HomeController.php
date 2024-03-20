<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class HomeController extends Controller
{
    public function redirect(){

        if(Auth::id())
        {
            if(Auth::user()->role=='patient'){
                return view('patients.home');
            }
            elseif(Auth::user()->role=='admin'){
                return view('admin.home');
            }
            else{
                return view('medecins.home');
            }

        }
        else{
            return redirect()->back();
        }

    }
}
