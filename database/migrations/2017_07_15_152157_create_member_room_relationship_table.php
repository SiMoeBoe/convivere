<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberRoomRelationshipTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'member_room', function (Blueprint $table) {
      $table->increments( 'id' );
      $table->integer( 'member_id' );
      $table->integer( 'room_id' );

      $table->date( 'move_in' );
      $table->date( 'move_out' )->nullable();
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists( 'member_room' );
  }

}
