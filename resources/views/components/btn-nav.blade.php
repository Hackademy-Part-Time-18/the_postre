<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center flex-wrap">
                    @auth
                    @if (Auth::user()->is_writer)
                    <a class="btn mx-2 mb-2 btn-dark bg-message text-white border-0" style="text-shadow:none;" href="{{ route('article.create') }}">Inserisci articolo</a>
                    @endif
                    @endauth
                    <a href="{{ route('article.index') }}" class="btn mx-2 mb-2 btn-dark bg-message text-white border-0"
                        style="text-shadow:none;">Tutti gli articoli</a>
                    <div class="btn-group mx-2 mb-2">
                        <button class="btn btn-dark bg-message text-white border-0 dropdown-toggle" style="text-shadow:none;"
                            id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorie piu viste
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                            @foreach ($mostViewedCategories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('article.bycategory', $category->id) }}">{{ $category['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="btn-group mx-2 mb-2">
                        <button class="btn btn-dark bg-message text-white border-0 dropdown-toggle" style="text-shadow:none;"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            User piu famosi
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            @foreach ($mostViewedUsers as $user)
                                <li><a class="dropdown-item"
                                        href="{{ route('article.byUser', $user->id) }}">{{ $user['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <a href="{{ route('article.show', compact('article')) }}"
                        class="btn mx-2 mb-2 btn-dark bg-message text-white border-0" style="text-shadow:none;">Continua
                        a leggere</a> --}}
                </div>
            </div>
        </div>
    </section>
</div>
