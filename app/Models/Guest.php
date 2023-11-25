<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $table = "guest";
    protected $fillable = [
        "id_guest",
        "name_guest",
        "address_guest",
        "email_guest",
        "phone_guest",
        "information_guest",
    ];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class, 'id_guest', 'id_guest');
    }


}
