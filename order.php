<?php
		session_start();

        include "config.php";
                    
        if($conn->connect_error)
        {
            echo "connection_aborted";
        }
        //else echo "success";   
        
        include ("frontend/order.html")
	?>
