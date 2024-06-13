<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Administrateurs;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // public function index(){
    //     $medecins = Medecin::all();
    //     if(Auth::user()->id === $medecins->user_id){

    //     }
    // }
    /**
     * Display the user's profile form.
     */


     public function edit(Request $request ): View
     {
        $medecins = Medecin::all();
        $patients = Patient::all();

        return view('admin.profile.edit',[
            'user' => $request ->user(),
            'medecins'=>$medecins,
            'patients' => $patients
        ]);

     }

     /**
      * Update the user's profile information.
      */
     public function update(ProfileUpdateRequest $request): RedirectResponse
     {


        $user = $request->user();
        $user->fill($request->validated());
        // Vérifier si une nouvelle photo est téléchargée
        // dd($user);
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            if($user->photo){
                Storage::disk('public')->delete($user->photo);
            }
            $new_photo = $photo->getClientOriginalName();
            $user['photo'] = $photo->storeAs('photos', $new_photo, 'public');
        }
        //Ajout de l'image de l'photo
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            if($user->photo){
                Storage::disk('public')->delete($user->photo);
            }
            $new_photo = $photo->getClientOriginalName();
            $user['photo'] = $photo->storeAs('photos', $new_photo, 'public');
        }


         if ($user->isDirty('email')) {
             $user->email_verified_at = null;
         }

         $request ->user()->save();
         return redirect()->route('profile.edit')->with('status', 'profile-updated');
     }


    /**
     * Delete the user's account.
    /**
 * Disable the user's account.
 */
public function destroy(Request $request): RedirectResponse
{
    $request->validateWithBag('userDeletion', [
        'password' => ['required', 'current_password'],
    ]);

    $user = $request->user();

    // Mettre à jour le statut de l'utilisateur dans la base de données
    $user->update(['statut' => false]);

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Rediriger l'utilisateur vers une autre page si nécessaire
    return redirect()->to('/')->with('status', 'Votre compte a été désactivé.');
}

}
