## 📘 SkillSync - README

🧑‍💻 Built by **Team EREG** for **Infoeducatie 2025**

---

# 🚀 SkillSync - Collaborative Study Platform

**SkillSync** is an advanced web application built for managing educational events and enhancing group study sessions. It helps students create, manage, and join study groups.

---

## 🎯 Features

* 📅 **Study Event Management**: Create, browse, and join educational sessions
* 👤 **Custom User Profiles**: Skill tags
* 📎 **Curriculum Upload**: Upload and manage study PDFs per event
* 🔒 **Authentication & Access Control**: Laravel Breeze with event creator rights
* 🗃️ **Multi-tag Filtering**: Tag-based event browsing
* 🌐 **Responsive UI**: Beautifully styled with Tailwind CSS

---

## 🧰 Tech Stack

| Layer        | Tech                     |
| ------------ | ------------------------ |
| Backend      | Laravel (PHP 8.2+)       |
| Frontend     | Blade, Tailwind CSS      |
| Database     | MySQL (via XAMPP)        |
| Auth System  | Laravel Breeze           |
| File Storage | Laravel Storage + Public |

---

## ⚙️ Requirements

* PHP >= 8.0
* Composer
* Node.js & NPM
* MySQL / MariaDB
* XAMPP (or similar local server)

---

## 🔧 Installation Steps

1. **Clone the Repository**

```bash
git clone https://github.com/LucaLudoseanu/skill-sync
cd skill-sync
```

2. **Install PHP Dependencies**

```bash
composer install
```

3. **Install JavaScript Dependencies**

```bash
npm install && npm run build
```

4. **Set Up Environment File**

```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure .env**
   Edit `.env` and set:

```
DB_DATABASE=skillsync
DB_USERNAME=root
DB_PASSWORD=
```

6. **Run Migrations**

```bash
php artisan migrate
```

7. **Seed Tags and Sample Data (Optional)**

```bash
php artisan db:seed
```

8. **Link Storage**

```bash
php artisan storage:link
```

9. **Start the Dev Server**

```bash
php artisan serve
```

10. **Access the App**
    Open: [http://localhost:8000](http://localhost:8000)

---

## 📌 Notes

* Default login/register uses Breeze UI, fully customizable.
* Curriculum PDFs go to `/storage/app/public/curricula`.
* Images, backgrounds, and icons are in `public/images`.

---

## 🤝 Credits

Developed by **Team EREG** (InfoEducație 2025)

---

## 📬 Contact

📧 [rosudragossteam@gmail.com](mailto:rosudragossteam@gmail.com)
