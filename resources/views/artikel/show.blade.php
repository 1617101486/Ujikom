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
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST">
				
					@csrf

								<!--Username-->
						<div class="form-group">
							<label>Title</label>
							<input name="title" class="form-control" placeholder="Title" type="text" value="{{ $artikel->title }}" readonly>
						</div>
								<!-- Foto -->
						<div class="form-group">
							<label>Foto</label>
							<label class="text-danger">Maks 2MB</label><br>
							<img src="{{asset('Image/Artikel/'.$artikel->foto)}}" width="60p
							x" width="60px">
						</div>

						<!--Content-->
						<div class="form-group">
							<label>Content</label>
							<textarea id="content" class="form-control" readonly>{!! $artikel->content !!} </textarea>
						</div>

						<!--Kategori-->
						<div class="form-group">
							<label>Kategori</label>
							<input class="form-control" type="text" name="id_kategori" value="{{$artikel->Kategori->nama_kategori}}" readonly>
						</div>
								

						<div class="form-group">
							<label>Keterangan</label>
							<input class="form-control" type="text" name="ket" value="{{$artikel->ket}}" readonly>
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