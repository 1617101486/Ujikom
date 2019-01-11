@if(Auth::user()->role == 'Admin')
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">

				<img src="{{ asset('backend/admin.png ') }}" class="img-responsive" alt="">	
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><b>Admin</b></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<ul class="nav menu">

			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-dashboard">&nbsp;</em>Frontend Guest<span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="{{ route('kategori.index') }}">
						<span class="fa fa-book text-info">&nbsp;</span> Data Kategori
					</a></li>
					<li><a class="" href="{{ route('artikel.index') }}">
						<span class="fa fa-edit text-info">&nbsp;</span> Data Artikel
					</a></li>
					<li><a class="" href="{{ route('review.index') }}">
						<span class="fa fa-child text-info">&nbsp;</span> Data Reviews
					</a></li>
				</ul>
			</li>

			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-database">&nbsp;</em> Data Sekolah<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="{{ route('siswa.index') }}">
						<span class="fa fa-users text-info">&nbsp;</span> Data Siswa
					</a></li>
					<li><a class="" href="{{ route('guru.index') }}">

						<span class="fa fa-users text-info">&nbsp;</span> Data Guru
					</a></li>
					<li><a class="" href="{{ route('tugas.index') }}">
						<span class="fa fa-book text-info">&nbsp;</span> Data Tugas
					</a></li>
					<li><a class="" href="{{ route('kelas.index') }}">
						<span class="fa fa-building text-info">&nbsp;</span> Data Kelas
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-gears">&nbsp;</em> Pengaturan <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="{{ route('users.index') }}">
						<span class="fa fa-users text-info">&nbsp;</span> Data Users
					</a></li>
					<li><a class="" href="{{ route('profile.edit',Auth::user()->id) }}">
						<span class="fa fa-edit text-warning">&nbsp;</span> Edit Profile
					</a></li>
					<li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
						<span class="fa fa-power-off text-danger">&nbsp;</span> {{ __('Logout') }}
					</a></li>
				</ul>
			</li>
			
		</ul>
	</div><!--/.sidebar-->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	@csrf
</form>

@elseif(Auth::user()->role == 'Guru')

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">

				<img src="{{ asset('Image/Guru/'.Auth::user()->Guru->foto) }}" class="img-responsive" alt="">	
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><b>{{Auth::user()->Guru->nama}}</b></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<ul class="nav menu">


			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-database">&nbsp;</em> Data <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="{{ route('siswa.index') }}">
						<span class="fa fa-users text-info">&nbsp;</span> Data Siswa
					</a></li>

					<li><a class="" href="{{ route('tugas.index') }}">
						<span class="fa fa-book text-info">&nbsp;</span> Data Tugas
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-gears">&nbsp;</em> Pengaturan <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="{{ route('profile.edit',Auth::user()->id) }}">
						<span class="fa fa-edit text-warning">&nbsp;</span> Edit Profile
					</a></li>
					<li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
						<span class="fa fa-power-off text-danger">&nbsp;</span> {{ __('Logout') }}
					</a></li>
				</ul>
			</li>
			
		</ul>
	</div><!--/.sidebar-->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	@csrf
</form>


@elseif(Auth::user()->role == 'Siswa')

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
			
			<img src="{{ asset('Image/Siswa/'.Auth::user()->Siswa->foto) }}" class="img-responsive" alt="">

			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><b>{{Auth::user()->Siswa->nama}}</b></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<ul class="nav menu">

			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-database">&nbsp;</em> Data <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="{{ route('tugas.index') }}">
						<span class="fa fa-book text-info">&nbsp;</span> Data Tugas
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-gears">&nbsp;</em> Pengaturan <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="{{ route('profile.edit',Auth::user()->id) }}">
						<span class="fa fa-edit text-warning">&nbsp;</span> Edit Profile
					</a></li>
					<li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
						<span class="fa fa-power-off text-danger">&nbsp;</span> {{ __('Logout') }}
					</a></li>
				</ul>
			</li>
			
		</ul>
	</div><!--/.sidebar-->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	@csrf
</form>

@endif