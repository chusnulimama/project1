<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'          => 'Admin',
            'description'   => 'Administrator',
        ]);

        DB::table('roles')->insert([
            'name'          => 'Karyawan',
            'description'   => 'User',
        ]);

        DB::table('roles')->insert([
            'name'          => 'Pemasok',
            'description'   => 'Supplier',
        ]);
        DB::table('roles')->insert([
            'name'          => 'Penerbit',
            'description'   => 'Publisher',
        ]);
        DB::table('roles')->insert([
            'name'          => 'Konsumen',
            'description'   => 'Customer',
        ]);
    }
}
