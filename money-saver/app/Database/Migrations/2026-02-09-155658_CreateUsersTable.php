<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
    'id' => [
        'type'       => 'VARCHAR',
        'constraint' => 36,
    ],
    'email' => [
        'type'       => 'VARCHAR',
        'constraint' => 150,
        'unique'     => true,
        'null'       => true,
    ],
    'password' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => true,
    ],
    'currency' => [
        'type' => 'VARCHAR',
        'constraint' => 10,
        'default' => 'INR'
    ],
    'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
]);


        $this->forge->addKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}

