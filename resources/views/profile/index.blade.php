@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                    </ol>
                </nav>
            </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <h5>My Profile</h5>
                        <hr>
                        <form action="{{ url('/profile') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-2 text-end">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="name" value="{{ $user->name }}">
                                @error('name')
                                <div class="text-warning">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2 text-end">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="email" value="{{ $user->email }}">
                                @error('email')
                                <div class="text-warning">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2 text-end">
                                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="alamat" value="{{ $user->alamat }}" required>
                                @error('alamat')
                                <div class="text-warning">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2 text-end">
                                    <label for="exampleInputEmail1" class="form-label">No. Handphone</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="no_hp" value="{{ $user->no_hp }}">
                                @error('no_hp')
                                <div class="text-warning">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-primary w-100">Save</button>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="password">
                                @error('password')
                                <div class="text-warning">{{ $message }}</div>
                                @enderror
                            </div> --}}
                
                            
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection