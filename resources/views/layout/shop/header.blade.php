<div class="container-fluid fixed-top shadow-sm bg-white header">
  <div class="container px-0">
    <nav class="navbar navbar-light bg-white navbar-expand-xl">
      <a href="/" class="navbar-brand">
        <h1 class="text-primary display-6">Book Store</h1>
      </a>
      <button class="navbar-toggler py-2 px-3" aria-label="Toggle navigation">
        <span class="fa fa-bars text-primary"></span>
      </button>
      <div class="collapse navbar-collapse bg-white">
        <div class="navbar-nav mx-auto">
          <a href="/" class="nav-item nav-link">Home</a>
          <a href="{{ route('shop.product.products')}}" class="nav-item nav-link">Shop</a>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle">Pages</a>
            <div class="dropdown-menu m-0 bg-secondary rounded-0">
              <a href="#st" class="dropdown-item">Cart</a>
              <a href="#st" class="dropdown-item">Checkout</a>
              <a href="" class="dropdown-item">Testimonial</a>
              <a href="#st" class="dropdown-item">404 Page</a>
            </div>
          </div>
          <a href="#st" class="nav-item nav-link">Contact</a>
        </div>

        <!-- Khu vực tìm kiếm, giỏ hàng và người dùng -->
        <div class="d-flex m-3 me-0">
          <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" aria-label="Search" id="searchButton">
            <i class="fas fa-search text-primary"></i>
          </button>

          <a href="#st" class="position-relative me-4 my-auto">
            <i class="fa fa-shopping-bag fa-2x"></i>
            <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">0</span>
          </a>

          <!-- Dropdown người dùng -->
          <div class="my-auto dropdown" id="userDropdown">
            <a class="my-auto dropdown-toggle" data-bs-toggle="dropdown" style="cursor: pointer;">
              <i class="fas fa-user fa-2x text-primary"></i>
              <span id="usernameDisplay" class="text-primary fw-bold ms-2">
                @if(session('isLoggedIn'))
                  {{ session('username') }}
                @endif
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-white shadow-sm">
              @if(session('isLoggedIn'))
                <a href="{{ route('shop.user.account')}}">Tài khoản</a>
                <a href="{{ route('auth.logout') }}" class="dropdown-item">Đăng xuất</a>
              @else
                <a href="{{ route('auth.login') }}" class="dropdown-item">Đăng nhập</a>
                <a href="{{ route('auth.registration') }}" class="dropdown-item">Đăng ký</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function () {
  const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";
  const username = localStorage.getItem("username");
  const userMenu = document.querySelector('#userMenu');
  const usernameDisplay = document.querySelector('#usernameDisplay');

  if (isLoggedIn && username) {
    usernameDisplay.textContent = username; 
    userMenu.innerHTML = `
      <a href="{{ route('shop.user.account') }}">Tài khoản</a>
      <a href="#" class="dropdown-item" id="logoutBtn">Đăng xuất</a>
    `;
  } else {
    usernameDisplay.textContent = "";
    userMenu.innerHTML = `
      <a href="{{ route('auth.login') }}" class="dropdown-item">Đăng nhập</a>
      <a href="{{ route('auth.registration') }}" class="dropdown-item">Đăng ký</a>
    `;
  }

  // Toggle dropdown
  document.querySelector('#userDropdown a').addEventListener('click', function () {
    userMenu.classList.toggle('show');
  });

  // Logout action
  document.addEventListener('click', function (e) {
    if (e.target.id === 'logoutBtn') {
      localStorage.removeItem("isLoggedIn");
      localStorage.removeItem("username");
      location.reload(); // reload to update the UI
    }
  });

  // Hide dropdown when clicking outside
  document.addEventListener('click', function (e) {
    const dropdown = document.querySelector('#userDropdown');
    if (!dropdown.contains(e.target)) {
      userMenu.classList.remove('show');
    }
  });
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
