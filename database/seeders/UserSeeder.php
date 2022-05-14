<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fname' => 'admin',
            'lname' =>'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'user_type' => 'Admin',
            'remember_token' => Str::random(10),
        ]);

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $patientData[] = [
                'fname' => $faker->firstName(),
                'lname' => $faker->lastName(),
                'email' => $faker->unique()->safeEmail(),
                'user_type' => 'Patient',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),

            ];
        }

        foreach ($patientData as $pat) {
            User::insert($pat);
        }

       
        for ($i = 0; $i < 5; $i++) {
            $docData[] = [
                'fname' => $faker->firstName(),
                'lname' => $faker->lastName(),
                'email' => $faker->unique()->safeEmail(),
                'user_type' => 'Doctor',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),

            ];
        }

        foreach ($docData as $doc) {
            User::insert($doc);
        }

        for ($i = 0; $i < 5; $i++) {
            $pharmData[] = [
                'fname' => $faker->firstName(),
                'lname' => $faker->lastName(),
                'email' => $faker->unique()->safeEmail(),
                'user_type' => 'Pharmacist',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),

            ];
        }

        foreach ($pharmData as $pharma) {
            User::insert($pharma);
        }



    }
}
