<?php
$manifestPath = __DIR__ . '/public/build/manifest.json';
if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);
    print_r($manifest);
} else {
    echo "Manifest file not found at: " . $manifestPath;
}