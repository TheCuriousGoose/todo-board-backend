<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    public function index()
    {
        $timeslots = Timeslot::all();

        return response()->json($timeslots);
    }
}
