<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class pasien extends Seeder
{
	public function run()
	{
		//
		$pasien_data = [
			[
				'id' => '1',
				'nisn'    => '1312312',
				'nama'    => 'all'
			],
			[
				'id' => '2',
				'nisn'    => '243242',
				'nama'    => 'rojak',
			],
			[
				'id' => '3',
				'nisn'    => '423423',
				'nama'    => 'alif',
			]
		];
		foreach ($pasien_data as $data) {
			// insert semua data ke tabel
			$this->db->table('pasien')->insert($data);
		}
	}
}
