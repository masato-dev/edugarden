<?php

namespace Database\Seeders;

use App\Models\AppSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppSetting::create([
            'is_active' => true,
            'sections' => json_encode([]),
            'meta_title' => 'Edugarden',
            'meta_description' => 'Edugarden - Nhà sách Cơ Đốc chuyên cung cấp tài liệu, sách đạo Tin Lành, Kinh Thánh và giáo trình học Kinh Thánh.',
            'meta_keywords' => 'sách cơ đốc,kinh thánh,giáo trình đạo tin lành,nhà sách cơ đốc,edugarden',
            'meta_image' => null, // hoặc '', nếu muốn lưu chuỗi rỗng
            'meta_url' => env('APP_URL', 'https://edugarden.net'),
            'meta_type' => 'website',
            'meta_locale' => 'vi',
        ]);        
    }
}
