<?php
namespace App\Facade;
use Illuminate\Support\Facades\Facade;

class SearchByName extends Facade {

  protected static function getFacadeAccessor () {
    return 'searchByName';
  }
}

 ?>
