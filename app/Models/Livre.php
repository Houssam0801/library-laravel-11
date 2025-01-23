<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomlivre','nomauteur','description','date_pub','categorie_id'
    ];
}
