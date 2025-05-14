# 📰 Medium Clone with Laravel
Welcome to a minimalistic version of Medium, built with 💡 Laravel as part of a Laravel learning course. This project demonstrates how to build a clean, functional blog platform with essential features like creating posts, following users, and clapping for great content 👏.

## 🚀 Features
📝 Create, edit, and delete posts

👤 User profiles and avatars

🔐 Authentication and email verification

🫱🏽‍🫲🏽 Follow/unfollow users

👏 Clap functionality for posts

📂 Post categorization

⏱️ Read time indicator

🖼️ Image upload for posts and profile avatars

📱 Responsive layout with Laravel Blade & TailwindCSS


## 🛠️ Tech Stack

⚙️ Laravel 10+

🧩 Laravel Breeze (authentication scaffolding)

🎨 Blade components

🌬️ TailwindCSS

🖼️ Spatie/laravel-medialibrary for media handling


## 📦 Installation
```bash
Copiar
Editar
git clone https://github.com/yourusername/medium-clone-laravel.git
cd medium-clone-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm install && npm run dev
php artisan serve
```


Make sure you have your database set up and configured in the .env file 🗃️.

## 🔐 Auth & Access
Register or log in to:

Create and manage your posts

Follow and clap for other users

Public users can:

Browse posts

View profiles

## 👨‍💻 Author

This project was developed by Claudia Alfieri for educational purposes.

## 📝 Contribution 🤝

Contributions are welcome through pull requests.

