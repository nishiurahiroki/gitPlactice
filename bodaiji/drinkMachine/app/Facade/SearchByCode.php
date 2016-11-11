<?php
namespace App\Facade;
use Illuminate\Support\Facades\Facade;

class SearchByCode extends Facade {

	protected static function getFacadeAccessor() {
		return 'searchByCode';
	}

}
