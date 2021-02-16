<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    protected $table = "korisnik";
    public $timestamps = false;

    public function kreiraniTermini()
    {
        return $this->hasMany('App\Termin', 'kreirao', 'id');
    }
}
