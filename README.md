# 📬 Laravel Guest Comment System

A Laravel-based blog system where admins can manage posts and approve comments, while guest users can submit comments without authentication.  
Comments will only be displayed after being approved by the admin.

---

## 🚀 Features

- Admin Authentication (login/logout)
- Role-based Access Control (admin/user via role column)
- Admin Dashboard:
    - Create, edit, delete posts
    - View all submitted comments
    - Approve or reject guest comments
- Public Interface:
    - View all posts
    - Submit comments without logging in
    - View only approved comments

---

## 🛠️ Technologies Used

- Laravel (latest version)
- Blade Templating Engine
- MySQL Database
- HTML/CSS for styling

---

## 🧑‍💻 Roles & Permissions

### Admin
- Can log in via /admin/login
- Can manage posts (create, edit, delete)
- Can view and approve/reject comments

### Guest User
- Can view posts without logging in
- Can submit comments on posts
- Cannot see unapproved comments

---

## 📦 Installation

1. Clone the repository
   `bash
   git clone https://github.com/your-username/laravel-guest-comment.git
   cd laravel-guest-comment

2. Install dependencies

   - composer install
   - npm install && npm run dev

3. Create .env file

   - cp .env.example .env

    - Set your MySQL database credentials in .env
    - For example:
      - DB_CONNECTION=mysql
      - DB_HOST=127.0.0.1
      - DB_PORT=3306
      - DB_DATABASE=laravel
      - DB_USERNAME=root
      - DB_PASSWORD=

4. Generate app key

    - php artisan key:generate

5. Run migrations

    - php artisan migrate

6. Run the development server

    - php artisan serve

---

🔑 Admin Setup

 - You can manually create an admin user using Laravel Tinker:

    - php artisan tinker

        \App\Models\User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
        'role' => 'admin', // Must match your role logic
        ]);

---

✏️ Usage

Visit / to see all posts.

Admin can log in at /admin/login or click on the "Admin Login" link to manage posts and approve comments.


---

📄 License

This project is open-source and free to use.


---

🙋 Author

Developed by Melika Nick
