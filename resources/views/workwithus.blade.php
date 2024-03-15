<x-layout>
    <div class="bg-100"></div>
    <div>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block ">
                <span class="site-heading-upper text-white mb-3">Sito di articoli online</span>
                <p class=" text-white">Lavora con noi</p>
            </h1>
        </header>
    </div>
    <div class="container bg-white my-5">
        <div class="row justify-content-center align-items-center border rounded p-2 shadow">
            <div class="col-12 col-md-6">

                <h2 class="text-primary">Lavora come amministratore</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti, adipisci aliquam explicabo cum,
                    accusantium error officia quisquam unde ea deserunt animi. Error itaque voluptates quo tempora
                    accusantium libero magni sed?</p>


                <h2 class="text-primary">Lavora come revisore</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti, adipisci aliquam explicabo cum,
                    accusantium error officia quisquam unde ea deserunt animi. Error itaque voluptates quo tempora
                    accusantium libero magni sed?</p>


                <h2 class="text-primary">Lavora come redattore</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti, adipisci aliquam explicabo cum,
                    accusantium error officia quisquam unde ea deserunt animi. Error itaque voluptates quo tempora
                    accusantium libero magni sed?</p>

            </div>
            <div class="col-12 col-md-6">
                <form action="{{ route('user.role.request') }}" method="POST" class="p-5">
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">Per quale ruolo ti stai candidando?</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Scegli qui</option>
                            <option value="admin">Amministratore</option>
                            <option value="revisor">Revisore</option>
                            <option value="writer">Scrittore</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label h5">Inviaci la tua email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            @auth value="{{ Auth::user()->email }}" @endauth>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Parlaci di te</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control">{{ old('message') }}</textarea>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-dark bg-message border-0 text-white">Invia la tua candidatura</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
