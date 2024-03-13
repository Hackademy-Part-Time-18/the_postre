<x-layout>
    <div class="bg-100"></div>
    <div class ="row">
        <div class="col-md-6 col-ms-12 mx-auto p-0">
            <div class="card">
                <div class="login-box">
                    <div class="login-snip">
                        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                            class="tab">Accedi</label>
                        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2"
                            class="tab">Registrati</label>
                        <div class="login-space">
                            {{-- login --}}
                            <div>
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
                                            <label for="check"><span class="icon"></span>Ricordami</label>
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
                                    {{-- register form --}}
                                </form>
                            </div>
                            <div>
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
                                                value="{{ old('name') }}" placeholder="Create your Username">
                                        </div>
                                        <div class="group">
                                            <label for="email" class="label">Email</label>
                                            <input type="text" id="email" class="input" name="email"
                                                placeholder="Enter your email address">
                                        </div>
                                        <div class="group">
                                            <label for="password" class="label">Password</label>
                                            <input name="password" type="password" class="input" id="password"
                                                placeholder="Create your password">
                                        </div>
                                        <div class="group">
                                            <label for="password_confirmation" class="label">Password confirm</label>
                                            <input name="password_confirmation" type="password" class="input"
                                                id="password_confirmation" placeholder="Repeat your password">
                                        </div>
                                        <div class="group">
                                            <input type="submit" class="button" value="Sign Up">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-layout>
