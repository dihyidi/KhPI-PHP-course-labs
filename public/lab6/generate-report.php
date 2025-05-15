<?php
$cacheDir  = __DIR__ . '/cache';
$cacheFile = $cacheDir . '/report.html';
$cacheTime = 600;

if (!is_dir($cacheDir)) {
    mkdir($cacheDir);
}

if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    echo '<p>From cache:</p>';
    readfile($cacheFile);
    exit;
}

sleep(3);

ob_start();
echo "<table><tr><th>#</th><th>Name</th><th>Price</th><th>Date</th></tr>";
for ($i = 1; $i <= 1000; $i++) {
    $name = 'Client $i';
    $amount = rand(100, 10000);
    $date = date('Y-m-d', strtotime('-' . rand(0, 365) . ' days'));
    echo '<tr><td>$i</td><td>$name</td><td>$amount</td><td>$date</td></tr>';
}
echo '</table>';
$content = ob_get_clean();

$tmpFile = tempnam($cacheDir, 'rep_');
file_put_contents($tmpFile, $content, LOCK_EX);
rename($tmpFile, $cacheFile);

header('Content-Type: text/html; charset=utf-8');

echo $content;