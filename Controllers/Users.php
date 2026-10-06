<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        $users = $this->userModel
            ->orderBy('full_name', 'ASC')
            ->findAll();

        return view('users/index', ['users' => $users]);
    }

    public function new(): string
    {
        return view('users/new');
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|is_unique[users.username]',
            'full_name' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->userModel->insert([
            'username'  => trim($this->request->getPost('username')),
            'full_name' => trim($this->request->getPost('full_name')),
            'email'     => trim($this->request->getPost('email')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'))
            ->with('success', 'User created successfully.');
    }

    public function edit(int $id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
        }

        return view('users/edit', ['user' => $user]);
    }

    public function update(int $id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
        }

        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username'  => trim($this->request->getPost('username')),
            'full_name' => trim($this->request->getPost('full_name')),
            'email'     => trim($this->request->getPost('email')),
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->isValid()) {
            $avatarRules = [
                'avatar' => 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpeg,image/png]|max_size[avatar,2048]',
            ];

            if (!$this->validate($avatarRules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $uploadPath = FCPATH . 'uploads/avatars/';

            if (!is_dir($uploadPath) && !mkdir($uploadPath, 0777, true) && !is_dir($uploadPath)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', ['avatar' => 'The avatar upload directory could not be created.']);
            }

            $filename = $avatar->getRandomName();
            $avatar->move($uploadPath, $filename);

            $originalPath = $uploadPath . $filename;

            try {
                $image = service('image');
                $image->withFile($originalPath)
                    ->fit(150, 150, 'center')
                    ->save($originalPath);
            } catch (\Throwable $e) {
                if (is_file($originalPath)) {
                    unlink($originalPath);
                }

                return redirect()->back()
                    ->withInput()
                    ->with('errors', ['avatar' => 'The uploaded image could not be prepared. Check your PHP image extension.']);
            }

            // Remove the previous prepared avatar only after the new one is ready.
            if (!empty($user['avatar'])) {
                $oldPath = $uploadPath . $user['avatar'];

                if (is_file($oldPath)) {
                    unlink($oldPath);
                }
            }

            // Store only the filename in the database.
            $data['avatar'] = $filename;
        }

        $this->userModel->update($id, $data);

        return redirect()->to(site_url('users'))
            ->with('success', 'User updated successfully.');
    }
}
