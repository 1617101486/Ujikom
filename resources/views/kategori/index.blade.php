@extends('layouts.app')
@section('content')

<br>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Data Kategori</div>
<br>                                                            
    &nbsp<a type="button" data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fa fa-plus"> Tambah</i></a>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table-bordered table-hover table-responsive" id="datatables">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        @php $no =1; @endphp
                        @foreach($kategori as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>
        <form method="post" action="{{ route('kategori.destroy',$data->id) }}">
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
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->





@include('kategori.create')

@endsection
