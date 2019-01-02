<?php

use Illuminate\Database\Seeder;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 调用工厂设备 生成数据;
        factory(App\Venue::class, 80)->create();
    }

}
