@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Edit Data Tugas
                	
 <a href="{{ route('tugas.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('tugas.update',$tugas->id) }}">
				<input name="_method" type="hidden" value="PATCH">
			
					@csrf

						@if( Auth::user()->role == 'Admin' )			

					<div class="form-group">
							<label>Guru</label>
							<select name="pengirim" id="id1" class="form-control" required>
								<option value="" disabled hidden>{{$tugas->Guru->nama}}</option>
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
							<select name="penerima[]" id="id" class="form-control" required>
								<option value="" disabled hidden></option>
								@foreach($siswa as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
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
							<label class="text-danger">Maks 2MB</label><br>
							<img src="{{asset('File/Tugas/'.$tugas->file)}}" width="60px" width="60px">
						</div>

						<div class="form-group">
							<label>KKM</label>
							<input name="KKM" class="form-control" placeholder="KKM" type="number" value="{{ $tugas->KKM }}" required>
							@if ($errors->has('KKM'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('KKM') }}</strong>
                            </span>
                    		@endif
						</div>

						<div class="form-group">
							<label>Nilai</label>
							<input name="nilai" class="form-control" placeholder="Nilai" type="number">
							@if ($errors->has('nilai'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('nilai') }}</strong>
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