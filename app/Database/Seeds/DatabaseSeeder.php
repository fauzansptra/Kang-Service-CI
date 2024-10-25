<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data to avoid foreign key constraint errors
        $this->disableForeignKeyChecks();
        $this->truncateTables();
        $this->enableForeignKeyChecks();

        // Seed data in the correct order
        $this->seedUsers();        // Step 1: Seed Users
        $this->seedTechnicians();  // Step 2: Seed Technicians (ensure users are present first)
        $this->seedAdmins();       // Step 3: Seed Admins (after Users)
        $this->seedServiceRequests(); // Step 4: Seed Service Requests (after Technicians)
        $this->seedServiceHistories(); // Step 5: Seed Service Histories
        $this->seedFeedbacks();     // Step 6: Seed Feedbacks
    }

    private function disableForeignKeyChecks()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');
    }

    private function enableForeignKeyChecks()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function truncateTables()
    {
        $this->db->table('Feedback')->truncate();
        $this->db->table('ServiceHistory')->truncate();
        $this->db->table('ServiceRequest')->truncate();
        $this->db->table('Technician')->truncate();
        $this->db->table('Admin')->truncate();
        $this->db->table('User')->truncate();
    }

    private function seedUsers()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('adminpassword', PASSWORD_BCRYPT),
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'phone_number' => '1234567890',
                'role' => 'admin',
            ],
            [
                'username' => 'tech1',
                'password' => password_hash('techpassword', PASSWORD_BCRYPT),
                'name' => 'Technician One',
                'email' => 'tech1@example.com',
                'phone_number' => '0987654321',
                'role' => 'technician',
            ],
            [
                'username' => 'user1',
                'password' => password_hash('userpassword', PASSWORD_BCRYPT),
                'name' => 'Regular User',
                'email' => 'user1@example.com',
                'phone_number' => '1122334455',
                'role' => 'user',
            ],
        ];

        foreach ($data as $item) {
            $this->db->table('User')->insert($item);
        }
    }

    private function seedTechnicians()
    {
        $data = [
            [
                'user_id' => 2, // Assuming Technician One is the second user
                'expertise' => 'Mobile Repair',
                'service_queue_count' => 0,
            ],
        ];

        foreach ($data as $item) {
            $this->db->table('Technician')->insert($item);
        }
    }

    private function seedAdmins()
    {
        $data = [
            [
                'user_id' => 1, // Assuming admin is the first user
                'assigned_technicians' => 1,
            ],
        ];

        foreach ($data as $item) {
            $this->db->table('Admin')->insert($item);
        }
    }

    private function seedServiceRequests()
    {
        $data = [
            [
                'user_id' => 3, // Assuming Regular User is the third user
                'technician_id' => 1, // Assuming Technician One is the first technician
                'device_type' => 'mobile',
                'device_name' => 'iPhone 12',
                'issue_description' => 'Screen cracked.',
                'status' => 'queued',
                'priority' => 'high',
                'ticket_id' => 'TICKET123',
            ],
        ];

        foreach ($data as $item) {
            $this->db->table('ServiceRequest')->insert($item);
        }
    }

    private function seedServiceHistories()
    {
        $data = [
            [
                'request_id' => 1, // Assuming this is the first service request
                'status' => 'queued',
                'timestamp' => date('Y-m-d H:i:s'),
                'note' => 'Service request created.',
            ],
        ];

        foreach ($data as $item) {
            $this->db->table('ServiceHistory')->insert($item);
        }
    }

    private function seedFeedbacks()
    {
        $data = [
            [
                'request_id' => 1, // Assuming feedback is for the first service request
                'user_id' => 3, // Regular User
                'rating' => 5,
                'review' => 'Excellent service!',
            ],
        ];

        foreach ($data as $item) {
            $this->db->table('Feedback')->insert($item);
        }
    }
}
