<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'        => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'username'       => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false, 'unique' => true],
            'password'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'name'           => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false],
            'email'          => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => false, 'unique' => true],
            'phone_number'   => ['type' => 'VARCHAR', 'constraint' => 15, 'null' => true],
            'role'           => ['type' => 'ENUM', 'constraint' => ['user', 'admin', 'technician'], 'default' => 'user'],
            'created_at'     => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
