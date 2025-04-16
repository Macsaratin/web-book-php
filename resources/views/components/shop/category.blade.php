@props(['categories'])

@if($categories->isEmpty())
    <p class="text-muted text-center py-4">Không có danh mục nào.</p>
@else
    <h1>Danh mục</h1>
    <div class="category-container d-flex flex-wrap gap-3 p-4">
        @foreach($categories as $category)
            <div class="category-item btn-group" role="group">
                <div class="btn btn-primary category-btn">
                    {{ $category->category_name }}
                </div>

                <!-- Kiểm tra và hiển thị danh mục con -->
                @if($category->children->count())
                    <button type="button"
                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($category->children as $child)
                            <li>
                                <a class="dropdown-item" href="{{ route('shop.category.categories', $child->slug) }}">
                                    {{ $child->category_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    </div>
@endif

<style scoped>
.category-container {
    background-color: #f8f9fa;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    max-width: 1200px;
    margin: 0 auto;
}

.category-item {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.category-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
}

.btn-primary.category-btn {
    background-color: #007bff;
    border: none;
    border-radius: 8px 0 0 8px;
    padding: 10px 20px;
    font-weight: 500;
    text-transform: capitalize;
    transition: background-color 0.3s ease;
}

.btn-primary.category-btn:hover {
    background-color: #0056b3;
}

.btn-primary.dropdown-toggle {
    border-radius: 0 8px 8px 0;
    padding: 10px 12px;
}

.dropdown-menu {
    border: none;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 8px 0;
    min-width: 200px;
}

.dropdown-item {
    padding: 10px 20px;
    font-weight: 400;
    color: #333;
    border-radius: 4px;
    margin: 0 8px;
    transition: background-color 0.2s ease;
}

.dropdown-item:hover {
    background-color: #e9ecef;
    color: #007bff;
}

.text-muted {
    font-size: 1.1rem;
    font-weight: 400;
}
</style>