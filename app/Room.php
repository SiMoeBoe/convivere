<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model {

  use SoftDeletes;

  /**
   * Associated table
   * 
   * @var string
   */
  protected $table = 'rooms';

  /**
   * SoftDeletes column 
   * 
   * @var array
   */
  protected $dates = [ 'deleted_at' ];

  /**
   * Get current member
   *
   * @return Eloquent
   */
  public function member() {
    return $this->belongsTo( 'App\Member' );
  }

  /**
   * Get all members
   *
   * @return Eloquent
   */
  public function members() {
    return $this->belongsToMany( 'App\Member' )->withPivot( 'move_in', 'move_out' );
  }

}
