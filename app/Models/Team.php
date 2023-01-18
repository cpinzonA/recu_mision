<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'average',
        'sport_id',
        'trainer_id'
    ];
    public function trainers()
    {
        return $this->belongsTo(Trainer::class);
    }
    public function players()
    {
        return $this->hasMany(Player::class);
    }
    public function sports()
    {
        return $this->belongsTo(Sport::class);
    }
}
