<?php

include 'connection.php';

$petugas = "CREATE TABLE petugas (
   id_petugas int not null primary key auto_increment,
   nama_petugas varchar(35) not null,
   username varchar(25) not null,
   password varchar(32) not null,
   telp varchar(13) not null,
   level enum('admin','petugas') not null
)";

$tanggapan = "CREATE TABLE tanggapan (
    id_tanggapan int not null primary key auto_increment,
    id_pengaduan int not null,
    tgl_tanggapan date not null,
    tanggapan text not null,
    id_petugas int not null
)";

$masyarakat = "CREATE TABLE masyarakat (
    nik char(16) not null primary key,
    nama varchar(35) not null,
    username varchar(25) not null,
    password varchar(32),
    telp varchar(13) not null
)";

$pengaduan = "CREATE TABLE pengaduan (
    id_pengaduan int not null primary key auto_increment,
    tgl_pengaduan date not null,
    nik char(16) not null,
    isi_laporan text not null,
    foto varchar(255),
    status enum('0','proses','selesai') not null default '0'
)";


$tables = [$petugas, $tanggapan, $masyarakat, $pengaduan];

foreach ($tables as $table) {
    $connection->query($table);
}

$relasi_pengaduan = "ALTER TABLE pengaduan 
    ADD FOREIGN KEY (nik) REFERENCES masyarakat(nik) ON DELETE CASCADE
";

$relasi_tanggapan = "ALTER TABLE tanggapan
    ADD FOREIGN KEY (id_pengaduan) REFERENCES pengaduan(id_pengaduan) ON DELETE CASCADE,
    ADD FOREIGN KEY (id_petugas) REFERENCES petugas(id_petugas) ON DELETE CASCADE;
";

$relations = [$relasi_pengaduan, $relasi_tanggapan];

foreach ($relations as $relation) {
    $connection->query($relation);
}


echo 'berhasil membuat table';