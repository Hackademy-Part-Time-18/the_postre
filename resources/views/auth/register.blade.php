<x-layout>
    {{-- <div>
        <div>
            <h1>register</h1>
        </div>

    </div>
    <div>
        <div>
            <div>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div>
                        <label for="username" class="form-label">Username</label>
                        <input name="name" type="text" class="form-control" id="username" value="{{ old('name') }}">
                    </div>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email"
                            value="{{ old('email') }}">
                    </div>
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div>
                        <label for="password_confirmation" class="form-label">Password confirm</label>
                        <input name="password_confirmation" type="password" class="form-control"
                            id="password_confirmation">
                    </div>
                    <div>
                        <button class="btn bg-info text-white">Register</button>
                        <p class="small mt-2" id="username"> sei già registrato? <a href="{{ route('login') }}">clicca
                                qui</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    
    <div class="main">
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
        <section class="signup">
    
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name"
                                placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email"
                                placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password"
                                placeholder="Password">
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password"
                                placeholder="Repeat your password">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term">
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up">
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="#" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
    
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
    
        gtag('config', 'UA-23581568-13');
    </script>
    <script defer=""
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon="{&quot;rayId&quot;:&quot;862db2b1c85c0e4f&quot;,&quot;version&quot;:&quot;2024.2.4&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;}"
        crossorigin="anonymous"></script>
    


</x-layout>    

