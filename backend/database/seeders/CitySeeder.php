<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        City::factory()->count(1)->create();

        $items = [
            ['country_id' => 1, 'name' => 'ADANA', 'plate' => '1'],
            ['country_id' => 1, 'name' => 'ADIYAMAN', 'plate' => '2'],
            ['country_id' => 1, 'name' => 'AFYONKARAHİSAR', 'plate' => '3'],
            ['country_id' => 1, 'name' => 'AĞRI', 'plate' => '4'],
            ['country_id' => 1, 'name' => 'AKSARAY', 'plate' => '68'],
            ['country_id' => 1, 'name' => 'AMASYA', 'plate' => '5'],
            ['country_id' => 1, 'name' => 'ANKARA', 'plate' => '6'],
            ['country_id' => 1, 'name' => 'ANTALYA', 'plate' => '7'],
            ['country_id' => 1, 'name' => 'ARDAHAN', 'plate' => '75'],
            ['country_id' => 1, 'name' => 'ARTVİN', 'plate' => '8'],
            ['country_id' => 1, 'name' => 'AYDIN', 'plate' => '9'],
            ['country_id' => 1, 'name' => 'BALIKESİR', 'plate' => '10'],
            ['country_id' => 1, 'name' => 'BARTIN', 'plate' => '74'],
            ['country_id' => 1, 'name' => 'BATMAN', 'plate' => '72'],
            ['country_id' => 1, 'name' => 'BAYBURT', 'plate' => '69'],
            ['country_id' => 1, 'name' => 'BİLECİK', 'plate' => '11'],
            ['country_id' => 1, 'name' => 'BİNGÖL', 'plate' => '12'],
            ['country_id' => 1, 'name' => 'BİTLİS', 'plate' => '13'],
            ['country_id' => 1, 'name' => 'BOLU', 'plate' => '14'],
            ['country_id' => 1, 'name' => 'BURDUR', 'plate' => '15'],
            ['country_id' => 1, 'name' => 'BURSA', 'plate' => '16'],
            ['country_id' => 1, 'name' => 'ÇANAKKALE', 'plate' => '17'],
            ['country_id' => 1, 'name' => 'ÇANKIRI', 'plate' => '18'],
            ['country_id' => 1, 'name' => 'ÇORUM', 'plate' => '19'],
            ['country_id' => 1, 'name' => 'DENİZLİ', 'plate' => '20'],
            ['country_id' => 1, 'name' => 'DİYARBAKIR', 'plate' => '21'],
            ['country_id' => 1, 'name' => 'DÜZCE', 'plate' => '81'],
            ['country_id' => 1, 'name' => 'EDİRNE', 'plate' => '22'],
            ['country_id' => 1, 'name' => 'ELAZIĞ', 'plate' => '23'],
            ['country_id' => 1, 'name' => 'ERZİNCAN', 'plate' => '24'],
            ['country_id' => 1, 'name' => 'ERZURUM', 'plate' => '25'],
            ['country_id' => 1, 'name' => 'ESKİŞEHİR', 'plate' => '26'],
            ['country_id' => 1, 'name' => 'GAZİANTEP', 'plate' => '27'],
            ['country_id' => 1, 'name' => 'GİRESUN', 'plate' => '28'],
            ['country_id' => 1, 'name' => 'GÜMÜŞHANE', 'plate' => '29'],
            ['country_id' => 1, 'name' => 'HAKKARİ', 'plate' => '30'],
            ['country_id' => 1, 'name' => 'HATAY', 'plate' => '31'],
            ['country_id' => 1, 'name' => 'IĞDIR', 'plate' => '76'],
            ['country_id' => 1, 'name' => 'ISPARTA', 'plate' => '32'],
            ['country_id' => 1, 'name' => 'İSTANBUL', 'plate' => '34'],
            ['country_id' => 1, 'name' => 'İZMİR', 'plate' => '35'],
            ['country_id' => 1, 'name' => 'KAHRAMANMARAŞ', 'plate' => '46'],
            ['country_id' => 1, 'name' => 'KARABÜK', 'plate' => '78'],
            ['country_id' => 1, 'name' => 'KARAMAN', 'plate' => '70'],
            ['country_id' => 1, 'name' => 'KARS', 'plate' => '36'],
            ['country_id' => 1, 'name' => 'KASTAMONU', 'plate' => '37'],
            ['country_id' => 1, 'name' => 'KAYSERİ', 'plate' => '38'],
            ['country_id' => 1, 'name' => 'KIRIKKALE', 'plate' => '71'],
            ['country_id' => 1, 'name' => 'KIRKLARELİ', 'plate' => '39'],
            ['country_id' => 1, 'name' => 'KIRŞEHİR', 'plate' => '40'],
            ['country_id' => 1, 'name' => 'KİLİS', 'plate' => '79'],
            ['country_id' => 1, 'name' => 'KOCAELİ', 'plate' => '41'],
            ['country_id' => 1, 'name' => 'KONYA', 'plate' => '42'],
            ['country_id' => 1, 'name' => 'KÜTAHYA', 'plate' => '43'],
            ['country_id' => 1, 'name' => 'MALATYA', 'plate' => '44'],
            ['country_id' => 1, 'name' => 'MANİSA', 'plate' => '45'],
            ['country_id' => 1, 'name' => 'MARDİN', 'plate' => '47'],
            ['country_id' => 1, 'name' => 'MERSİN', 'plate' => '33'],
            ['country_id' => 1, 'name' => 'MUĞLA', 'plate' => '48'],
            ['country_id' => 1, 'name' => 'MUŞ', 'plate' => '49'],
            ['country_id' => 1, 'name' => 'NEVŞEHİR', 'plate' => '50'],
            ['country_id' => 1, 'name' => 'NİĞDE', 'plate' => '51'],
            ['country_id' => 1, 'name' => 'ORDU', 'plate' => '52'],
            ['country_id' => 1, 'name' => 'OSMANİYE', 'plate' => '80'],
            ['country_id' => 1, 'name' => 'RİZE', 'plate' => '53'],
            ['country_id' => 1, 'name' => 'SAKARYA', 'plate' => '54'],
            ['country_id' => 1, 'name' => 'SAMSUN', 'plate' => '55'],
            ['country_id' => 1, 'name' => 'SİİRT', 'plate' => '56'],
            ['country_id' => 1, 'name' => 'SİNOP', 'plate' => '57'],
            ['country_id' => 1, 'name' => 'SİVAS', 'plate' => '58'],
            ['country_id' => 1, 'name' => 'ŞANLIURFA', 'plate' => '63'],
            ['country_id' => 1, 'name' => 'ŞIRNAK', 'plate' => '73'],
            ['country_id' => 1, 'name' => 'TEKİRDAĞ', 'plate' => '59'],
            ['country_id' => 1, 'name' => 'TOKAT', 'plate' => '60'],
            ['country_id' => 1, 'name' => 'TRABZON', 'plate' => '61'],
            ['country_id' => 1, 'name' => 'TUNCELİ', 'plate' => '62'],
            ['country_id' => 1, 'name' => 'UŞAK', 'plate' => '64'],
            ['country_id' => 1, 'name' => 'VAN', 'plate' => '65'],
            ['country_id' => 1, 'name' => 'YALOVA', 'plate' => '77'],
            ['country_id' => 1, 'name' => 'YOZGAT', 'plate' => '66'],
            ['country_id' => 1, 'name' => 'ZONGULDAK', 'plate' => '67']
        ];

        DB::table('cities')->insert($items);
    }
}
