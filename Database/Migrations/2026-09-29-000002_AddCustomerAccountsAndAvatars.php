<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCustomerAccountsAndAvatars extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'full_name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100],
            'created_at' => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('customers');

        $this->forge->addColumn('users', [
            'avatar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'email',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('customers', true);
        $this->forge->dropColumn('users', 'avatar');
    }
}
