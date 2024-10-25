<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServiceRequestsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'request_id'        => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'user_id'           => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'technician_id'     => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'null' => true],
            'device_type'       => ['type' => 'ENUM', 'constraint' => ['mobile', 'computer', 'tablet'], 'null' => false],
            'device_name'       => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'issue_description' => ['type' => 'TEXT', 'null' => false],
            'status'            => ['type' => 'ENUM', 'constraint' => ['queued', 'in_progress', 'repaired', 'completed'], 'default' => 'queued'],
            'priority'          => ['type' => 'ENUM', 'constraint' => ['low', 'medium', 'high'], 'default' => 'medium'],
            'ticket_id'         => ['type' => 'VARCHAR', 'constraint' => 20, 'unique' => true],
            'created_at'        => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at'        => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('request_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('technician_id', 'technicians', 'technician_id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('service_requests');
    }

    public function down()
    {
        $this->forge->dropTable('service_requests');
    }
}
