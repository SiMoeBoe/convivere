<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Convivere\Selectors\Selector;

class MemberController extends Controller {

    /**
     * Selector
     * 
     * @var Selector
     */
    private $selector;
    
    /**
     * Constructor of the member controller
     */
    public function __construct() {
        $this->selector = new Selector( 'memberSelector' );
    }

    /**
     * Display datatables front end view
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $members = $this->selector->getCollection( new Member );
        
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

        if ( $this->save( $request, $member ) === false ) {
            return $this->update( $request, $member->id )->with( 'danger', __( 'convivere.members.createFailed' ) );
        }
        else {
            return $this->update( $request, $member->id )->with( 'success', __( 'convivere.members.created' ) );
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

        if ( $this->save( $request, $member ) === false ) {
            return redirect()->route( 'members.edit', [ 'id' => $id ] )->withInput()->with( 'danger', __( 'convivere.members.updateFailed' ) );
        }
        else {
            return redirect()->route( 'members.edit', [ 'id' => $id ] )->withInput()->with( 'success', __( 'convivere.members.updated' ) );
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
        $birthday           = new \DateTime( $request->memberBirthday );
        $birthday->format( 'Y-m-d' );
        $member->birthday   = $birthday;
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
    
    /**
     * Set new selector and reload index
     * 
     * @param type $selector
     * @return type
     */
    public function setSelector( $selector = 'allSelector' ) {
        
        $this->selector->setSelectorCookie( $selector );
        return $this->index();
        
    }

}
