<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\gdgKodebarang;

class gdgBarang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kodebarang()
    {
        return $this->belongsTo(gdgKodebarang::class);
    }

    public function scopeFilter($query)
    {
        if (request("search")) {
            return $query->where('nama', 'LIKE', '%' . request('search') . '%');
        }
    }
}
