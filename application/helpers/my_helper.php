<?php

function limit($x, $length){
  if(strlen($x)<=$length){
    echo $x;
  }else {
    $y=substr($x,0,$length).'...';
    echo $y;
  }
}

function view_date($date, $with_time=NULL, $as_month=NULL, $with_day=null){
  $month = array (1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

  if($date=='' || $date==null || $date=='0000-00-00' || $date=='0000-00-00 00:00:00'){
    return '-';
  }else{
    $split = explode('-', $date);
    $segment_date=explode(' ', $split[2]);
    $month_regional = $month[ (int)$split[1] ];
    // $day_regional = ucwords(lang(strtolower(date('l', strtotime($date)))));

    if(count($segment_date)>1){
      if($with_time==true){
        $time=' '.$segment_date[1];
      }else{
        $time='';
      }

      if($with_day==true){
        $view_date=$day_regional.', '.$segment_date[0] . ' ' . $month_regional . ' ' . $split[0].$time;
      }else{
        $view_date=$segment_date[0] . ' ' . $month_regional . ' ' . $split[0].$time;
      }
    }else{
      if($with_day==true){
        $view_date=$day_regional.', '.$split[2] . ' ' . $month_regional . ' ' . $split[0];
      }else{
        $view_date=$split[2] . ' ' . $month_regional . ' ' . $split[0];
      }
    }
    return $view_date;
  }
}

function view_nip($nip){
  $nip1 = substr($nip,0,8);
  $nip2 = substr($nip,8,6);
  $nip3 = substr($nip,14,1);
  $nip4 = substr($nip,15,3);

  return $nip1.' '.$nip2.' '.$nip3.' '.$nip4;
}

// function view_date($tanggal){
// 	$bulan = array (
// 		1 =>   'Januari',
// 		'Februari',
// 		'Maret',
// 		'April',
// 		'Mei',
// 		'Juni',
// 		'Juli',
// 		'Agustus',
// 		'September',
// 		'Oktober',
// 		'November',
// 		'Desember'
// 	);
// 	$pecahkan = explode('-', $tanggal);
//
// 	// variabel pecahkan 0 = tanggal
// 	// variabel pecahkan 1 = bulan
// 	// variabel pecahkan 2 = tahun
// 	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
// }
?>
