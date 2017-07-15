<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHonoraryPostsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'honorary_posts', function (Blueprint $table) {
      $table->increments( 'id' );
      $table->timestamps();
      $table->string( 'name' );
      $table->text( 'description' )->nullable();

      $table->integer( 'rent_reduction' )->nullable();
      $table->string( 'reduction_comment' )->nullable();
    } );

    Schema::create( 'honorary_post_member', function (Blueprint $table) {
      $table->increments( 'id' );
      $table->integer( 'honorary_post_id' );
      $table->integer( 'member_id' );

      $table->date( 'from' );
      $table->date( 'to' )->nullable();
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists( 'honorary_post_member' );
    Schema::dropIfExists( 'honorary_posts' );
  }

}
