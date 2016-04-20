<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightsTable extends Migration
{

    protected $fillable = array(
        'weight',
        'date'
    );
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weights', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('weight');
            $table->date('date');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('weights');
    }
}
