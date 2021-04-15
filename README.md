# manager-user
   <strong>Dự án quản lý user</strong>

    
    
## Features
<ul>
    <li>Thêm - sửa - xóa - hiển thị - Destroy multiple record</li>
    <li>Phân quyền user theo post</li>
    <li>Thay đổi mật khẩu theo id</li>
    <li>Tạo mẫu dữ liệu role-permission</li>
    <li>Phân quyền user với user-role-permision theo Gate - Policy và mô hình ACL (Access Control List)</li>
    <li>Login-Logout với facebook.com và google.com</li>
    <li>Đăng ký người dùng - validate dữ liệu</li>
    <li>recaptcha</li>
    <li>export dữ liệu theo định dạng pdf, excel</li>
    <li>Quyên mật khẩu - gửi mail xác thực mật khẩu</li>
    <li>pagination, middleware login-logout</li>
    <li>...</li>
</ul>



## Tech Specification
<ul>
    <li>Laravel 7</li>
    <li> Sb admin 2 + Bootstrap 4 + Font Awesome 5</li>
</ul>
  
    

## Installation
<ul>
    <li><code>git clone https://github.com/mousephp/manager-user.git</code></li>
    <li><code>cd manager-user/</code></li>
    <li><code>composer install</code></li>
    <li><code>cp .env.example .env</code></li>
    <li>Update <code>.env</code> and set your database credentials</li>
    <li><code>php artisan key:generate</code></li>
    <li><code>php artisan migrate</code></li>
    <li><code>php artisan db:seed</code></li>
    <li><code>php artisan serve</code></li>
</ul>

    
    
## License

[MIT license](https://opensource.org/licenses/MIT).
