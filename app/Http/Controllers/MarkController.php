<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function index()
    {
        $marks = [
            ['subject' => 'Math', 'mark' => 5],
            ['subject' => 'English', 'mark' => 4],
            ['subject' => 'History', 'mark' => 3],
            ['subject' => 'Geography', 'mark' => 3],
        ];
        return view('mark', compact('marks'));
    }
}
