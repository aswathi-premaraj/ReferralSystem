<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {  
        if($request->referral_code) {
            $referalData = User::where('referral_code',$request->referral_code)->first();
            if($referalData){
                $request->merge(['referral_id' => $referalData->id]);
                $this->referralPointUpdation($referalData->id); 
            }else{
                return redirect()->back()->with('error', "Invalid referral code");
            }
        }
       
       
       $referralCode = $this->generateUniqueCode();
       $request->merge(['referral_code' => $referralCode]);
        $user = User::create($request->all());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
    public function generateUniqueCode()
    {

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 6;

        $code = '';

        while (strlen($code) < 6) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }

        if (User::where('referral_code', $code)->exists()) {
            $this->generateUniqueCode();
        }

        return $code;

    }
    public function referralPointUpdation($referralId){
        $start_point = 10;
        for($i=0;$i<10;$i++){
         $point = $start_point-$i;
         $this->updateReferalPoint($referralId,$point);
         $referralId = $this->getReferralId($referralId);
         if($referralId==""){
            break;
         }
        }
        return;

    }
    public function getReferralId($userId){
       $user = User::find($userId);
       if($user){
        return $user->referral_id;
       }
       else
        return "";
    }
    public function updateReferalPoint($referralId,$point){
        $user = User::find($referralId);
        $user->referral_point = $user->referral_point + $point;
        $user->save();
        return;
    }
}