<?php

if(isset($_POST["sender"])){
    $sender = $_POST["sender"];
    $text = $_POST["body"];
}else{
    /**
    * Test
    */
    $sender = '027777777';
    
}



if($sender == 'KBank'){
    $messageKBANK_01 = '08/01/62 22:59 บชX153594X เงินเข้า500.00บ';
    $messageKBANK_02 = '09/02/62 19:54 บชX153594X รับโอนจากX189776X 500.00บ คงเหลือ9350.00บ';
    kbank($messageKBANK_01);
    
}elseif($sender == '027777777'){
  
    $message = '08/09@10:46 100.00 โอนจากPHUCHONG SONGเข้าx354011 ใช้ได้2,375.46บ';
    scb($message);
    
}elseif($sender == 'Krungthai'){
    
    $message = '11-09-18@02:08 บช X29499X:เงินเข้า +180.00 บ. ใช้ได้ 180.70 บ.';
    ktb($message);
    
}elseif($sender == 'TMBBank'){
    
    $message = 'มีเงิน 100.00บ.เข้าบ/ชxx4484เหลือ 500.00 บ.09/09/18@15:16';
    tmb($message);
}
/**
* KBANK
*/
function kbank($message){
	if( stripos($message , "เงินเข้า")	!= null )
	{
		$text_explode = explode(" ",$message);
        $text_explode_date = explode("/",$text_explode[0]); 	
        $date_day = $text_explode_date[0];			
        $date_mon = $text_explode_date[1];	
        $date_year = $text_explode_date[2]+1957;
        $text_explode_time = explode(":",$text_explode[1]);  
        $time_hour = $text_explode_time[0]; 		
        $time_min = $text_explode_time[1];
		
		$date_format = $date_mon."/".$date_day."/".$date_year;
		$date_strto=strtotime($date_format);
		$cut_word = array(	'เงินเข้า'	=> "" 	,'บ'	=> "" 	,	','	=> "");
        $pay = strtr($text_explode[3],$cut_word);
        
        $data = [
            'date' => $date_format,
            'time' =>  $time_hour.':'. $time_min,
            'total' => $pay
        ];
        print_r($data);
        
    }elseif(stripos($message , "รับโอนจาก")	!= null){
        
        $text_explode = explode(" ",$message);
        $text_explode_date = explode("/",$text_explode[0]); 	
        $date_day = $text_explode_date[0];			
        $date_mon = $text_explode_date[1];	
        $date_year = $text_explode_date[2]+1957;
        $text_explode_time = explode(":",$text_explode[1]);  
        $time_hour = $text_explode_time[0]; 		
        $time_min = $text_explode_time[1];
        
        $date_format = $date_mon."/".$date_day."/".$date_year;
        $date_strto = strtotime($date_format);
        
        $cut_word = array(	'บ'	=> "" 	,	','	=> "");
        $pay = strtr($text_explode[4],$cut_word);
        
        $data = [
            'date' => $date_format,
            'time' =>  $time_hour.':'. $time_min,
            'total' => $pay
        ];
        print_r($data);
        
    }	
}
/**
* SCB
*/
function scb($message){
   
    if( stripos($message , "เข้าx354011")	!= null )
    {

        $date_come_year = date('Y');
        $text_explode = explode(" ",$message);
        
        $text_explode_date_time = explode("@",$text_explode[0]);
        $text_explode_date = explode("/",$text_explode_date_time[0]); 	
        $date_day = $text_explode_date[0];			
        $date_mon = $text_explode_date[1];	
        $date_year = $date_come_year;
        $text_explode_time = explode(":",$text_explode_date_time[1]);  
        $time_hour = $text_explode_time[0]; 		$time_min=$text_explode_time[1];
        
        $date_format = $date_mon."/".$date_day."/".$date_year;
        $date_strto=strtotime($date_format);
        
        $cut_word = array(	'บ'	=> "" 	,	','	=> "");
        $pay = strtr($text_explode[1],$cut_word);
        
        $data = [
            'date' => $date_format,
            'time' =>  $time_hour.':'. $time_min,
            'total' => $pay
        ];
        print_r($data);
    }	
}
/**
* KTB
*/
function ktb($message){
    
}
/**
* TMB
*/
function tmb($message){
    
}
/**
* BBL
*/
function bbl($message){
    
}
/**
* TBANK
*/
function tbank($message){
    
}
