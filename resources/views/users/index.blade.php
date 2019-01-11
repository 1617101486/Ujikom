@extends('layouts.app')
@section('content')
<br>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">Data Users</div>
<br>                                                            
    &nbsp<a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa fa-user-plus"> Tambah Users Siswa</i></a>
    &nbsp<a href="{{ route('users.createguru') }}" class="btn btn-primary"><i class="fa fa-user-plus"> Tambah Users Guru</i></a>    
        <a href="export/users" class="btn btn-success"><i class="fa fa-file-excel-o"> Export Excel</i></a>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table-bordered table-hover" id="datatables">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       <tbody>

                        <?php $nomor = 1; ?>
                        @php $no = 1; @endphp
                        @foreach($data as $users)

                      <tr>
                        <td>{{ $no++ }}</td>

                        @if($users->role == 'Admin')
                        <td>Admin</td>

                        @elseif($users->role == 'Guru')
                        <td>{{ $users->Guru->nama }}</td>

                        @elseif($users->role == 'Siswa')
                        <td>{{ $users->Siswa->nama }}</td>

                        @endif

                        <td>{{ $users->email }}</td>
                        <td>{{ $users->role }}</td>

                        @if($users->status == 'Aktif')
                        <td><a class="btn btn-success" href="">Aktif</a></td>

                        @elseif($users->status == 'NonAktif')
                        <td><a class="btn btn-danger" href="">NonAktif</a></td>

                        @endif

                        <td>
                             <form method="post" action="{{ route('users.destroy',$users->id) }}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">

                           
                            <a class="btn btn-warning" href="{{ route('users.edit',$users->id) }}">Edit</a> ||
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

@endsection