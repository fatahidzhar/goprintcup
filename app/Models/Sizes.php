<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sizes extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id_size',
		'id_category',
		'image',
        'name_size'
    ];

    public static function kode()
    {
    	$kode = DB::table('sizes')->max('id_size');
    	$addNol = '';
    	$kode = str_replace("S", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "S".$addNol.$incrementKode;
    	return $kodeBaru;
    }
}
