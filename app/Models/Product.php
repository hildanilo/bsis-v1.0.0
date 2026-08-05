<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descricao',
        'valor_padrao',
        'cor',
    ];

    protected $casts = [
        'valor_padrao' => 'decimal:2',
    ];

    public function orderItems()
    {
        return $this->hasMany(AssemblyOrderItem::class);
    }
}
