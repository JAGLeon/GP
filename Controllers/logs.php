<?php 
class Logs{
    function setLog($serv,$smg){
        $file=$this->getName($serv);
        $flog=fopen($file,'a');
        $date=date("[H:i:s]");
        $texto=$date."[$smg] \r\n";
        fwrite($flog,$texto);
        fclose($flog);
    }

    function getName($srv){
        $filename= $srv.'_'.date('Ymd').'log';
        $pathname=str_replace('controller','',dirname(__FILE__)).'logs/';
        $file=$pathname.$filename;
        if(! file_exists($pathname)){
            mkdir($pathname,0755);
        }
        return $file;
    }

}

?>