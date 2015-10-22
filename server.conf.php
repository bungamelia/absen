<?php

define("_DBHOST_"	,	"localhost"		);
define("_DBUSER_"	,	"root"			);
define("_DBPASS_"	,	""		);
define("_DBNAME_"	,	"absen"	);

define("PBKDF2_HASH_ALGORITHM", "sha256");
define("PBKDF2_ITERATIONS", 1000);
define("PBKDF2_SALT_BYTE_SIZE", 24);
define("PBKDF2_HASH_BYTE_SIZE", 24);

define("HASH_SECTIONS", 4);
define("HASH_ALGORITHM_INDEX", 0);
define("HASH_ITERATION_INDEX", 1);
define("HASH_SALT_INDEX", 2);
define("HASH_PBKDF2_INDEX", 3);


$root 			=  realpath(dirname(__FILE__));
$ds 			=   DIRECTORY_SEPARATOR;
$system 		=	$root.$ds."class";
$addons 		=	$root.$ds."addons"; 
$system_addons	=	$addons.$ds."system"; 
$table_class    =   "table table-bordered table-condensed table-striped table-hover";

function core($class) {
	global $ds;
	global $system;
    $core 	=  $system . $ds . "class_" . $class . '.php';
    if(file_exists($core)):
    	include_once $core;
    else:
    	echo "ERR404CLNF {$core}";
    endif;
}

spl_autoload_register('core');

function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}

function tgl_indo($tgl){
	$tanggal   = substr($tgl,8,2);
	$bulan     = getBulan(substr($tgl,5,2));
	$tahun     = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;
}
function jam($date)
{
    $date =  date_create($date);
    return date_format($date,"H:i:s");
} 

function get_time_difference($time1, $time2) {
    $time1 = strtotime("1980-01-01 $time1");
    $time2 = strtotime("1980-01-01 $time2");
    
    if ($time2 < $time1) {
        $time2 += 86400;
    }
    
    return date("H:i:s", strtotime("1980-01-01 00:00:00") + ($time2 - $time1));
}

function denda($menit)
{
    $dua    = get_time_difference("09:30:00","09:16:00");
    $tiga   = get_time_difference("09:31:00","10:00:00");
    if($menit <= $dua):
        echo "Rp. 20.000";
    elseif($menit > $dua && $menit <= $tiga):
        echo "Rp. 30.000";
    else:
        echo "Rp. 50.000";
    endif;
}

function jamStrip($date)
{
    $date =  date_create($date);
    return date_format($date,"H-i-s");
} 
function tahun($date)
{
    $date =  date_create($date);
    return date_format($date,"Y");
} 
function bulan($date)
{
    $date =  date_create($date);
    return date_format($date,"m");
} 
function tanggal($date)
{
    $date =  date_create($date);
    return date_format($date,"d");
} 

function potoabsen($date)
{
    $date =  date_create($date);
    return date_format($date,"d-m-Y");
} 
function getBulan($bln){ 
	switch ($bln){ 
		case 1: 
			return "Januari"; 
		break;
		case 2: 
			return "Februari"; 
		break;
		case 3: 
			return "Maret"; 
		break;
		case 4: 
			return "April"; 
		break;
		case 5: 
			return "Mei"; 
		break;
		case 6: 
			return "Juni"; 
		break;
		case 7: 
			return "Juli"; 
		break;
		case 8: 
			return "Agustus"; 
		break;
		case 9: 
			return "September"; 
		break;
		case 10: 
			return "Oktober";
		break;
		case 11: 
			return "November"; 
		break;
		case 12: 
			return "Desember"; 
		break;
	}
}


function makeDir($path)
{
        if(!file_exists($path)):
         $ret = mkdir($path,0777, true); // use @mkdir if you want to suppress warnings/errors      
         return $ret === true || is_dir($path);
        endif;
}

function create_hash($password)
{
    // format: algorithm:iterations:salt:hash
    $salt = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM));
    return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" .  $salt . ":" . 
        base64_encode(pbkdf2(
            PBKDF2_HASH_ALGORITHM,
            $password,
            $salt,
            PBKDF2_ITERATIONS,
            PBKDF2_HASH_BYTE_SIZE,
            true
        ));
}

function validate_password($password, $correct_hash)
{
    $params = explode(":", $correct_hash);
    if(count($params) < HASH_SECTIONS)
       return false; 
    $pbkdf2 = base64_decode($params[HASH_PBKDF2_INDEX]);
    return slow_equals(
        $pbkdf2,
        pbkdf2(
            $params[HASH_ALGORITHM_INDEX],
            $password,
            $params[HASH_SALT_INDEX],
            (int)$params[HASH_ITERATION_INDEX],
            strlen($pbkdf2),
            true
        )
    );
}

// Compares two strings $a and $b in length-constant time.
function slow_equals($a, $b)
{
    $diff = strlen($a) ^ strlen($b);
    for($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
    {
        $diff |= ord($a[$i]) ^ ord($b[$i]);
    }
    return $diff === 0; 
}


function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
{
    $algorithm = strtolower($algorithm);
    if(!in_array($algorithm, hash_algos(), true))
        trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
    if($count <= 0 || $key_length <= 0)
        trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

    if (function_exists("hash_pbkdf2")) {
        // The output length is in NIBBLES (4-bits) if $raw_output is false!
        if (!$raw_output) {
            $key_length = $key_length * 2;
        }
        return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
    }

    $hash_length = strlen(hash($algorithm, "", true));
    $block_count = ceil($key_length / $hash_length);

    $output = "";
    for($i = 1; $i <= $block_count; $i++) {
        // $i encoded as 4 bytes, big endian.
        $last = $salt . pack("N", $i);
        // first iteration
        $last = $xorsum = hash_hmac($algorithm, $last, $password, true);
        // perform the other $count - 1 iterations
        for ($j = 1; $j < $count; $j++) {
            $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
        }
        $output .= $xorsum;
    }

    if($raw_output)
        return substr($output, 0, $key_length);
    else
        return bin2hex(substr($output, 0, $key_length));
}

function umur($lahir)
{
$date = new DateTime($lahir);
$now = new DateTime();
$interval = $now->diff($date);
return $interval->y;
}