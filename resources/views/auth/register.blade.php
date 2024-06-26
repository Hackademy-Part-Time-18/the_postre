<x-layout>
    <div class="bg-100"></div>
    <div class="container  my-5">
        <div class ="row">
            <div class="col-md-6 col-ms-12 mx-auto p-0">
                <div class="card card-register mx-auto">
                    <div class="login-box">
                        <div class="login-snip">
                            <input id="tab-1" type="radio" name="tab" class="sign-in"><label
                                for="tab-1" class="tab">Accedi</label>
                            <input id="tab-2" type="radio" name="tab" class="sign-up"  checked><label for="tab-2"
                                class="tab">Registrati</label>
                            <div class="login-space">
                                {{-- login --}}
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div id="form-login" class="login">
                                        <div class=" group ">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>
                                                                {{ $error }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="group">
                                            <label for="email" class="label">Email</label>
                                            <input name="email" type="email" class="input" id="email"
                                                placeholder="Enter your email" value="{{ old('email') }}">
                                        </div>
                                        <div class="group">
                                            <label for="password" class="label">Password</label>
                                            <input name="password" type="password" class="input" id="password"
                                                placeholder="Enter your password">
                                        </div>
                                        <div class="group">
                                            <input id="check" type="checkbox" class="check" checked>
                                            <label for="check"><span class="icon me-1"></span>Ricordami</label>
                                        </div>
                                        <div class="group">
                                            <input type="submit" class="button " value="Sign In">
                                        </div>
                                        <div class="hr"></div>
                                        {{-- <div class="foot">
                                        <p id="username"><a href="#tab-2"> non sei registrato?</a></p>
                                        <a href="#">Forgot Password?</a>
                                    </div> --}}
                                    </div>
                                </form>
                                {{-- register form --}}
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div id="form-register" class="sign-up-form">
                                        <div class=" group ">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>
                                                                {{ $error }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="group">
                                            <label for="username" class="label">Username</label>
                                            <input name="name" type="text" class="input" id="username"
                                                value="{{ old('name') }}" placeholder="Crea il tuo Username">
                                        </div>
                                        <div class="group">
                                            <label for="email" class="label">Email</label>
                                            <input type="text" id="email" class="input" name="email"
                                                placeholder="Entra con la tua email">
                                        </div>
                                        <div class="group">
                                            <label for="password" class="label">Password</label>
                                            <input name="password" type="password" class="input" id="password"
                                                placeholder="Crea una nuova password">
                                        </div>
                                        <div class="group">
                                            <label for="password_confirmation" class="label">Password confirm</label>
                                            <input name="password_confirmation" type="password" class="input"
                                                id="password_confirmation" placeholder="Ripeti la password">
                                        </div>
                                        <div class="group">
                                            <input type="submit" class="button" value="Accedi">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
