<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'name',
        'good_answer',
        'false_answer1',
        'false_answer2',
        'false_answer3',
        'mode_id',
    ];

    public function mode()
    {
        return $this->belongsTo(Mode::class);
    }
}
