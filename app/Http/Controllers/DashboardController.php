<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();


        $nilai = [
            getAverage($user->id, 1),
            getAverage($user->id, 2),
            getAverage($user->id, 3),
            getAverage($user->id, 4),
            getAverage($user->id, 5),
            getAverage($user->id, 6),
        ];

        $data =  [
            'nilai' => json_encode($nilai)
        ];



        // dd($data);


        return view('dashboard', $data);
    }
}
