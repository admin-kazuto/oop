    <?php
    function notification($key, $message, $router)
    {
        $_SESSION[$key] = $message;
        switch ($key) {
            case 'success':
                unset($_SESSION['error']);
                break;
            case 'error':
                unset($_SESSION['success']);
                break;
        }
        header('location:' . route($router) . '?message=' . $key);
        die;
    }
    ?>