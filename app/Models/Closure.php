<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closure extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'fitter_id',
        'periodo_inicio',
        'periodo_fim',
        'valor_total',
        'status',
    ];

    protected $casts = [
        'periodo_inicio' => 'date',
        'periodo_fim' => 'date',
        'valor_total' => 'decimal:2',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function fitter()
    {
        return $this->belongsTo(Fitter::class);
    }

    public function assemblyOrders()
    {
        return $this->hasMany(AssemblyOrder::class);
    }
}
