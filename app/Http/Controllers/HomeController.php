<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class HomeController extends Controller
{
    public function redirect(){

        if(Auth::id())
        {
            if(Auth::user()->role=='patient' && Auth::user()->statut=='1'){
                $rendezVous = Rdv::all();
                $rendezVousAcceptes = Rdv::where('statut', 'accepte')->get();
                $rendezVousRejettes = Rdv::where('statut', 'rejette')->get();
                $rendezVousEnAttente= Rdv::where('statut', 'annuler')->get();
                return view('patients.home',[
                    'rendezVous'=>$rendezVous,
                    'rendezVousAcceptes' => $rendezVousAcceptes,
                    'rendezVousRejettes' => $rendezVousRejettes,
                    'rendezVousEnAttente' => $rendezVousEnAttente
                ]);
            }
            elseif(Auth::user()->role=='admin' && Auth::user()->statut=='1'){
                return view('admin.home');
            }
            elseif(Auth::user()->role=='admin' && Auth::user()->statut=='1'){
                return view('medecins.home');
            }
            else{
                return view('message');
            }

        }
        else{
            return redirect()->back();
        }

    }
}
