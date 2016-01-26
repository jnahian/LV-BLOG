<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTrigger extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()

    {
        DB::unprepared('
              CREATE TRIGGER tr_User_Default_Member_Role AFTER INSERT ON `users` FOR EACH ROW
                   BEGIN
                       INSERT INTO role_user (`role_id`, `user_id`) VALUES (2, NEW.id);
                   END
                   ');
    }    

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_User_Default_Member_Role`');
    }

}
