<?php  
    function allUnchecked(){
        return !isset($_POST['uppercase']) && !isset($_POST['lowercase']) && !isset($_POST['numbers']) && !isset($_POST['symbols']);
    }
    
    function isAnyChecked(){
        return isset($_POST['uppercase']) || isset($_POST['lowercase']) || isset($_POST['numbers']) || isset($_POST['symbols']);
    }
    
    function getPassword(){
        if (isAnyChecked()) {
            $uppercase = isset($_POST['uppercase']);
            $lowercase = isset($_POST['lowercase']);
            $numbers = isset($_POST['numbers']);
            $symbols = isset($_POST['symbols']);
        } else {
            // If no checkbox is checked, then is all true
            $uppercase = true;
            $lowercase = true;
            $numbers = true;
            $symbols = true;
        }
        
        $_POST['length'] = isset($_POST['length']) ? $_POST['length'] : 12;
        $length = $_POST['length'];
        
        return generatePassword($length, $uppercase, $lowercase, $numbers, $symbols);
    }
    
    function generatePassword($length, $uppercase, $lowercase, $numbers, $symbols) {
        // Define character sets based on checkbox values
        $uppercase_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase_chars = 'abcdefghijklmnopqrstuvwxyz';
        $digits = '0123456789';
        $special_chars = '!@#$%^&*()-_=+';

        $chars = '';

        if ($uppercase) $chars .= $uppercase_chars;
        if ($lowercase) $chars .= $lowercase_chars;
        if ($numbers) $chars .= $digits;
        if ($symbols) $chars .= $special_chars;

        // Get the number of characters in the character set
        $char_length = strlen($chars);

        // Initialize the password variable
        $password = '';

        // Generate random characters to form the password
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[mt_rand(0, $char_length - 1)];
        }

        return $password;
    }
    
    // Check if a function name is provided in the query string
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if (function_exists($action)) {
            // If the function exists, call it with the provided parameter
            $param = isset($_GET['param']) ? $_GET['param'] : '';
            echo $action($param);
        } else {
            echo "Invalid action specified.";
        }
    } else {
        echo "No action specified.";
    }
?>