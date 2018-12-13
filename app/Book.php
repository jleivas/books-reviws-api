<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['user_id', 'title', 'description'];
    /**
     * relación usuario-libro
     */
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    /**
     * un libro puede ser calificado por varios usuarios, por lo tanto, 
     * un libro puede tener muchas calificaciones. Una calificación 
     * solo puede pertenecer a un libro. Esta es también una one-to-many relación
     */
    public function ratings()
    {
      return $this->hasMany(Rating::class);
    }
}
