@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Edit Data Users {{ $users->role }}
                	
 <a href="{{ route('users.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('users.update',$users->id) }}">
				<input name="_method" type="hidden" value="PATCH">
			
					@csrf
					<input name="role" type="hidden" value="{{ $users->role }}" required>
						
						@if($users->role == 'Siswa')
						<div class="form-group">
							<label>Siswa</label>
							<select name="id_siswa" id="id" class="form-control" required>
								<option disabled selected hidden>{{$users->Siswa->nama}}</option>
								@foreach($siswa as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
								@endforeach
							</select>
						</div>

						@elseif($users->role == 'Guru')
						<div class="form-group">
							<label>Guru</label>
							<select name="id_guru" id="id" class="form-control" required>
								<option disabled selected hidden>{{$users->Guru->nama}}</option>
								@foreach($guru as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
								@endforeach
							</select>
						</div>

						@endif

						<div class="form-group">
							<label>E-mail</label>
							<input name="email" class="form-control" placeholder="E-mail" type="text" value="{{ $users->email }}" required>
							@if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                    		@endif
						</div>

						<div class="form-group">
							<label>Status</label>
							<select name="status" class="form-control">
								<option value="Aktif">Aktif</option>
								<option value="NonAktif">NonAktif</option>
							</select>
							@if ($errors->has('status'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('status') }}</strong>
                            </span>
                    		@endif
						</div>

								<!--Username-->
						<div class="form-group">
							<label>Password</label>
							<input name="password" class="form-control" placeholder="Password" type="password" value="{{ $users->password }}" required>
							@if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            </span>
                    		@endif
						</div>

						
						<div class="form-group">
							<div class="controls">
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

@endsection