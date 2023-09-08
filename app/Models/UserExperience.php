<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserExperience extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'title',
        'company',
        'description',
        'start_date',
        'end_date'
    ];

    public function user(){
    return $this->belongsTo(User::class, 'id');}


}
