<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customlib
{
	public function __construct()
	{
		$this->CI =& get_instance();
	}
    
    function format_date_indonesia($date){
		$date = DateTime::createFromFormat('Y-m-d H:i:s', $date);
		$bulan = array ('Jan'=>'Januari', // array bulan konversi
			'Feb'=>'Februari',
			'Mar'=>'Maret',
			'Apr'=>'April',
			'May'=>'Mei',
			'Jun'=>'Juni',
			'Jul'=>'Juli',
			'Aug'=>'Agustus',
			'Sep'=>'September',
			'Oct'=>'Oktober',
			'Nov'=>'November',
			'Dec'=>'Desember'
		);
		$newdate =  $date->format('d').' '.$bulan[$date->format('M')].' '.$date->format('Y');
		return $newdate;
    }
}