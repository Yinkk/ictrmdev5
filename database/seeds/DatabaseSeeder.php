<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Faculty;

class DatabaseSeeder extends Seeder {

    private function initUser(){
        $users = [
            ["admin", "admin", "นาย", "ชื่อ", "สกุล", "firstname", "lastname", "Mr.", "1", "1", "1", "1", "1", "admin_education", "admin_instiution"],
            ["test", "test", "นาย", "test", "test", "firstname", "lastname", "Mr.", "1", "1", "1", "1", "1", "test_education", "test_instiution"]
        ];

        foreach($users as $u){
            $user = new \App\Models\User();
            $user->username = $u[0];
            $user->password = $u[1];
            $user->prefixname_th = $u[2];
            $user->firstname_th = $u[3];
            $user->lastname_th = $u[4];
            $user->firstname_en = $u[5];
            $user->lastname_en = $u[6];
            $user->prefixname_en = $u[7];
            $user->faculty_id = $u[8];
            $user->major_id = $u[9];
            $user->type_id = $u[10];
            $user->position_id = $u[11];
            $user->degree_id = $u[12];
            $user->user_education = $u[13];
            $user->user_institution = $u[14];
            $user->save();
        }
    }
    private function initRoles(){

        $roles = ["Administrator","Researcher"];

        foreach($roles as $r){
            $role = new \App\Models\Role();
            $role->name = $r;
            $role->save();
        }
    }

    private function initMajors(){
        $majors = [
            ["คอมพิวเตอร์ธุรกิจ","Business Computer"],
            ["เทคโนโลยีคอมพิวเตอร์เคลื่อนที่","Mobile Computing Technology"],
            ["เทคโนโลยีสารสนเทศ","Information Technology"],
            ["ภูมิสารสนเทศศาสตร์","Geographic Information Science"],
            ["วิทยาการคอมพิวเตอร์","Computer Science"],
            ["วิศวกรรมคอมพิวเตอร์","Computer Engineering"],
            ["วิศวกรรมซอฟต์แวร์","Software Engineering"],
            ["วิศวกรรมสารสนเทศและการสื่อสาร","Information and Communication Engineering"],
            ["คอมพิวเตอร์กราฟิกและมัลติมีเดีย","Computer Graphic and Multimedia"],
            ["สำนักงานคณะ","Officer"]
        ];

        foreach ($majors as $major) {
            $majors = new \App\Models\Major();
            $majors->name_th = $major[0];
            $majors->name_en = $major[1];
            $majors->save();
        }
    }

    private function initTypes(){
        $types = [
            "พนักงานสายวิชาการ",
            "พนักงานสายสนับสนุน",
            "ครูผู้ช่วย",
            "อื่นๆ"
        ];

        foreach($types as $type){
            $types = new \App\Models\Type();
            $types->name = $type;
            $types->save();
        }
    }

    private function initPositions(){
        $positions = [
            ["ศาสตราจารย์","พนักงานสายวิชาการ"],
            ["รองศาสตราจารย์","พนักงานสายวิชาการ"],
            ["ผู้ช่วยศาสตราจารย์","พนักงานสายวิชาการ"],
            ["อาจารย์","พนักงานสายวิชาการ"],
            ["ระดับชำนาญการ","พนักงานสายสนับสนุน"],
            ["ระดับเชี่ยวชาญ","พนักงานสายสนับสนุน"],
            ["ระดับเชี่ยวชาญพิเศษ","พนักงานสายสนับสนุน"],
            ["อื่นๆ",null],
        ];

        foreach($positions as $position){

            $p = new \App\Models\Position();
            $p->name = $position[0];
            $p->save();

            //linkToType
            if($position[1]){
                $type = \App\Models\Type::where("name","=",$position[1])->first();
                $p->type()->associate($type);
                $p->save();
            }

        }
    }

    private function initDegrees(){
        $degrees = [
            "ปริญญาตรี",
            "ปริญญาโท",
            "ปริญญาเอก",
            "อื่นๆ"
        ];

        foreach($degrees as $degree){
            $degrees = new \App\Models\Degree();
            $degrees->name = $degree;
            $degrees->save();
        }
    }

    private function initBudget(){
        $budgets = [
            ["2557","100000"],
            ["2558","200000"],
        ];

        foreach($budgets as $budget){
            $budgets = new \App\Models\Budget();
            $budgets->year = $budget[0];
            $budgets->budget = $budget[1];
            $budgets->save();
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

        $this->initUser();
        $this->initRoles();
        $this->initMajors();
        $this->initTypes();
        $this->initPositions();
        $this->initDegrees();
        $this->initBudget();


		$fac1 = new Faculty();
        $fac1->name_th = "คณะเทคโนโลยีสารสนเทศและการสื่อสาร";
        $fac1->name_en = "School of Information and Communication Technology";
        $fac1->save();
	}

}
