<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepThree extends Model
{
    protected $table = 'step_threes';
    protected $fillable = ['details'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
