<?php
    session_start();
    if(!isset($_SESSION['name']) || !isset($_SESSION['cart']))
    {
      die('Direct access not permitted');
    }
		

        include "config.php";
                    
        if($conn->connect_error)
        {
            echo "connection_aborted";
        }
        //else echo "success";   
        
        include ("frontend/order.html")
	?>
