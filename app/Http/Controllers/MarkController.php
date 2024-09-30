<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function index()
    {
        App::setLocale('ru');
        $marks = [
            ['subject' => __('school_subjects.math'), 'mark' => 5],
            ['subject' => __('school_subjects.eng'), 'mark' => 4],
            ['subject' => __('school_subjects.hist'), 'mark' => 3],
            ['subject' => __('school_subjects.geo'), 'mark' => 3],
        ];
        return view('mark', compact('marks'));
    }
}
