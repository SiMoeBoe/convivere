<?php
/**
 * List of all members
 */
?>

@extends('layouts.bursenorga')

@section('main')

<div class="panel panel-default">
  <div class="panel-heading">@lang('bursenorga.memberprofile') <a href="/members" class="pull-right btn btn-primary btn-xs">@lang('bursenorga.memberprofile.back')</a></div>

  <div class="panel-body table-responsive">

    <p>
      @lang('bursenorga.memberprofile.description')<br>
    </p>

    <div class="btn-toolbar" role='toolbar'>
      <div class="btn-group" role='group'>
        <a href="/members/create" class="btn btn-primary">@lang('bursenorga.memberprofile.newentry')</a>
      </div>
      <div class="btn-group" role='group'>
        <button type="submit" form="profileform" class="btn btn-primary">@lang('bursenorga.memberprofile.save')</a>
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
          <label for='memberPrename'>@lang('bursenorga.memberprofile.prename')</label>
          <input type="text" class="form-control" id="memberPrename" name="memberPrename" value="{{ ($member !== 0) ? $member->prename : '' }}" placeholder="@lang('bursenorga.memberprofile.prename')">
        </div>
        <div class="col-sm-6 form-group">
          <label for='memberName'>@lang('bursenorga.memberprofile.name')</label>
          <input type="text" class="form-control" id="memberName" name="memberName" value="{{ ($member !== 0) ? $member->name : '' }}" placeholder="@lang('bursenorga.memberprofile.name')">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 form-group">
          <label for="memberEmail">@lang('bursenorga.memberprofile.email')</label>
          <input type="email" class="form-control" id="memberEmail" name="memberEmail" value="{{ ($member !== 0) ? $member->email : '' }}" placeholder="@lang('bursenorga.memberprofile.email')">
        </div>
        <div class="col-xs-6 col-sm-3 col-lg-4 form-group">
          <label for="memberBirthday">@lang('bursenorga.memberprofile.birthday')</label>
          <input type="date" class="form-control" id="memberBirthday" name="memberBirthday" value="{{ ($member !== 0) ? $member->birthday : '' }}" placeholder="01.01.1990">
        </div>
        <div class="col-xs-6 col-sm-3 col-lg-2 form-group">
          <label for="memberGender">@lang('bursenorga.memberprofile.gender')</label>
          <select class="form-control" id="memberGender" name="memberGender">
            <option value="woman" {{ (($member !== 0) && ($member->gender === 'woman')) ? 'selected' : '' }}>@lang('bursenorga.memberprofile.gender.woman')</option>
            <option value="man" {{ (($member !== 0) && ($member->gender === 'man')) ? 'selected' : '' }}>@lang('bursenorga.memberprofile.gender.man')</option>
            <option value="transgender" {{ (($member !== 0) && ($member->gender === 'transgender')) ? 'selected' : '' }}>@lang('bursenorga.memberprofile.gender.transgender')</option>
            <option value="other" {{ (($member !== 0) && ($member->gender === 'other')) ? 'selected' : '' }}>@lang('bursenorga.memberprofile.gender.other')</option>
            <option value="none" {{ (($member !== 0) && ($member->gender === 'none')) ? 'selected' : '' }}>@lang('bursenorga.memberprofile.gender.none')</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 form-group">
          <label for="memberAddress">@lang('bursenorga.memberprofile.address')</label>
          <textarea class="form-control" rows="3" id="memberAddress" name="memberAddress" value="{{ ($member !== 0) ? $member->address : '' }}"></textarea>
        </div>
        <div class="col-sm-6 form-group">
          <label for="memberNumber">@lang('bursenorga.memberprofile.numbers')</label>
          <select id="memberNumer" class="form-control">
            <option value="mobile">@lang('bursenorga.memberprofile.numbers.mobile')</option>
            <option value="private">@lang('bursenorga.memberprofile.numbers.private')</option>
            <option value="work">@lang('bursenorga.memberprofile.numbers.work')</option>
            <option value="family">@lang('bursenorga.memberprofile.numbers.family')</option>
            <option value="other">@lang('bursenorga.memberprofile.numbers.other')</option>
          </select><br>
          <input type="text" class="form-control" placeholder="@lang('bursenorga.memberprofile.number')">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 form-group">
          <label for='memberUniversity'>@lang('bursenorga.memberprofile.university')</label>
          <input type="text" class="form-control" id="memberUniversity" name="memberUniveristy" value="{{ ($member !== 0) ? $member->university : '' }}" placeholder="@lang('bursenorga.memberprofile.university')">
        </div>
        <div class="col-sm-6 form-group">
          <label for='memberStudies'>@lang('bursenorga.memberprofile.studies')</label>
          <input type="text" class="form-control" id="memberStudies" name="memberStudies" value="{{ ($member !== 0) ? $member->studies : '' }}" placeholder="@lang('bursenorga.memberprofile.studies')">
        </div>
      </div>
    </form>
  </div>
</div>

@endsection