<x-layout>
    <div>
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
    </div>
    
    {{-- <p class="tip">Click on button in image container</p>
    <div class="cont">
      <div class="form sign-in">
        <h2>Welcome back,</h2>
        <label>
          <span>Email</span>
          <input type="email" />
        </label>
        <label>
          <span>Password</span>
          <input type="password" />
        </label>
        <p class="forgot-pass">Forgot password?</p>
        <button type="button" class="submit">Sign In</button>
        <button type="button" class="fb-btn">Connect with <span>facebook</span></button>
      </div>
      <div class="sub-cont">
        <div class="img">
          <div class="img__text m--up">
            <h2>New here?</h2>
            <p>Sign up and discover great amount of new opportunities!</p>
          </div>
          <div class="img__text m--in">
            <h2>One of us?</h2>
            <p>If you already has an account, just sign in. We've missed you!</p>
          </div>
          <div class="img__btn">
            <span class="m--up">Sign Up</span>
            <span class="m--in">Sign In</span>
          </div>
        </div>
        <div class="form sign-up">
          <h2>Time to feel like home,</h2>
          <label>
            <span>Name</span>
            <input type="text" />
          </label>
          <label>
            <span>Email</span>
            <input type="email" />
          </label>
          <label>
            <span>Password</span>
            <input type="password" />
          </label>
          <button type="button" class="submit">Sign Up</button>
          <button type="button" class="fb-btn">Join with <span>facebook</span></button>
        </div>
      </div>
    </div>
    
    <a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
      <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
    </a>
    <a href="https://codepen.io/suez/pen/XWyBpre" target="_blank" class="link-footer">New 2023 Version</a>
    <a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
      <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
    </a> --}}
</x-layout>    

