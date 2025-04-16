@props(['brands'])

@if($brands->isEmpty())
    <p class="text-muted text-center py-4">Không có thương hiệu nào.</p>
@else
<div>
  <div class="align-items-center ml-7">
    <div class="text-center">
      <h1>Thương hiệu</h1>
    </div>
  </div>

  <div class="brand-container d-flex flex-wrap gap-3 p-4">
    @foreach($brands as $brand)
      <div class="brand-item">
        <a href="{{ route('shop.brand.brands', $brand->slug) }}" class="btn btn-primary brand-btn">
          {{ $brand->name }}
        </a>
      </div>
    @endforeach
  </div>
</div>
@endif

<style scoped>
.brand-container {
    background-color: #f8f9fa;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    max-width: 1200px;
    margin: 0 auto;
}

.brand-item {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.brand-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
}

.btn-primary.brand-btn {
    background-color: #28a745;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    font-weight: 500;
    text-transform: capitalize;
    transition: background-color 0.3s ease;
}

.btn-primary.brand-btn:hover {
    background-color: #218838;
}

.text-muted {
    font-size: 1.1rem;
    font-weight: 400;
}
</style>
