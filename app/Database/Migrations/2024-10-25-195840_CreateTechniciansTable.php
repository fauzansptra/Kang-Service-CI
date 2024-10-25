<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTechniciansTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'technician_id'       => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'user_id'             => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'unique' => true],
            'expertise'           => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'service_queue_count' => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'created_at'          => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('technician_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('technicians');
    }

    public function down()
    {
        $this->forge->dropTable('technicians');
    }
}
