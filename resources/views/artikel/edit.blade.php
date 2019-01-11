@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Edit Data Artikel
 <a href="{{ route('artikel.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('artikel.update',$artikel->id) }}">
				<input name="_method" type="hidden" value="PATCH">
			
					@csrf

								<!--Username-->
						<div class="form-group">
							<label>Title</label>
							<input name="title" class="form-control" placeholder="Title" type="text" value="{{ $artikel->title }}" required>
							@if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
						</div>
								<!-- Foto -->
						<div class="form-group">
							<label>Foto</label>
							<input id="foto" value="{{ $artikel->foto }}" name="foto" class="validate" accept="image/*" type="file" multiple>
							@if ($errors->has('foto'))
                              	<span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $errors->first('foto') }}</strong>
                                </span>
                    		@endif
							<label class="text-danger">Maks 2MB</label><br>
							<img src="{{asset('Image/Artikel/'.$artikel->foto)}}" width="60p
							x" width="60px">
						</div>

						<!--Content-->
						<div class="form-group">
							<label>Content</label>
							<textarea  id="content" type="textarea" class="form-control" placeholder="Content" name="content" required>{{ $artikel->content }}</textarea>
							@if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('content') }}</strong>
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
								

						<div class="form-group">
							<label>Keterangan</label>
							<select name="ket" class="form-control">
								<option value="Unpublish">Unpublish</option>
								<option value="Publish">Publish</option>
							</select>
							@if ($errors->has('ket'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('ket') }}</strong>
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