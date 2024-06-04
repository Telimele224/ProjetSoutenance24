<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\AdminLog;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Affiche la vue de connexion.
     */
    public function create(): View
    {
        return view('auth.login'); // Retourne la vue pour le formulaire de connexion
    }

    /**
     * Gère une demande d'authentification entrante.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // Authentifie l'utilisateur en utilisant la méthode authenticate() définie dans LoginRequest

        $request->session()->regenerate(); // Régénère la session pour des raisons de sécurité

        $this->authenticated($request, Auth::user()); // Appel de la méthode pour enregistrer l'action de connexion

        return redirect()->intended(RouteServiceProvider::HOME); // Redirige l'utilisateur vers la page d'origine ou la page d'accueil si non spécifiée
    }

    /**
     * Détruit une session authentifiée.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();
        
        if ($user && $user->role === 'admin') {
            AdminLog::create([
                'user_id' => $user->id,
                'action' => 'Deconnecté',
            ]);
        }

        Auth::guard('web')->logout(); // Déconnecte l'utilisateur en utilisant le garde 'web'

        $request->session()->invalidate(); // Invalide la session actuelle

        $request->session()->regenerateToken(); // Régénère le jeton de session pour des raisons de sécurité

        return redirect('/'); // Redirige l'utilisateur vers la page d'accueil
    }

     /**
     * Méthode pour enregistrer l'action de connexion d'un administrateur.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            AdminLog::create([
                'user_id' => $user->id,
                'action' => 'Connecté',
            ]);
        }
    }
}
