<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'nik' => '109.001',
            'nama' => 'Adul Manap',
            'email' => 'trifirdyanto+adulmanap@gmail.com',
            'jabatan' => 'Karyawan',
            'departemen' => 'Produksi'
        ]);
        DB::table('employees')->insert([
            'nik' => '109.002',
            'nama' => 'Suhada Rafsanzhani',
            'email' => 'trifirdyanto+suhada@gmail.com',
            'jabatan' => 'Karyawan',
            'departemen' => 'Produksi'
        ]);
        DB::table('employees')->insert([
            'nik' => '109.003',
            'nama' => 'Rio Darmawan',
            'email' => 'trifirdyanto+riodarmawan@gmail.com',
            'jabatan' => 'Karyawan',
            'departemen' => 'Staff IT'
        ]);
    }
}
