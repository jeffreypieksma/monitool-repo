@extends('layouts.dashboard')

@section('content')
<div class="dashboard-options">
  <div class="container-fluid">

  <?php

    foreach($services as $service){
      echo $service->name;
      echo $service->acces_token;
    }
   
    
  ?>
  
    <h2>Settings</h2>
    <a href="{{ url('/dashboard') }}" class="back-button"></a>
    <div class="row">
      <div class="col-md-6">
        <div class="panel">
          <p class="panel-title">Project settings</p>
          <!-- Projects settings -->
          <form action="" method="POST">
            <div class="form-group">
              <label for="project_name">Project name</label>
              <input type="text" class="form-control" id="project_name" value="{{ $project->name }}">
            </div>
            <div class="form-group">
              <label for="date_format">Date format</label>
              <?php
              //$selected = $_POST['dateFormat'];
              $selected1= '';
              $selected2= '';
              $selected3= '';
              switch ($project->dateFormat) {
                case '1':
                  $selected1 = "selected=selected";
                  break;
                case '2':
                  $selected2 = "selected=selected";
                  break;
                case '3':
                  $selected3 = "selected=selected";
                  break;
                default:
                  $selected1 = "selected=selected";
                  break;
              }?>
              <select class="form-control" id="date_format" name="dateFormat">
                <option {{ $selected1 }} value="1">DD/MM/JJJJ</option>
                <option {{ $selected2 }} value="2" >MM/DD/JJJJ</option>
                <option {{ $selected3 }} value="3">JJJJ/MM/DD</option>
              </select>
            </div>

            <a href="options/{{$project->id}}" class="btn btn-primary">Save</a>
           
            <a href="options/delete/{{$project->id}}" class="btn btn-danger" onclick="return confirm('Are you sure ? ')">
      Delete story
    </a>
          </form>
        </div>
        <div class="panel">
          <p class="panel-title">Social media settings</p>
          <div class="row">
            <div class="col-md-9 col-md-offset-3">
              <p class="panel-subtitle token-title">Access token <small class="float-right"><a href="help">Where can I find this?</a></small></p>
            </div>
          </div>
          <!-- Social media -->
          <form class="form-horizontal" action="" method="">
            @foreach($services as $service)
              <div class="form-group">
                <div class="col-xs-3 socialmedia-label {{$service->name}}">
                  <div class="col-xs-2 text-left">
                    <img src="./public/icons/icon-{{$service->name}}.png" alt="">
                  </div>
                  <div class="col-xs-6 text-left">
                    <p> {{$service->name}} </p>
                  </div>
                  <div class="col-xs-3 text-right">
                    <img src="./public/icons/icon-check.png" alt="">
                  </div>
                  </div>
                  <div class="col-xs-9">
                    <input type="text" class="form-control" id="{{$service->name}}_token"
                    value="{{ $service->acces_token }}">
                  </div>
              </div>
            @endforeach    
            <button class="btn btn-primary margin-fix">Save</button>
            <button class="btn btn-danger">Reset accounts</button>
          </form>
        </div>
      </div>
      <!-- Account settings -->
      <div class="col-md-6">
        <div class="panel">
          <p class="panel-title">Account settings</p>
          <form action="" method="">
            <div class="form-group">
              <label for="account_name">Name</label>
              <input type="text" class="form-control" id="account_name" value="{{ $user->name}}">

            </div>
            <p class="panel-subtitle">Change password</p>
            <div class="form-group">
              <label for="account_name">Old password</label>
              <input type="password" class="form-control" id="password">
            </div>
            <div class="form-group">
              <label for="account_name">New password</label>
              <input type="password" class="form-control" id="password_new">
            </div>
            <div class="form-group">
              <label for="account_name">Confirm new password</label>
              <input type="password" class="form-control" id="password_new_confirm">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
        <div class="panel">
          <p class="panel-title">Information/other</p>
          <p class="panel-info">Monitool version: <b>1.0</b></p>
          <p class="panel-info">Project created: <b>22/04/2016</b></p>
          <p class="panel-subtitle">Terms of service</p>
          <div class="terms">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.

            Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
