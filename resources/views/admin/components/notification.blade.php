<?php
if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
    $mes = isset($_SESSION['success'])
        ? ['title' => 'Thành công', 'text' => $_SESSION['success'], 'icon' => 'success']
        : ['title' => 'Lỗi', 'text' => $_SESSION['error'], 'icon' => 'error'];
    echo "<script>Swal.fire({
            title: '{$mes['title']}',
            text: '{$mes['text']}',
            icon: '{$mes['icon']}'
        });</script>";
    unset($_SESSION['success']);
    unset($_SESSION['error']);
}
