@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Tambah Data Guru

 <a href="{{ route('guru.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('guru.store') }}">
					@csrf

								<!--Username-->
						<div class="form-group">
							<label>NIPD</label>
							<input name="nipd" class="form-control" placeholder="NIPD" type="number" required>
							@if ($errors->has('nipd'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('nipd') }}</strong>
                            </span>
                    		@endif
						</div>

						<div class="form-group">
							<label>Nama</label>
							<input name="nama" class="form-control" placeholder="Nama" type="text" required>
							@if ($errors->has('nama'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('nama') }}</strong>
                            </span>
                    		@endif
						</div>
								<!-- Foto -->
						<div class="form-group">
							<label>Foto</label>
							<input id="foto" name="foto" class="validate" accept="image/*" type="file" multiple>
							@if ($errors->has('foto'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('foto') }}</strong>
                            </span>
                    		@endif
							<label class="text-danger">Maks 2MB</label>
						</div>

						<div class="form-group">
							<label>Mapel</label>
							<input name="mapel" class="form-control" placeholder="Mapel" type="text" required>
							@if ($errors->has('mapel'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('mapel') }}</strong>
                            </span>
                    		@endif
						</div>
								<!--Alamat-->
						<div class="form-group">
							<label>Alamat</label>
							<textarea type="textarea" class="form-control" placeholder="Alamat" name="alamat" required></textarea>
							@if ($errors->has('alamat'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('alamat') }}</strong>
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