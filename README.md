<div align="center">

<!-- Animated Header -->
<img src="https://readme-typing-svg.herokuapp.com?font=Space+Mono&weight=700&size=40&duration=3000&pause=1000&color=4A50F5&center=true&vCenter=true&width=600&height=80&lines=Fetchlink;Modern+URL+Shortener;Shorten.+Share.+Done." alt="Typing SVG" />

<br/>

<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
<img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
<img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5" />
<img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3" />
<img src="https://img.shields.io/badge/RTL-Supported-4A50F5?style=for-the-badge" alt="RTL" />

<br/>

**A modern, clean, and user-friendly URL shortener with full RTL support**

[![GitHub stars](https://img.shields.io/github/stars/salehsarlak/Fetchlink-A-modern-link-shortener?style=social)](https://github.com/salehsarlak/Fetchlink-A-modern-link-shortener/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/salehsarlak/Fetchlink-A-modern-link-shortener?style=social)](https://github.com/salehsarlak/Fetchlink-A-modern-link-shortener/network/members)
[![GitHub issues](https://img.shields.io/github/issues/salehsarlak/Fetchlink-A-modern-link-shortener)](https://github.com/salehsarlak/Fetchlink-A-modern-link-shortener/issues)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

</div>

---

## ✨ About the Project

**Fetchlink** is a modern and professional URL shortener that lets you turn long links into short, clean, and shareable URLs in seconds.

Built with a strong focus on **great user experience**, **RTL support**, and **fast performance**.

<div align="center">
  <img src="https://user-images.githubusercontent.com/74038190/212284158-e840e285-664b-44d7-b79b-e264b5e54825.gif" width="400" />
</div>

---

## 🚀 Key Features

<table>
<tr>
<td width="50%">

### 🔗 Smart Shortening
- Convert long links into short ones instantly
- Support for custom short links
- Secure storage in MySQL database

</td>
<td width="50%">

### 🎯 Two Link Types
- **Direct Link**: Instant redirect
- **Indirect Link**: Intermediate page with ads

</td>
</tr>
<tr>
<td width="50%">

### 🎨 Modern UI
- Clean and minimal design
- Full **RTL** support
- Smooth animations and effects

</td>
<td width="50%">

### 🛡️ Secure & Lightweight
- Uses Prepared Statements
- No heavy dependencies
- Fast and resource-efficient

</td>
</tr>
</table>

---



## 🛠️ Tech Stack

<div align="center">

| Technology | Description |
|:----------:|:-----------:|
| **PHP** | Server-side logic and link management |
| **MySQL** | Link storage |
| **HTML5 + CSS3** | Modern and responsive UI |
| **Vazirmatn + Space Mono** | Beautiful fonts for RTL & LTR |

</div>

---

## 📦 Installation

### Requirements
- PHP 7.4 or higher
- MySQL / MariaDB
- Web server (Apache / Nginx / XAMPP / Laragon)

### Setup Steps

```bash
# 1. Clone the repository
git clone https://github.com/salehsarlak/Fetchlink-A-modern-link-shortener.git

# 2. Navigate to the project folder
cd Fetchlink-A-modern-link-shortener

# 3. Configure the database
# Edit the config/db.php file:
```

```php
$servername = "localhost";
$username   = "root";
$password   = "your_password";
$dbname     = "link";
```

```sql
-- 4. Create the database table
CREATE DATABASE IF NOT EXISTS link;
USE link;

CREATE TABLE links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    custom_link VARCHAR(255) NOT NULL UNIQUE,
    endpoint_link TEXT NOT NULL,
    type ENUM('direct', 'indirect') DEFAULT 'direct',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

```bash
# 5. Run the project
# Place the project on localhost (e.g. with XAMPP)
# Then open this URL in your browser:
http://localhost/Fetchlink-A-modern-link-shortener
```

---

## 📂 Project Structure

```
Fetchlink-A-modern-link-shortener/
├── assets/
│   └── imagees/
│       ├── ads/          # Ad GIFs for the redirect page
│       ├── back.webp
│       └── prof.png
├── config/
│   └── db.php            # Database connection settings
├── css/
│   ├── reset.css
│   └── style.css         # Main styles
├── index.php             # Main application file
└── README.md
```

---

## 🎯 How to Use

1. **Shorten a link**:
   - Enter the long URL
   - (Optional) Set a custom short link
   - Choose the link type (Direct / Indirect)
   - Click the "Shorten" button

2. **Use the short link**:
   - Copy and share the short URL
   - Users will be redirected to the destination when they click it

---

## 🌟 Roadmap

- [ ] Link management dashboard
- [ ] Click & visit statistics
- [ ] User authentication system
- [ ] Public API for developers
- [ ] QR Code support
- [ ] Dark Mode
- [ ] Full English UI version

---

## 🤝 Contributing

Contributions are very welcome!

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 👨‍💻 Developer

<div align="center">

**Saleh Sarlak**  
Web Designer & WordPress Developer | Founder of [Tarhfam](https://tarhfam.ir)

[![GitHub](https://img.shields.io/badge/GitHub-salehsarlak-181717?style=for-the-badge&logo=github)](https://github.com/salehsarlak)
[![Instagram](https://img.shields.io/badge/Instagram-ixxsaleh-E4405F?style=for-the-badge&logo=instagram)](https://instagram.com/ixxsaleh)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-salehsarlak-0A66C2?style=for-the-badge&logo=linkedin)](https://www.linkedin.com/in/salehsarlak)
[![Website](https://img.shields.io/badge/Website-tarhfam.ir-4A50F5?style=for-the-badge)](https://tarhfam.ir)

</div>

---

## 📄 License

This project is licensed under the MIT License. See the `LICENSE` file for more details.

---

<div align="center">

### ⭐ If you like this project, give it a star!

<img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&size=18&duration=3000&pause=1000&color=808BA1&center=true&vCenter=true&width=500&lines=Made+with+%E2%9D%A4%EF%B8%8F+by+Saleh+Sarlak;Thank+you+for+visiting!" alt="Footer" />

<br/>

**Fetchlink** — Shorten your long links! 🚀

</div>
