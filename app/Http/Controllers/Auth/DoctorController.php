<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\doctorLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;

class DoctorController extends Controller

{
    public function store(doctorLoginRequest $request)

    {
        if ($request->authenticate()){

          $request->session()->regenerate();

          return redirect()->intended(RouteServiceProvider::DOCTOR);

         }else{

          return redirect()->back()->withErrors(['field name']);
      }
        

       
    }

    
    public function destroy(Request $request)
    {
        Auth::guard('doctor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
