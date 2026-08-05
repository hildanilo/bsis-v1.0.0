<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf_cnpj',
        'telefone',
        'celular',
        'email',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'cep',
    ];

    public function assemblyOrders()
    {
        return $this->hasMany(AssemblyOrder::class);
    }

    public function assistanceOrders()
    {
        return $this->hasMany(AssistanceOrder::class);
    }
}
