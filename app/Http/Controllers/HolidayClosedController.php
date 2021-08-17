<?php

namespace App\Http\Controllers;

use App\Models\HolidayClosed;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HolidayClosedController extends Controller
{
    public function getHolidayClosed() {
        $holidayClosed = HolidayClosed::firstOrCreate(
            ['year' => 2020],
            ['startWeek' => 26, 'endWeek' => 29]
        );

        return Inertia::render('Home', [
            'holidayClosed' => $holidayClosed
        ]);
    }
}
