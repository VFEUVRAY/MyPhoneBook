<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{
    use HasFactory;

    protected $table = 'collaborateurs';

    protected $fillable = [
        'civilite',
        'nom',
        'prenom',
        'code_postal',
        'ville',
        'telephone',
        'email',
        'entreprise',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Entreprise', 'entreprise', 'nom');
    }
}
