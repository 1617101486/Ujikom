@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Tambah Data Artikel
                	 
<a href="{{ route('artikel.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('artikel.store') }}">
					@csrf

					<input name="ket" type="hidden" class="form-control" value="Unpublish" required>
								<!--Username-->
						<div class="form-group">
							<label>Title</label>
							<input name="title" class="form-control" placeholder="Title" type="text" required>
							@if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('title') }}</strong>
                            </span>
                    		@endif
						</div>
								<!--Kategori-->
						<div class="form-group">
							<label>Kategori</label>
							<select id="id" name="id_kategori" class="js-example-basic-multiple form-control" required multiple>
								@foreach($kategori as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
								@endforeach
							</select>
							@if ($errors->has('id_kategori'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('id_kategori') }}</strong>
                            </span>
                    		@endif
						</div>
								<!-- Foto -->
						<div class="form-group">
							<label>Foto</label>
							<input id="foto" name="foto" class="validate" accept="image/*" type="file">
							@if ($errors->has('foto'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $errors->first('foto') }}</strong>
                                </span>
                    		@endif
							<label class="text-danger">Maks 2MB</label>
						</div>
								<!--Content-->
						<div class="form-group">
							<label>Content</label>
							<textarea type="textarea" class="form-control" placeholder="Content" name="content" id="content" required></textarea>
							@if ($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $errors->first('content') }}</strong>
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