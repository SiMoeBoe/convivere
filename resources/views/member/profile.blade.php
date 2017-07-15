<?php
/**
 * List of all members
 */
?>

@extends('layouts.convivere')

@section('main')

<div class="panel panel-default">
  <div class="panel-heading">@lang('convivere.memberprofile') <a href="/members" class="pull-right btn btn-primary btn-xs">@lang('convivere.memberprofile.back')</a></div>

  <div class="panel-body table-responsive">

    <p>
      @lang('convivere.memberprofile.description')<br>
    </p>

    <div class="btn-toolbar" role='toolbar'>
      <div class="btn-group" role='group'>
        <a href="/members/create" class="btn btn-primary">@lang('convivere.memberprofile.newentry')</a>
      </div>
      <div class="btn-group" role='group'>
        <button type="submit" form="profileform" class="btn btn-primary">@lang('convivere.memberprofile.save')</a>
      </div>
    </div>

    <br>

    @if ($member === 0)
    <form method="POST" action="/members" id="profileform">
    @else
    <form method="POST" action="/members/{{ $member->id }}" id="profileform">
      <input type="hidden" name="_method" value="PUT">
    @endif
      {{ csrf_field() }}
      <div class="row">
        <div class="col-sm-6 form-group">
          <label for='memberPrename'>@lang('convivere.memberprofile.prename')</label>
          <input type="text" class="form-control" id="memberPrename" name="memberPrename" value="{{ ($member !== 0) ? $member->prename : '' }}" placeholder="@lang('convivere.memberprofile.prename')">
        </div>
        <div class="col-sm-6 form-group">
          <label for='memberName'>@lang('convivere.memberprofile.name')</label>
          <input type="text" class="form-control" id="memberName" name="memberName" value="{{ ($member !== 0) ? $member->name : '' }}" placeholder="@lang('convivere.memberprofile.name')">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 form-group">
          <label for="memberEmail">@lang('convivere.memberprofile.email')</label>
          <input type="email" class="form-control" id="memberEmail" name="memberEmail" value="{{ ($member !== 0) ? $member->email : '' }}" placeholder="@lang('convivere.memberprofile.email')">
        </div>
        <div class="col-xs-6 col-sm-3 col-lg-4 form-group">
          <label for="memberBirthday">@lang('convivere.memberprofile.birthday')</label>
          <input type="date" class="form-control" id="memberBirthday" name="memberBirthday" value="{{ ($member !== 0) ? $member->birthday : '' }}" placeholder="01.01.1990">
        </div>
        <div class="col-xs-6 col-sm-3 col-lg-2 form-group">
          <label for="memberGender">@lang('convivere.memberprofile.gender')</label>
          <select class="form-control" id="memberGender" name="memberGender">
            <option value="woman" {{ (($member !== 0) && ($member->gender === 'woman')) ? 'selected' : '' }}>@lang('convivere.memberprofile.gender.woman')</option>
            <option value="man" {{ (($member !== 0) && ($member->gender === 'man')) ? 'selected' : '' }}>@lang('convivere.memberprofile.gender.man')</option>
            <option value="transgender" {{ (($member !== 0) && ($member->gender === 'transgender')) ? 'selected' : '' }}>@lang('convivere.memberprofile.gender.transgender')</option>
            <option value="other" {{ (($member !== 0) && ($member->gender === 'other')) ? 'selected' : '' }}>@lang('convivere.memberprofile.gender.other')</option>
            <option value="none" {{ (($member !== 0) && ($member->gender === 'none')) ? 'selected' : '' }}>@lang('convivere.memberprofile.gender.none')</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 form-group">
          <label for="memberAddress">@lang('convivere.memberprofile.address')</label>
          <textarea class="form-control" rows="3" id="memberAddress" name="memberAddress" value="{{ ($member !== 0) ? $member->address : '' }}"></textarea>
        </div>
        <div class="col-sm-6 form-group">
          <label for="memberNumber">@lang('convivere.memberprofile.numbers')</label>
          <select id="memberNumer" class="form-control">
            <option value="mobile">@lang('convivere.memberprofile.numbers.mobile')</option>
            <option value="private">@lang('convivere.memberprofile.numbers.private')</option>
            <option value="work">@lang('convivere.memberprofile.numbers.work')</option>
            <option value="family">@lang('convivere.memberprofile.numbers.family')</option>
            <option value="other">@lang('convivere.memberprofile.numbers.other')</option>
          </select><br>
          <input type="text" class="form-control" placeholder="@lang('convivere.memberprofile.number')">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 form-group">
          <label for='memberUniversity'>@lang('convivere.memberprofile.university')</label>
          <input type="text" class="form-control" id="memberUniversity" name="memberUniveristy" value="{{ ($member !== 0) ? $member->university : '' }}" placeholder="@lang('convivere.memberprofile.university')">
        </div>
        <div class="col-sm-6 form-group">
          <label for='memberStudies'>@lang('convivere.memberprofile.studies')</label>
          <input type="text" class="form-control" id="memberStudies" name="memberStudies" value="{{ ($member !== 0) ? $member->studies : '' }}" placeholder="@lang('convivere.memberprofile.studies')">
        </div>
      </div>
    </form>
  </div>
</div>

@endsection