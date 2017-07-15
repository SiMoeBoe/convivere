<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'members', function (Blueprint $table) {
      $table->increments( 'id' );
      $table->timestamps();
      $table->softDeletes();

      $table->string( 'name' );
      $table->string( 'prename' )->nullable();
      $table->date( 'birthday' )->nullable();
      $table->enum( 'gender', [ 'man', 'woman', 'transgender', 'none', 'other' ] )->default( 'none' );

      $table->string( 'email' )->nullable();
      $table->text( 'address' )->nullable();

      $table->string( 'studies' )->nullable();
      $table->string( 'university' )->nullable();
    } );

    Schema::create( 'member_phone_numbers', function (Blueprint $table) {
      $table->increments( 'id' );
      $table->integer( 'member_id' );

      $table->string( 'identifier' );
      $table->string( 'comment' )->nullable();
      $table->string( 'number' );
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists( 'member_phone_numbers' );
    Schema::dropIfExists( 'members' );
  }

}
