<?php
namespace App;

use DB;

class InsertItem
{
	public function insertItem($data)
	{
		$create = DB::table('emp')->insert($data);
	}
}
?>