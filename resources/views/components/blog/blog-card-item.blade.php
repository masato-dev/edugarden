<div class="card blog-card h-100 shadow-sm border-0">
    <div 
        class="card-img-top bg-cover bg-center" 
        style="background-image: url('{{ url('storage/' . $model['thumbnail']) }}'); padding-top: 56.25%; background-size: cover; background-position: center; background-repeat: no-repeat;">
    </div>
    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $model['name'] }}</h5>
        <p class="card-text text-muted">{{ Str::limit($model['description'], 100) }}</p>
        <a href="{{ route('blogs.detail', ['slug' => $model['slug']]) }}" class="k-btn btn-main text-decoration-none">Xem chi tiết</a>
    </div>
</div>
