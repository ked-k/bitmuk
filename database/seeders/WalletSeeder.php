<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wallet::truncate();

        \DB::table('wallets')->insert(
            [
                [
                    'name' => 'US Dollar',
                    'currency' => 'USD'
                ],
                [
                    'name' => 'Singapore Dollar',
                    'currency' => 'SGD'
                ],
            ]
        );
    }
}
