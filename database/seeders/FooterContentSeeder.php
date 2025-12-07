<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FooterContent;

class FooterContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Column 1: Debora Craft
        FooterContent::create([
            'column' => 'column_1',
            'type' => 'title',
            'title' => 'Debora Craft',
            'order' => 1,
        ]);
        
        FooterContent::create([
            'column' => 'column_1',
            'type' => 'description',
            'content' => 'Toko bunga online terpercaya dengan koleksi bunga segar berkualitas tinggi.',
            'order' => 2,
        ]);
        
        // Column 2: Produk
        FooterContent::create([
            'column' => 'column_2',
            'type' => 'title',
            'title' => 'Produk',
            'order' => 1,
        ]);
        
        FooterContent::create([
            'column' => 'column_2',
            'type' => 'list_item',
            'content' => 'Bunga',
            'url' => '#',
            'order' => 2,
        ]);
        
        FooterContent::create([
            'column' => 'column_2',
            'type' => 'list_item',
            'content' => 'Aksesoris',
            'url' => '#',
            'order' => 3,
        ]);
        
        FooterContent::create([
            'column' => 'column_2',
            'type' => 'list_item',
            'content' => 'Gift Set',
            'url' => '#',
            'order' => 4,
        ]);
        
        // Column 3: Layanan
        FooterContent::create([
            'column' => 'column_3',
            'type' => 'title',
            'title' => 'Layanan',
            'order' => 1,
        ]);
        
        FooterContent::create([
            'column' => 'column_3',
            'type' => 'list_item',
            'content' => 'Pengiriman Cepat',
            'url' => '#',
            'order' => 2,
        ]);
        
        FooterContent::create([
            'column' => 'column_3',
            'type' => 'list_item',
            'content' => 'Custom Design',
            'url' => '#',
            'order' => 3,
        ]);
        
        FooterContent::create([
            'column' => 'column_3',
            'type' => 'list_item',
            'content' => 'Event Decoration',
            'url' => '#',
            'order' => 4,
        ]);
        
        FooterContent::create([
            'column' => 'column_3',
            'type' => 'list_item',
            'content' => 'Konsultasi Gratis',
            'url' => '#',
            'order' => 5,
        ]);
        
        // Column 4: Hubungi Kami
        FooterContent::create([
            'column' => 'column_4',
            'type' => 'title',
            'title' => 'Hubungi Kami',
            'order' => 1,
        ]);
        
        FooterContent::create([
            'column' => 'column_4',
            'type' => 'social_link',
            'icon' => 'facebook',
            'url' => '#',
            'order' => 2,
        ]);
        
        FooterContent::create([
            'column' => 'column_4',
            'type' => 'social_link',
            'icon' => 'instagram',
            'url' => '#',
            'order' => 3,
        ]);
        
        FooterContent::create([
            'column' => 'column_4',
            'type' => 'social_link',
            'icon' => 'whatsapp',
            'url' => '#',
            'order' => 4,
        ]);
        
        FooterContent::create([
            'column' => 'column_4',
            'type' => 'social_link',
            'icon' => 'email',
            'url' => '#',
            'order' => 5,
        ]);
    }
}
