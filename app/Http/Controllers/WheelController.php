<?php


namespace App\Http\Controllers;

use App\Models\Wheel;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WheelController extends Controller
{
    public function getSpinState()
    {
        $state = Cache::get('spin_state', false);
        return response()->json(['spin' => $state]);
    }

    public function triggerSpin(Request $request)
    {
        Cache::put('spin_state', true, 10); // Set the spin state to true and expire after 10 seconds
        return response()->json(['status' => 'success']);
    }
    public function spin()
    {
        // Assuming there's only one row in the wheel table
        $wheel = Wheel::first();
        if ($wheel) {
            $wheel->spin = true;
            $wheel->save();
            return redirect()->back()->with('message', 'Wheel spun successfully');
        }
        return redirect()->back()->with('error', 'Wheel not found');
    }
    
    // public function checkWheel()
    // {
    //     $wheel = Wheel::first(); // Assuming there's only one row in the wheel table

    //     // Pass the spin value directly to the view
    //     return view('wheel-check', ['spin' => $wheel->spin]);
    // }
    public function showWinner()
    {
        // Fetch the latest record from the wheel table
        $wheel = Wheel::latest()->first();
        
        // Check if the wheel record exists and get the spin value
        $spin = $wheel ? $wheel->spin : false;
        $randomMemberCode = Member::inRandomOrder()->first()->GCcode ?? 'No code available';
        
        
        return view('winner', ['spin' => $spin, 'memberCode' => $randomMemberCode]);
    }
}
