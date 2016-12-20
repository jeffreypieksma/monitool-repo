@extends('layouts.login')

@section('content')
<div class="create-project contentbg">
  <div class="container-fluid">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default custompanel">
        <div class="panel-heading">Create story</div>

          <div class="panel-body">
            <form class="form" method="POST">
              {{ csrf_field() }}
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-row">
                <label for="name" class="control-label">Put your story name here:</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
              <input type="hidden" id="dateFormat" value="1">
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-row">
                <label for="name" class="control-label">Here you can put in your Facebook access token:</label>
                <p class="text-right float-right link-create-story"><small>Your can find out how to get one <a href="">here</a>.</small></p>
                <input id="fb_access_token" type="text" class="form-control" name="fb_access_token" value="{{ old('name') }}" required autofocus>
              </div>
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-row">
                <label for="name" class="control-label">And the Youtube access token here:</label>
                <p class="text-right float-right link-create-story"><small>Your can find out how to get one <a href="">here</a>.</small></p>
                <input id="yt_access_token" type="text" class="form-control" name="yt_access_token" value="{{ old('name') }}" required autofocus>
              </div>
              <!-- <div class="row form-row">
                <div class="col-md-12">
                  <div class="form-group">
                  <a href="" class="socialmedia-box">
                    <div class="col-xs-3 socialmedia-label fb">
                     <div class="col-xs-2 text-left">
                       <img src="./public/icons/icon-fb.png" alt="">
                     </div>
                     <div class="col-xs-6 text-left">
                       <p>Facebook</p>
                     </div>
                     <div class="col-xs-3 text-right">
                       <img src="./public/icons/icon-check.png" alt="">
                     </div>
                    </div>
                  </a>
                    <div class="col-xs-9">
                      <input type="text" class="form-control" id="fb_token" name="fb_token" value="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row form-row">
                <div class="col-md-12">
                  <div class="form-group">
                  <a href="" class="socialmedia-box">
                    <div class="col-xs-3 socialmedia-label yt">
                     <div class="col-xs-2 text-left">
                       <img src="./public/icons/icon-yt.png" alt="">
                     </div>
                     <div class="col-xs-6 text-left">
                       <p>Youtube</p>
                     </div>
                     <div class="col-xs-3 text-right">
                       <img src="./public/icons/icon-check.png" alt="">
                     </div>
                    </div>
                  </a>
                    <div class="col-xs-9">
                      <input type="text" class="form-control" id="yt_token" name="yt_token" value="">
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary white">Create</button>
              </div>
            </div>
          </form>
        </div>
      </div> 
    </div>
  </div> 
</div>

@endsection
