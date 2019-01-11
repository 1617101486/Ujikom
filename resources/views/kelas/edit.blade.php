@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Edit Data Kelas
 <a href="{{ route('kelas.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('kelas.update',$kelas->id) }}">
				<input name="_method" type="hidden" value="PATCH">
			
					@csrf

						
								<!--Username-->
						<div class="form-group">
							<label>Nama</label>
							<input name="nama" class="form-control" placeholder="Nama" type="text" value="{{ $kelas->nama }}" required>
							@if ($errors->has('nama'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('nama') }}</strong>
                            </span>
                    		@endif
						</div>

						<div class="form-group">
							<label>Wali Kelas</label>
							<select id="id" name="wali_kelas" class="js-example-basic-multiple form-control" required>
								<option disabled selected hidden>{{$data->Guru->nama}}</option>
								@foreach($guru as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
								@endforeach
							</select>
							@if ($errors->has('wali_kelas'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('wali_kelas') }}</strong>
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