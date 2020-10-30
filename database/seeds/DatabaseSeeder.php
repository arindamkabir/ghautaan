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
        DB::table('users')->insert([
            [ 'f_name' => 'Ayon', 'l_name' => 'Ahmed', 'email' => 'smunt@munni.com', 'username'=>'ayon', 'password' => Hash::make('123456'), 'user_type' => '1', 'mobile_number' => '01191171606', 'created_at' => date('Y-m-d H:i:s')],
            [ 'f_name' => 'Mishu', 'l_name' => 'Chowdhury', 'email' => 'munty@munni.com', 'username'=>'munni', 'password' => Hash::make('123456'), 'user_type' => '2', 'mobile_number' => '011915611606', 'created_at' => date('Y-m-d H:i:s')],
            [ 'f_name' => 'Labib', 'l_name' => 'Hamdard', 'email' => 'smt@mmun.com', 'username'=>'auro', 'password' => Hash::make('123456'), 'user_type' => '1', 'mobile_number' => '01192111606', 'created_at' => date('Y-m-d H:i:s')],
            [ 'f_name' => 'Yamin', 'l_name' => 'Yapusi', 'email' => 'mnty@munna.com', 'username'=>'munna', 'password' => Hash::make('123456'), 'user_type' => '2', 'mobile_number' => '01192411606', 'created_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('freelancers')->insert([
            [ 'user_id' => '1', 'profession' => 'Photographer', 'dob' => '1992-08-15','address' => '4/6 Uttara','city' => 'Dhaka','state' => 'Dhaka','zip' => '1207','about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis quaerat, fuga beatae accusantium ab cumque quas, dolorem asperiores recusandae laboriosam totam nostrum porro quae, mollitia soluta similique! Impedit distinctio voluptates rem incidunt adipisci velit tempora doloremque, aut error id nesciunt, nisi qui rerum asperiores consequatur quisquam culpa omnis, minus eos ex. Aspernatur pariatur deleniti tenetur iure ipsa, doloribus alias, repellat eveniet earum dolores saepe esse suscipit consequuntur veritatis ab reprehenderit, aut delectus. Minus eum voluptatibus sed, vitae, quia illum earum pariatur dolores omnis autem inventore tenetur dicta molestiae unde suscipit neque quibusdam nihil officiis exercitationem natus delectus ullam. Est, nobis.','created_at' => date('Y-m-d H:i:s')],
            [ 'user_id' => '3', 'profession' => 'Musician', 'dob' => '1992-08-15','address' => '4/6 Uttara','city' => 'Dhaka','state' => 'Dhaka','zip' => '1207','about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis quaerat, fuga beatae accusantium ab cumque quas, dolorem asperiores recusandae laboriosam totam nostrum porro quae, mollitia soluta similique! Impedit distinctio voluptates rem incidunt adipisci velit tempora doloremque, aut error id nesciunt, nisi qui rerum asperiores consequatur quisquam culpa omnis, minus eos ex. Aspernatur pariatur deleniti tenetur iure ipsa, doloribus alias, repellat eveniet earum dolores saepe esse suscipit consequuntur veritatis ab reprehenderit, aut delectus. Minus eum voluptatibus sed, vitae, quia illum earum pariatur dolores omnis autem inventore tenetur dicta molestiae unde suscipit neque quibusdam nihil officiis exercitationem natus delectus ullam. Est, nobis.','created_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('employers')->insert([
            [ 'user_id' => '2','created_at' => date('Y-m-d H:i:s'), 'dob' => '1992-08-15','address' => '4/6 Uttara','city' => 'Dhaka','state' => 'Dhaka','zip' => '1207','created_at' => date('Y-m-d H:i:s')],
            [ 'user_id' => '4','created_at' => date('Y-m-d H:i:s'), 'dob' => '1992-08-15','address' => '4/6 Uttara','city' => 'Dhaka','state' => 'Dhaka','zip' => '1207','created_at' => date('Y-m-d H:i:s')],
        ]);
        
        DB::table('jobs')->insert([
            [ 'user_id' => '2', 'job_title' => 'Need a photographer', 'job_category' => 'Photography', 'job_address' => 'Dhaka', 'job_description' => '{Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores aperiam mollitia nesciunt sapiente alias voluptatum asperiores porro nemo veritatis pariatur cum magnam ab debitis officia accusantium minima provident, ipsa dicta?', 'job_budget' =>'5000', 'job_date' => '2021-10-10', 'job_status' => "unassigned", 'created_at' => date('Y-m-d H:i:s')],
            [ 'user_id' => '2', 'job_title' => 'Need a photographer', 'job_category' => 'Photography', 'job_address' => 'Dhaka', 'job_description' => '{Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores aperiam mollitia nesciunt sapiente alias voluptatum asperiores porro nemo veritatis pariatur cum magnam ab debitis officia accusantium minima provident, ipsa dicta?', 'job_budget' =>'5000', 'job_date' => '2021-10-10', 'job_status' => "unassigned", 'created_at' => date('Y-m-d H:i:s')],
            [ 'user_id' => '2', 'job_title' => 'Need a photographer', 'job_category' => 'Photography', 'job_address' => 'Dhaka', 'job_description' => '{Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores aperiam mollitia nesciunt sapiente alias voluptatum asperiores porro nemo veritatis pariatur cum magnam ab debitis officia accusantium minima provident, ipsa dicta?', 'job_budget' =>'5000', 'job_date' => '2021-10-10', 'job_status' => "unassigned", 'created_at' => date('Y-m-d H:i:s')],
            [ 'user_id' => '2', 'job_title' => 'Need a photographer', 'job_category' => 'Photography', 'job_address' => 'Dhaka', 'job_description' => '{Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores aperiam mollitia nesciunt sapiente alias voluptatum asperiores porro nemo veritatis pariatur cum magnam ab debitis officia accusantium minima provident, ipsa dicta?', 'job_budget' =>'5000', 'job_date' => '2021-10-10', 'job_status' => "unassigned", 'created_at' => date('Y-m-d H:i:s')],
            [ 'user_id' => '2', 'job_title' => 'Need a photographer', 'job_category' => 'Photography', 'job_address' => 'Dhaka', 'job_description' => '{Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores aperiam mollitia nesciunt sapiente alias voluptatum asperiores porro nemo veritatis pariatur cum magnam ab debitis officia accusantium minima provident, ipsa dicta?', 'job_budget' =>'5000', 'job_date' => '2021-10-10', 'job_status' => "unassigned", 'created_at' => date('Y-m-d H:i:s')],
            [ 'user_id' => '2', 'job_title' => 'Need a photographer', 'job_category' => 'Photography', 'job_address' => 'Dhaka', 'job_description' => '{Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores aperiam mollitia nesciunt sapiente alias voluptatum asperiores porro nemo veritatis pariatur cum magnam ab debitis officia accusantium minima provident, ipsa dicta?', 'job_budget' =>'5000', 'job_date' => '2021-10-10', 'job_status' => "unassigned", 'created_at' => date('Y-m-d H:i:s')],
            [ 'user_id' => '2', 'job_title' => 'Need a photographer', 'job_category' => 'Photography', 'job_address' => 'Dhaka', 'job_description' => '{Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores aperiam mollitia nesciunt sapiente alias voluptatum asperiores porro nemo veritatis pariatur cum magnam ab debitis officia accusantium minima provident, ipsa dicta?', 'job_budget' =>'5000', 'job_date' => '2021-10-10', 'job_status' => "unassigned", 'created_at' => date('Y-m-d H:i:s')],
            [ 'user_id' => '2', 'job_title' => 'Need a photographer', 'job_category' => 'Photography', 'job_address' => 'Dhaka', 'job_description' => '{Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores aperiam mollitia nesciunt sapiente alias voluptatum asperiores porro nemo veritatis pariatur cum magnam ab debitis officia accusantium minima provident, ipsa dicta?', 'job_budget' =>'5000', 'job_date' => '2021-10-10', 'job_status' => "unassigned", 'created_at' => date('Y-m-d H:i:s')],

        ]);

            
    }
}
