<div class="login-container">
        <div class="login-box">
            <h1 class="text-center">Đăng Nhập</h1>
            <form>
                <div class="mb-3">
                    <label for="username" class="form-label">Tên Đăng Nhập:</label>
                    <input type="text" class="form-control" id="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật Khẩu:</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
                <p class="text-center mt-2">
                    Chưa có tài khoản? <a href="register.html">Đăng Ký</a>
                </p>
            </form>
        </div>
</div>
<style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ce4381, #16acd5);
        }
        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
</style>
