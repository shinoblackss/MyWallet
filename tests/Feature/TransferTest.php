<?php

namespace Tests\Feature;

use App\Transfer;
use App\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransferTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostTransfer()
    {
        $wallet = factory(Wallet::class)->create();
        $transfer = factory(Transfer::class)->make();

        $response = $this->json('POST', 'api/transfer', [
            'description' => $transfer->description,
            'amount' => $transfer->amount,
            'wallet_id' => $wallet->id
        ]);

        // $response
        // // ->assertJsonStructure([
        // //     'id', 'description', 'amount', 'wallet_id'
        // // ])
        // ->assertStatus(201);

        $this->assertDatabaseHas('transfers', [
            'description' => $transfer->description,
            'amount' => $transfer->amount,
            'wallet_id' => $wallet->id
        ]);

        $this->assertDatabaseHas('wallets', [
            'id' => $wallet->id,
            'money' => $wallet->money + $transfer->amount
        ]);

    }
}
