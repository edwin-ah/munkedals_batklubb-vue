<?php

namespace App\Http\Controllers;

use App\Models\HolidayClosed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class HolidayClosedController extends Controller
{
    public function getHolidayClosed() {
        $holidayClosed = HolidayClosed::firstOrCreate(
            ['id' => 1],
            ['year' => 2020, 'startWeek' => 26, 'endWeek' => 29]
        );

        return Inertia::render('Home', [
            'holidayClosed' => $holidayClosed
        ]);
    }

    public function updateHolidayClosed(Request $request) {
        $validated = $request->validate([
            'year' => 'required|numeric|digits:4',
            'startWeek' => 'required|numeric|min:1|max:53|digits:2',
            'endWeek' => 'required|numeric|min:1|max:53|digits:2'
        ]);
        $holidayClosed = HolidayClosed::find($request->id);
        $holidayClosed->startWeek = $request->startWeek;
        $holidayClosed->endWeek = $request->endWeek;
        $holidayClosed->save();

        return Redirect::route('home');
    }
}
