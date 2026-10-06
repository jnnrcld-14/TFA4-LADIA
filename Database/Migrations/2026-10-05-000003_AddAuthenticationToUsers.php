<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAuthenticationToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'username',
            ],
        ]);

        // Give existing users a temporary default password: password
        // The value stored in the database is a password_hash(), never plaintext.
        $this->db->table('users')
            ->set('password', password_hash('password', PASSWORD_DEFAULT))
            ->where('password IS NULL', null, false)
            ->update();

        $this->db->query("ALTER TABLE users MODIFY password VARCHAR(255) NOT NULL");
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'password');
    }
}
