<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;

class MemberController extends Controller {

  protected $show;

  public function __construct() {
    $this->show = Cookie::get( 'showmembers', 'allmembers' );
  }

  /**
   * Display datatables front end view
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {

    switch ( $this->show ) {
      case 'nontrashedmembers': $members = Member::query();
        break;
      case 'trashedmembers': $members = Member::onlyTrashed()->get();
        break;
      case 'allmembers':
      default: $members = Member::withTrashed()->get();
    }

    return view( 'member.list' )->with( [ 'members' => $members ] );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return $this->edit( null );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store( Request $request ) {
    $member = new Member;

    if ( $this->save( $request, $member ) ) {
      return $this->update( $request, $member->id )->with( 'success', __( 'convivere.members.created' ) );
    }
    else {
      return $this->update( $request, $member->id )->with( 'danger', __( 'convivere.members.createFailed' ) );
    }
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show( $id ) {

    $member = ( $id == null ) ? 0 : Member::withTrashed()->findOrFail( $id );

    return view( 'member.profile', [ 'member' => $member ] );
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit( $id ) {
    return $this->show( $id );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update( Request $request, $id ) {
    $member = Member::withTrashed()->find( $id );

    if ( $this->save( $request, $member ) ) {
      return redirect()->route( 'members.edit', [ 'id' => $id ] )->withInput()->with( 'success', __( 'convivere.members.updated' ) );
    }
    else {
      return redirect()->route( 'members.edit', [ 'id' => $id ] )->withInput()->with( 'danger', __( 'convivere.members.updateFailed' ) );
    }
  }

  /**
   * Store member to model
   * 
   * @param Request $request
   * @param Member $member
   */
  protected function save( Request $request, Member $member ) {

    $member->name       = $request->memberName;
    $member->prename    = $request->memberPrename;
    $member->birthday   = $request->memberBirthday;
    $member->gender     = $request->memberGender;
    $member->email      = $request->memberEmail;
    $member->address    = $request->memberAddress;
    $member->studies    = $request->memberStudies;
    $member->university = $request->memberUniversity;

    $member->save();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy( $id ) {
    $member = Member::withTrashed()->find( $id );

    if ( $member->trashed() ) {
      $member->forceDelete();
    }
    else {
      $member->delete();
    }

    return back();
  }

  /**
   * Restore the specified resource if trashed.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function restore( $id ) {
    $member = Member::withTrashed()->find( $id );

    if ( $member->trashed() ) {
      $member->restore();
    }

    return back();
  }

  public function setShow( $show = 'allmembers' ) {
    if ( !in_array( $show, [ 'allmembers', 'trashedmembers', 'nontrashedmembers' ] ) ) {
      $show = 'allmembers';
    }
    $cookie     = Cookie::forever( 'showmembers', $show );
    $this->show = $show;
    return $this->index();
  }

}
