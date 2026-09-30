<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use SoftDeletes, HasFactory;
    /**
     * Convenção
     * Nome da tabela é o plural do nome da classe
     */
    //

    //protected $table = 'generos';

    //Campos que posso preencher por mass assignemt
    protected $fillable = ['name'];

    /**
     * Relação entre Géneros e Filmes 1:n
     * @return HasMany
     */
    public function movies():HasMany
    {
        return $this->hasMany(Movie::class);

    }
}
