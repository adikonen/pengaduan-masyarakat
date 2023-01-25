<?php

include 'connection.php';

$pengaduan_masyarakat = "CREATE OR REPLACE VIEW pengaduan_masyarakat AS 
    SELECT pengaduan.*, masyarakat.nama, masyarakat.username, masyarakat.telp FROM pengaduan INNER JOIN masyarakat 
    ON pengaduan.nik = masyarakat.nik
";

$tanggapan_pengaduan_masyarakat = "CREATE OR REPLACE VIEW tanggapan_pengaduan_masyarakat AS 
    SELECT tanggapan.*, pengaduan.tgl_pengaduan, pengaduan.status, masyarakat.nik, masyarakat.nama, masyarakat.username
    FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan
    INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik
";

$tanggapan_pengaduan_masyarakat_petugas = "CREATE OR REPLACE VIEW tanggapan_pengaduan_masyarakat_petugas AS 
    SELECT tanggapan.*, pengaduan.tgl_pengaduan, pengaduan.status, 
    masyarakat.nama, masyarakat.username as masyarakat_username, masyarakat.nik, masyarakat.telp, petugas.nama_petugas, petugas.username
    FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan
    INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik
    INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas
";
$views = [$pengaduan_masyarakat, $tanggapan_pengaduan_masyarakat, $tanggapan_pengaduan_masyarakat_petugas];

foreach ($views as $view) {
    $connection->query($view);
}
