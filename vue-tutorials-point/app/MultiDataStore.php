<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultiDataStore extends Model
{
    public $timestamps = true;
    protected $table = 'multi_data_stores';
    protected $protected = ['name', 'email', 'mobno', 'created_at'];
}
