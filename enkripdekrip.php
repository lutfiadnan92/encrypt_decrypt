<?php
$key = 'flGWnWFyb9l0TDzLtLs19p6QFeWFejf0u9O65BZ33x8=';

function enkrip($data, $key){
	$enkripsi_key = base64_decode($key);
	$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cfb'));
	$enripsikan = openssl_encrypt($data, 'aes-256-cfb', $enkripsi_key, 0, $iv);
	return base64_encode($enripsikan.'::'.$iv);
}

function dekrip($data, $key){
	$enkripsi_key = base64_decode($key);
	list($enkripkan_data, $iv) = explode('::', base64_decode($data), 2);
	return openssl_decrypt($enkripkan_data,'aes-256-cfb',$enkripsi_key, 0 , $iv);
}

$password = '123';
print $password. "<br>";
$cipher = enkrip($password, $key);
print 'cipher = '. $cipher. '<br>';
$plain = dekrip($cipher, $key);
print 'dekrip = '. $plain;
?>