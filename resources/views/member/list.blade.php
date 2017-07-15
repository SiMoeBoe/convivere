<?php
/**
 * List of all members
 */
?>

@extends('layouts.bursenorga')

@section('main')

<div class="panel panel-default">
  <div class="panel-heading">@lang('bursenorga.memberlist')</div>

  <div class="panel-body">

    <p>
      @lang('bursenorga.memberlist.description')<br>
    </p>

    <div class="btn-toolbar" role='toolbar'>
      <div class="btn-group" role='group'>
        <a href="/members/create" class="btn btn-primary">@lang('bursenorga.memberlist.options.create')</a>
      </div>
      <div class="btn-group" role='group'>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @lang('bursenorga.memberlist.show')
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a href="/members/show/allmembers">@lang('bursenorga.memberlist.show.all')</a></li>
          <li><a href="/members/show/nontrashedmembers">@lang('bursenorga.memberlist.show.nontrashed')</a></li>
          <li><a href="/members/show/trashedmembers">@lang('bursenorga.memberlist.show.trashed')</a></li>
        </ul>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-condensed" id="members-table">
        <thead>
          <tr>
            <th>@lang('bursenorga.memberlist.name')</th>
            <th>@lang('bursenorga.memberlist.prename')</th>
            <th>@lang('bursenorga.memberlist.email')</th>
            <th>@lang('bursenorga.memberlist.birthday')</th>
            <th>@lang('bursenorga.memberlist.options')</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($members as $member)
          <tr class="{{($member->trashed()) ? 'alert alert-danger' : ''}}">
            <td>{{$member->name}}</td>
            <td>{{$member->prename}}</td>
            <td>{{$member->email}}</td>
            <td>{{$member->birthday}}</td>
            <td class="row">
              <div class="btn-group listdropdown">
                <a href="/members/{{$member->id}}/edit" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> @lang('bursenorga.memberlist.options.edit')</span></a>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  @if ($member->trashed())
                  <li><a href="/members/{{$member->id}}" 
                         onclick="event.preventDefault();
                                 document.getElementById('delete-form-{{$member->id}}').submit();"><i class="fa fa-trash" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> @lang('bursenorga.memberlist.options.forcedelete')</span></a></li>
                  <li><a href="/members/{{$member->id}}/restore"
                         onclick="event.preventDefault();
                                 document.getElementById('restore-form-{{$member->id}}').submit();"><i class="fa fa-recycle" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> @lang('bursenorga.memberlist.options.restore')</span></a></li>
                  @else
                  <li><a href="/members/{{$member->id}}" 
                         onclick="event.preventDefault();
                                 document.getElementById('delete-form-{{$member->id}}').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> @lang('bursenorga.memberlist.options.delete')</span></a></li>
                  @endif
                </ul>
              </div>
              <form id="delete-form-{{$member->id}}" action="/members/{{$member->id}}" method="POST" style="display: none;">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
              </form>
              <form id="restore-form-{{$member->id}}" action="/members/{{$member->id}}/restore" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
        
      </table>
    </div>
  </div>
</div>

@endsection