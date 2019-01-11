@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Show Data Tugas
                	
 <a href="{{ route('tugas.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('tugas.update',$tugas->id) }}">
				<input name="_method" type="hidden" value="PATCH">
			
					@csrf

					
					<div class="form-group">
							<label>Guru</label>
							<input class="form-control" type="text" value="{{$tugas->Guru->nama}}" readonly>
					</div>

					
					

					<div class="form-group">
							<label>Siswa</label>
							<input class="form-control" type="text" value="{{$tugas->Siswa->nama}}" readonly>
					</div>

								<!-- File -->
						<div class="form-group">
							<label>File</label>
							<br>
							<img src="{{asset('File/Tugas/'.$tugas->file)}}" width="60px" width="60px">&nbsp &nbsp<a class="btn btn-info" href="/download/{{$tugas->file}}"><span class="fa fa-download">Download File</span></a>

						</div>

						<div class="form-group">
							<label>KKM</label>
							<input name="KKM" class="form-control" placeholder="KKM" type="text" value="{{ $tugas->KKM }}" readonly>
							
						</div>

						<div class="form-group">
							<label>Nilai</label>
							<input name="nilai" class="form-control" placeholder="Nilai" type="text" value="{{$tugas->nilai}}" readonly>
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