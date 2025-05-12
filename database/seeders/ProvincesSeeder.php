<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Utils\StringUtil;
use DB;
use Exception;
use Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Log;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get(env('PROVINCE_API_URL', 'https://provinces.open-api.vn/api/?depth=3'))->json();
        try {
            DB::beginTransaction();
            City::truncate();
            District::truncate();
            Ward::truncate();
            foreach ($response as $city) {
                $createdCity = City::create([
                    'name' => $city['name'],
                    'slug' => StringUtil::toSlug($city['name']),
                ]);
                foreach($city['districts'] as $district) {
                    $createdDistrict = District::create([
                        'name' => $district['name'],
                        'slug' => StringUtil::toSlug($district['name']),
                        'city_id' => $createdCity->id,
                    ]);

                    foreach($district['wards'] as $ward) {
                        Ward::create([
                            'name' => $ward['name'],
                            'slug' => StringUtil::toSlug($ward['name']),
                            'district_id' => $createdDistrict->id,
                        ]);
                    }
                }
            }
            DB::commit();
        }
        catch(Exception $e) {
            Log::error($e->getTraceAsString());
            DB::rollBack();
        }
    }
}
