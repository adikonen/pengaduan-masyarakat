<?php

class Pengaduan extends Controller
{
    public function __construct()
    {
        masyarakat_only();
    }

    public function index()
    {
        $this->view('masyarakat/template/header');
        $this->view('masyarakat/pengaduan');
        $this->view('masyarakat/template/footer');
    }

    public function store()
    {
        http_post_only();

        $user = getLoginAccount();
        $db = new Database;

        $nik = $user['nik'] ?? $_POST['nik'];

        if ($user == null) {
            $user = $db->query('SELECT * FROM masyarakat WHERE :nik = nik')->bind(':nik', $nik)->first();
        }        

        // jika user belum login atau nik tidak ditemu kan maka otomatis akan menggunakan $_POST
        $telp = $user['telp'] ?? $_POST['telp'];
        $nama = $user['nama'] ?? $_POST['nama'];
        $username = $user['username'] ?? $_POST['nama'];
        $isi_laporan = $_POST['isi_laporan'];

        $masyarakat = null;

        $foto = uploadFile('img/pengaduan/', $_FILES['foto']);
        
        $db->beginTransaction();
        try {
            if ($user == null) {
                $masyarakat = $db->query("INSERT INTO masyarakat (nik, nama, username, telp, password) VALUES 
                    (:nik, :nama, :username, :telp, :password)
                ")
                ->bind(':nik', $nik)
                ->bind(':nama', $nama)
                ->bind(':username', $username)
                ->bind(':telp', $telp)
                ->bind(':password', MASYARAKAT_PASSWORD)
                ->rowCount();
                
                if (! $masyarakat) {
                    throw new Exception('Lol');
                }
 
            }  else {
                $masyarakat = $db->query("UPDATE masyarakat SET 
                    nama = :nama,
                    telp = :telp
                    WHERE nik = :nik
                ")
                ->bind(':nama', $nama)
                ->bind(':telp', $telp)
                ->bind(':nik', $nik)
                ->rowCount();
            }

            $masyarakat = $db->query('SELECT * FROM masyarakat WHERE nik = :nik')->bind(':nik', $nik)->first();
                        
            $pengaduan = $db->query('INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto) VALUES
                (:tgl_pengaduan, :nik, :isi_laporan, :foto)
            ')->bind(':tgl_pengaduan', nowDate())
            ->bind(':nik', $masyarakat['nik'])
            ->bind(':isi_laporan', $isi_laporan)
            ->bind(':foto', $foto)
            ->rowCount();

        } catch (Exception $error) {
            $db->rollback();
            throw $error;
        }

        $db->commit();

        return successRedirect('pengaduan', 'Aduan Anda sudah teradukan!');
    }


}