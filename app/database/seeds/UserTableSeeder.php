<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();
		
		$user = User::create(array(
		'firstname'=>'Kate',
		'lastname'=>'deBethune',
		'email'=>'kdebethune@gmail.com',
		'password'=> Hash::make('blah'),
		'pwd_unhashed'=>'blah',
		'remember_token'=>'YES',
		'admin' => 1
		));
		
		$faker = Faker::create();
		
		for ($i = 0; $i < 10; $i++)
		{
			$pwd = $faker->word;
			$user = User::create(array(
			'firstname'=>$faker->firstName,
			'lastname'=>$faker->lastName,
			'email'=>$faker->email,
			'password' => Hash::make($pwd),
			'pwd_unhashed'=>$pwd,
			'remember_token'=>'YES',
			'admin' => 0
		));
		}
	
	}
}
?>