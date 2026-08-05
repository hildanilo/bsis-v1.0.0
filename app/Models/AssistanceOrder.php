<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistanceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'assembly_order_id',
        'store_id',
        'customer_id',
        'fitter_id',
        'status',
        'defeito',
        'solucao',
        'data_atendimento',
    ];

    protected $casts = [
        'data_atendimento' => 'date',
    ];

    public function assemblyOrder()
    {
        return $this->belongsTo(AssemblyOrder::class);
    }

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
}
