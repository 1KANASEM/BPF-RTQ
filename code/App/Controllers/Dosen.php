<?php

class Dosen extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login Page';
        $this->view('Templates/header', $data);
        $this->view('Dosen/login');
        $this->view('Templates/footer');
    }

    public function login()
    {
        $this->model('Dosen_model')->login();
    }

    public function home()
    {
        $data['judul'] = 'Dashboard';
        $inisial = $this->model('Dosen_model')->getInisial();
        $data['riwayat'] = $this->model('Dosen_model')->getRiwayat($inisial['inisial']);
        $data['lowongan'] = $this->model('Dosen_model')->getAllLowongan();
        $data['nama'] = $this->model('Dosen_model')->getNama();
        $this->view('Templates/header', $data);
        $this->view('Dosen/navbar', $data);
        $this->view('Dosen/index', $data);
        $this->view('Templates/footer');
    }

    public function formLowongan()
    {
        $data['judul'] = 'Form Buat Lowongan';
        $data['nama'] = $this->model('Dosen_model')->getNama();
        $this->view('Templates/header', $data);
        $this->view('Dosen/navbar', $data);
        $this->view('Dosen/inputLowongan');
        $this->view('Templates/footer');
    }

    public function progressPage()
    {
        $data['judul'] = 'Progress Mahasiswa';
        $data['nama'] = $this->model('Dosen_model')->getNama();
        $data['progress'] = $this->model('Dosen_model')->getProgress();
        $this->view('Templates/header', $data);
        $this->view('Dosen/navbar', $data);
        $this->view('Dosen/progressMhs', $data);
        $this->view('Templates/footer');
    }

    public function hasilPage()
    {
        $data['judul'] = 'Hasil Mahasiswa';
        $data['nama'] = $this->model('Dosen_model')->getNama();
        $data['hasil'] = $this->model('Dosen_model')->getHasil();
        $this->view('Templates/header', $data);
        $this->view('Dosen/navbar', $data);
        $this->view('Dosen/hasilMhs', $data);
        $this->view('Templates/footer');
    }

    public function buatLowongan()
    {
        if ($this->model('Dosen_model')->buatLowongan($_POST)) {
            Flasher::setFlash('Lowongan Berhasil Diajukan. Mohon Menunggu.', 'success');
            header('Location: ' . URL . '/Dosen/home');
            exit;
        } else {
            Flasher::setFlash('Lowongan Gagal Diajukan', 'danger');
            header('Location: ' . URL . '/Dosen/formLowongan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Dosen_model')->hapusLowongan($id) > 0) {
            Flasher::setFlash('Lowongan Berhasil Dihapus', 'success');
            header('Location: ' . URL . '/Dosen/home');
            exit;
        } else {
            Flasher::setFlash('Lowongan Gagal Dihapus', 'danger');
            header('Location: ' . URL . '/Dosen/home');
            exit;
        }
    }

    public function approval()
    {
        $data['judul'] = 'Approval Mahasiswa';
        $data['nama'] = $this->model('Dosen_model')->getNama();
        $data['mhs'] = $this->model('Dosen_model')->getMhs();
        $data['daftar'] = $this->model('Dosen_model')->getDaftar();
        $this->view('Templates/header', $data);
        $this->view('Dosen/navbar', $data);
        $this->view('Dosen/approvalMhs', $data);
        $this->view('Templates/footer');
    }

    public function terimaMahasiswa($id)
    {
        $dosenModel = $this->model('Dosen_model');

        // Retrieve the nim from the milik table based on the provided $id
        $milikData = $dosenModel->getMilikById($id);

        // Get the nim from the retrieved milik data
        $nim = $milikData['nim'];

        if ($this->model('Dosen_model')->terimaMahasiswa($id) > 0) {
            // Notify Mahasiswa with a new notification
            $message = 'Permintaan Magang Anda Diterima';
            $this->model('Dosen_model')->createNotification($nim, $message);

            Flasher::setFlash('Mahasiswa Diterima', 'success');
            header('Location: ' . URL . '/Dosen/approval');
            exit;
        }
    }

    public function tolakMahasiswa($id)
    {
        $dosenModel = $this->model('Dosen_model');

        // Retrieve the nim from the milik table based on the provided $id
        $milikData = $dosenModel->getMilikById($id);

        // Get the nim from the retrieved milik data
        $nim = $milikData['nim'];

        if ($this->model('Dosen_model')->tolakMahasiswa($id) > 0) {
            // Notify Mahasiswa with a new notification
            $message = 'Permintaan Magang Anda Ditolak';
            $this->model('Dosen_model')->createNotification($nim, $message);

            Flasher::setFlash('Mahasiswa Ditolak', 'danger');
            header('Location: ' . URL . '/Dosen/approval');
            exit;
        }
    }

    public function terimaHasil($id)
    {
        $dosenModel = $this->model('Dosen_model');

        // Retrieve the nim from the milik table based on the provided $id
        $milikData = $dosenModel->getMilikById($id);

        // Get the nim from the retrieved milik data
        $nim = $milikData['nim'];

        if ($this->model('Dosen_model')->terimaHasil($id) > 0) {
            // Notify Mahasiswa with a new notification
            $message = 'Hasil Anda Diterima';
            $this->model('Dosen_model')->createNotification($nim, $message);

            Flasher::setFlash('Hasil Diterima', 'success');
            header('Location: ' . URL . '/Dosen/hasilPage');
            exit;
        }
    }

    public function tolakHasil($id)
    {
        $dosenModel = $this->model('Dosen_model');

        // Retrieve the nim from the milik table based on the provided $id
        $milikData = $dosenModel->getMilikById($id);

        // Get the nim from the retrieved milik data
        $nim = $milikData['nim'];

        if ($this->model('Dosen_model')->tolakHasil($id) > 0) {
            // Notify Mahasiswa with a new notification
            $message = 'Hasil Anda Ditolak';
            $this->model('Dosen_model')->createNotification($nim, $message);

            Flasher::setFlash('Hasil Ditolak', 'success');
            header('Location: ' . URL . '/Dosen/hasilPage');
            exit;
        }
    }

    public function editLowongan()
    {
        if ($this->model('Dosen_model')->editLowongan($_POST)) {
            Flasher::setFlash('Lowongan Berhasil Diubah.', 'success');
            header('Location: ' . URL . '/Dosen/home');
            exit;
        } else {
            Flasher::setFlash('Lowongan Gagal Diubah', 'danger');
            header('Location: ' . URL . '/Dosen/home');
            exit;
        }
    }
}
