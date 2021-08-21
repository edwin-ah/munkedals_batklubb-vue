<?php

namespace App\Http\Controllers;

use App\Models\InformationSheet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InformationSheetController extends Controller
{
    public function index() {
        return Inertia::render('Information/Information',[
            'informationSheets' => InformationSheet::all()
        ]);
    }
}
