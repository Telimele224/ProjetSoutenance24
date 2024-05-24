<?php

namespace App\Http\Controllers\Front_end;

use App\Http\Controllers\Controller;
use App\Models\Actualite;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Galerie;
use App\Models\Medecin;
use App\Models\Personnel;
use App\Models\Service;
use App\Models\Temoignage;
use Chatify\Facades\ChatifyMessenger;
use Illuminate\Support\Facades\Auth;

class MenuNavigation extends Controller
{
    //
    public function apropos () {
        $services = Service::take(7)->get();


        $personnels = Personnel::all();
        $temoignages = Temoignage::with('user.patient')->where('publier', true)->get();

            return view('Front_end.apropos', ['temoignages' => $temoignages,'personnels'=>$personnels,'services' => $services]);
    }
    public function medecins () {

        $personnels = Personnel::all();
        $services = Service::take(7)->get();

        return view('Front_end.medecins',[
            'personnels'=>$personnels,'services' => $services
        ]);
    }
    public function essai () {
        $services = Service::take(7)->get();
        return view('Front_end.show',[
            'services' => $services
        ]);


    }

    public function contact () {
        $services = Service::take(7)->get();

        return view('Front_end.contact',[
            'services'=>$services
        ]);

    }
    public function send(){
        $data = request()->validate([
            'name' =>'required|min:2',
            'email' =>'required|email',
            'telephone' =>'required|min:9',
            'message' =>'required|min:5',

        ]);
        Mail::to('receipentemail@gmail.com')->send(new ContactUs($data));

        // dd('sent');
        return redirect()->back()->with('success', 'Votre message a été envoyer avec succès ');
    }
    public function welcome()
    {
          // Récupérer les services depuis la base de données (limitez à 7 résultats)
        $services = Service::take(8)->get();
        $actualites = Actualite::all();
        $personnels = Personnel::all();
        $temoignages = Temoignage::with('user.patient')->where('publier', true)->get();
        return view('Front_end.welcome', ['temoignages' => $temoignages,
        'actualites' => $actualites, 'personnels'=>$personnels,'services' => $services

    ]);
    }

    public function departements () {
        $servicess = Service::all();
        $services = Service::take(7)->get();
        return view('Front_end.les_departements', [
            'services' => $services,
            'servicess' => $servicess

        ]);
    }
    public function chatify( $id = null)
    {
        $messenger_color = Auth::user()->messenger_color;
        return view('Chatify::app', [
            'id' => $id ?? 0,
            'messengerColor' => $messenger_color ? $messenger_color : ChatifyMessenger::getFallbackColor(),
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
        ]);
    }
    public function blog()
    {
        $actualites=Actualite::all();
        $services = Service::take(7)->get();

        return view('Front_end.blog',[
            'actualites'=>$actualites,
            'services'=>$services,
        ]);
    }
    public function galerie()
    {
        $services = Service::take(7)->get();

        $galeries=Galerie::all();

        return view('Front_end.galerie',[
            'galeries'=>$galeries,
            'services'=>$services,
        ]);
    }
    public function lien()
    {
        $personnels = Personnel::all();
        $services = Service::take(7)->get();

        return view('Front_end.medecins', [
            'medecins' => Medecin::orderBy('created_at', 'desc')->paginate(10),
            'personnels'=>$personnels,
            'services'=>$services


        ]);
            }
        public function afficherMenu()
        {
        $services = Service::take(7)->get();

            // Récupérer les services depuis la base de données (limitez à 7 résultats)
            $services = Service::take(7)->get();

            // Passer les données à la vue
            return view('Front_end.welcome', ['services' => $services]);
        }


}
