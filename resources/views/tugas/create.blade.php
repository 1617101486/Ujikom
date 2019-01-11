@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Tambah Data Tugas
                	
 <a href="{{ route('tugas.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('tugas.store') }}">
					@csrf

					<input name="ket" type="hidden" class="form-control" value="Sedang Di Proses" required>

								<!--Penerima-->

					@if( Auth::user()->role == 'Admin' )			

					<div class="form-group">
							<label>Guru</label>
							<select name="pengirim" id="id1" class="form-control" required>
								<option value="" disabled selected hidden>Silahkan Pilih</option>
								@foreach($guru as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
								@endforeach
							</select>
							@if ($errors->has('pengirim'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('pengirim') }}</strong>
                            </span>
                    		@endif
					</div>

					@elseif( Auth::user()->role == 'Guru' )
					<input type="hidden" name="pengirim" value="{{ Auth::user()->id_guru }}">

					@endif		

					

					<div class="form-group">
							<label>Siswa</label>
							<select name="penerima[]" class="js-example-basic-multiple form-control" id="id" required multiple>
								@foreach($siswa as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}({{$data->Kelas->nama}})</option>
								@endforeach
							</select>
							@if ($errors->has('penerima'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('penerima') }}</strong>
                            </span>
                    		@endif
					</div>

					<!-- File -->
						<div class="form-group">
							<label>File</label>
							<input id="file" name="file" class="validate" type="file" multiple>
							@if ($errors->has('file'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('file') }}</strong>
                            </span>
                    		@endif
							<label class="text-danger">Maks 2MB</label>
						</div>

						<div class="form-group">
							<label>KKM</label>
							<input name="KKM" class="form-control" type="number">
							@if ($errors->has('KKM'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('KKM') }}</strong>
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