@extends('layouts.dashboard')
@section('content')

<div class="dashboard-help">
	<div class="container-fluid">
		<div class="row">
	      <div class="col-md-12">
	        <div class="panel headbar headbar-etc">
	          <span class="project-title">Settings</span>
	          <a href="{{ url('/dashboard') }}" class="back-button"></a>
	        </div>
	      </div>
	    </div>

		<div class="row">
			<div class="col-md-2 sidebar">
				<div class="panel">
					<h3 class="panel-subtitle">Content</h3>
					<ul class="menu">
						<li><a href="#introduction">Introduction</a></li>
						<li><a href="#socialmedia">Social media</a></li>
						<ul>
							<li><a href="#socialmedia-intro">Introduction</a></li>
							<li><a href="#socialmedia-fb">Facebook</a></li>
							<li><a href="#socialmedia-yt">Youtube</a></li>
						</ul>
						<li><a href="#interface">Interface</a></li>
						<ul>
							<li><a href="#interface-dashboard">Dashboard</a></li>
							<li><a href="#interface-options">Options</a></li>
						</ul>
					</ul>
				</div>
			</div>
			<div class="col-md-10">
				<div class="panel main">
					<div id="introduction">
						<h3>Introduction</h3>
						<p>In this section you can find basic information about the use of the Monitool. </p>
					</div>
					<div id="socialmedia">
						<h3>Social media</h3>
					</div>
					<div id="socialmedia-intro">
						<h4>Introduction</h4>
						<p>For you to be able to get useful data into the Monitool, you need to connect your social media accounts like Facebook and Youtube. You cannot use accounts you do not own, as you require an access token you can only get from Facebook or Youtube themselves. An access token is a unique code you can use to give the Monitool access to the statistics of your account. You can find out how to get an access token below. You can connect your accounts while creating a new story or in the "social media settings" section of the <a href="{{ url('/options') }}">options page</a>. You can currently only connect <b>one</b> of each type of social media to the Monitool.</p>
					</div>
					<div id="socialmedia-fb">
						<h4>Facebook</h4>
						<p>If you want to obtain an access token from Facebook you need to follow these steps:</p>
						<span><b>Step 1</b></span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita neque quo ad. Sint velit quaerat nostrum perspiciatis sapiente amet, reprehenderit et libero, repellat sit facere, animi minima odit tempore delectus.</p>
						<span><b>Step 2</b></span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi reiciendis assumenda ad doloribus amet tempora facere necessitatibus rerum. Molestias natus sit, ad sequi! Alias inventore corporis, suscipit odio commodi! Nobis.</p>
						<span><b>Step 3</b></span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque quia expedita, modi voluptas commodi neque sequi nisi, iusto ab veniam rem recusandae. Minima aspernatur pariatur hic ut, quos atque modi?</p>
						<small><b>Note:</b> you can find more detailed information in the <a href="https://developers.facebook.com/docs/facebook-login/access-tokens">official Facebook information page</a>.</small>
					</div>
					<div id="socialmedia-yt">
						<h4>Youtube</h4>
						<p>If you want to obtain an access token from Youtube you need to follow these steps:</p>
						<span><b>Step 1</b></span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita neque quo ad. Sint velit quaerat nostrum perspiciatis sapiente amet, reprehenderit et libero, repellat sit facere, animi minima odit tempore delectus.</p>
						<span><b>Step 2</b></span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi reiciendis assumenda ad doloribus amet tempora facere necessitatibus rerum. Molestias natus sit, ad sequi! Alias inventore corporis, suscipit odio commodi! Nobis.</p>
						<span><b>Step 3</b></span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque quia expedita, modi voluptas commodi neque sequi nisi, iusto ab veniam rem recusandae. Minima aspernatur pariatur hic ut, quos atque modi?</p>
						<small><b>Note:</b> you can find more detailed information in the <a href="https://developers.google.com/youtube/registering_an_application">official Google information page</a>.</small>
					</div>
					<div id="interface">
						<h3>Interface</h3>
					</div>
					<div id="interface-dashboard">
						<h4>Dashboard</h4>
						<p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.</p>
					</div>
					<div id="interface-options">
						<h4>Options</h4>
						<p>Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu. Phasellus accumsan cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque posuere. Praesent turpis.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection