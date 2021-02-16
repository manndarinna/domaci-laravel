<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    protected $table = "termin";
    public $timestamps = false;

    public function kreirao()
    {
        return $this->belongsTo('App\Korisnik', 'kreirao', 'id');
    }
}
