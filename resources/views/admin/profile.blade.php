@extends('admin.master')
@section('dashboard')
    <div class="page-content">

        <div class="container-fluid">
            <div class="card">
                <img class="card-img-top rounded rounded-circle m-3" style="width: 120px; height: 120px"
                    src="{{ !empty($user->image)?asset('profileImg/' . $user->image):asset('profileImg/no-image.png') }}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="">Name: {{ $user->name }} </h2>
                    <hr>
                    <p class="card-text">Email: {{ $user->email }}</p>
                    <hr>

                    <a href="{{ route('admin.edit.profile') }}" class="btn btn-primary waves-effect waves-light">Edit
                        Profile</a>
                </div>

            </div>
        </div>

    </div>
@endsection
