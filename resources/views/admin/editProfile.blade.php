@extends('admin.master')
@section('dashboard')

    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update.profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <h4 class="">Edit Profile</h4>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}"
                                        id="example-text-input">
                                        {{-- validation  --}}
                                        <span class="text-danger">

                                            @error('name')
                                            {{ $message }}
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="email" value="{{ $user->email }}"
                                        id="email">
                                        {{-- validation  --}}
                                        <span class="text-danger">

                                            @error('email')
                                            {{ $message }}
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <!-- end row -->
                           
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Photo:</label>
                                <div class="col-sm-10">
                                    <input id="photo" class="form-control" type="file" name="image" value="{{ $user->name }}"
                                        id="image">
                                    <div class="mt-3">
                                        <img id="imgPreview" class="image-fluid" style="width: 120px; height: 120px"
                                            src="{{  !empty($user->image)?asset('profileImg/' . $user->image):asset('profileImg/no-image.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
        <script type="text/javascript">


$(document).ready(()=>{
    $('#photo').change(function(){
        const file = this.files[0];
		console.log(file);
		if (file){
            let reader = new FileReader();
            reader.onload = function(event){
                console.log(event.target.result);
			$('#imgPreview').attr('src', event.target.result);
		}
		reader.readAsDataURL(file);
    }
});
});



</script>
@endsection