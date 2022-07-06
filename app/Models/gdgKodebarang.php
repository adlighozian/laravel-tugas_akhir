<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\gdgBarang;

class gdgKodebarang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function gdgBarang()
    {
        return $this->hasMany(gdgBarang::class);
    }
}
