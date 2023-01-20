<?php

include 'connection.php';

$password = '12345678';
// $password = password_hash('12345678', PASSWORD_BCRYPT);

$petugas = "INSERT INTO petugas (nama_petugas, username, password, telp, level) VALUES
    ('Administrator Sistem', 'admin', $password, '08123456789', 'admin'),
    ('Operator Pengaduan', 'petugas', $password, '0898765432', 'petugas')
";

$masyarakat = "INSERT INTO masyarakat (nik, nama, username, password, telp) VALUES 
    ('1100229321', 'Addy Konen', 'konen', null, '089779882211'),
    ('22884411224', 'OldMan','oldman','12345678','08989892222')
";

$pengaduan = "INSERT INTO pengaduan (nik, tgl_pengaduan, isi_laporan, foto, status) VALUES
    ('1100229321', '2022-12-10','Lapor terjadi kemalingan di Denpasar khususnya daerah rumah saya jalan padang gajah', null, '0'),
    ('22884411224', '2023-01-02', 'Tidak ada nanas dalam radius 20km bagaiamana ini?', null, 'proses')
";

$seeders = [$petugas, $masyarakat, $pengaduan];

foreach ($seeders as $seed) {
    $connection->query($seed);
}

echo 'berhasil melakukan seeding';