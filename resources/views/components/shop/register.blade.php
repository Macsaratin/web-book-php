<div class="register-container">
        <div class="register-box">
            <h1 class="text-center">Đăng Ký</h1>
            <form>
                <div class="form-grid">
                    <!-- Cột 1: Thông tin cá nhân -->
                    <div class="form-column">
                        <div class="input-group">
                            <input type="text" class="form-control" required />
                            <label>Họ:</label>
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" required />
                            <label>Tên:</label>
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" required />
                            <label>Số Điện Thoại:</label>
                        </div>

                        <div class="input-group">
                            <input type="email" class="form-control" required />
                            <label>Email:</label>
                        </div>

                        <div class="input-group">
                            <input type="password" class="form-control" required minlength="6" />
                            <label>Mật Khẩu:</label>
                        </div>
                    </div>

                    <!-- Cột 2: Địa chỉ -->
                    <div class="form-column">
                        <div class="input-group">
                            <input type="text" class="form-control" required />
                            <label>Đường:</label>
                        </div>

                        <div class="input-group">
                            <select class="form-control" required>
                                <option value="" disabled selected></option>
                                <option value="VN">Việt Nam</option>
                                <option value="US">Hoa Kỳ</option>
                                <option value="JP">Nhật Bản</option>
                            </select>
                            <label>Quốc Gia:</label>
                        </div>

                        <div class="input-group">
                            <select class="form-control" required>
                                <option value="" disabled selected></option>
                                <option value="HaNoi">Hà Nội</option>
                                <option value="TPHCM">TP. Hồ Chí Minh</option>
                                <option value="DaNang">Đà Nẵng</option>
                            </select>
                            <label>Thành Phố:</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">Đăng Ký</button>

                <p class="text-center mt-2">
                    Đã có tài khoản? <a href="login.html">Đăng Nhập</a>
                </p>
            </form>
        </div>
</div>
<style scoped>
.register-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: linear-gradient(135deg, #ce4381, #16acd5);
}

.register-form {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(12px);
  padding: 25px;
  border-radius: 14px;
  width: 100%;
  max-width: 600px;
  box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
  text-align: center;
  
}

h2 {
  margin-bottom: 15px;
  color: #fc0808;
  font-family: 'Poppins', sans-serif;
}

.form-grid {
  display: flex;
  gap: 20px;
}

.form-column {
  flex: 1;
}

.input-group {
  position: relative;
  margin-bottom: 15px;
  background: white;

}

.input-group input {
  width: 100%;
  padding: 12px;
  border-radius: 6px;
  border: none;
  outline: none;
  font-size: 16px;
  background: rgba(142, 139, 139, 0.2);
  color: #0a0000;
  transition: 0.3s;
}

.input-group label {
  position: absolute;
  top: 50%;
  left: 12px;
  transform: translateY(-50%);
  font-size: 14px;
  transition: 0.3s;
}


.input-group input:focus + label,
.input-group input:valid + label {
  top: 5px;
  left: 10px;
  font-size: 12px;
}

.btn-primary {
  width: 100%;
  padding: 12px;
  font-size: 16px;
  background: linear-gradient(45deg, #00c6ff, #0072ff);
  border: none;
  border-radius: 6px;
  color: rgb(20, 1, 1);
  cursor: pointer;
  transition: 0.3s;
}

.btn-primary:hover {
  background: linear-gradient(45deg, #0072ff, #00c6ff);
}

.alert {
  margin-top: 10px;
  padding: 10px;
  border-radius: 6px;
  font-size: 14px;
  text-align: center;
}

.alert-danger {
  background: rgba(255, 0, 0, 0.3);
  color: white;
}

.alert-success {
  background: rgba(0, 255, 0, 0.3);
  color: white;
}


/* Responsive */
@media (max-width: 600px) {
  .form-grid {
      flex-direction: column;
  }
}
</style>