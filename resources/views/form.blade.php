@extends('layouts.default')

@section('ticker')
<div class="liveticker-body" data-ticker-id="{{ $channel }}">
  <ul class="liveticker-list">
    <li id="liveticker-template" style="visibility: hidden;">
      <h2 class="liveticker-time">
        <span class="time-hour">10</span>
        <span class="time-minute">:19</span>
      </h2>
      <div class="liveticker-text">
        <h2 class="liveticker-item-title medium">title</h2>
        <p class="liveticker-item-body">body</p>
      </div>
      <div class="btn-group">
        <button type="button" class="liveticker-btn-del btn btn-danger">löschen</button>
        <button type="button" class="liveticker-btn-edit btn btn-warning">ändern</button>
      </div>
    </li>
  </ul>
</div>
@endsection

@section('content')
<div class="channel">
  <h1>Channel {{ $channel }}</h1>
  <p>Theme des Broadcaster hier</p>

  <form class="form-horizontal" id="broadcastform">
    <input class="form-control" type="hidden" value="{{ $channel }}" id="channel">
    <input class="form-control" type="hidden" id="muid">
    <div class="form-group">
      <label class="control-label col-sm-1" for="title">Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="title" placeholder="Title">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-1" for="body">Body:</label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" id="body" placeholder="Body"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-1 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
@yield('ticker')

@endsection
