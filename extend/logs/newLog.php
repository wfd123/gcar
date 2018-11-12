<?php
namespace logs;
class newLog {
  private $handle;
  private $time;
 //avr log类型
 public function __construct($filename=''){
   //global $log_config;  缓存文件路径
   $this->time = $this->microtime_float();
   $todaystr=date('Ymd');
   //$logpath="/www/bsc/bwtest/buylog/";
  if(empty($filename)){
    $logpath=__DIR__."cache/";
    $filename="buylog_".$todaystr.".txt";
  }else{
   $logpath=__DIR__."cache/".$filename."/";
   $filename.=$todaystr.".txt";
  }
  if (!file_exists($logpath)){
   mkdir ($logpath,0777,true);
  }
   //$handle = fopen($logpath."buylog_".$todaystr.".txt", "a+");
   $handle = fopen($logpath.$filename, "a+");
   $this->handle=$handle;
   $this->write_log("-----记录开始----");
 }
 public function __destruct(){
  $use_time = ($this-> microtime_float())-($this->time);
  $this->write_log("-----记录完成,所需时间".$use_time."-----");
  fclose($this->handle);
 }
 public function reclog($msg){
  $this->write_log($msg);
 }
 public function write_log($msg=''){
  $text = $_SERVER["REMOTE_ADDR"]."::".date("Y-m-d H:i:s")." ".$msg."\r\n";
  fwrite($this->handle,$text);
 }
 public function microtime_float(){
  list($usec, $sec) = explode(" ", microtime());
  return ((float)$usec + (float)$sec);
 }
}