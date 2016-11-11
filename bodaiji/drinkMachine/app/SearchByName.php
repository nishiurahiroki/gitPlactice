<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class SearchByName extends Model
{
  public function searchByName ($name) {
    $result = DB::table('emp')->where('Item_NM', $name)->count();
    return $result;
  }
}
