<?php

/**
 * 
 */
class view
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public static function send_message($message, $type)
	{
        echo '<script>UIkit.notification({message: "' . $message . '", status: "' . $type . '"})</script>';
	}
}