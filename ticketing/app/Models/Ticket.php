<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tickets';

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'client_id',
        'status_id',
        'closed_at'
    ];


    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }


}
