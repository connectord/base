<?php

/**
 * Connectord Base Test: The connector needs to boot
 */

$host = "0.0.0.0"; // Local loopback
$port = getenv('connectord_test_port');

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://$host:$port");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($httpCode === 200) {
    echo "[Base] Main HTTP endpoint OK\n";
} else {
    echo "[Base] Main HTTP endpoint failed with code: $httpCode\n";
}