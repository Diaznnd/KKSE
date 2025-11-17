<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        $rows = [];
        for ($i = 0; $i < 40; $i++) {
            $tingkat = $faker->randomElement(['mahasiswa/i', 'dosen/pegawai']);

            // Make NIM for mahasiswa-ish, and a pseudo NIP for dosen
            if ($tingkat === 'mahasiswa/i') {
                $nim_nip = 'NIM' . $faker->unique()->numerify('20#####');
            } else {
                $nim_nip = 'NIP' . $faker->unique()->numerify('1970#####');
            }

            $rows[] = [
                'nama' => $faker->name(),
                'nim_nip' => $nim_nip,
                'department' => $faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Manajemen', 'Elektro', 'Matematika']),
                'tingkat' => $tingkat,
                'keperluan' => $faker->sentence(6),
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('visitors')->insert($rows);
    }
}
