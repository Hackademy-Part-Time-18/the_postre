<x-layout>
    <div class="bg-100" style="background-color: var(--bs-white)"></div>
    <div class="container bg-white">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h4>Imposta la tua card di profilo</h4>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card bg-message p-4 text-center text-dark border-black">
                            <p>Riempire Tutti i campi</p>
                            <form action="{{ route('user.uploadProfileImage') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="py-2">
                                    <h4 class="text-white">La tua immagine profilo</h4>
                                    <input type="file" name="profile_image">
                                </div>
                                <div class="py-2">
                                    <h4 class="text-white">La tua data di nascita</h4>
                                    <input type="date" name="date_of_birth">
                                </div>
                                <div class="py-2">
                                    <h4 class="text-white">La tua autobiografia</h4>
                                    <textarea name="description" placeholder="Descrizione"></textarea>
                                </div>
                                <button class="btn btn-dark bg-message border-0" type="submit">Salvare i cambiamenti</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        @if (request()->route()->getname() == 'user')
                            <div class="text-center text-dark">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <h4>Cosi ti vedono gli altri</h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row container d-flex justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <div>
                                                    @if (Auth::user()->profile_image == null)
                                                        <i class="bi bi-person-circle"></i>
                                                    @else
                                                        <img src="{{ Storage::url(Auth::user()->profile_image) }}"
                                                            class="img-lg rounded-circle mb-4"
                                                            style="height: 150px; width:150px" alt="profile image">
                                                    @endif
                                                    <h4 class="primary-text">{{ Auth::user()->name }}</h4>
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
                                                    @if (Auth::user()->description == null)
                                                        Descrizione
                                                    @else
                                                        {{ Auth::user()->description }}
                                                    @endif
                                                </p>
                                                <p class="mt-2 card-text">
                                                    {{ Auth::user()->email }}
                                                </p>
                                                <p class="mt-2 card-text text-secondary">
                                                    {{ Auth::user()->date_of_birth }}
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
        </div>
    </div>
</x-layout>
