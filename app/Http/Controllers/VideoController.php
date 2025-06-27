<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class VideoController extends Controller
{
    public function form() { return view('upload'); }

    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,avi,mov,webm|max:512000',
        ]);

        $path = $request->file('video')->store('videos', 'public');

        $proc = new Process(['python3', '-c', 'print("Hello, world")']);
        $proc->run();

        return view('result', [
            'videoPath' => $path,
            'pythonOut' => trim($proc->getOutput()),
        ]);
    }
}
