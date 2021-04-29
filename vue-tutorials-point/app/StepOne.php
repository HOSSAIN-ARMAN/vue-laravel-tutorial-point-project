<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepOne extends Model
{
   protected $table = 'step_ones';
   protected $fillable = ['name', 'user_id'];

//   public function belongsTo($related, $foreignKey = null, $ownerKey = null, $relation = null)
//   {
//   }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
