<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepTwo extends Model
{
    protected $table = 'step_twos';
    protected $fillable = ['email', 'phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
