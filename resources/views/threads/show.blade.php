@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $thread->title }}</div>

                <div class="panel-body">
                  <div class="body">{{ $thread->body }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
          {{-- @php
            $replies = $thread->replies()->paginate(1);
          @endphp --}}
            @foreach($replies as $reply)
            <div class="panel panel-default">
                <div class="panel-heading">
                  {{$reply->owner->name}} said  {{$reply->created_at->diffForHumans()}}
                </div>

                <div class="panel-body">
                  <div class="body">{{ $reply->body }}</div>
                </div>
            </div>
          @endforeach
          {{$replies->links()}}

        </div>

        @if (auth()->check())
        <div class="col-md-8">
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
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <p>
            这篇帖子发布于{{$thread->created_at->diffForHumans()}}
          </p>
        </div>
      </div>
    </div>
</div>
@endsection
