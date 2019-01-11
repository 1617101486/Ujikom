@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Nilai Tugas
                	
 <a href="{{ route('tugas.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('tugas.update',$tugas->id) }}">
				<input name="_method" type="hidden" value="PATCH">
			
					@csrf

						<div class="form-group">
							<label>File</label>
							<input name="file" class="form-control" type="text" value="{{ $tugas->file }}" required>
						</div>

						<div class="form-group">
							<label>KKM</label>
							<input name="KKM" class="form-control" placeholder="KKM" type="number" value="{{ $tugas->KKM }}" required>
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