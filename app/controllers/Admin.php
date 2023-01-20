<?php

class Admin extends Controller
{
    public function __construct()
    {
        login_required();    
    }

    protected function render($view, $data = [])
    {
        $this->view('header');
        $this->view($view, $data);
        $this->view('footer');
    }

    public function index()
    {
        $this->view('header');
        $this->view('admin/dashboard/index');
        $this->view('footer');
    }

        
    public function petugas()
    {
        $db = new Database;
        $data = [
            'all_petugas' => $db->query('SELECT * FROM petugas ORDER BY level')->get()
        ];
        
        $this->render('admin/petugas/index', $data);
    }

    public function petugas_create()
    {
        $this->render('admin/petugas/create');
    }

    public function petugas_edit($id_petugas)
    {
        $db = new Database;

        $petugas = $db->query('SELECT * FROM petugas WHERE id_petugas = :id_petugas')
            ->bind(':id_petugas', $id_petugas)
            ->first();

        $data = [
            'petugas' => $petugas
        ];
        $this->render('admin/petugas/edit', $data);
    }

    public function petugas_store()
    {
        http_post_only();
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        $nama_petugas   = $_POST['nama_petugas'];
        $level          = $_POST['level'];
        $telp           = $_POST['telp'];

        $db = new Database;
        $sql = 'INSERT INTO petugas (username, password, nama_petugas, level, telp) VALUES (:username, :password, :nama_petugas, :level, :telp)';

        $count = $db->query($sql)
            ->bind(':username', $username)
            ->bind(':password', $password)
            ->bind(':nama_petugas', $nama_petugas)
            ->bind(':level', $level)
            ->bind(':telp', $telp)
            ->rowCount();

        if ($count > 0) {
            Flasher::set('success','Berhasil membuat petugas baru!');
            return redirect('admin/petugas');
        }

        Flasher::set('error','Gagal membuat petugas baru!');
        return redirect('admin/petugas_create');
    }

    public function petugas_update($id_petugas)
    {
        http_post_only();

        $username       = $_POST['username'];
        $nama_petugas   = $_POST['nama_petugas'];
        $level          = $_POST['level'];
        $telp           = $_POST['telp'];

        $db = new Database;

        $sql = 'UPDATE petugas SET 
            username = :username, 
            nama_petugas = :nama_petugas,
            level = :level,
            telp = :telp
            WHERE id_petugas = :id_petugas
        ';

        $isUpdated = $db->query($sql)
            ->bind(':username', $username)
            ->bind(':nama_petugas', $nama_petugas)
            ->bind(':level', $level)
            ->bind(':telp', $telp)
            ->bind(':id_petugas', $id_petugas)
            ->execute();

        if ($isUpdated) {
            Flasher::set('success', 'Berhasil memperbarui petugas!');
            return redirect('admin/petugas');
        }

        Flasher::set('error', 'Gagal memperbarui petugas!');
        return redirect('admin/petugas_edit');
    }

    public function petugas_destroy($id_petugas)
    {
        $db = new Database;

        $isDeleted = $db->query("DELETE FROM petugas WHERE id_petugas = :id_petugas")
           ->bind(':id_petugas', $id_petugas)
           ->execute();

        if ($isDeleted) {
            Flasher::set('success', 'Berhasil menghapus petugas');
            return redirect('admin/petugas');
        }

        Flasher::set('error', 'Gagal menghapus petugas');
        return redirect('admin/petugas');
    }

    public function masyarakat()
    {
        $db = new Database;

        $data = [
            'masyarakat' => $db->query('SELECT * FROM masyarakat')->get() 
        ];

        $this->render('admin/masyarakat/index', $data);
    }

    public function masyarakat_create()
    {
        $this->render('admin/masyarakat/create');
    }

    public function masyarakat_edit($nik)
    {
        $db = new Database;
        $masyrakat = $db->query('SELECT * FROM masyarakat WHERE nik = :nik')
            ->bind(':nik',$nik)
            ->first();

        $data = [
           'masyarakat' => $masyrakat   
        ];

        $this->render('admin/masyarakat/edit', $data);
    }

    public function masyarakat_store()
    {
        http_post_only();

        $db = new Database;

        $count = $db->query('INSERT INTO masyarakat (nik,nama,username,password,telp) 
        VALUES (:nik, :nama, :username, :password, :telp)')
            ->bind('nik', $_POST['nik'])
            ->bind('nama', $_POST['nama'])
            ->bind('username',$_POST['username'])
            ->bind('password',$_POST['password'])
            ->bind('telp',$_POST['telp'])
            ->rowCount();

        if ($count > 0) {
            return successRedirect('admin/masyarakat', 'Berhasil membuat masyarakat baru!');
        }

        return failRedirect('admin/masyarakat_create', 'Gagal membuat masyarakat baru!');
    }

    public function masyarakat_update($nik)
    {
        http_post_only();

        $db = new Database;

        $count = $db->query("UPDATE TABLE masyarakat SET 
            nik = :nik,
            nama = :nama, 
            username = :username,
            telp = :telp,
            WHERE :nik = :nik
        ")->bind(':nik', $_POST['nik'])
          ->bind(':nama', $_POST['nama'])
          ->bind(':username', $_POST['username'])
          ->bind(':telp', $_POST['telp'])
          ->rowCount();

        if ($count > 0) {
            return successRedirect('admin/masyarakat_index', 'Berhasil mengubah data masyarakat');
        }

        return failRedirect('admin/masyarakat_update', 'Gagal memperbarui masyarakat!');
    }

    public function masyarakat_destroy($nik)
    {
        http_post_only();

        $db = new Database;

        $count = $db->query('DELETE FROM masyarakat WHERE nik = :nik')
            ->bind(':nik', $nik)
            ->rowCount();

        if ($count > 0) {
            return successRedirect('admin/masyarakat', 'Berhasil menghapus masyarakat');
        }

        return failRedirect('error', 'Gagal menghapus masyarakat');
    }

    public function pengaduan()
    {
        $db = new Database;

        $data = [
            'all_pengaduan' => $db->query('SELECT * FROM pengaduan_masyarakat ORDER BY status')->get()
        ];

        return $this->render('admin/pengaduan/index', $data);
    }

    public function pengaduan_show($id_pengaduan)
    {
        $db = new Database;
        
        $pengaduan = $db->query('SELECT * FROM pengaduan_masyarakat WHERE id_pengaduan = :id_pengaduan')
            ->bind(':id_pengaduan', $id_pengaduan)
            ->first();

        // dd($pengaduan);
        $tanggapanCount = $db->query('SELECT * FROM tanggapan_pengaduan_masyarakat WHERE id_pengaduan = :id_pengaduan')
            ->bind(':id_pengaduan', $id_pengaduan)
            ->rowCount();

        $data = [
            'pengaduan' => $pengaduan,
            'tanggapanCount' => $tanggapanCount
        ];

        return $this->render('admin/pengaduan/show', $data);
    }

    public function tanggapan($id_pengaduan)
    {
        $db = new Database;

        $all_tanggapan = $db->query('SELECT * FROM tanggapan_pengaduan_masyarakat_petugas WHERE id_pengaduan = :id_pengaduan')
            ->bind(':id_pengaduan',$id_pengaduan)
            ->get();


        $data = ['all_tanggapan' => $all_tanggapan];

        return $this->render('admin/tanggapan/index', $data);
    }

    public function tanggapan_store($id_pengaduan)
    {
        http_post_only();

        $db = new Database;
        $user = getLoginAccount();

        try {
            $db->conn->beginTransaction();
            $db->query("INSERT INTO tanggapan (id_pengaduan, id_petugas, tanggapan, tgl_tanggapan) VALUES 
                (:id_pengaduan, :id_petugas, :tanggapan, :tgl_tanggapan)")
                ->bind(':id_pengaduan', $id_pengaduan)
                ->bind(':id_petugas', $user['id_petugas'])
                ->bind(':tanggapan', $_POST['tanggapan'])
                ->bind(':tgl_tanggapan', nowDate())
                ->rowCount();

            $db->query("UPDATE pengaduan SET status = :status WHERE id_pengaduan = :id_pengaduan")
                ->bind(':id_pengaduan', $id_pengaduan)
                ->bind(':status', $_POST['status'])
                ->rowCount();
        }
        catch (Exception $e) {
            $db->conn->rollBack();
            return failRedirect("admin/pengaduan_show/$id_pengaduan", 'Gagal membuat tanggapan');
        }

        $db->conn->commit();
        return successRedirect("admin/pengaduan_show/$id_pengaduan",'Berhasil membuat pengaduan');
    }

    public function cetak()
    {
        $this->render('admin/cetak-laporan/index');
    }

    public function cetak_pdf()
    {

    }


}