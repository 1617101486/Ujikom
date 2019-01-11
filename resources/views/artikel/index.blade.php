@extends('layouts.app')
@section('content')
<br>
<div class="row">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Data Artikel <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>                                                            
                            <div class="panel-body">
                                &nbsp<a href="{{ route('artikel.create') }}" class="btn btn-primary"><i class="fa fa-plus"> Tambah</i></a>
        <a href="/export/artikel" class="btn btn-success"><i class="fa fa-file-excel-o"> Export Excel</i></a>
                                <div class="dataTable_wrapper">
                                    <br>
                                    <table class="table-bordered table-hover" id="datatables">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Kategori</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        @php $no =1; @endphp
                        @foreach($artikel as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->title }}</td>
                                <td><img src="{{asset('Image/Artikel/'.$data->foto) }}" width="60px" height="60px"></td>
                                <td>@foreach($data->Kategori as $kategori)-{{ $kategori->nama_kategori }}<br>@endforeach</td>
                                    @if ($data->ket == 'Publish') 
                                      <td><a name="publish" class="btn btn-success">Publish</a></td>
                                    

                                    @elseif ($data->ket == 'Unpublish')
                                    <td><a name="unpublish" class="btn btn-danger">Unpublish</a></td>
                                    
                                    @endif
                                <td>
        <form method="post" action="{{ route('artikel.destroy',$data->id) }}">
        <a href="{{ route('artikel.edit',$data->id) }}" class="btn btn-warning">Edit</a>
        ||
        <a href="{{ route('artikel.show',$data->id) }}" class="btn btn-info">Show</a>
        ||                           
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
        <button onclick="return confirm('Yakin ingin menghapus data?')" type="submit" class="btn btn-danger">Delete</button>
        </form>                            

                                </td>

                            </tr>
                            @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
</div>
</div>

                @endsection