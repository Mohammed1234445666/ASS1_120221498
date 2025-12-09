<?php

$method = "AES-256-CBC";
$passphrase = "MySecretPassphrase";
$key = hash('sha256', $passphrase, true);

$iv_length = openssl_cipher_iv_length($method);

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $action = $_POST["action"];

    if($action === "encrypt"){

        $text = $_POST["plaintext"];

        $iv = openssl_random_pseudo_bytes($iv_length);
        $cipher_raw = openssl_encrypt($text, $method, $key, OPENSSL_RAW_DATA, $iv);
        $output = base64_encode($iv . $cipher_raw);

        header("Location: encrypt_ui.php?result=" . urlencode($output) . "&plain=" . urlencode($text));
        exit;

    } elseif($action === "decrypt"){

        $enc = $_POST["encrypted_text"];
        $decoded = base64_decode($enc);

        $iv = substr($decoded, 0, $iv_length);
        $cipher_raw = substr($decoded, $iv_length);

        $text = openssl_decrypt($cipher_raw, $method, $key, OPENSSL_RAW_DATA, $iv);

        header("Location: encrypt_ui.php?result=" . urlencode($text) . "&enc=" . urlencode($enc));
        exit;
    }
}

header("Location: encrypt_ui.php");
exit;
