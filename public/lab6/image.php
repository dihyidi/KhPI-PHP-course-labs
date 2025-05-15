<?php
$filename = __DIR__ . '/image.jpg';
if (!is_file($filename) || !is_readable($filename)) {
    http_response_code(404);
    exit('Image not found.');
}

$mime = 'image/jpeg';
if (extension_loaded('fileinfo')) {
    if ($finfo = finfo_open(FILEINFO_MIME_TYPE)) {
        $detected = finfo_file($finfo, $filename);
        if ($detected !== false) {
            $mime = $detected;
        }
        finfo_close($finfo);
    }
}

header('Content-Type: ' . $mime);
header('Cache-Control: public, max-age=86400');
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');

readfile($filename);
exit;