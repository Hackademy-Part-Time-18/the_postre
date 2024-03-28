<x-layout>
    <x-sidebar />
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('user.uploadProfileImage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                    <h4>la tua imagine profile</h4>
                    <input type="file" name="profile_image">
                    </div>
                    <div>
                        <h4>la tua data di nascita</h4>
                    <input type="date" name="date_of_birth">
                    </div>
                    <div>
                        <h4>la tua autobiografia</h4>
                    <textarea name="description" placeholder="Descripción"></textarea>
                    </div>
                    <button type="submit">Salvare i cambiamenti</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h1>Cosi ti vedono gli altri</h1>
                </div>
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row container d-flex justify-content-center">

                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div>
                                            @if ( Auth::user()->profile_image == NULL)
                                            <i class="bi bi-person-circle"></i>
                                            @else
                                            <img src="{{ Auth::user()->profile_image }}"
                                            class="img-lg rounded-circle mb-4" alt="profile image">
                                            @endif
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p class="text-muted mb-0">Utente
                                                @if (Auth::user()->is_admin)
                                                    <span>Admin</span>
                                                @endif
                                                @if (Auth::user()->is_writer)
                                                    <span>Scrittore</span>
                                                @endif
                                                @if (Auth::user()->is_revisor)
                                                    <span>Revisore</span>
                                                @endif
                                            </p>
                                        </div>
                                        <p class="mt-2 card-text">
                                            @if (Auth::user()->description == NULL)
                                            Descrizione
                                            @else
                                            {{ Auth::user()->description }}
                                            @endif
                                        </p>
                                        {{-- <div class="border-top pt-3">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h6>4354</h6>
                                                    <p>Post</p>
                                                </div>
                                                <div class="col-4">
                                                    <h6>455K</h6>
                                                    <p>Followers</p>
                                                </div>
                                                <div class="col-4">
                                                    <h6>34K</h6>
                                                    <p>Likes</p>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
