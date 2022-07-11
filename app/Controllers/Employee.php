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

        echo view('header', $uname);
        echo view('employee_view');
        echo view('footer');
    }
    public function fetch()
    {
        $model = new Employee_model();
        $data['title']     = 'Data Vaksin Karyawan';
        $data['getKaryawan'] = $model->findAll();
        return $this->response->setJSON($data);
    }
 
    public function add()
    {
        $model = new Employee_model();
        $data = [
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'usia'         => $this->request->getPost('usia'),
            'status_vaksin_1'  => $this->request->getPost('status_vaksin_1'),
            'status_vaksin_2'  => $this->request->getPost('status_vaksin_2')
        ];
        $add = $model->save($data);
        if($add) {
            $output = ['status' => 'Data berhasil ditambahkan'];
            return $this->response->setJSON($output);
        } else {
            $output = ['status' => 'Data gagal ditambah'];
            return $this->response->setJSON($output);
        }
        
    }

    public function edit()
    {
        $model = new Employee_model();
        $id = $this->request->getPost("edit_id");
        $data['employee'] = $model->find($id);
        return $this->response->setJSON($data);
    }
 
    public function update()
    {
        $model = new Employee_model;
        $id = $this->request->getPost("edit_id");
        $data = [
            'nama_karyawan' => $this->request->getPost('nama_karyawan'),
            'usia'         => $this->request->getPost('usia'),
            'status_vaksin_1'  => $this->request->getPost('status_vaksin_1'),
            'status_vaksin_2'  => $this->request->getPost('status_vaksin_2'),
        ];
        $update = $model->update($id, $data);

        if($update) {
            $output = ['status' => 'Data berhasil diupdate'];
            return $this->response->setJSON($output);
        } else {
            $output = ['status' => 'Data gagal diupdate'];
            return $this->response->setJSON($output);
        }
    }
    
    public function hapus()
    {
        $model = new Employee_model();
        $id = $this->request->getGet("delete_id");
        $model->delete($id);

        $output = ['status' => 'Data berhasil dihapus'];
        return $this->response->setJSON($output);
    }
 
}