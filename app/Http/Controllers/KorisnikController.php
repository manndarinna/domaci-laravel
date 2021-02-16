<?php

namespace App\Http\Controllers;

use App\Grupa;
use App\Korisnik;
use Illuminate\Http\Request;

class KorisnikController extends Controller
{
    public function getKorisnici()
    {
        $korisnici = Korisnik::all();

        return response()->json([
            'korisnici' => $korisnici
        ]);
    }

    public function izbrisiKorisnika(Request $request)
    {
        $korisnik_id = $request->input('id_korisnik');
        Korisnik::find($korisnik_id)->delete();
        return view('korisnici');
    }
}
