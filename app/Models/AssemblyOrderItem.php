<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssemblyOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'assembly_order_id',
        'product_id',
        'descricao',
        'quantidade',
        'valor_unitario',
        'cor',
    ];

    protected $casts = [
        'quantidade' => 'integer',
        'valor_unitario' => 'decimal:2',
    ];

    public function assemblyOrder()
    {
        return $this->belongsTo(AssemblyOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
