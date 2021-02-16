<?php

namespace App\Http\Controllers;

use App\Korisnik;
use App\Termin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TerminController extends Controller
{
    public function getTermine()
    {
        $termini = Termin::join('korisnik as k', 'kreirao', 'k.id')
            ->select('termin.*', 'k.email_korisnik AS email_kreirao')
            ->get();

        return response()->json([
            'termini' => $termini
        ]);
    }

    public function getTermineByKorisnikKreirao(Request $request)
    {
        $id_korisnik = $request->input('id_korisnik');

        $termini   = Korisnik::find($id_korisnik)->kreiraniTermini()->get();


        return view('mojitermini', [
            'termini' => $termini,
            'korisnik' => $request->input('ime_korisnik')
        ]);
    }
    public function dodajTermin(Request $request)
    {
        $id_korisnik = $request->input('id_korisnik');
        $pocinje_at = Carbon::create($request->input('pocinje_at'));

        $naziv_termin = $request->input('naziv_termin');

        Termin::insert([
            'naziv_termin' => $naziv_termin,
            'kreirao' => $id_korisnik,
            'pocinje_at' => $pocinje_at->format('d-m-Y H:i:s'),
        ]);
        return redirect('pocetna');
    }
    public function zavrsenTermin(Request $request)
    {
        $termin_id = $request->input('id_termin');
        $id_korisnik = $request->input('id_korisnik');
        $date = $date = Carbon::now();
        $date = $date->format('d-m-Y H:i:s');

        Termin::where('id', $termin_id)->update(['zavrsen_at' => $date]);
        return view('korisnici');
    }

    public function izbrisiTermin(Request $request)
    {
        $termin_id = $request->input('id_termin');
        Termin::find($termin_id)->delete();
        return view('korisnici');
    }
}
