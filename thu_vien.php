<?php
$giai_ma = array();
$giai_ma['A'] = 0;
$giai_ma['B'] = 1;
$giai_ma['C'] = 2;
$giai_ma['D'] = 3;
$giai_ma['E'] = 4;
$giai_ma['F'] = 5;
$giai_ma['G'] = 6;
$giai_ma['H'] = 7;
$giai_ma['I'] = 8;
$giai_ma['J'] = 9;
$giai_ma['K'] = 10;
$giai_ma['L'] = 11;
$giai_ma['M'] = 12;
$giai_ma['N'] = 13;
$giai_ma['O'] = 14;
$giai_ma['P'] = 15;
$giai_ma['Q'] = 16;
$giai_ma['R'] = 17;
$giai_ma['S'] = 18;
$giai_ma['T'] = 19;
$giai_ma['U'] = 20;
$giai_ma['V'] = 21;
$giai_ma['W'] = 22;
$giai_ma['X'] = 23;
$giai_ma['Y'] = 24;
$giai_ma['Z'] = 25;
$giai_ma['a'] = 26;
$giai_ma['b'] = 27;
$giai_ma['c'] = 28;
$giai_ma['d'] = 29;
$giai_ma['e'] = 30;
$giai_ma['f'] = 31;
$giai_ma['g'] = 32;
$giai_ma['h'] = 33;
$giai_ma['i'] = 34;
$giai_ma['j'] = 35;
$giai_ma['k'] = 36;
$giai_ma['l'] = 37;
$giai_ma['m'] = 38;
$giai_ma['n'] = 39;
$giai_ma['o'] = 40;
$giai_ma['p'] = 41;
$giai_ma['q'] = 42;
$giai_ma['r'] = 43;
$giai_ma['s'] = 44;
$giai_ma['t'] = 45;
$giai_ma['u'] = 46;
$giai_ma['v'] = 47;
$giai_ma['w'] = 48;
$giai_ma['x'] = 49;
$giai_ma['y'] = 50;
$giai_ma['z'] = 51;
$giai_ma['0'] = 52;
$giai_ma['1'] = 53;
$giai_ma['2'] = 54;
$giai_ma['3'] = 55;
$giai_ma['4'] = 56;
$giai_ma['5'] = 57;
$giai_ma['6'] = 58;
$giai_ma['7'] = 59;
$giai_ma['8'] = 60;
$giai_ma['9'] = 61;
$giai_ma['+'] = 62;
$giai_ma['/'] = 63;

$ma_hoa = array_flip($giai_ma);

function ma_hoa($number)
{
	$string = '';
	while($number != 0)
	{	
		GLOBAL $ma_hoa;
		$tmp = $number % 64;
		$number = ($number - $tmp) / 64;
		$string = $string . $ma_hoa[$tmp];
	}
	return strrev($string);
}

function giai_ma($string)
{
	GLOBAL $giai_ma;
	$number = 0;
	for($i=0; $i<strlen($string); $i++)
	{	
		$mu = strlen($string) - $i - 1;
		$number = $number + $giai_ma[$string[$i]]*pow(64,$mu);
	}
	return $number;
}

$fp = fopen('means.dict', "r");

function font(&$string)
{
	$arr = (explode("\n",trim($string)));
	$mean = '<center><big><b style="color:red;">'.array_shift($arr).'</b></big></center><br><ul>';
	foreach ($arr as $key => $value) {
		if(strpos($value, '+') !== False) $value = str_replace('+','</b> : <b style="color:#0000FF;">',$value).'</b>';
		if($key == count($arr)-1)
		{
			if($value[0] == '*')
			{
				$tmp = substr($value,1);
				$mean = $mean.'<li><b style="color:#222222;">'.$tmp.'</b></li>';
			}
			elseif($value[0] == '!')
			{
				$tmp = substr($value,1);
				$mean = $mean.'<li><b style="color:#222222;">'.$tmp.'</b></li>';
			}
			elseif($value[0] == '-')
			{
				$tmp = substr($value,1);
				$mean = $mean.'<li><b>'.$tmp.'</b></li></ul></li>';
			}
			else
			{
				$tmp = substr($value,1);
				$mean = $mean.'<li><b style="color:#660066;">'.$tmp.'</b></li></ul></li></ul></li>';
			}
		}
		else
		{
			if($value[0] == '*')
			{
				if($arr[$key+1][0] == '!')
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b style="color:#222222;">'.$tmp.'</b></li>';
				}
				if($arr[$key+1][0] == '-')
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b style="color:#222222;">'.$tmp.'</b><ul>';
				}
				else
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b style="color:#222222;">'.$tmp.'</b></li>';
				}
			}
			elseif($value[0] == '!')
			{
				if($arr[$key+1][0] == '*')
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b style="color:#FF6600;">'.$tmp.'</b></li>';
				}
				if($arr[$key+1][0] == '-')
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b style="color:#FF6600;">'.$tmp.'</b><ul>';
				}
				else
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b style="color:#FF6600;">'.$tmp.'</b></li>';
				}
			}
			elseif($value[0] == '-')
			{
				if($arr[$key+1][0] == '*' || $arr[$key+1][0] == '!')
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b>'.$tmp.'</b></li></ul></li>';
				}
				elseif($arr[$key+1][0] == '=')
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b>'.$tmp.'</b><ul>';
				}
				else
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b>'.$tmp.'</b></li>';
				}
			}
			elseif($value[0] == '=')
			{
				if($arr[$key+1][0] == '*' || $arr[$key+1][0] == '!')
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b style="color:#660066;">'.$tmp.'</b></li></ul></li></ul></li>';
				}
				elseif($arr[$key+1][0] == '-')
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b style="color:#660066;">'.$tmp.'</b></li></ul></li>';
				}
				else
				{
					$tmp = substr($value,1);
					$mean = $mean.'<li><b style="color:#660066;">'.$tmp.'</b></li>';
				}
			}
		}
	}
	$mean = $mean.'</ul>';
	return $mean;
}

function get_mean($str_start, $str_end)
{	
	GLOBAL $fp;
	$start = giai_ma($str_start);
	$end = giai_ma($str_end);
	fseek($fp, $start);
	$mean = '';
	while(ftell($fp)<$end - 1)
	{
		$mean = $mean.fgets($fp);
	}
	return font($mean);
}

function make_index_file()
{
	GLOBAL $fp;
	$write = @fopen('vendor\jquery\autocomplete.js', "w+");
	$words = array();
	$start_point = array();
	$index = array();
	$pointer = array();

	//Từ điển giao tiếp
	while(!feof($fp) && ftell($fp)<10903182)
	{
		if(fgetc($fp) == '@')
		{
			$poi = ftell($fp);
			$start_point[] = $poi;
			fseek($fp, $poi);
			$string = fgets($fp);
			$pos = strpos($string, '/');
			if($pos !== False)
			{
				$word = substr($string, 0, $pos);
			}
			$words[] = trim($word);
		}
	}

	//Từ điển chuyên ngành
	fseek($fp, 10903182);
	while(!feof($fp))
	{
		if(fgetc($fp) == '@')
		{	
			$poi = ftell($fp);
			$start_point[] = $poi;
			fseek($fp, $poi);
			$word = fgets($fp);
			$words[] = trim($word);
		}
	}

	$end_point = $start_point;
	unset($end_point[0]);
	$end_point[] = filesize('means.dict');
	
	class index
	{
    	public $start;
    	public $end;
	}

	foreach ($words as $key => $value) {
		$tmp = new index();
		$tmp->start = ma_hoa($start_point[$key]);
		$tmp->end = ma_hoa($end_point[$key+1]);
		$pointer[$value] = $tmp;
	}

	ksort($pointer);

	//return $pointer;

	fwrite($write, 'var words = [');
	$i=0;
	foreach ($pointer as $key => $value) {
		if(strlen($key) == 1)
		{
			echo $i.': '.$key.'<br>';
		}
		$data = '["'.$key.'", "'.$value->start.'", "'.$value->end.'"], ';
		fwrite($write, $data);
		$i++;
	}
	echo $i-1;
	fseek($write, ftell($write)-2);
	fwrite($write, '];');
	echo '<hr><center><h1>DONE</h1></center>';
}

function is_alpha($string)
{
	$bool = True;
	for($i=0; $i<strlen($string); $i++)
	{
		if(IntlChar::isalpha($string[$i]) !== True && IntlChar::isblank($string[$i]) !== True)
		{
			$bool = False;
		}
	}
	return $bool;
}

/*$poi = make_index_file();
$file = @fopen('D:\file.txt', 'w+');
$i = 0;
foreach ($poi as $key => $value) {
	if(strpos($key, '/') !== False)
	{
		$key = str_replace('/', ',', $key);
		echo "$i: ".$key.'<br>';
	}
	
	fwrite($file, $key."\n");
	$i++;
}*/
//make_index_file();

?>