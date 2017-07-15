<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HonoraryPost extends Model {

  /**
   * Associated table
   * 
   * @var string
   */
  protected $table = 'honorary_posts';

  /**
   * Disable timestamps
   * 
   * @var boolean
   */
  public $timestamps = false;

  /**
   * 
   * @param type $onlyCurrentMembers
   * @return Eloquent
   * @todo Implement only current menbers
   */
  public function members( $onlyCurrentMembers = false ) {
    return $this->belongsToMany( 'App\Member' )->withPivot( 'from', 'to' );
  }

  /**
   * Return rent reduction for one member
   * 
   * @return int
   */
  public function rent_reduction() {
    $members = $this->members( true );
    return $this->rent_reduction / count( $members );
  }

}
