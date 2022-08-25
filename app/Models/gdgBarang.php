<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\gdgKodebarang;
use App\Models\gdgExpired;
use Illuminate\Cache\ArrayStore;

class gdgBarang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kodebarang()
    {
        return $this->belongsTo(gdgKodebarang::class);
    }

    // FILTER START

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'LIKE', '%' . $search . '%');
        });

        // $query->when($filters['stok'] ?? false, function ($query, $stok) {
        //     return $query->whereHas('stok', function ($query) use ($stok) {
        //         $query->where('nama', 'LIKE', '%' . $stok . '%');
        //     });
        // });
    }

    // FILTER END
}
