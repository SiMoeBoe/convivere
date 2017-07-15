<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberPhoneNumber extends Model {

  /**
   * Associated table
   * 
   * @var string
   */
  protected $table = 'member_phone_numbers';

  /**
   * Disable timestamps
   * 
   * @var boolean
   */
  public $timestamps = false;

  /**
   * Get associated member
   * 
   * @return Eloquent
   */
  public function member() {
    return $this->belongsTo( 'App\Member' );
  }

}