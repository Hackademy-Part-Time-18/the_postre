<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <a href="{{ route('article.index') }}" class="btn mx-2 mb-2 btn-dark bg-message text-white border-0"
                        style="text-shadow:none;">Tutti gli articoli</a>
                    <button class="btn mx-2 mb-2 btn-dark bg-message text-white border-0" style="text-shadow:none;">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Categorie piu viste</a>
                            <ul class="dropdown-menu mb-2" aria-labelledby="navbarDropdown">
                                @foreach ($mostViewedCategories as $category)
                                    <li><a id="btn-registrati" class="dropdown-item"
                                            href="{{ route('article.bycategory', $category->id) }}">{{ $category['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </button>
                    <button class="btn mx-2 mb-2 btn-dark bg-message text-white border-0" style="text-shadow:none;">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">User piu famosi</a>
                            <ul class="dropdown-menu mb-2" aria-labelledby="navbarDropdown">
                                @foreach ($mostViewedUsers as $user)
                                    <li><a id="btn-registrati" class="dropdown-item"
                                            href="{{ route('article.byUser', $user->id) }}">{{ $user['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </button>
                    {{-- <a href="{{ route('article.show', compact('article')) }}"
                        class="btn mx-2 mb-2 btn-dark bg-message text-white border-0" style="text-shadow:none;">Continua
                        a leggere</a> --}}
                </div>
            </div>
        </div>
    </section></div>