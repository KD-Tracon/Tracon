<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnalysisResult;

class ResultController extends Controller
{
    public function show()
    {
        return view('result');
    }
}
