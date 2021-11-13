<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfileModel;

class Register extends Controller
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('profile/registrasi', $data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'username'          => 'required|min_length[3]|max_length[20]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $model = new ProfileModel();
            $data = [
                'nama_dinas'     => $this->request->getVar('nama_dinas'),
                'username'       => $this->request->getVar('username'),
                'password'       => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'visimisi'       => $this->request->getVar('visimisi'),
                'alamat_dinas'   => $this->request->getVar('alamat_dinas'),
                'sejarah'        => $this->request->getVar('sejarah'),
                'logo'           => $this->request->getVar('logo'),

            ];
            $model->save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('profile/registrasi', $data);
        }
    }
}
