<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'menu';

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
