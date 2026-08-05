<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cidade',
        'endereco',
        'telefone',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function users()
    {
        return $table = $this->hasMany(User::class, 'loja_id');
    }

    public function assemblyOrders()
    {
        return $this->hasMany(AssemblyOrder::class);
    }

    public function assistanceOrders()
    {
        return $this->hasMany(AssistanceOrder::class);
    }
}
