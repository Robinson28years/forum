@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $thread->title }}</div>

                <div class="panel-body">
                  <div class="body">{{ $thread->body }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            @foreach($thread->replies as $reply)
            <div class="panel panel-default">
                <div class="panel-heading">
                  {{$reply->owner->name}} said  {{$reply->created_at->diffForHumans()}}
                </div>

                <div class="panel-body">
                  <div class="body">{{ $reply->body }}</div>
                </div>
            </div>
          @endforeach

        </div>

        @if (auth()->check())
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <form action="{{$thread->path().'/replies'}}" method="POST">
                  {{csrf_field()}}
                  <label for="body">Body:</label>
                  <textarea name="body" placeholder="写一点东西" rows="8" cols="80" class="form-controller"></textarea>
                  <button type="submit"class="btn btn-success">提交</button>
                </form>
              </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
