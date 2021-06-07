<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

         DB::table('users')->insert([
			[
				'name' => 'admin',
				'email' => 'admin@gmail.com',
				'password' => bcrypt('123456'),
				'created_at' => now(),
				'updated_at' => now(),
				'email_verified_at' => now(),
			],
			[
				'name' => 'user',
				'email' => 'user@gmail.com',
				'password' => bcrypt('123456'),
				'created_at' => now(),
				'updated_at' => now(),
				'email_verified_at' => now(),
			],
		]);

		DB::table('roles')->insert([
			['name' => 'admin', 'display_name' => 'admin'],
			['name' => 'user', 'display_name' => 'user'],
		]);

		
		DB::table('permissions')->insert([
			['name' => 'view_cate','display_name' => 'view-cate'],
			['name' => 'update_cate','display_name' => 'update-cate'],
			['name' => 'delete_cate','display_name' => 'delete-cate'],
			['name' => 'list_cate','display_name' => 'list-cate']
		]);
		

		DB::table('user_role')->insert([
			'user_id' => 1,
			'role_id' => 1,
		]);


		DB::table('role_permission')->insert([
			['permission_id' => 1, 'role_id' => 1],
			['permission_id' => 2, 'role_id' => 1],
			['permission_id' => 3, 'role_id' => 1],
			['permission_id' => 4, 'role_id' => 1],
		]);
    }
}
