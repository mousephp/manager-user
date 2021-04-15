# manager-user
<h2>Dự án quản lý user</h2>


<div>
    <h2><a id="user-content-about-repository" class="anchor" aria-hidden="true" href="#about-repository"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>About Repository</h2>

    <p>A very simple Laravel 7 + Sb admin 2 + Bootstrap 4 + Font Awesome 5 based Curd Application.</p>
</div>
    
    
<div>
     <h2><a id="user-content-features" class="anchor" aria-hidden="true" href="#features"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Features</h2>
    
<ul>
    <li>Modal based Create+Edit, List with Pagination, Delete with Sweetalert</li>
    <li>Login, Register, Forget+Reset Password as default auth</li>
    <li>Profile, Update Profile, Change Password, Avatar</li>
    <li>Product Management</li>
    <li>User Management</li>
    <li>Settings: Categories, Tags</li>
    <li>Frontend and Backend User ACL with Gate Policy (type: admin/user)</li>
    <li>Simple Static Dashboard</li>
    <li>Developer Options for OAuth Clients and Personal Access Token</li>
    <li>Build with Docker</li>
</ul>
</div>


 <div>
        <h2><a id="user-content-tech-specification" class="anchor" aria-hidden="true" href="#tech-specification"><svg
                    class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z">
                    </path>
                </svg></a>Tech Specification</h2>
        <ul>
            <li>Laravel 7</li>
            <li> Sb admin 2 + Bootstrap 4 + Font Awesome 5</li>
        </ul>
    </div>
    

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
    
    
  <div>
        <h2><a id="user-content-license" class="anchor" aria-hidden="true" href="#license"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>License</h2>
        <p><a href="https://opensource.org/licenses/MIT" rel="nofollow">MIT license</a>.</p>
</div>
