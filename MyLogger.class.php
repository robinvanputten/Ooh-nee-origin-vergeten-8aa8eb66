<?php
class MyLogger
{
    private string $_origin;

    public function __construct($origin = '') {
        $this->_origin = $origin;
    }

    private function logWithTime($message) {
        return date('[Y-m-d H:i] ') . $message;
    }

    public function warning($message) {
        echo $this->logWithTime($this->displayOrigin() . 'WARNING: ' . $message . PHP_EOL);
    }

    public function error($message) {
        echo $this->logWithTime($this->displayOrigin() . 'ERROR: ' . $message . PHP_EOL);
    }

    public function debug($message) {
        echo $this->logWithTime($this->displayOrigin() . 'DEBUG: ' . $message . PHP_EOL);
    }

    public function info($message) {
        echo $this->logWithTime($this->displayOrigin() . 'INFO: ' . $message . PHP_EOL);
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
        $this->_origin = $orig;
    }

    public function displayOrigin() {
        if ($this->_origin) {
            return $this->_origin . ' - ';
        }
    }
}

$logger = new MyLogger('test');
$logger->error('dit is een error');
?>
