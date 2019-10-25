<?php

use App\Transfer;
use App\Wallet;
use Illuminate\Database\Seeder;

class GeneralSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wallet = Wallet::create([
            'money' = 0
        ]);
    }
}
