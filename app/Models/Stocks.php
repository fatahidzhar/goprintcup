<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stocks extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    protected $fillable = [
        'id_product',
    	'id_category',
        'id_size',
        'name_product',
        'image',
        'selling_price',
        'price_income',
        'total_price',
        'qty'
    ];

    public static function kode()
    {
    	$kode = DB::table('stocks')->max('id_product');
    	$addNol = '';
    	$kode = str_replace("SP", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "SP".$addNol.$incrementKode;
    	return $kodeBaru;
    }
}
