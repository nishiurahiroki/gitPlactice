<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dao extends Model
{
    protected $connection = 'drinkmachine';
    
    protected $table = 'test';
}
