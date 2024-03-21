

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="page-content page-container card h-100 w-100" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-sm-12">
                <!-- Draggable default card start -->
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <div class="row" id="sortable">
                            <div class="col-md-3" style="">
                                <div class="card-sub"> <img class="card-img-top img-fluid" src="https://i.imgur.com/QwIYa8y.jpg" alt="Card image cap">
                                    <div class="card-block">
                                        <h4 class="card-title">{{ $subtitle }}</h4>
                                        <p class="card-text">{{ $category }}</p>
                                        @if ($category)
                                        <a href="{{ $url }}" class="btn btn-dark bg-message text-white border-0">Leggi</a>
                                        @else
                                            <p class="smal text-muted st-italic text-capitalize">Non categorizzato</p>
                                        @endif
                                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                                            Redatto il {{ $data }} da {{ $user }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Draggable default card start -->
            </div>
        </div>
    </div>
</div>