@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Tambah Data Users Siswa
                	
 <a href="{{ route('users.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('users.store') }}">
					@csrf

					<input name="role" type="hidden" class="form-control" value="Siswa" required>

					<input name="status" type="hidden" class="form-control" value="Aktif" required>
								<!--Username-->
						<div class="form-group">
							<label>Siswa</label>
							<select id="id" name="id_siswa" class="js-example-basic-multiple form-control" required>
								<option disabled selected hidden>Silahkan Pilih</option>
								@foreach($siswa as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}&nbsp({{$data->Kelas->nama}})</option>
								@endforeach
							</select>
							@if ($errors->has('id_siswa'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('id_siswa') }}</strong>
                            </span>
                    		@endif
						</div>

						<div class="form-group">
							<label>E-mail</label>
							<input name="email" class="form-control" placeholder="E-mail" type="email" required>
							@if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                    		@endif
						</div>
								<!-- Foto -->
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" id="password" name="password" type="password" placeholder="Password">
							@if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            </span>
                    		@endif
						</div>
								<!--Content-->
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

