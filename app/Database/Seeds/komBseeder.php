<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class komBseeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Fenni',
                'alamat'    => 'JL.Kongsi no.103',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama' => 'Handa',
                'alamat'    => 'JL.Kongsi no.107',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama' => 'Yuli',
                'alamat'    => 'JL.Kongsi no.105',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO komB (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('komB')->insertBatch($data);
    }
}
