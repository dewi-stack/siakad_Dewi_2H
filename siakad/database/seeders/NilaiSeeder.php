<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
            [
                "mahasiswa_id" => "2021434571",
                "matakuliah_id" => "1",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434571",
                "matakuliah_id" => "2",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434571",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434571",
                "matakuliah_id" => "4",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434572",
                "matakuliah_id" => "1",
                "nilai" => "A"
            ],
            [
                "mahasiswa_id" => "2021434572",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434572",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434572",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434573",
                "matakuliah_id" => "1",
                "nilai" => "A"
            ],
            [
                "mahasiswa_id" => "2021434573",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434573",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434573",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434574",
                "matakuliah_id" => "1",
                "nilai" => "A"
            ],
            [
                "mahasiswa_id" => "2021434574",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434574",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434574",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434575",
                "matakuliah_id" => "1",
                "nilai" => "B"
            ],
            [
                "mahasiswa_id" => "2021434575",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434575",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434575",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434576",
                "matakuliah_id" => "1",
                "nilai" => "B"
            ],
            [
                "mahasiswa_id" => "2021434576",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434576",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434576",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434577",
                "matakuliah_id" => "1",
                "nilai" => "B"
            ],
            [
                "mahasiswa_id" => "2021434577",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434577",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434577",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434578",
                "matakuliah_id" => "1",
                "nilai" => "B"
            ],
            [
                "mahasiswa_id" => "2021434578",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434578",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434578",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434579",
                "matakuliah_id" => "1",
                "nilai" => "B"
            ],
            [
                "mahasiswa_id" => "2021434579",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434579",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434579",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434570",
                "matakuliah_id" => "1",
                "nilai" => "B"
            ],
            [
                "mahasiswa_id" => "2021434570",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434570",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434570",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434581",
                "matakuliah_id" => "1",
                "nilai" => "B"
            ],
            [
                "mahasiswa_id" => "2021434581",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2021434581",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2021434581",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
        ];

        DB::table('mahasiswa_matakuliah')->insert($data);
    }

}