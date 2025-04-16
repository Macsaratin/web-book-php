
<!-- Navbar Start -->
<div class="container-fluid fixed-top shadow-sm bg-white header">
  <div class="container px-0">
    <nav class="navbar navbar-light bg-white navbar-expand-xl">
      <a href="/" class="navbar-brand">
        <h1 class="text-primary display-6">Fruitables</h1>
      </a>
      <button class="navbar-toggler py-2 px-3" aria-label="Toggle navigation">
        <span class="fa fa-bars text-primary"></span>
      </button>
      <div class="collapse navbar-collapse bg-white">
        <div class="navbar-nav mx-auto">
          <a href="/" class="nav-item nav-link">Home</a>
          <a href="#st" class="nav-item nav-link">Shop</a>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle">Pages</a>
            <div class="dropdown-menu m-0 bg-secondary rounded-0">
              <a href="#st" class="dropdown-item">Cart</a>
              <a href="#st" class="dropdown-item">Checkout</a>
              <a href="#st" class="dropdown-item">Testimonial</a>
              <a href="#st" class="dropdown-item">404 Page</a>
            </div>
          </div>
          <a href="#st" class="nav-item nav-link">Contact</a>
        </div>
        <div class="d-flex m-3 me-0">
          <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" aria-label="Search" id="searchButton">
            <i class="fas fa-search text-primary"></i>
          </button>
          
          <!-- Search form -->
          <form id="searchForm" class="search-form">
            <input type="text" id="searchInput" placeholder="Search products..." class="form-control">
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
          
          <a href="#st" class="position-relative me-4 my-auto">
            <i class="fa fa-shopping-bag fa-2x"></i>
            <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">0</span>
          </a>
          <div class="my-auto">
            <a href="#st" class="my-auto">
              <i class="fas fa-user fa-2x"></i>
            </a>
            <span class="text-primary fw-bold" style="cursor: pointer;"></span>
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>
<!-- Navbar End -->

<script >
window.addEventListener('scroll', function() {
    const header = document.querySelector('.header');
    if (window.scrollY > 50) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });
  document.querySelector('#searchButton').addEventListener('click', function() {
    const searchForm = document.querySelector('#searchForm');
        searchForm.classList.toggle('active');
});

document.querySelector('#searchForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
    const searchQuery = document.querySelector('#searchInput').value.trim();
    
    if (searchQuery !== "") {
        window.location.href = `/search?query=${encodeURIComponent(searchQuery)}`;
    } else {
        alert("Please enter a search query!");
    }
});

</script>
<style scoped>
/* Navbar active link */
.navbar-nav .nav-link.active {
  font-weight: bold;
  color: #007bff !important;
}

/* Header cố định với hiệu ứng khi cuộn */
.header {
  transition: all 0.3s ease-in-out;
}

.header.scrolled {
  background-color: rgba(255, 255, 255, 0.9);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  padding: 5px 0;
}

/* Cách banner 5px */
.banner-container {
  margin-top: 85px; /* Giữ khoảng cách với header */
}

/* Style cho tên người dùng */
.text-primary {
  color: #007bff !important;
}

.fw-bold {
  font-weight: 700;
}
/* CSS cho hiệu ứng mở rộng thanh tìm kiếm */
.search-form {
  display: flex;
  align-items: center;
  width: 0;
  opacity: 0;
  transition: width 0.3s ease, opacity 0.3s ease;
  position: absolute;
  right: 0;
  top: 60px;
}

.search-form input {
  width: 0;
  transition: width 0.3s ease;
  border: 1px solid #ccc;
  padding: 10px;
  margin-right: 10px;
}

.search-form button {
  display: none;
}

/* Khi nhấn vào nút tìm kiếm, mở rộng thanh tìm kiếm */
.search-form.active {
  width: 250px;
  opacity: 1;
}

.search-form.active input {
  width: 150px;
}

</style>