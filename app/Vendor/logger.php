<?php
if (!class_exists('File')) {
        uses('file');
}

// The standard logging levels
define("LOG_LEVEL_ALL", 0);
define("LOG_LEVEL_TRACE", 1);
define("LOG_LEVEL_INFO", 2);
define("LOG_LEVEL_WARN", 3);
define("LOG_LEVEL_ERROR", 4);
define("LOG_LEVEL_FATAL", 5);
define("LOG_LEVEL_NONE", 6);
define('MAX_FILE_SIZE_BYTES', 2000000000);
define('MAX_FILE_NUM', 7);


class BrightEdgeLoggerConfiguration {

        static $logLevelStringMapping = array(LOG_LEVEL_TRACE => "TRACE",
                                                  LOG_LEVEL_INFO => "INFO",
                                                                                            LOG_LEVEL_WARN => "WARN",
                                                                                                                                      LOG_LEVEL_ERROR => "ERROR",
                                                                                                                                                                                LOG_LEVEL_FATAL => "FATAL");

            private $log_level = LOG_LEVEL_ERROR;
                static $inst = null;

                    public static function getInstance() {
                                if (self::$inst === null) {
                                                self::$inst = new BrightEdgeLoggerConfiguration();
                                                        }
                                                                return self::$inst;
                                                                    }

                                                                        private function __construct() {
                                                                                    if (defined("ENVIRONMENT") && (ENVIRONMENT=="precollection" || ENVIRONMENT=="pcsscollector" || ENVIRONMENT=="tempcollector"
                                                                                                    || stripos(ENVIRONMENT, "centralcollector") !== FALSE)) {
                                                                                                    $this->log_level = LOG_LEVEL_INFO;
                                                                                                            } else {
                                                                                                                            $this->log_level = LOG_LEVEL_ERROR;
                                                                                                                                    }
                                                                                                                                        }

                                                                                                                                            public function getLogLevel() {
                                                                                                                                                        return $this->log_level;
                                                                                                                                                            }

                                                                                                                                                                public function setLogLevelAll() {
                                                                                                                                                                            $this->setLogLevel(LOG_LEVEL_ALL);
                                                                                                                                                                                }

                                                                                                                                                                                    public function setLogLevelInfo() {
                                                                                                                                                                                                $this->setLogLevel(LOG_LEVEL_INFO);
                                                                                                                                                                                                    }

                                                                                                                                                                                                        public function setLogLevelWarn() {
                                                                                                                                                                                                                    $this->setLogLevel(LOG_LEVEL_WARN);
                                                                                                                                                                                                                        }

                                                                                                                                                                                                                            public function setLogLevel($log_level) {
                                                                                                                                                                                                                                        // print("Changing log level from " . $this->log_level . " to " . $log_level . "\n");
                                                                                                                                                                                                                                                $this->log_level = $log_level;
                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                        /**
                                                                                                                                                                                                                                                             * Get the log level string associated with the numeric logging level
                                                                                                                                                                                                                                                                  *
                                                                                                                                                                                                                                                                       * @param integer $logLevel
                                                                                                                                                                                                                                                                            * @return string
                                                                                                                                                                                                                                                                                 */
                                                                                                                                                                                                                                                                                     public static function getLogLevelString($logLevel) {
                                                                                                                                                                                                                                                                                                 if (isset(self::$logLevelStringMapping[$logLevel])) {
                                                                                                                                                                                                                                                                                                                 return self::$logLevelStringMapping[$logLevel];
                                                                                                                                                                                                                                                                                                                         }
                                                                                                                                                                                                                                                                                                                                 return "UNKNOWN";
                                                                                                                                                                                                                                                                                                                                     }

}

// this global variable is used to determine whether or not to print logging message on the screen
$LOG_ON_SCREEN = FALSE;
$LOG_ON_SCREEN_LEVEL_CHECKING = FALSE;

/**
 * The lowest level logging level function
  *
   * @param string $message
    * @param integer $log_level
     * @param string $category
      */
      function logg($message, $mode="w") {
              global $TMP_DIRECTORY, $LOG_ON_SCREEN;
                  global $LOG_ON_SCREEN_LEVEL_CHECKING;

                      $shouldLogMessage = False;
                          $dateTimeStamp = date("Y-m-d H:i:s");
                              $logMessage = $message;

#echo "comparing " . $log_level . ">=" . BrightEdgeLoggerConfiguration::getInstance()->getLogLevel() . ":" . $message . "\n";
    if (true||$log_level >= BrightEdgeLoggerConfiguration::getInstance()->getLogLevel()) {

                if ($logfilename) {
                                $filename = $logfilename;
                                        } else {
                                                        $filename = LOGS . 'test.log';
                                                                }

                                                                        if (file_exists($filename) && (filesize($filename) > MAX_FILE_SIZE_BYTES) && !preg_match('/_64/', php_uname("m")) && isOSEnvLinux()) {
                                                                                        rotateLogs($filename);
                                                                                                }

                                                                                                        $shouldLogMessage = True;
                                                                                                                $log = new File($filename);
                                                                                                                        if($mode == "w") {
                                                                                                                                        $log->write($logMessage . "\n");
                                                                                                                                                } else {
                                                                                                                                                                $log->append($logMessage . "\n");
                                                                                                                                                                        }
                                                                                                                                                                            }

                                                                                                                                                                                if ($LOG_ON_SCREEN) {
                                                                                                                                                                                            if (!$LOG_ON_SCREEN_LEVEL_CHECKING || ($LOG_ON_SCREEN_LEVEL_CHECKING && $shouldLogMessage)) {
                                                                                                                                                                                                            echo($logMessage . "\n");
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                        }
      }
      function base_message_log($message, $log_level = 3, $category = "General", $logfilename = false) {
              global $TMP_DIRECTORY, $LOG_ON_SCREEN;
                  global $LOG_ON_SCREEN_LEVEL_CHECKING;

                      $shouldLogMessage = False;
                          $dateTimeStamp = date("Y-m-d H:i:s");
                              $logMessage = "$dateTimeStamp " . BrightEdgeLoggerConfiguration::getLogLevelString($log_level) . " $category: $message";

#echo "comparing " . $log_level . ">=" . BrightEdgeLoggerConfiguration::getInstance()->getLogLevel() . ":" . $message . "\n";
    if ($log_level >= BrightEdgeLoggerConfiguration::getInstance()->getLogLevel()) {

                if ($logfilename) {
                                $filename = $logfilename;
                                        } else {
                                                        $filename = LOGS . 'error.log';
                                                                }

                                                                        if (file_exists($filename) && (filesize($filename) > MAX_FILE_SIZE_BYTES) && !preg_match('/_64/', php_uname("m")) && isOSEnvLinux()) {
                                                                                        rotateLogs($filename);
                                                                                                }

                                                                                                        $shouldLogMessage = True;
                                                                                                                $log = new File($filename);
                                                                                                                        $log->append($logMessage . "\n");
                                                                                                                            }

                                                                                                                                if ($LOG_ON_SCREEN) {
                                                                                                                                            if (!$LOG_ON_SCREEN_LEVEL_CHECKING || ($LOG_ON_SCREEN_LEVEL_CHECKING && $shouldLogMessage)) {
                                                                                                                                                            echo($logMessage . "\n");
                                                                                                                                                                    }
                                                                                                                                                                        }
      }

      function pbr_social_signal_message_log($message, $log_level = 3, $category = "General") {
              global $TMP_DIRECTORY, $LOG_ON_SCREEN;
                  global $LOG_ON_SCREEN_LEVEL_CHECKING;

                      $filename = LOGS . 'pbr_social_signal.log';
                          if (file_exists($filename) && (filesize($filename) > MAX_FILE_SIZE_BYTES) && !preg_match('/_64/', php_uname("m")) && isOSEnvLinux()) {
                                      rotateLogs($filename);
                                          }

                                              $log = new File($filename);

                                                  $dateTimeStamp = date("Y-m-d H:i:s");
                                                      $shouldLogMessage = False;
                                                          $logMessage = $dateTimeStamp . ' ' . BrightEdgeLoggerConfiguration::getLogLevelString($log_level) . ' ' . $category . ': ' . $message;

                                                              if ($log_level >= BrightEdgeLoggerConfiguration::getInstance()->getLogLevel()) {
                                                                          $shouldLogMessage = True;
                                                                                  $log->append($logMessage . "\n");
                                                                                      }

                                                                                          if ($LOG_ON_SCREEN) {
                                                                                                      if (!$LOG_ON_SCREEN_LEVEL_CHECKING || ($LOG_ON_SCREEN_LEVEL_CHECKING && $shouldLogMessage)) {
                                                                                                                      echo($logMessage . "\n");
                                                                                                                              }
                                                                                                                                  }
      }

      /**
       * Function to change/rotate log file and rename the main log file, given the name of the main file
        *
         * @param string $mainFileName file name of the main log file
          */
          function rotateLogs($mainFileName) {

                  $checkFile = true;
                      $fileCount = MAX_FILE_NUM;
                          while ($checkFile) {
                                      $newFilename = $mainFileName . '.' . $fileCount;
                                              if (file_exists($newFilename) && $fileCount == MAX_FILE_NUM) {
                                                              unlink($newFilename);
                                                                          $fileCount--;
                                                                                      $checkFile = true;
                                                                                              } elseif (file_exists($newFilename) && $fileCount < MAX_FILE_NUM && $fileCount > 0) {
                                                                                                              rename($mainFileName.'.'.$fileCount, $mainFileName.'.'.($fileCount + 1));
                                                                                                                          $fileCount--;
                                                                                                                                      $checkFile = true;
                                                                                                                                              } elseif (!file_exists($newFilename) && $fileCount <= MAX_FILE_NUM && $fileCount > 0) {
                                                                                                                                                              $fileCount--;
                                                                                                                                                                          $checkFile = true;
                                                                                                                                                                                  } else {
                                                                                                                                                                                                  $checkFile = false;
                                                                                                                                                                                                          }
                                                                                                                                                                                                              }
                                                                                                                                                                                                                  rename($mainFileName, $mainFileName.'.'.($fileCount + 1));
          }

          /**
           * Log a message with TRACE severity.
            *
             * @param string $message content of the log
              * @param string $category category associated with message
               */
               function otrace_log($message, $category = "General") {
                       base_message_log($message, LOG_LEVEL_TRACE, $category);
               }
               /**
                * Log a message to track urls queued for pbr social signal in dailydiff mode
                 *
                  * @param string $message content of the log
                   * @param string $category category associated with message
                    */
                    function pbr_social_signal_log($message, $category = "General") {
                            pbr_social_signal_message_log($message, LOG_LEVEL_INFO, $category);
                    }

                    /**
                     * Log a message with INFO severity.
                      *
                       * @param string $message content of the log
                        * @param string $category category associated with message
                         */
                         function oinfo_log($message, $category = "General") {
                                 base_message_log($message, LOG_LEVEL_INFO, $category);
                         }

                         /**
                          * Log a message with INFO severity.
                           *
                            * @param string $message content of the log
                             * @param object $class is the current object and will print the classname
                              * @param string $category category associated with message
                               */
                               function oinfo_cls_log($message, $class, $category = "General") {
                                       base_message_log($message, LOG_LEVEL_INFO, '[' . get_class($class) . '] ' . $category );
                               }
                               /**
                                * Log a message with WARN severity.
                                 *
                                  * @param string $message content of the log
                                   * @param string $category category associated with message
                                    */
                                    function owarn_log($message, $category = "General") {
                                            base_message_log($message, LOG_LEVEL_WARN, $category);
                                    }

                                    /**
                                     * Log a message with ERROR severity.
                                      *
                                       * @param string $message content of the log
                                        * @param string $category category associated with message
                                         */
                                         function oerror_log($message, $category = "General") {
                                                 base_message_log($message, LOG_LEVEL_ERROR, $category);
                                         }

                                         /**
                                          * Log a message with FATAL severity.
                                           *
                                            * @param string $message content of the log
                                             * @param string $category category associated with message
                                              */
                                              function ofatal_log($message, $category = "General") {
                                                      base_message_log($message, LOG_LEVEL_FATAL, $category);
                                              }


                                              function operf_log($message, $category = "General") {
                                                      base_message_log($message, LOG_LEVEL_INFO, $category, LOGS . 'performance.log');
                                              }

                                              // enable logging of everything
                                              function setToLogAll() {
                                                      BrightEdgeLoggerConfiguration::getInstance()->setLogLevelAll();
                                              }

                                              // enable logging of info and higher
                                              function setToLogInfo() {
                                                      BrightEdgeLoggerConfiguration::getInstance()->setLogLevelInfo();
                                              }

                                              // enable logging of warn and higher
                                              function setToLogWarn() {
                                                      BrightEdgeLoggerConfiguration::getInstance()->setLogLevelWarn();
                                              }

                                              ?>

