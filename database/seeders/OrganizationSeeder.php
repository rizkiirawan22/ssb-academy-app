<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $org = [
            'name' => 'Galuh Putra',
            'logo' => '',
            'mission' => '<ol><li>Melakukan Pembinaan Serta Mengasah Bakat / Kemampuan diBidang Sepakbola Sejak Usia Dini Sampai Remaja.</li><li>Mencetak Pemain Berkualitas Dari Aspek Skill, Attitude dan Character.</li><li>Mengharumkan Nama kecamatan Maja Dari Mulai Tingkat Lokal sampai Nasional Bahkan International.</li></ol>',
            'vision' => '<p>Mencetak Bibit Unggul Berkualitas Agar Bisa Berkiprah di Level Nasional</p>',
            'address' => 'Jl. Asrama Nyantong, No.93, Kec. Tawang, Tasikmalaya',
            'about' => 'mantap',
        ];
        Organization::create($org);
    }
}
