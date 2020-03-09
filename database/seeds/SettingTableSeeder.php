<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            ['key' => 'carry_over', 'default_value' => 0],
            ['key' => 'carry_over_period', 'default_value' => ''],
            ['key' => 'security_strict_protection', 'default_value' => 0],
            ['key' => 'reminder_transaction_input', 'default_value' => 1],
            ['key' => 'notify_me_daily_transaction', 'default_value' => 1],
            ['key' => 'notify_me_weekly_transaction', 'default_value' => 1],
            ['key' => 'notify_me_monthly_transaction', 'default_value' => 1],
            ['key' => 'notify_me_annual_transaction', 'default_value' => 1],
        ]);
    }
}
