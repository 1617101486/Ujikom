@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Edit Data Siswa
                	
 <a href="{{ route('siswa.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('siswa.update',$siswa->id) }}">
				<input name="_method" type="hidden" value="PATCH">
			
					@csrf

						<div class="form-group">
							<label>NIS</label>
							<input name="nis" class="form-control" placeholder="NIS" type="number" value="{{ $siswa->nis }}" required>
							@if ($errors->has('nis'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('nis') }}</strong>
                            </span>
                    		@endif
						</div>

								<!--Username-->
						<div class="form-group">
							<label>Nama</label>
							<input name="nama" class="form-control" placeholder="Nama" type="text" value="{{ $siswa->nama }}" required>
							@if ($errors->has('nama'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('nama') }}</strong>
                            </span>
                    		@endif
						</div>

								<!-- Foto -->
						<div class="form-group">
							<label>Foto</label>
							<input value="{{$siswa->foto}}" id="foto" name="foto" class="validate" accept="image/*" type="file" multiple >
							@if ($errors->has('foto'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('foto') }}</strong>
                            </span>
                    		@endif
							<label class="text-danger">Maks 2MB</label><br>
							<img src="{{asset('Image/Siswa/'.$siswa->foto)}}" width="60px" width="60px">
						</div>

						<div class="form-group">
							<label>Kelas</label>
							<select id="id" name="id_kelas" class="js-example-basic-multiple form-control" required>
								<option>--->Silahkan Cari<---</option>
								@foreach($kelas as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
								@endforeach
							</select>
							@if ($errors->has('id_kelas'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('id_kelas') }}</strong>
                            </span>
                    		@endif
						</div>
								<!--Content-->
						<div class="form-group">
							<label>Content</label>
							<textarea type="textarea" class="form-control" placeholder="Alamat" name="alamat" required>{{ $siswa->alamat }}</textarea>
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