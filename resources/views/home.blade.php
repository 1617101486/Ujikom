@extends('layouts.app')

@section('content')
@if(Auth::user()->role =='Guru')
<br>
<br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $info['status'] }}</div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <form action="{{ route('home.store') }}" method="post">
                            @csrf
                            <tr>
                                <td>
                                    <select name="note" class="form-control" required>
                                        <option value="Masuk">Masuk</option>
                                        <option value="Sakit/Izin">Sakit/Izin</option>
                                        <option value="Tidak Masuk">Tidak Masuk</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-flat btn-success" name="btnIn" {{ $info['btnIn'] }}>ABSEN MASUK</button>
                                </td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Riwayat Absensi</div>
<br>                                                            
    
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table-responsive table-bordered table-hover" id="datatables">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Keluar</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       <tbody>

                        <?php $nomor = 1; ?>
                        @php $no = 1; @endphp
                        @forelse($data_absen as $absen)
                                <tr>
                                    <td>{{$absen->date}}</td>
                                    <td>{{$absen->time_in}}</td>
                                    <td>{{$absen->time_out}}</td>
                                    @if($absen->note === 'Masuk')
                                    <td><a class="btn btn-success">{{$absen->note}}</a></td>
                                    @elseif($absen->note === 'Sakit/Izin')
                                    <td><a class="btn btn-warning">{{$absen->note}}</a></td>
                                    @elseif($absen->note === 'Tidak Masuk')
                                    <td><a class="btn btn-danger">{{$absen->note}}</a></td>
                                    @endif

                                    @if($absen->time_out == null)
                                  <td>
                <form id="input" class="form-horizontal row-fluid" enctype="multipart/form-data" method="POST" action="{{ route('home.update',$absen->id) }}">
                <input name="_method" type="hidden" value="PATCH">
                    @csrf
                            <button type="submit" class="btn btn-flat btn-danger" name="btnOut" {{ $info['btnOut'] }}>ABSEN KELUAR</button>

                                </td>

                                @else

                                @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                                </tr>
                            @endforelse   
                    </tbody>
                  </table>
                  {!! $data_absen->links() !!}
                </div>
              </div>
            </div>  
        </div>
    </div>


@elseif(Auth::user()->role =='Admin')

@elseif(Auth::user()->role =='Siswa')



@endif



@endsection

