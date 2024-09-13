<?php

namespace App\Http\Controllers;


class InternController extends Controller
{

    public function index()
    {

        return view('Course.internIndex');

    }

    public function basicWebtoon()
    {

        return view('Course.courseBasicWebtoon');
    }
    public function intro()
    {

        return view('Course.courseIntroduction');
    }

    public function basicSketchup()
    {

        return view('Course.courseIntroSketchup');
    }
    public function sketchupPhotoshop()
    {

        return view('Course.courseSketchupPhotoshop');

    }

}