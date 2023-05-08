<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image_path', 'api_id'];


    /**
     * A country has many players
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Player::class);
    }
}
