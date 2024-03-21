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

<div class="container">
    <div class="row">

        <div class="col-md-4 Services-tab  item">
            <div class="folded-corner service_tab_1">
                <div class="text">
                    <i class="fa fa-image fa-5x fa-icon-image"></i>
                    <p class="item-title">
                    <h5 class="card-title">{{ $title }}</h5>
                    </p>
                    <p class="card-text">{{ $subtitle }}</p>
                    <p class="small text-muted fst-italic text-capitalize">{{ $category }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 Services-tab item">
            <div class="folded-corner service_tab_1">
                <div class="text">
                    <i class="fa fa-lightbulb fa-5x fa-icon-image"></i>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        Redatto il {{ $data }} da {{ $user }} <a href="{{ $url }}" class="btn btn-dark bg-message text-white border-0">Leggi</a>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>