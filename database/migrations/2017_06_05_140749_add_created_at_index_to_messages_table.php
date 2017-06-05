<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedAtIndexToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            //the second parameter is the name of the index, to be called in the method dropIndex in down(). 
            $table->index('created_at', 'my_created_at_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            //this for default is clear, you must to do this for execute migrate rollback o reset.
            $table->dropIndex('my_created_at_idx');
            //note: if you dont specify the index's name, you have to put '<tablename>_<columnname>_index'.
        });
    }
}
