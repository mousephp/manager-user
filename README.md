# manager-user
<h2>Dự án quản lý user</h2>
<strong>Bao gồm các thành phần</strong>
<ul>
    <h4>User, Role, Permission, Post</h4>
    <li>
        Tương ứng với các tính năng
        <ul>
            <li>
                <ul>
                    <b>User</b>
                    <li>Thêm - sửa - xóa - hiển thị</li>
                    <li>Thay đổi mật khẩu theo id</li>
                </ul>
            </li> 
            <li>
                <ul>
                    <b>Role</b>
                    <li>Thêm - sửa role (với multiple permission) - xóa - hiển thị</li>
                </ul>
            </li>
            <li>
                <ul>
                    <b>Permission</b>
                    <li>Thêm - sửa - xóa - hiển thị</li>
                    <li>Tạo mẫu dữ liệu</li>
                </ul>
            </li>
            <li>
                <ul>
                    <b>Post</b>
                    <li>Thêm - sửa - xóa - hiển thị - Destroy multiple record</li>
                    <li>Phân quyền user theo post</li>
                </ul>
            </li>
        </ul>
    </li>

    <li>
      <ul>
        <li>Phân quyền user với user-role-permision theo Gate - Policy và mô hình ACL (Access Control List)</li>
        <li>Login-Logout với facebook.com và google.com</li>
        <li>Đăng ký người dùng - validate dữ liệu</li>
        <li>recaptcha</li>
        <li>export dữ liệu theo định dạng pdf, excel</li>
        <li>Quyên mật khẩu - gửi mail xác thực mật khẩu</li>
        <li></li>
       </ul>
    </li>  
</ul>

<div>
        <h2><a id="user-content-installation" class="anchor" aria-hidden="true" href="#installation"><svg
                    class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z">
                    </path>
                </svg></a>Installation</h2>
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
    </div>
