@extends('layouts.app')
@section('content')
<br>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info" >
                <div class="panel-heading">Data Guru</div>
<br>                                                            
    &nbsp<a href="{{ route('guru.create') }}" class="btn btn-primary"><i class="fa fa-user-plus"> Tambah</i></a>
        <a href="/export/guru" class="btn btn-success"><i class="fa fa-file-excel-o"> Export Excel</i></a>
                            <div class="panel-body panel-responsive">
                                <div class="dataTable_wrapper">
                                    <table class="table-bordered table-hover table-responsive" id="datatables">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIPD</th>
                                                <th>Nama</th>
                                                <th>Foto</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        @php $no =1; @endphp
                        @foreach($guru as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nipd }}</td>
                                <td>{{ $data->nama }}</td>
                                <td><img src="{{asset('Image/Guru/'.$data->foto) }}" width="60px" height="60px"></td>
                                <td>{{ $data->mapel }}</td>
                                <td>{{ $data->alamat }}</td>
                                
                                <td>
        <form method="post" action="{{ route('guru.destroy',$data->id) }}">                            
        <a href="{{ route('guru.edit',$data->id) }}" class="btn btn-warning">Edit</a>
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
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                @endsection