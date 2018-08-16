<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jiras', function (Blueprint $table) {
            $table->increments('id');
            $table->string("issue_name")->nullable();
            $table->string("issuetype_name", 100)->nullable();
            $table->string("serial_no", 100)->nullable();
            $table->string("project_key", 100);
            $table->string('issue_status', 100)->nullable();
            $table->string('terminal_id', 100)->nullable();
            $table->string('merchant_id', 100)->nullable();
            $table->string('location', 100)->nullable();
            $table->string('supplier', 100)->nullable();
            $table->integer('created_by')->unsigned;
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jiras');
    }
}
