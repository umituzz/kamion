<?php

namespace Database\Seeders;

use App\Models\LoadType;
use Illuminate\Database\Seeder;

class LoadTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        LoadType::factory()->count(1)->create();

        LoadType::create(['name' => 'Kısmi Yük (Parça Yük)', 'description' => 'bir kamyon veya konteyner içinde tam olarak doldurulmamış olan yüklerdir. Birden fazla müşterinin yüklerini aynı araçla taşımak için kullanılır. Kısmi yük taşımacılığı, maliyetleri düşürmek ve kapasiteyi daha iyi kullanmak için yaygın olarak tercih edilir.']);
        LoadType::create(['name' => 'Tam Yük', 'description' => 'Tam yük taşımacılığında, bir kamyon veya konteyner tek bir müşterinin yüküyle doldurulur. Bu, yükün tamamen kullanılmasını ve tek bir göndericinin yükünü taşımak için kullanılır.']);
        LoadType::create(['name' => 'Tehlikeli Madde Taşımacılığı', 'description' => ' Tehlikeli maddeler, patlayıcılar, kimyasallar, gazlar ve diğer tehlikeli maddeleri içerebilir. Bu tür yüklerin taşınması özel eğitim ve izinler gerektirir ve genellikle özel ekipmanlarla taşınır.']);
        LoadType::create(['name' => 'Soğuk Zincir Taşımacılığı', 'description' => 'Soğuk zincir taşımacılığı, belirli sıcaklık koşullarında taşınması gereken ürünler için kullanılır. Özellikle gıda ürünleri ve ilaçlar gibi hassas ürünlerin taşınmasında kullanılır.']);
        LoadType::create(['name' => 'Ağır Yük Taşımacılığı', 'description' => 'Ağır yük taşımacılığı, ağır ve büyük ebatlı yükleri taşımak için özel ekipman ve taşıma yöntemleri gerektirir. Bu tür yükler genellikle inşaat malzemeleri, endüstriyel ekipmanlar ve büyük makineleri içerir.']);
        LoadType::create(['name' => 'Denizyolu Taşımacılığı', 'description' => 'Denizyolu taşımacılığı, konteyner gemileri veya diğer deniz araçlarıyla yapılan yük taşımacılığını ifade eder. Bu tür taşımacılık, uluslararası nakliyat için yaygın olarak kullanılır.']);
        LoadType::create(['name' => 'Hava Taşımacılığı', 'description' => 'Hava taşımacılığı, hızlı teslimat gerektiren yüklerin taşınması için kullanılır. Hava kargo uçakları ve kurye hizmetleri bu tür taşımacılığa örnektir.']);
        LoadType::create(['name' => 'Kara Taşımacılığı', 'description' => 'Kara taşımacılığı, karayolu taşımacılığı için kullanılır ve kamyonlar, kamyonetler ve trenler gibi araçları içerir. Bu, kısa ve uzun mesafe taşımacılığı için yaygın olarak kullanılır.']);
    }
}
