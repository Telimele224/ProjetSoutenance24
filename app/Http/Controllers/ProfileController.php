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


         if ($user->isDirty('email')) {
             $user->email_verified_at = null;
         }

         $request ->user()->save();
         return redirect()->route('profile.edit')->with('status', 'profile-updated');
     }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
