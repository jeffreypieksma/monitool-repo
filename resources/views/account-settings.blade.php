@extends('layouts.dashboard')

@section('content')
<div class="dashboard-options">
  <div class="container-fluid">
    <div class="headbar">
      <span><h2>Account settings</h2></span>
      <a href="{{ URL::previous() }}" class="back-button-new">
        <img src="/public/icons/icon-back.png">
      </a>
    </div>
    
    
    <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <div class="panel alert">
          <p class="alert-panel alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          </p>
        </div>
        @endif
      @endforeach
    </div> <!-- end .flash-message -->
    <div class="row">        
      <!-- Account settings -->
      <div class="col-md-6 ">
        <div class="panel">
          <!--<p class="panel-title">Account settings</p>-->
          <form action="account-settings/update" method="POST">
          {{ csrf_field() }}
            <div class="form-group">
              <label for="account_name">Name</label>
              <input name="name" type="text" class="form-control" id="account_name" value="{{ $user->name}}">

            </div>
            <p class="panel-subtitle">Change password</p>
            <div class="form-group">
              <label for="account_name">Old password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
              <label for="account_name">New password</label>
              <input type="password" class="form-control" id="password_new" name="password_new">
            </div>
            <div class="form-group">
              <label for="account_name">Confirm new password</label>
              <input type="password" class="form-control" id="password_new_confirm" name="password_new_confirm">
            </div>
            <div style="text-align:right">
              <button class="btn btn-primary margin-fix">Save</button>
           </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>
</div>
@endsection
