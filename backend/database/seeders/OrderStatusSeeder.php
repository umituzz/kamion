<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        OrderStatus::factory()->count(1)->create();

        OrderStatus::create(['name' => 'Sipariş Alındı', 'description' => 'Müşterinin siparişi başarıyla işlendi ve kaydedildi, ancak henüz hazırlanmaya veya sevkiyata çıkarılmadı.']);
        OrderStatus::create(['name' => 'Hazırlanıyor', 'description' => 'Sipariş, ürünlerin seçilip paketlendiği veya hizmetin hazırlandığı aşamadayken bu durumu alır.']);
        OrderStatus::create(['name' => 'Kargoya Verildi', 'description' => 'Sipariş, gönderi firmasına teslim edildi ve sevkiyat sürecine girdi. Bu aşamadan sonra müşteriye takip numarası sağlanabilir.']);
        OrderStatus::create(['name' => 'Teslimat Yolda', 'description' => ' Sipariş, teslimat adresine doğru yolda olduğu zaman bu durumu alır. Müşteri, ürünlerin veya hizmetin yakında teslim edileceğini bekler.']);
        OrderStatus::create(['name' => 'Teslim Edildi', 'description' => 'Sipariş, müşteriye başarıyla teslim edildi. Müşteri siparişini aldı ve işlem tamamlandı.']);
        OrderStatus::create(['name' => 'İade İstemi', 'description' => 'Müşteri, aldığı ürünlerle ilgili bir sorun yaşarsa veya iade etmek istiyorsa bu durumu bildirir.']);
        OrderStatus::create(['name' => 'İade İşlemde', 'description' => 'İade isteği alındı ve işleniyor. Ürünler müşteriden geri alınıyor ve iade işlemi başlatılıyor.']);
        OrderStatus::create(['name' => 'İade Tamamlandı', 'description' => ' İade işlemi başarıyla tamamlandı ve müşteriye iade edilen tutar veya değiştirilen ürün gönderildi.']);
        OrderStatus::create(['name' => 'Sipariş İptal Edildi', 'description' => 'Müşteri siparişi iptal etti veya işletme bir nedenle siparişi iptal etti.']);
        OrderStatus::create(['name' => 'Sipariş Tamamlandı', 'description' => 'Tüm işlemler tamamlandı ve sipariş başarıyla sonuçlandı.']);
    }
}
