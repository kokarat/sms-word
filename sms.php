<?php

$messageKBANK_01 = '08/09/61 22:59 บชX153594X เงินเข้า500.00บ';
$messageKBANK_02 = '09/09/61 19:54 บชX153594X รับโอนจากX189776X 500.00บ คงเหลือ9350.00บ';
kbank($messageKBANK_01);

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
            $date_day=$text_explode_date[0];			
            $date_mon=$text_explode_date[1];	
            $date_year=$text_explode_date[2]+1957;
            $text_explode_time = explode(":",$text_explode[1]);  
            $time_hour=$text_explode_time[0]; 		
            $time_min=$text_explode_time[1];
            
            $date_format = $date_mon."/".$date_day."/".$date_year;
            $date_strto=strtotime($date_format);
            
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
    