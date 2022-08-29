<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card p-4 my-3 shadow-sm">
                    <form action="" method="POST">
                        @csrf
                        <h2 class="text-center">Register Form</h2>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="name" value="{{old('name')}}" required />
                            @error('name')
                            <x-error :message="$message" />
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="username" value="{{old('username')}}" />
                            @error('username')
                            <x-error :message="$message" />
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                            @error('email')
                            <x-error :message="$message" />
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>

                        <!-- <ul>
                            @foreach($errors->all() as $error)
                            <li class="text-danger">{{$error}}</li>
                            @endforeach
                        </ul> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>