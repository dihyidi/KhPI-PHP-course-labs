<?php
session_start();
if (isset($_SESSION['data_cache'], $_SESSION['cached_time'])) {
    $age = time() - $_SESSION['cached_time'];

    if ($age < 60) {
        echo '<p><b>From cache:</b></p>';
        echo $_SESSION['data_cache'];
        exit;
    }
}

$data = '<ul>';
for ($i = 0; $i < 10; $i++) {
    sleep(2);
    $item  = 'Product ' . rand(1, 100);
    $data .= '<li>$item</li>';
}
$data .= '</ul>';

$_SESSION['data_cache']  = $data;
$_SESSION['cached_time'] = time();
session_write_close();

echo '<p><b>Generated:</b></p>';
echo $data;
