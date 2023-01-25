<?php

class Info extends Controller
{
    public function index()
    {
        masyarakat_only();
        $user = getLoginAccount();

        if ($user == null) {
            return failRedirect('auth/login', 'Mohon login terlebih dahulu');
        }

        $db = new Database;

        $tanggapan_pengaduan = $db->query("SELECT * FROM tanggapan_pengaduan_masyarakat WHERE nik = :nik")
            ->bind(':nik', $user['nik'])
            ->get();

        $data = ['tanggapan_pengaduan' => $tanggapan_pengaduan];

        return $this->view('masyarakat/info', $data);
    }

    
}
