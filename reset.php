<?php
// Start the session
session_start();

// Destroy all session variables
session_destroy();  

// Echo a message
echo "All session variables are deleted.";
?>