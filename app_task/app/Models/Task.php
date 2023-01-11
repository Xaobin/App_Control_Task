<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory; 
    protected $fillable = ['task', 'date_limit_conclusion', 'user_id'];

    public function user() {
        //belongsTo (pertence a)
        return $this->belongsTo('App\Models\User');
    }
}
