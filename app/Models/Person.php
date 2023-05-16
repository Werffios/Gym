<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Person extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'name', 'last_name', 'document' ];


    // Relation to User, one-to-one inverse
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    function curriculum() : BelongsTo
    {
        return $this->belongsTo(Curriculum::class);
    }
}
