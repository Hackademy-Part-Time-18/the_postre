<div class="card h-100 w-100">
    <img src="{{ Storage::url($image) }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $subtitle }}</p>
        <p class="small text-muted fst-italic text-capitalize">{{ $category }}</p>
    </div>
    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
        Redatto il {{ $data }} da {{ $user }}
        <a href="{{ $url }}" class="btn btn-dark bg-message text-white border-0">Leggi</a>
    </div>
</div>
