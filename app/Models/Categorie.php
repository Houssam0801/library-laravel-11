<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomcategorie',
        'description',
    ];
    
    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
}
