<?php

namespace Database\Seeders;

use App\Models\Scategory;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;
use Str;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Ticket::truncate();

        $priority = Ticket::PRIORITY;
        $randPriority = array_rand($priority);
        $singlePriority = $priority[$randPriority];

        $users = User::all();
        foreach ($users as $user) {
            $supportCategory = Scategory::inRandomOrder()->first();
            Ticket::create([
                'user_id' => $user->id,
                'scategory_id' => $supportCategory->id,
                'ticket_id' => strtoupper(Str::random(10)),
                'title' => 'problem' . $user->id,
                'priority' => $singlePriority,
                'message' => 'Lorem Ipsum typesetting industry. Lorem Ipsum seeder example' . $user->id,
                'status' => true
            ]);
        }
    }
}
