<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("friends_users", function(Blueprint $table) {
		// create table fields
		//$table->increments("id");
		$table->integer("user_id")->unsigned();
		$table->integer("friend_id")->unsigned();

		// create relations between friends and users
		$table->foreign("user_id")->references("id")->on("users");
		$table->foreign("friend_id")->references("id")->on("users");

		//create the table
		$table->primary(array(/*"id",*/"user_id","friend_id"));
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("friends_users");
    }
}
