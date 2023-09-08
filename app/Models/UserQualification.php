<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserQualification extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'title',
        'org_qualification',
        'date',
        'attachment'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    
}
