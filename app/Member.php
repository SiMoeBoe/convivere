<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model {

  use SoftDeletes;

  /**
   * Associated table
   * 
   * @var string
   */
  protected $table = 'members';

  /**
   * SoftDeletes column 
   * 
   * @var array
   */
  protected $dates = [ 'deleted_at' ];

  /**
   * Get all phone numbers
   *
   * @return Eloquent
   */
  public function phoneNumbers() {
    return $this->hasMany( 'App\MemberPhoneNumber' );
  }

  /**
   * Get current room
   *
   * @return Eloquent
   */
  public function room() {
    return $this->hasOne( 'App\Room' );
  }

  /**
   * Get all rooms
   *
   * @return Eloquent
   */
  public function rooms() {
    return $this->belongsToMany( 'App\Room' )->withPivot( 'move_in', 'move_out' );
  }

  /**
   * Get all honorary posts
   * 
   * @param booblean $onlyCurrentPosts
   * @return Eloquent
   * @todo Implement only current posts
   */
  public function honoraryPosts( $onlyCurrentPosts = false ) {
    return $this->belongsToMany( 'App\HonoraryPost' )->withPivot( 'from', 'to' );
  }

}
