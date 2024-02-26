<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'dob',
        'marital_status',
        'approval_status',
        'created_by',
        'updated_by',
        'created_on',
        'updated_on'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
