<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\m_pasien;

class pasien extends Controller
{
    public function __construct()
    {
        $this->model = new m_pasien;
    }
    public function index()
    {

        $data=[
            'judul' => 'Data Pasien',
            'pasien' => $this->model->getAllData()
        ];
        echo view('templates/v_header', $data);
		echo view('templates/v_sidebar');
		echo view('templates/v_topbar');
		echo view('pasien/index', $data);
		echo view('templates/v_footer');
    }
    public function tambah()
    {
        $data =[
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama')
        ];

        $success= $this->model->tambah($data);
        if($success ){
            session()->setFlashdata('message', 'ditambahkan');
            return redirect()->to(base_url('pasien'));

        }
    }
    public function hapus($id)
    {
        $success= $this->model->hapus($id);
        if($success ){
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to(base_url('pasien'));

        }
         
    }
    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $val = $this->validate([
                'id' => 'required',
                'nisn' => 'required',
                'nama' => 'required',

            ]);

            if (!$val) {

                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data pasien',
                    'pasien' => $this->model->getAllData()
                ];

                echo view('template/v_header', $data);
                echo view('template/v_sidebar');
                echo view('template/v_topbar');
                echo view('pasien/index', $data);
                echo view('template/v_footer');
            } else {
                $id = $this->request->getPost('id');
                $data = [
                    'nisn' => $this->request->getPost('nisn'),
                    'nama' => $this->request->getPost('nama')

                ];

                $success = $this->model->ubah($data, $id);
                if ($success) {
                    session()->setFlashdata('message', 'Diubahkan');
                    return redirect()->to(base_url('pasien'));
                }
            }
        } else {
            return redirect()->to('/pasien');
        }
    }
}
