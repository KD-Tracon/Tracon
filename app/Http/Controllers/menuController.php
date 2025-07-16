<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnalysisResult;

class MenuController extends Controller
{
    public function index()
    {
        // $results = AnalysisResult::latest()->get();
        // return view('menu', compact('results'));
        return view('menu');
    }
}
