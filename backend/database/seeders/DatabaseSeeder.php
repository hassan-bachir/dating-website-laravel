<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        $current_date_time = Carbon::now()->toDateTimeString();
        DB::table('users')->insert([
            'name' => 'jihad',
            'email' => 'jihad@email.com',
            'mobile' => '81 123 123',
            'date_of_birth' => '2000-10-10',
            'password' => Hash::make('test'),
            'location' => '32.2395695,35.1110406',
            'gender' => 'male',
            'preference' => 'female ',
            
            'created_at' => $current_date_time
        ]);
        DB::table('users')->insert([
            'name' => 'isma',
            'email' => 'isma@email.com',
            'mobile' => '81 234242',
            'date_of_birth' => '1990-10-10',
            'password' => Hash::make('test'),
            'location' => '32.2395695,35.1110406',
            'gender' => 'male',
            'preference' => 'female ',
            
            'created_at' => $current_date_time
        ]);
        DB::table('users')->insert([
            'name' => 'imad',
            'email' => 'imad@email.com',
            'mobile' => '81 354 123',
            'date_of_birth' => '1980-10-10',
            'password' => Hash::make('test'),
            'location' => '32.2395695,35.1110406',
            'gender' => 'male',
            'preference' => 'female ',
            
            'created_at' => $current_date_time
        ]);
        DB::table('blocks')->insert([
            'user1_id' => 1,
            'user2_id' => 3,
            'created_at' => $current_date_time
        ]);
        DB::table('blocks')->insert([
            'user1_id' => 3,
            'user2_id' => 2,
            'created_at' => $current_date_time
        ]);
        DB::table('favorites')->insert([
            'user1_id' => 1,
            'user2_id' => 4,
            'created_at' => $current_date_time
        ]);
        DB::table('messages')->insert([
            'sender_id' => 1,
            'receiver_id' => 4,
            'message' => 'Hello',
            'created_at' => $current_date_time
        ]);
        DB::table('messages')->insert([
            'sender_id' => 4,
            'receiver_id' => 1,
            'message' => 'what is this',
            'created_at' => $current_date_time
        ]);
        DB::table('favorites')->insert([
            'user1_id' => 2,
            'user2_id' => 4,
            'created_at' => $current_date_time
        ]);
        DB::table('messages')->insert([
            'sender_id' => 2,
            'receiver_id' => 4,
            'message' => 'how are you',
            'created_at' => $current_date_time
        ]);
        DB::table('messages')->insert([
            'sender_id' => 4,
            'receiver_id' => 2,
            'message' => 'HI!',
            'created_at' => $current_date_time
        ]);
    }
}
