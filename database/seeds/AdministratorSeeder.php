<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
 $administrator->username = "junianto";
 $administrator->name = "Junianto Endra";
 $administrator->email = "junianto@junistore";
 $administrator->roles = json_encode(["ADMIN"]);
 $administrator->password = \Hash::make("junistore");
 $administrator->avatar = "saat-ini-tidak-ada-file.png";
 $administrator->phone = "0813423212";
 $administrator->address = "Junianto Endra, Semarang, Jawa Tengah";
 $administrator->save();
 $this->command->info("User Admin berhasil diinsert");

    }
}
