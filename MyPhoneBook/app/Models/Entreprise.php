<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $table = 'entreprises';

    protected $fillable = [
        'nom',
        'rue',
        'code_postal',
        'ville',
        'telephone',
        'email',
    ];

    public function collaborateurs()
    {
        return $this->hasMany('App\Models\Collaborateur', 'entreprise', 'nom');
    }
}
