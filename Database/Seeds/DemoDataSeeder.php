<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run()
    {
        $today = date('Y-m-d');
        $createdAt = date('Y-m-d H:i:s');

        $this->db->table('tasks')->insertBatch([
            ['title' => 'Review class notes', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Finish CodeIgniter activity', 'status' => 'in progress', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Submit task report', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Check project requirements', 'status' => 'completed', 'task_date' => date('Y-m-d', strtotime('-1 day')), 'created_at' => $createdAt],
            ['title' => 'Organize source files', 'status' => 'completed', 'task_date' => date('Y-m-d', strtotime('-1 day')), 'created_at' => $createdAt],
            ['title' => 'Prepare database schema', 'status' => 'completed', 'task_date' => date('Y-m-d', strtotime('-2 days')), 'created_at' => $createdAt],
            ['title' => 'Read MVC documentation', 'status' => 'pending', 'task_date' => date('Y-m-d', strtotime('+1 day')), 'created_at' => $createdAt],
            ['title' => 'Plan next week tasks', 'status' => 'pending', 'task_date' => date('Y-m-d', strtotime('+2 days')), 'created_at' => $createdAt],
        ]);

        $this->db->table('users')->insert([
            'username' => 'demo_user',
            'full_name' => 'Demo User',
            'email' => 'demo.user@example.com',
            'avatar' => null,
            'created_at' => $createdAt,
        ]);

        $this->db->table('customers')->insertBatch([
            ['full_name' => 'Juan Dela Cruz', 'email' => 'juan@example.com', 'created_at' => $createdAt],
            ['full_name' => 'Maria Santos', 'email' => 'maria@example.com', 'created_at' => $createdAt],
        ]);
    }
}
