<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class Update extends Facade {
	protected static function getFacadeAccessor() {
		return 'update';
	}
}
