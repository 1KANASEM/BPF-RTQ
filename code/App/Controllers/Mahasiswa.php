<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login Page';
        $this->view('Templates/header', $data);
        $this->view('Mahasiswa/login', $data);
        $this->view('Templates/footer');
    }

    public function registerPage()
    {
        $data['judul'] = 'Register Page';
        $this->view('Templates/header', $data);
        $this->view('Mahasiswa/register', $data);
        $this->view('Templates/footer');
    }

    public function register()
    {
        $tak = $_POST['tak']; // Get the TAK value from the form

        // Check if the TAK is lower than 75
        if ($tak >= 75) {
            Flasher::setFlash('TAK harus di bawah 75', 'danger');
            header('Location: ' . URL . '/Mahasiswa/registerPage');
            exit;
        }
        if ($this->model('Mahasiswa_model')->register($_POST) > 0) {
            Flasher::setFlash('Register Berhasil', 'success');
            header('Location: ' . URL . '/Mahasiswa/index');
            exit;
        } else {
            Flasher::setFlash('Register Gagal', 'danger');
            header('Location: ' . URL . '/Mahasiswa/registerPage');
            exit;
        }
    }

    public function login()
    {
        $this->model('Mahasiswa_model')->login();
    }

    public function home()
    {
        $data['judul'] = 'Dashboard';
        $nim = $this->model('Mahasiswa_model')->getNim();
        $data['lowongan'] = $this->model('Mahasiswa_model')->getAllLowongan(); // Retrieve all lowongan data from the model
        $data['riwayat'] = $this->model('Mahasiswa_model')->getRiwayat();
        $data['notifications'] = $this->model('Mahasiswa_model')->getNotifications($nim);
        $data['nama'] = $this->model('Mahasiswa_model')->getNama();
        $this->view('Templates/header', $data);
        $this->view('Mahasiswa/navbar', $data);
        $this->view('Mahasiswa/index', $data);
        $this->view('Templates/footer');
    }

    public function hasilPage()
    {
        $data['judul'] = 'Laporan Hasil';
        $data['nama'] = $this->model('Mahasiswa_model')->getNama();
        $data['hasil'] = $this->model('Mahasiswa_model')->getHasil();
        $this->view('Templates/header', $data);
        $this->view('Mahasiswa/navbar', $data);
        $this->view('Mahasiswa/inputHasil', $data);
        $this->view('Templates/footer');
    }

    public function progressPage()
    {
        $data['judul'] = 'Laporan Progress';
        $data['nama'] = $this->model('Mahasiswa_model')->getNama();
        $data['progress'] = $this->model('Mahasiswa_model')->getProgress();
        $this->view('Templates/header', $data);
        $this->view('Mahasiswa/navbar', $data);
        $this->view('Mahasiswa/inputProgress', $data);
        $this->view('Templates/footer');
    }

    public function uploadProgress()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['progress'])) {
            $file = $_FILES['progress'];

            // Check for errors during file upload
            if ($file['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $file['tmp_name'];

                // Validate file type (only allow PDF files)
                $allowed_extensions = ['pdf'];
                $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                if (!in_array($file_extension, $allowed_extensions)) {
                    Flasher::setFlash('Only PDF files are allowed.', 'danger');
                    header('Location: ' . URL . '/Mahasiswa/progressPage');
                    exit;
                }

                // Move the uploaded file to a desired directory
                $target_directory = "../public/progress/"; // Replace with the actual path
                $file_name = basename($file['name']);
                $target_path = $target_directory . $file_name;

                if (move_uploaded_file($tmp_name, $target_path)) {
                    // File uploaded successfully, continue with storing progress data in the database
                    $data = [
                        'progress' => $file_name // Save the file path in the 'progress' column of the database
                        // Add other data you want to store in the $data array
                    ];

                    // Call the model to store progress data
                    if ($this->model('Mahasiswa_model')->inputProgress($data)) {
                        Flasher::setFlash('Progress Berhasil Diupload.', 'success');
                    } else {
                        Flasher::setFlash('Progress Gagal Diupload', 'danger');
                    }
                } else {
                    Flasher::setFlash('Failed to move uploaded file.', 'danger');
                }
            } else {
                Flasher::setFlash('Error during file upload.', 'danger');
            }
        } else {
            Flasher::setFlash('No file uploaded.', 'danger');
        }

        // Redirect back to the progressPage
        header('Location: ' . URL . '/Mahasiswa/progressPage');
        header("Refresh:0");
        exit;
    }

    public function uploadHasil()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['hasil'])) {
            $file = $_FILES['hasil'];

            // Check for errors during file upload
            if ($file['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $file['tmp_name'];

                // Validate file type (only allow PDF files)
                $allowed_extensions = ['pdf'];
                $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                if (!in_array($file_extension, $allowed_extensions)) {
                    Flasher::setFlash('Only PDF files are allowed.', 'danger');
                    header('Location: ' . URL . '/Mahasiswa/hasilPage');
                    exit;
                }

                // Move the uploaded file to a desired directory
                $target_directory = "../public/hasil/"; // Replace with the actual path
                $file_name = basename($file['name']);
                $target_path = $target_directory . $file_name;

                if (move_uploaded_file($tmp_name, $target_path)) {
                    // File uploaded successfully, continue with storing hasil data in the database
                    $data = [
                        'hasil' => $file_name // Save the file path in the 'hasil' column of the database
                        // Add other data you want to store in the $data array
                    ];

                    // Call the model to store progress data
                    if ($this->model('Mahasiswa_model')->updateHasil($data)) {
                        Flasher::setFlash('Hasil Berhasil Diupload.', 'success');
                    } else {
                        Flasher::setFlash('Hasil Gagal Diupload', 'danger');
                    }
                } else {
                    Flasher::setFlash('Failed to move uploaded file.', 'danger');
                }
            } else {
                Flasher::setFlash('Error during file upload.', 'danger');
            }
        } else {
            Flasher::setFlash('No file uploaded.', 'danger');
        }

        // Redirect back to the hasilPage
        header('Location: ' . URL . '/Mahasiswa/hasilPage');
        exit;
    }

    public function daftar($id)
    {
        if ($this->model('Mahasiswa_model')->daftar($_GET, $id)) {
            Flasher::setFlash('Daftar Berhasil. Mohon Menunggu.', 'success');
            header('Location: ' . URL . '/Mahasiswa/home');
            exit;
        } else {
            Flasher::setFlash('Daftar Gagal', 'danger');
            header('Location: ' . URL . '/Mahasiswa/home');
            exit;
        }
    }

    public function getNotifications()
    {
        // Assuming you have a way to get the current Mahasiswa's ID or any identifying information
        // Replace $mahasiswaId with the actual identifier of the Mahasiswa.
        $nim = $this->model('Mahasiswa_model')->getNim(); // Replace '123' with the actual Mahasiswa ID.

        // Get notifications/messages for the current Mahasiswa
        $notifications = $this->model('Mahasiswa_model')->getNotifications($nim);

        // Extract the messages from the notifications array
        $messages = array_column($notifications, 'message');

        // Return the messages as a JSON response
        echo json_encode(['messages' => $messages]);
    }

    public function hapusHasil($id)
    {
        if ($this->model('Mahasiswa_model')->hapusHasil($id) > 0) {
            Flasher::setFlash('Hasil Berhasil Dihapus', 'success');
            header('Location: ' . URL . '/Mahasiswa/hasilPage');
            exit;
        } else {
            Flasher::setFlash('Hasil Gagal Dihapus', 'danger');
            header('Location: ' . URL . '/Mahasiswa/hasilPage');
            exit;
        }
    }

    public function editProgress($id)
    {
       
        if ($this->model('Mahasiswa_model')->editProgress($_POST, $id)) {
            Flasher::setFlash('Progress Berhasil Diubah', 'success');
            header('Location: ' . URL . '/Mahasiswa/progressPage');
            exit;
        } else {
            Flasher::setFlash('Progress Gagal Diubah', 'danger');
            header('Location: ' . URL . '/Mahasiswa/progressPage');
            exit;
        }
    }

    public function hapusProgress($id)
    {
        if ($this->model('Mahasiswa_model')->hapusProgress($id) > 0) {
            Flasher::setFlash('Progress Berhasil Dihapus', 'success');
            header('Location: ' . URL . '/Mahasiswa/progressPage');
            exit;
        } else {
            Flasher::setFlash('Progress Gagal Dihapus', 'danger');
            header('Location: ' . URL . '/Mahasiswa/progressPage');
            exit;
        }
    }
}
