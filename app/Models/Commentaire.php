<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = [
        "content",
    ];

public function annonce()
{
    return $this->belongsTo(Annonce::class, 'id_annonce');
}
public function user()
{
    return $this->belongsTo(User::class, 'id_auteur');
}
}
