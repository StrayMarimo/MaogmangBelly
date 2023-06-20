<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mails extends Model
{
    use HasFactory;
    protected $table = 'subscribed_to_newsletter';

    public function scopeHasEmail($query, $email)
    {
        return $query->where('email', '=', $email)->exists();
    }
}
