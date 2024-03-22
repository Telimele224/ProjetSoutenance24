<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
class ProfilePatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request ): View
    {

       $patients = Patient::all();

       return view('patients.profilepatient.edit',[
           'user' => $request ->user(),
           'patients' => $patients
       ]);

    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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
