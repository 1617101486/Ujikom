@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Edit Data Guru
 <a href="{{ route('guru.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('guru.update',$guru->id) }}">
				<input name="_method" type="hidden" value="PATCH">
			
					@csrf

						<div class="form-group">
							<label>NIPD</label>
							<input name="nipd" class="form-control" placeholder="NIPD" type="number" value="{{ $guru->nipd }}" required>
							@if ($errors->has('nipd'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('nipd') }}</strong>
                            </span>
                    		@endif
						</div>

								<!--Username-->
						<div class="form-group">
							<label>Nama</label>
							<input name="nama" class="form-control" placeholder="Nama" type="text" value="{{ $guru->nama }}" required>
							@if ($errors->has('nama'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('nama') }}</strong>
                            </span>
                    		@endif
						</div>

								<!-- Foto -->
						<div class="form-group">
							<label>Foto</label>
							<input value="{{$guru->foto}}" id="foto" name="foto" class="validate" accept="image/*" type="file" multiple >
							@if ($errors->has('foto'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('foto') }}</strong>
                            </span>
                    		@endif
							<label class="text-danger">Maks 2MB</label><br>
							<img src="{{asset('Image/Guru/'.$guru->foto)}}" width="60px" width="60px">
						</div>

						<div class="form-group">
							<label>Mapel</label>
							<input name="mapel" class="form-control" placeholder="Mapel" type="text" value="{{ $guru->mapel }}" required>
							@if ($errors->has('mapel'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('mapel') }}</strong>
                            </span>
                    		@endif
						</div>
								<!--Content-->
						<div class="form-group">
							<label>Content</label>
							<textarea type="textarea" class="form-control" placeholder="Alamat" name="alamat" required>{{ $guru->alamat }}</textarea>
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