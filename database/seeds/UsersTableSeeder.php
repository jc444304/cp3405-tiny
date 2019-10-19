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

        for ($i = 0; $i < 10; $i++) {

            $teacher = factory(App\User::class)->create([
                //'password'  => bcrypt('password'),
                'user_type' => 'teacher'
            ]);

            factory(App\Teacher::class)->create([
                'user_id' => $teacher->id,
                'name' => $teacher->name,
                'email' => $teacher->email,
            ]);

            $student = factory(App\User::class)->create([
                //'password'  => bcrypt('password'),
                'user_type' => 'student'
            ]);

            factory(App\Teacher::class)->create([
                'user_id' => $student->id,
                'name' => $student->name,
                'email' => $student->email
            ]);

            $company = factory(App\User::class)->create([
                //'password'  => bcrypt('password'),
                'user_type' => 'company',
            ]);

            factory(App\Company::class)->create([
                'user_id' => $company->id
            ]);
        }

    }
}
