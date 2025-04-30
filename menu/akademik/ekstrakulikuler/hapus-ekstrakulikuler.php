<?php
session_start();
include('/bandarharjo/partials/header.php');
include('/bandarharjo/koneksi.php');

$id = $_GET['id'];

// Hapus data dari database
$query = "DELETE FROM ekstrakurikuler WHERE id = $id";
if ($conn->query($query)) {
    header("Location: ekstrakulikuler.php");
    exit();
} else {
    echo "Gagal menghapus ekstrakulikuler.";
}
?>
