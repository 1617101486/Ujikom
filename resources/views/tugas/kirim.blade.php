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

								<!-- File -->
						<div class="form-group">
							<label>File</label>
							<input id="file" name="file" accept="*/file" class="validate" type="file" multiple>
							@if ($errors->has('file'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('file') }}</strong>
                            </span>
                    		@endif
							<label class="text-danger">Maks 2MB</label><br>
							<span class="fa fa-file" style="width:40px;height: 40px">&nbsp{{$tugas->file}}</span>
						</div>

						<input type="hidden" name="kkm" value="{{$tugas->KKM}}">
						<input type="hidden" name="penerima" value="{{$tugas->penerima}}">
						<input type="hidden" name="pengirim" value="{{$tugas->pengirim}}">
						<input type="hidden" name="ket" value="Sudah Dikerjakan">

						
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