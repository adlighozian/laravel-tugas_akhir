<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\gdgKodebarang;

class gdgLogbook extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kodebarang()
    {
        return $this->belongsTo(gdgKodebarang::class);
    }
}
