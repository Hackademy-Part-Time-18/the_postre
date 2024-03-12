<x-layout :navbar=false>
<div>
<div>
    <h1>Login</h1>
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
            <form class="card p-5 shadow" action="{{route('login')}}" method="POST">
                @csrf 
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" value="{{old('email')}}">
                    </div>
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div>
                        <button class="btn bg-info text-white">Accedi</button>
                        <p class="small mt-2" id="username"> non sei registrato? <a href="{{route('register')}}">clicca qui</a></p>
                    </div>
            </form>
        </div>
    </div>
</div>


</x-layout>