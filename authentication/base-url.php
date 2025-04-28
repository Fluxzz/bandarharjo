<?php
// BASE_PATH bisa kamu atur manual kalau mau
$basePath = '/'; // karena kamu bilang project langsung di root: http://localhost:3000/

// auto tambahkan slash di akhir kalo belum ada
if (substr($basePath, -1) !== '/') {
    $basePath .= '/';
}

define('BASE_URL', $basePath);
?>
