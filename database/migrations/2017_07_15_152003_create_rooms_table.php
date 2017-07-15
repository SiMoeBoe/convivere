<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'rooms', function (Blueprint $table) {
      $table->increments( 'id' );
      $table->timestamps();
      $table->softDeletes();
      $table->integer( 'member_id' );
      $table->string( 'name' );
      $table->integer( 'size' )->nullable();
      $table->integer( 'rent' )->nullable();
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists( 'rooms' );
  }

}