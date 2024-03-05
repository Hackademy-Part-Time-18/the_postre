<x-layout>
<div>
<div>
    <h1>register</h1>
</div>

</div>
<div>
    <div>
        <div>
            @if ($errors->any ())
            <div>
                <ul>
                    @foreach ($errors->all () as $error)
                    <li>
                        {{$error}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{route('register')}}" method="POST">
                @csrf 
                    <div>
                        <label for="username" class="form-label">Username</label>
                        <input name="name" type="text" class="form-control" id="username" value="{{old('name')}}">
                    </div>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" value="{{old('email')}}">
                    </div>
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div>
                        <label for="password_confirmation" class="form-label">Password confirm</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                    </div>
                    <div>
                        <button class="btn bg-info text-white">Register</button>
                        <p class="small mt-2" id="username"> sei già registrato? <a href="{{route('login')}}">clicca qui</a></p>
                    </div>
            </form>
        </div>
    </div>
</div>


</x-layout>