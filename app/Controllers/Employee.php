<?php
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Employee_model;
 
class Employee extends Controller
{
    public function index()
    {
        $session = session();
        $uname['user_name'] = $session->get('user_name');

        $model = new Employee_model;
        $data['title']     = 'Data Vaksin Karyawan';
        $data['getKaryawan'] = $model->findAll();
 
        echo view('header', $uname);
        echo view('employee_view', $data);
        echo view('footer', $data);
    }
 
    public function add()
    {
        $model = new Employee_model;
        $data = array(
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'usia'         => $this->request->getPost('usia'),
            'status_vaksin_1'  => $this->request->getPost('status_vaksin_1'),
            'status_vaksin_2'  => $this->request->getPost('status_vaksin_2')
        );
        $model->insert($data);
        $output = ['status' => 'Berhasil'];
        return $this->response->setJSON($output);
    }

    public function edit($id)
    {
        $model = new Employee_model;
        $getKaryawan = $model->getKaryawan($id)->getRow();

        $session = session();
        $uname['user_name'] = $session->get('user_name');

        if (isset($getKaryawan)) {
            $data['employee'] = $getKaryawan;
            $data['title']  = 'Niagahoster Tutorial';
 
            echo view('header', $uname);
            echo view('edit_view', $data);
            echo view('footer', $data);
        } else {
 
            echo '<script>
                    alert("ID karyawan ' . $id . ' Tidak ditemukan");
                    window.location="' . base_url('employee') . '"
                </script>';
        }
    }
 
    public function update()
    {
        $model = new Employee_model;
        $id = $this->request->getPost('id');
        $data = array(
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'usia'         => $this->request->getPost('usia'),
            'status_vaksin_1'  => $this->request->getPost('status_vaksin_1'),
            'status_vaksin_2'  => $this->request->getPost('status_vaksin_2')
        );
        $model->editKaryawan($data, $id);
        echo '<script>
                alert("Selamat! Anda berhasil melakukan update data.");
                window.location="' . base_url('employee') . '"
            </script>';
    }
    
    public function hapus($id)
    {
        $model = new Employee_model();
        $delete = $model->where('id', $id)->delete();
        if($delete)
        {
           echo json_encode(array("status" => true));
        }else{
           echo json_encode(array("status" => false));
        }
    }
 
}