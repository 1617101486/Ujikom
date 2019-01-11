@extends('layouts.app')
@section('content')
<br>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Data Tugas</div>
<br>                                                           
    &nbsp
    @if(Auth::user()-> role == 'Siswa')

    @else
    <a href="{{ route('tugas.create') }}" class="btn btn-primary"><i class="fa fa-plus"> Tambah Tugas</i></a>

    @endif
    <a href="/export/tugas" class="btn btn-success"><i class="fa fa-file-excel-o"> Export Excel</i></a>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table-bordered table-hover" id="datatables">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pengirim</th>
                                                <th>Penerima</th>
                                                <th>File</th>
                                                <th>KKM</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       <tbody>

                        <?php $nomor = 1; ?>
                        @php $no = 1; @endphp
                        @foreach($data as $tugas)

                      <tr>
                        <td>{{ $no++ }}</td>

                        <td>{{ $tugas->Guru->nama }}</td>
                        <td>@foreach($tugas->Siswa as $data)-{{ $data->nama }}({{$data->Kelas->nama}})<br>@endforeach</td>
                        <td><span class="fa fa-file">&nbsp{{$tugas->file}}</span></td>
                        <td>{{ $tugas->KKM }}</td>
                        <td>{{ $tugas->nilai }}</td>
                        <td>
                        @if( $tugas->ket == 'Sedang Di Proses')
                            <a href="" class="btn btn-warning">{{ $tugas->ket }}</a>
                        @elseif( $tugas->ket == 'Tuntas')
                            <a href="" class="btn btn-success">{{ $tugas->ket }}</a>
                        @elseif( $tugas->ket == 'Belum Tuntas')
                            <a href="" class="btn btn-danger">{{ $tugas->ket }}</a>
                        @elseif( $tugas->ket == 'Belum Dikerjakan')
                            <a href="" class="btn btn-danger">{{ $tugas->ket }}</a>
                        @elseif( $tugas->ket == 'Sudah Dikerjakan')
                            <a href="" class="btn btn-success">{{ $tugas->ket }}</a>     
                        @endif
                        </td>
                        
                        <td>
                            @if(Auth::user()->role == 'Siswa')
                            <a class="btn btn-success" href="{{ route('tugas.kirim',$tugas->id) }}">Kirim</a> ||
                            <a class="btn btn-info" href="{{ route('tugas.show',$tugas->id) }}">Show</a>
                            

                            @else
                             <form method="post" action="{{ route('tugas.destroy',$tugas->id) }}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">



                            <a class="btn btn-warning" href="{{ route('tugas.edit',$tugas->id) }}">Edit</a> ||
                                <button onclick="return confirm('Yakin ingin menghapus data?')" type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endif
                                
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