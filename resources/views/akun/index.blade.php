@extends('layouts.index')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card text-start mb-5">
                <div class="card-body">
                    @if(Session::has('success_update_data'))
                     <div class="alert alert-success" role="alert">
                         <strong>{{ Session::get('success_update_data') }}</strong>
                     </div>
                    @endif
                     
                    <h4 class="card-title mb-3">Update Data</h4>
                    <form action="{{route('akun.update')}}" method="post" autocomplete="off">
                        @method("POST")
                        @CSRF
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="" aria-describedby="input nama">
                            @error('nama')
                                <small id="helpId" class="text-danger">Masukan Nama Dengan Benar</small>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="input email">
                            @error('email')
                                <small id="helpId" class="text-danger">Masukan Email Dengan Benar</small>
                            @enderror
                        </div>
                        <button class="btn btn-success" type="submit">Update</button>
                    </form>
                </div>
            </div>

            <div class="card text-start">
                <div class="card-body">
                    @if(Session::has('success_update_password'))
                     <div class="alert alert-success" role="alert">
                         <strong>{{ Session::get('success_update_password') }}</strong>
                     </div>
                    @endif
                     
                    <h4 class="card-title mb-3">Update Password</h4>
                    <form action="{{route('akun.update.password')}}" method="post" autocomplete="off">
                        @method("POST")
                        @CSRF
                        <div class="mb-3">
                            <label for="" class="form-label">Password Lama</label>
                            <input type="password" name="password_lama" id="" class="form-control" placeholder="" aria-describedby="input passwrod lama">
                            @error('password_lama')
                                <small id="helpId" class="text-danger">Password Tidak Sesuai</small>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="" class="form-label">Password Baru</label>
                            <input type="password" name="password_baru" id="" class="form-control" placeholder="" aria-describedby="input passwrod lama">
                            @error('password_baru')
                                <small id="helpId" class="text-danger">Masukan Password Dengan Benar</small>
                            @enderror
                        </div>
                        <button class="btn btn-success" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection