<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recording extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', // -1 отменено, 0 в ожидании, 1 выполняется, 2 выполнено
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
