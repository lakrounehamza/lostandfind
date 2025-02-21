<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $fillable = [
        "titre",
        "type",
        "description",
        "photo",
        "date_found",
        "lieu",
        "categorie",
        "id_auteur"
    ];
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_annonce');
    }
    public function user()
{
    return $this->belongsTo(User::class, 'id_auteur');
}
}
