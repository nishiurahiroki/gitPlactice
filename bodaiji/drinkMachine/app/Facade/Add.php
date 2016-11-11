<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class Add extends Facade
{
    protected static function getFacadeAccessor() {
    	return 'insertItem'; 
    }
}