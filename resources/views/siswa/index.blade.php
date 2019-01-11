@extends('layouts.app')
@section('content')
<br>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                     <div class="panel-heading">Data Siswa</div>
<br>  
@if(Auth::user()->role == 'Admin')                                                          
    &nbsp<a href="{{ route('siswa.create') }}" class="btn btn-primary"><i class="fa fa-user-plus"> Tambah</i></a>
@else

@endif
        <a href="/export/siswa" class="btn btn-success"><i class="fa fa-file-excel-o"> Export Excel</i></a>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table-bordered table-hover" id="datatables">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Foto</th>
                                                <th>Kelas</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        @php $no =1; @endphp
                        @foreach($siswa as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nis }}</td>
                                <td>{{ $data->nama }}</td>
                                <td><img src="{{asset('Image/Siswa/'.$data->foto) }}" width="60px" height="60px"></td>
                                <td>{{ $data->Kelas->nama }}</td>
                                <td>{{ $data->alamat }}</td>
                                
                                <td>
                                    @if(Auth::user()->role == 'Admin')
        <form method="post" action="{{ route('siswa.destroy',$data->id) }}">                            
        <a href="{{ route('siswa.edit',$data->id) }}" class="btn btn-warning">Edit</a>
        ||
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
        <button onclick="return confirm('Yakin ingin menghapus data?')" id="form-delete" type="submit" class="btn btn-danger">Delete</button>
        </form> 
        @else

        @endif                           

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