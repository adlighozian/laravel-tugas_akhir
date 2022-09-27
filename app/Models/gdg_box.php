<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\gdgKodebarang;

class gdg_box extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kodebarang()
    {
        return $this->hasMany(gdgKodebarang::class);
    }
}
