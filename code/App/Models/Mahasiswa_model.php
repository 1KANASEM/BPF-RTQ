<?php

class Mahasiswa_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        // Check if TAK is lower than 75
        if ($data['tak'] >= 75) {
            return false; // TAK is not valid, return false to indicate failure
        }

        // Encrypt the password using MD5
        $data['password'] = md5($data['password']);

        $query = "INSERT INTO mahasiswa
                    VALUES
                  (:nim, :nama, :kelas, :email, :password, :tak)";

        try {
            $this->db->query($query);
            $this->db->bind(':nim', $data['nim']);
            $this->db->bind(':nama', $data['nama']);
            $this->db->bind(':kelas', $data['kelas']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':tak', $data['tak']);

            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            // If an exception occurs, it means there was an error with the database operation
            // Here, you can handle the specific error based on the error code or message
            // For example, you can check if the error is related to a duplicate key violation (1062 is the MySQL error code for duplicate entry)
            if ($e->getCode() == 1062) {
                // Handle the duplicate key error here
                // You can log the error, display a user-friendly message, or take appropriate action as needed
                return false;
            } else {
                // For other database errors, you may handle them differently
                // For debugging purposes, you can print or log the full exception message here
                // However, in a production environment, it's better to handle errors more gracefully and not reveal sensitive information to users
                echo "Database error: " . $e->getMessage();
                return false;
            }
        }
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $input_password = $_POST['password'];
            $nim = $_GET['nim'];

            // Encrypt the input password using MD5
            $encrypted_password = md5($input_password);

            $query = "SELECT * FROM mahasiswa WHERE email = :email AND password = :password";
            $this->db->query($query);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $encrypted_password);
            $result = $this->db->single();

            if ($result) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $encrypted_password;
                $_SESSION['nim'] = $nim;
                header('Location: ' . URL . '/Mahasiswa/home');
                exit; // Add exit after redirecting the page
            } else {
                Flasher::setFlash('Invalid email or password', 'danger');
                header('Location: ' . URL . '/Mahasiswa/index');
                exit;
            }
        }
    }

    public function getNim()
    {
        $queryNim = "SELECT nim FROM mahasiswa WHERE email = :email LIMIT 1";
        $this->db->query($queryNim);
        $this->db->bind(':email', $_SESSION['email']);
        return $this->db->single()['nim'];
    }

    public function getNama()
    {
        $queryNama = "SELECT nama FROM mahasiswa WHERE email=:email LIMIT 1";
        $this->db->query($queryNama);
        $this->db->bind(':email', $_SESSION['email']);
        return $this->db->single()['nama'];
    }

    public function getAllLowongan()
    {
        $query = "SELECT * FROM lowongan_magang WHERE status_lowongan = 'OPEN'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getRiwayat()
    {
        $queryNim = "SELECT nim FROM mahasiswa WHERE email=:email LIMIT 1";
        $this->db->query($queryNim);
        $this->db->bind(':email', $_SESSION['email']);
        $nim = $this->db->single()['nim'];

        $query = "SELECT *, status_magang FROM lowongan_magang lm, milik m WHERE lm.id_lowongan = m.id_lowongan AND nim = :nim";
        $this->db->query($query);
        $this->db->bind(':nim', $nim);
        return $this->db->resultSet();
    }

    public function getProgress()
    {
        $queryNim = "SELECT nim FROM mahasiswa WHERE email=:email LIMIT 1";
        $this->db->query($queryNim);
        $this->db->bind(':email', $_SESSION['email']);
        $nim = $this->db->single()['nim'];

        $query = "SELECT *, aktifitas FROM progress p, lowongan_magang lm WHERE p.id_lowongan = lm.id_lowongan AND nim = :nim";
        $this->db->query($query);
        $this->db->bind(':nim', $nim);
        return $this->db->resultSet();
    }

    public function getHasil()
    {
        $queryNim = "SELECT nim FROM mahasiswa WHERE email=:email LIMIT 1";
        $this->db->query($queryNim);
        $this->db->bind(':email', $_SESSION['email']);
        $nim = $this->db->single()['nim'];

        $query = "SELECT *, aktifitas FROM milik m, lowongan_magang lm WHERE m.id_lowongan = lm.id_lowongan AND nim = :nim AND status_magang = 'ACTIVE'";
        $this->db->query($query);
        $this->db->bind(':nim', $nim);
        return $this->db->resultSet();
    }

    public function daftar($data, $id)
    {
        $queryId = "SELECT id_lowongan FROM lowongan_magang WHERE id_lowongan = :id";
        $this->db->query($queryId);
        $this->db->bind('id', $id);
        $id_lowongan = $this->db->single()['id_lowongan'];

        $queryNim = "SELECT nim FROM mahasiswa WHERE email=:email LIMIT 1";
        $this->db->query($queryNim);
        $this->db->bind(':email', $_SESSION['email']);
        $nim = $this->db->single()['nim'];

        $query = "INSERT INTO milik
                VALUES
              ('', :id_lowongan, :nim, :status_magang, :hasil)";

        $this->db->query($query);
        $data['status_magang'] = 'WAITING';
        $data['hasil'] = 'NONE';
        $this->db->bind(':id_lowongan', $id_lowongan);
        $this->db->bind(':nim', $nim);
        $this->db->bind(':status_magang', $data['status_magang']);
        $this->db->bind(':hasil', $data['hasil']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function inputProgress($data)
    {
        $queryNim = "SELECT nim FROM mahasiswa WHERE email=:email LIMIT 1";
        $this->db->query($queryNim);
        $this->db->bind(':email', $_SESSION['email']);
        $nim = $this->db->single()['nim'];

        $queryId = "SELECT id_lowongan FROM milik WHERE status_magang = 'ACTIVE' AND nim = :nim";
        $this->db->query($queryId);
        $this->db->bind(':nim', $nim);
        $id_lowongan = $this->db->single()['id_lowongan'];

        $queryNama = "SELECT nama FROM mahasiswa WHERE email = :email LIMIT 1";
        $this->db->query($queryNama);
        $this->db->bind(':email', $_SESSION['email']);
        $nama = $this->db->single()['nama'];

        $query = "INSERT INTO progress VALUES ('', :id_lowongan, :nim, :nama, NOW(), :progress)";
        $this->db->query($query);
        $this->db->bind(':id_lowongan', $id_lowongan);
        $this->db->bind(':nim', $nim);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':progress', $data['progress']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateHasil($data)
    {
        $queryNim = "SELECT nim FROM mahasiswa WHERE email=:email LIMIT 1";
        $this->db->query($queryNim);
        $this->db->bind(':email', $_SESSION['email']);
        $nim = $this->db->single()['nim'];

        $queryId = "SELECT id_lowongan FROM milik WHERE status_magang = 'ACTIVE' AND nim = :nim";
        $this->db->query($queryId);
        $this->db->bind(':nim', $nim);
        $id = $this->db->single()['id_lowongan'];

        $queryHasil = "UPDATE milik SET hasil = :hasil WHERE id_lowongan = :id AND nim = :nim";
        $this->db->query($queryHasil);
        $this->db->bind('id', $id);
        $this->db->bind('nim', $nim);
        $this->db->bind('hasil', $data['hasil']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getNotifications($mahasiswaId)
    {
        $query = "SELECT * FROM notifications WHERE nim = :nim ORDER BY created_at DESC";
        $this->db->query($query);
        $this->db->bind('nim', $mahasiswaId);
        $notifications = $this->db->resultSet();

        return $notifications;
    }

    public function getMilikById($id)
    {
        $query = "SELECT * FROM milik WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function hapusHasil($id)
    {
        $queryHapus = "UPDATE milik SET hasil = 'NONE' WHERE id = :id";
        $this->db->query($queryHapus);
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editProgress($data, $id)
    {
        if (isset($_FILES['progress']) && $_FILES['progress']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['progress']['name'];
            $file_tmp = $_FILES['progress']['tmp_name'];

            $queryEdit = "UPDATE progress SET progress = :progress WHERE id_progress = :id";
            $this->db->query($queryEdit);
            $this->db->bind(':progress', $file_name);
            $this->db->bind(':id', $id);
            $this->db->execute();

            return $this->db->rowCount();
        } else {
            return 0;
        }
    }


    public function hapusProgress($id)
    {
        $queryHapus = "DELETE FROM progress WHERE id_progress = :id";
        $this->db->query($queryHapus);
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
