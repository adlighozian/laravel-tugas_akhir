<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\gdgBarang;
use App\Models\gdgLogbook;

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
}
