<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\gdgBarang;
use App\Models\gdgLogbook;
use App\Models\gdg_box;

class gdgKodebarang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function barang()
    {
        return $this->hasMany(gdgBarang::class);
    }

    public function history()
    {
        return $this->hasMany(gdgLogbook::class);
    }

    public function box()
    {
        return $this->belongsTo(gdg_box::class);
    }

    public function scopeFilter($query)
    {
        if (request("search")) {
            return $query->where('jenis', 'LIKE', '%' . request('search') . '%');
        }
    }
}
