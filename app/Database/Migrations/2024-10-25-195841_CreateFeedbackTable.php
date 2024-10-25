<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFeedbackTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'feedback_id'   => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'request_id'    => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'user_id'       => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'rating'        => ['type' => 'INT', 'constraint' => 1, 'null' => false],
            'review'        => ['type' => 'TEXT', 'null' => true],
            'submitted_at'  => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('feedback_id', true);
        $this->forge->addForeignKey('request_id', 'service_requests', 'request_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('feedback');
    }

    public function down()
    {
        $this->forge->dropTable('feedback');
    }
}
