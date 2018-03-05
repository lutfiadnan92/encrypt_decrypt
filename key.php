<?php
$encryption_key_256bit = base64_encode(openssl_random_pseudo_bytes(32));
print $encryption_key_256bit ."\n";
$decode = base64_decode($encryption_key_256bit);
print $decode;
?>