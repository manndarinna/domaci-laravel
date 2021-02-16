<?php

namespace App\Http\Controllers;


class PageController extends Controller
{
    public function termini()
    {
        return view('termini');
    }
    public function korisnici()
    {
        return view('korisnici');
    }
    public function pocetna()
    {
        return view('pocetna');
    }
}
