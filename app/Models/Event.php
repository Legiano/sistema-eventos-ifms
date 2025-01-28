<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    // Campos que podem ser atribuídos em massa
    protected $fillable = [
        'title',        // Nome do evento
        'date',         // Data do evento
        'city',         // Cidade do evento
        'private',      // Privacidade do evento (0 ou 1)
        'description',  // Descrição do evento
        'items',        // Itens relacionados ao evento
        'image',        // Imagem do evento
        'address'       // Endereço do Evento
    ];

    // Casting dos atributos
    protected $casts = [
        'items' => 'array',      // Converte "items" para array
        'date' => 'datetime',    // Converte "date" para uma instância de Carbon
    ];

    /**
     * Relacionamento com o modelo User
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function users(){
        return $this->BelongsToMany('App\Models\User');
    }
}
