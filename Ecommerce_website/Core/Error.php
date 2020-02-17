<?php
namespace Core;
use Core\View;
class Error{

	public static function errorHandler($level,$message,$file,$line){
		if (error_reporting() != 0 ) {
			throw new \ErrorException($message,0,$level,$file,$line);
		}
	}

		// echo "\App\Config::SHOW_ERRORS";
		public static function exceptionHandler($Exception){
			// echo "<hr>";
			// echo \App\Config::SHOW_ERRORS;
				
			$code = $Exception->getCode();
			if ($code != 404) {
					$code = 500;
			}
			http_response_code($code);

			if (\App\Config::SHOW_ERRORS) {
				echo "<h1>Fatal Error</h1>";
				echo "<p>Uncaught Exception :'". get_class($Exception)."'</p>";
				echo "<p>Message : '".$Exception->getMessage()."'</p>";
				echo "<p>Get Strace : '".$Exception->getTraceAsString()."'</p>";
				echo "<p>Thrown in :'" .$Exception->getFile()."'	 on line ".$Exception->getLine()."</p>";

			}
			else{

				echo $log = dirname(__DIR__). "/logs/" .date('Y-m-d'). ".txt";
				ini_set('error_log', $log);

				$message = "Fatal Error<";
				$message .= "\nUncaught Exception :'". get_class($Exception);
				$message .= "\nMessage : '".$Exception->getMessage()."'";
				$message .= "\nGet Strace : '".$Exception->getTraceAsString()."'";
				$message .= "\nThrown in :'" .$Exception->getFile()."'	 on line ".$Exception->getLine()."";
				$message .="\n--------------------------";
				error_log($message);


				// if ($code == 404) {
				// 	echo "<h3>Page not Found</h3>";
				// }
				// else{
				// 	echo "<h3>An Error occured</h3>";
				// }
				View::renderTemplate("Posts/$code.html");

				// View::renderTemplate('Posts/400.html');
		
			}
			
		}
}

?>