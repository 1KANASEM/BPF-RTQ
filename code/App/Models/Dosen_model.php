<?php

class Dosen_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $input_password = $_POST['password'];

            // Encrypt the input password using MD5
            $encrypted_password = md5($input_password);
            $query = "SELECT * FROM dosen WHERE email = :email AND password = :password";
            $this->db->query($query);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $encrypted_password);
            $result = $this->db->single();

            if ($result) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $encrypted_password;
                header('Location: ' . URL . '/Dosen/home');
                exit; // Add exit after redirecting the page
            } else {
                Flasher::setFlash('Invalid email or password', 'danger');
                header('Location: ' . URL . '/Dosen/index');
                exit;
            }
        }
    }

    public function buatLowongan($data)
    {
        // Fetch the NIP from the dosen table
        $queryNIP = "SELECT nip FROM dosen WHERE email=:email LIMIT 1";
        $this->db->query($queryNIP);
        $this->db->bind(':email', $_SESSION['email']);
        $nip = $this->db->single()['nip'];

        // Fetch the Inisial from the dosen table
        $queryInisial = "SELECT inisial FROM dosen WHERE email=:email LIMIT 1";
        $this->db->query($queryInisial);
        $this->db->bind(':email', $_SESSION['email']);
        $inisial = $this->db->single()['inisial'];

        $query = "INSERT INTO lowongan_magang
                VALUES
              ('', :nip, :aktifitas, :kuota, :durasi_magang, :durasi_lowongan, :tanggal_magang, :inisial, :deskripsi, NOW(), :status_lowongan)";

        $this->db->query($query);
        $data['status_lowongan'] = 'WAITING';
        $this->db->bind(':nip', $nip); // Bind the fetched NIP
        $this->db->bind(':aktifitas', $data['aktifitas']);
        $this->db->bind(':kuota', $data['kuota']);
        $this->db->bind(':durasi_magang', $data['durasi_magang']);
        $this->db->bind(':durasi_lowongan', $data['durasi_lowongan']);
        $this->db->bind(':tanggal_magang', $data['tanggal_magang']);
        $this->db->bind(':inisial', $inisial);
        $this->db->bind(':deskripsi', $data['deskripsi']);
        $this->db->bind(':status_lowongan', $data['status_lowongan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusLowongan($id)
    {
        $query = "DELETE FROM lowongan_magang WHERE id_lowongan = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editLowongan($data)
    {
        $query = "UPDATE lowongan_magang SET
                aktifitas = :aktifitas,
                kuota = :kuota,
                durasi_magang = :durasi_magang,
                durasi_lowongan = :durasi_lowongan,
                tanggal_magang = :tanggal_magang,
                deskripsi = :deskripsi
                WHERE id_lowongan = :id_lowongan";

        $this->db->query($query);
        $this->db->bind(':aktifitas', $data['aktifitas']);
        $this->db->bind(':kuota', $data['kuota']);
        $this->db->bind(':durasi_magang', $data['durasi_magang']);
        $this->db->bind(':durasi_lowongan', $data['durasi_lowongan']);
        $this->db->bind(':tanggal_magang', $data['tanggal_magang']);
        $this->db->bind(':deskripsi', $data['deskripsi']);
        $this->db->bind(':id_lowongan', $data['id_lowongan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getNama()
    {
        $queryNama = "SELECT nama FROM dosen WHERE email=:email LIMIT 1";
        $this->db->query($queryNama);
        $this->db->bind(':email', $_SESSION['email']);
        return $this->db->single()['nama'];
    }

    public function getId($id)
    {
        $this->db->query('SELECT id_lowongan FROM lowongan_magang WHERE id_lowongan = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getLowonganById($id)
    {
        $this->db->query('SELECT * FROM lowongan_magang WHERE id_lowongan = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getAllLowongan()
    {
        $query = "SELECT * FROM lowongan_magang WHERE status_lowongan ='OPEN'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getRiwayat($inisial)
    {
        $query = "SELECT * FROM lowongan_magang WHERE inisial = :inisial";
        $this->db->query($query);
        $this->db->bind(':inisial', $inisial);
        return $this->db->resultSet();
    }

    public function getInisial()
    {
        $queryInisial = "SELECT inisial FROM dosen WHERE email = :email";
        $this->db->query($queryInisial);
        $this->db->bind(':email', $_SESSION['email']);
        return $this->db->single();
    }

    public function getMilikById($id)
    {
        $query = "SELECT * FROM milik WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getAktifitas($id)
    {
        $queryAktifitas = "SELECT aktifitas FROM lowongan_magang WHERE id_lowongan = :id";
        $this->db->query($queryAktifitas);
        $this->db->bind(':id', $id);
        return $this->db->single()['aktifitas'];
    }

    public function getMhs()
    {
        $queryNip = "SELECT nip FROM dosen WHERE email=:email LIMIT 1";
        $this->db->query($queryNip);
        $this->db->bind(':email', $_SESSION['email']);
        $nip = $this->db->single()['nip'];

        $queryMhs = "SELECT *, nama, aktifitas FROM milik m, mahasiswa mhs, lowongan_magang lm WHERE m.nim = mhs.nim AND m.id_lowongan = lm.id_lowongan AND status_magang = 'WAITING' AND nip = :nip";
        $this->db->query($queryMhs);
        $this->db->bind(':nip', $nip);
        return $this->db->resultSet();
    }

    public function getDaftar()
    {
        $queryNip = "SELECT nip FROM dosen WHERE email=:email LIMIT 1";
        $this->db->query($queryNip);
        $this->db->bind(':email', $_SESSION['email']);
        $nip = $this->db->single()['nip'];

        $queryMhs = "SELECT *, nama, aktifitas FROM milik m, mahasiswa mhs, lowongan_magang lm WHERE m.nim = mhs.nim AND m.id_lowongan = lm.id_lowongan AND nip = :nip AND status_magang IN ('ACTIVE','DONE')";
        $this->db->query($queryMhs);
        $this->db->bind(':nip', $nip);
        return $this->db->resultSet();
    }

    public function getProgress()
    {
        $queryNip = "SELECT nip FROM dosen WHERE email=:email LIMIT 1";
        $this->db->query($queryNip);
        $this->db->bind(':email', $_SESSION['email']);
        $nip = $this->db->single()['nip'];

        $query = "SELECT *, aktifitas FROM progress p, lowongan_magang lm WHERE p.id_lowongan = lm.id_lowongan AND nip = :nip";
        $this->db->query($query);
        $this->db->bind(':nip', $nip);
        return $this->db->resultSet();
    }

    public function getHasil()
    {
        $queryNip = "SELECT nip FROM dosen WHERE email=:email LIMIT 1";
        $this->db->query($queryNip);
        $this->db->bind(':email', $_SESSION['email']);
        $nip = $this->db->single()['nip'];

        $query = "SELECT *, aktifitas, nama FROM milik m, lowongan_magang lm, mahasiswa mhs WHERE m.id_lowongan = lm.id_lowongan AND m.nim = mhs.nim AND nip = :nip";
        $this->db->query($query);
        $this->db->bind(':nip', $nip);
        return $this->db->resultSet();
    }

    public function terimaMahasiswa($id)
    {
        $queryTerima = "UPDATE milik SET status_magang = 'ACTIVE' WHERE id = :id";
        $this->db->query($queryTerima);
        $this->db->bind(':id', $id);
        $this->db->execute();

        // Decrement the kuota of the lowongan associated with the accepted student
        $queryDecrementKuota = "UPDATE lowongan_magang SET kuota = kuota - 1 WHERE id_lowongan = (SELECT id_lowongan FROM milik WHERE id = :id)";
        $this->db->query($queryDecrementKuota);
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function tolakMahasiswa($id)
    {
        $queryTolak = "UPDATE milik SET status_magang = 'DECLINED' WHERE id = :id";
        $this->db->query($queryTolak);
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function terimaHasil($id)
    {
        $queryTerima = "UPDATE milik SET status_magang = 'DONE' WHERE id = :id";
        $this->db->query($queryTerima);
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tolakHasil($id)
    {
        $queryTolak = "UPDATE milik SET status_magang = 'DECLINED' WHERE id = :id";
        $this->db->query($queryTolak);
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function createNotification($nim, $message)
    {
        $query = "INSERT INTO notifications (nim, message) VALUES (:nim, :message)";
        $this->db->query($query);
        $this->db->bind('nim', $nim);
        $this->db->bind('message', $message);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
