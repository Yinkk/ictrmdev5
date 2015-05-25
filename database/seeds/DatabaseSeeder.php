<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Faculty;

class DatabaseSeeder extends Seeder {


    private function initRoles(){

        $roles = ["admin","user","tester"];

        foreach($roles as $r){
            $role = new \App\Models\Role();
            $role->name = $r;
            $role->save();
        }

    }

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->initRoles();

		$fac1 = new Faculty();
        $fac1->name_th = "คณะเทคโนโลยีสารสนเทศและการสื่อสาร";
        $fac1->save();





	}

}
