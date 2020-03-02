<?php
class MyLogger 
{
    public string $origin;

    public function __construct() {
        $this->origin = "";
    }

    private function logWithTime($message) {
        return date('[Y-m-d H:i] ') . $message;
    }

    public function warning($message) {
        echo $this->logWithTime($this->origin . 'WARNING: ' . $message . PHP_EOL);
    }	

    public function error($message) {
        echo $this->logWithTime($this->origin . 'ERROR: ' . $message . PHP_EOL);
    }

    public function debug($message) {
        echo $this->logWithTime($this->origin . 'DEBUG: ' . $message . PHP_EOL);
    }

    public function info($message) {
        echo $this->logWithTime($this->origin . 'INFO: ' . $message . PHP_EOL);
    }

    public function log($message, $loglevel = "") {
        switch ($loglevel) {
            case 'WARNING':
                $this->warning($message);
                break;
            case 'ERROR':
                $this->error($message);
                break;
            case 'DEBUG':
                $this->debug($message);
                break;
            case 'INFO':
                $this->info($message);
                break;
            default:
                echo $message;
                break;
        }
    }
    
    public function setOrigin($orig) {
        $this->origin = $orig . ' - ';
    }
}

$logger = new MyLogger();
$logger->setOrigin('TestClass');
$logger->error('dit is een error');
?>
