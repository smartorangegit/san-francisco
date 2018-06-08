<?php
class SitemapLog 
{
  const TYPE_MSG = 0;
  const TYPE_WARN = 1;
  const TYPE_ERR  = 2;

  function message($message)
  {
    $this->log($message);
  }

  function warning($message)
  {
    $this->log($message,self::TYPE_WARN);
  }

  function error($message)
  {
    $this->log($message,self::TYPE_ERR);
  }

  function addLog($message)
  {
    $format = "\n[" . date('Y-m-d H:i:s') . "]";

	$path = $_SERVER['DOCUMENT_ROOT']."/log/sitemapGenerated.log";
	
	file_put_contents($path, $format."\n".$message,FILE_APPEND);
  }
  

  
  function log($message, $type = self::TYPE_MSG)
  {
     switch($type)
     {
       case self::TYPE_MSG:
        // echo $message.PHP_EOL;
		$this->addLog($message.PHP_EOL);
       break;

       case self::TYPE_WARN:
        // echo "WARNING: $message".PHP_EOL;
		$this->addLog("WARNING: $message".PHP_EOL);
       break;

       case self::TYPE_ERR:
        // echo "ERROR: $message".PHP_EOL;
		$this->addLog("ERROR: $message".PHP_EOL);
         throw new Exception($message);
       break;
     }
  }
}
