@extends('admin.master')
@section('dashboard')

    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update.password') }}" method="POST">
                            @csrf

                            <h4 class="mb-5 mt-3">Change Password</h4>

                        
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="old_password" class="col-sm-2 col-form-label">Old Password: </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="old_password" 
                                        id="old_password">
                                        <span class="text-danger">

                                            @error('old_password')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">New Password: </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="password" 
                                        id="password">
                                        <span class="text-danger">

                                            @error('password')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="CPassword" class="col-sm-2 col-form-label">Confirm Password: </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="confirm_password" 
                                        id="CPassword">
                                        <span class="text-danger">

                                            @error('confirm_password')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>

@endsection