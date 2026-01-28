<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $latestProperties = Property::where('status', 'Available')
                                    ->latest()
                                    ->take(3)
                                    ->get();

        return view('welcome', compact('latestProperties'));
    }
}
