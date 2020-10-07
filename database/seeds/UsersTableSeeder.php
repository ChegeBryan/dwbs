<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Employer',
                'email' => 'employer@dwbs.com',
                'is_employer' => '1',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Candidate',
                'email' => 'candidate@dwbs.com',
                'is_employer' => '0',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($user as $key => $value) {
            App\User::create($value);
        }
    }
}
