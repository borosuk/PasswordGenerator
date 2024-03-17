<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Password Generator</title>
    <meta name="description" content="A simple password generator.">
    <meta name="author" content="FAB">
    
    <meta property="og:title" content="Password Generator">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://boros.uk/pwdgen/">
    <meta property="og:description" content="A simple password generator.">
    <meta property="og:image" content="image.png">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        input[type="checkbox"] { 
            transform: scale(1.2); 
        }
    </style> 
</head>
<body>
    <div class="container col-6 pt-3">
        <div class="container mt-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <h5 class="text-center mb-3">Customize your password</h5>
                    </div>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label" for="length">Password Length: <span id="lengthValue"><?php echo isset($_POST['length']) ? $_POST['length'] : '12'; ?></span></label>
                                                                    <input class="form-range h-75 p-3" type="range" id="length" name="length" min="4" max="32" value="<?php echo isset($_POST['length']) ? $_POST['length'] : '12'; ?>" oninput="document.getElementById('lengthValue').textContent = this.value;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <div class="card shadow-sm">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="uppercase" name="uppercase" <?php echo allUnchecked() ? 'checked' : (isset($_POST['uppercase']) ? 'checked' : ''); ?>>
                                                                        <label class="form-check-label" for="uppercase">Include Uppercase Letters</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="lowercase" name="lowercase" <?php echo allUnchecked() ? 'checked' : (isset($_POST['lowercase']) ? 'checked' : ''); ?>>
                                                                        <label class="form-check-label" for="lowercase">Include Lowercase Letters</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="numbers" name="numbers" <?php echo allUnchecked() ? 'checked' : (isset($_POST['numbers']) ? 'checked' : ''); ?>>
                                                                        <label class="form-check-label" for="numbers">Include Numbers</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="symbols" name="symbols" <?php echo allUnchecked() ? 'checked' : (isset($_POST['symbols']) ? 'checked' : ''); ?>>
                                                                        <label class="form-check-label" for="symbols">Include Symbols</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col"></div>
                            <div class="col-md-8">
                                <div class="card shadow-sm rounded-pill">
                                    <div class="card-body bg-success text-white rounded-pill">
                                        <div class="text-center">
                                            <?php
                                                $password = getPassword();
                                                echo $password
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="text-center">
                                <button class="btn btn-primary me-md-2" type="button" name="copy" onclick="copyToClipboard('<?php echo $password ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                                    </svg>
                                    Copy Password
                                </button>
                                <button class="btn btn-primary ms-md-2" type="submit" name="generate">
                                    Generate Password
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
    ?>

    <script>
        async function copyToClipboard(password) {
           	try {
        		await navigator.clipboard.writeText(password);
        	} catch (e) {
        		alert(e);
        	}
        }
    </script>
</body>
</html>