<?php
/**
 * Layout of bursenorga
 */
?>
@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row row-offcanvas row-offcanvas-left">
    <div class="col-xs-6 col-sm-3 col-lg-2 sidebar-offcanvas">
      <div class="list-group">
        <a href="/members" class="list-group-item {{ substr_compare( Route::currentRouteName(), 'members', 0, 6 ) == 0 ? 'active' : '' }}">@lang('bursenorga.members')</a>
        <a href="/rooms" class="list-group-item {{ substr_compare( Route::currentRouteName(), 'rooms', 0, 5 ) == 0 ? 'active' : '' }}">@lang('bursenorga.rooms')</a>
        <a href="/honoraryposts" class="list-group-item {{ substr_compare( Route::currentRouteName(), 'honoraryposts', 0, 13 ) == 0 ? 'active' : '' }}">@lang('bursenorga.honoraryposts')</a>
      </div>
    </div>
    <div class="col-xs-12 col-sm-9 col-lg-10">
      @yield('main')
    </div>
  </div>
</div>

@endsection