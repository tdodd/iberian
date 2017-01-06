<!-- Left side of menu -->
<ul class="nav navbar-nav">
    
    <li id="add">
    	<a href="{{ route('person.create') }}">Add a Person</a>
    </li>
    
    <li id="browse">
    	<a href="{{ route('person.index') }}">Browse People</a>
    </li>

    {{-- Only Admins can add other users --}}
    @if(Auth::user()->is_admin)
    	<li id="manage">
    		<a href="{{ route('user.create') }}">Manage Users</a>
    	</li>
    @endif

</ul>

<!-- Right side of menu -->
<ul class="nav navbar-nav navbar-right">

	<li class="dropdown">
		
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		    Logged in as {{ Auth::user()->username }} <span class="caret"></span>
		</a>

		<ul class="dropdown-menu" role="menu">
		    <li>
			    <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
		    </li>
		</ul>
	
	</li>

</ul>