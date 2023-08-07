<div class="card">

    <div id="carousel" class="carousel slide" data-bs-ride="carousel" style="max-width: 800px;">
        <div class="carousel-inner">
            @foreach($property->pictures as $k => $picture)
            <div class="carousel-item {{ $k === 0 ? 'active' : '' }}">
                @if($property->getPicture())
                    <img src="{{ $picture->getImageUrl(360, 230) }}" alt="" class="w-100">
                    @else
                    <img src="/empty.jpg" alt="" class="w-100">
                @endif
            </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>
        </h5>
        <p class="card-text">{{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})</p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>
    </div> 
    
</div>


