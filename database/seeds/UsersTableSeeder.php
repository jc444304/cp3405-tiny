<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imagePath = storage_path("app/public/profile");
        if (!File::exists($imagePath)) {
            File::makeDirectory($imagePath, 755, true, true);
        }

        $categories = [];
        foreach (range(1, 5) as $i) {
            $category = factory(App\JobCategory::class)->create();
            $categories[] = $category;
        }

        for ($i = 0; $i < 10; $i++) {

            $user = factory(App\User::class)->create([
                //'password'  => bcrypt('password'),
                'user_type' => 'teacher'
            ]);

            factory(App\Teacher::class)->create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]);

            $user = factory(App\User::class)->create([
                //'password'  => bcrypt('password'),
                'user_type' => 'student'
            ]);

            factory(App\Student::class)->create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]);

            $user = factory(App\User::class)->create([
                //'password'  => bcrypt('password'),
                'user_type' => 'company',
            ]);

            $company = factory(App\Company::class)->create([
                'user_id' => $user->id
            ]);

            $index = array_rand($categories);
            $category = $categories[$index];
            $job = factory(App\Job::class,2)->create([
                'company_id' => $company->id,
                'category_id' => $category->id,
            ]);

        }
    }
}
