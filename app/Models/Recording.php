<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recording extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'comment_customer',
        'comment_admin',
        'date_recording',
        'user_id',
        'store_id'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
