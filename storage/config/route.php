<?php 
function route($routerName, $params = []) {
    $path = $routerName;
    //thay thế tham số trong routerName
    foreach($params as $key => $value) {
        $path = str_replace("{".$key."}", htmlspecialchars($value, ENT_QUOTES, 'UTF-8'), $path);
    }

    //xác định kịch bản của path
    $scriptPath = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

    //tạo URL hoàn chỉnh
    return $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$scriptPath.$path;
}
?>