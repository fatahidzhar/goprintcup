<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory;

	protected $table = 'transaksis';
	
	protected $fillable = [
        'invoice',
    	'id_transaksi',
		'id_customer',
		'image',
        'vendor',
    ];

    public static function kode()
    {
    	$kode = DB::table('transaksis')->max('invoice');
    	$addNol = '';
    	$kode = str_replace("INV/", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;
		$addDate = date('/dmY');

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "INV/".$addNol.$incrementKode.$addDate;
    	return $kodeBaru;
    }

	public static function kode_t()
    {
    	$kode = DB::table('transaksis')->max('id_transaksi');
    	$addNol = '';
    	$kode = str_replace("T", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "T".$addNol.$incrementKode;
    	return $kodeBaru;
    }
}
