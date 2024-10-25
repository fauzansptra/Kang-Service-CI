<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServiceHistoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'history_id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'request_id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'status'     => ['type' => 'ENUM', 'constraint' => ['queued', 'in_progress', 'repaired', 'completed']],
            'timestamp'  => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
            'note'       => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('history_id', true);
        $this->forge->addForeignKey('request_id', 'service_requests', 'request_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('service_history');
    }

    public function down()
    {
        $this->forge->dropTable('service_history');
    }
}
