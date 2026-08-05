<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'cpf',
        'percentual_comissao',
        'status',
    ];

    protected $casts = [
        'percentual_comissao' => 'decimal:2',
        'status' => 'boolean',
    ];

    public function assemblyOrders()
    {
        return $this->hasMany(AssemblyOrder::class);
    }

    public function closures()
    {
        return $this->hasMany(Closure::class);
    }
}
