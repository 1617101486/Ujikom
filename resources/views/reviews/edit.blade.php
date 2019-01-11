@extends('layouts.app')
@section('content')

<br>
<div class="wrapper">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Edit Data Review
 <a href="{{ route('review.index') }}" class="btn btn-danger pull-right"><i class="fa fa-sign-out">Kembali</i></a></div>
<br>                                                            
<div class="panel-body">
	<div class="container">
		<div class="col-md-8">
				<form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('review.update',$review->id) }}">
				<input name="_method" type="hidden" value="PATCH">
			
					@csrf

								<!--Username-->
						<div class="form-group">
							<label>Name</label>
							<input name="name" class="form-control" placeholder="Name" type="text" value="{{ $review->name }}" required>
							@if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
						</div>
								<!-- Foto -->
						<div class="form-group">
							<label>Foto</label>
							<input id="foto" value="{{ $review->foto }}" name="foto" class="validate" accept="image/*" type="file" multiple>
							@if ($errors->has('foto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('foto') }}</strong>
                                    </span>
                    @endif
							<label class="text-danger">Maks 2MB</label><br>
							<img src="{{asset('Image/Review/'.$review->foto)}}" width="60p
							x" width="60px">
						</div>
								<!--Content-->
						<div class="form-group">
							<label>Review</label>
							<textarea  id="summernote" type="textarea" class="form-control" placeholder="Content" name="review" required>{{ $review->review }}</textarea>
							@if ($errors->has('review'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('review') }}</strong>
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