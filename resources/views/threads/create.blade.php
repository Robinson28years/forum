@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">发布帖子</div>

                <div class="panel-body">
                    <form class="" action="/threads" method="post">
                      {{ csrf_field() }}
                      <label for="channel_id">选择栏目</label>
                      <select class="form-control" name="channel_id">
                        @foreach ($channels  as $channel)
                          <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endforeach
                      </select>
                      <label for="title">Title:</label>
                      <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">

                      <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea name="body" rows="8" class="form-control" cols="80">{{old('body')}}</textarea>
                      </div>
                        <button type="submit"class="btn btn-success">提交</button>
                    </form>
                    @if (count($errors))
                      <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
