<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssemblyOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_controle',
        'store_id',
        'customer_id',
        'fitter_id',
        'user_id',
        'closure_id',
        'status',
        'data_montagem',
        'valor_total',
        'observacoes',
    ];

    protected $casts = [
        'data_montagem' => 'date',
        'valor_total' => 'decimal:2',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function fitter()
    {
        return $this->belongsTo(Fitter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function closure()
    {
        return $this->belongsTo(Closure::class);
    }

    public function items()
    {
        return $this->hasMany(AssemblyOrderItem::class);
    }

    public function assistanceOrders()
    {
        return $this->hasMany(AssistanceOrder::class);
    }
}
