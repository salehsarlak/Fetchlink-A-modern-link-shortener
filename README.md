<div align="center">

<!-- Animated Header -->
<img src="https://readme-typing-svg.herokuapp.com?font=Space+Mono&weight=700&size=40&duration=3000&pause=1000&color=4A50F5&center=true&vCenter=true&width=600&height=80&lines=Fetchlink;Modern+URL+Shortener;کوتاه+کننده+حرفه‌ای+لینک" alt="Typing SVG" />

<br/>

<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
<img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
<img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5" />
<img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3" />
<img src="https://img.shields.io/badge/RTL-Supported-4A50F5?style=for-the-badge" alt="RTL" />

<br/>

**یک کوتاه‌کننده لینک مدرن، زیبا و کاربرپسند با پشتیبانی کامل از زبان فارسی**

[![GitHub stars](https://img.shields.io/github/stars/salehsarlak/Fetchlink-A-modern-link-shortener?style=social)](https://github.com/salehsarlak/Fetchlink-A-modern-link-shortener/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/salehsarlak/Fetchlink-A-modern-link-shortener?style=social)](https://github.com/salehsarlak/Fetchlink-A-modern-link-shortener/network/members)
[![GitHub issues](https://img.shields.io/github/issues/salehsarlak/Fetchlink-A-modern-link-shortener)](https://github.com/salehsarlak/Fetchlink-A-modern-link-shortener/issues)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

</div>

---

## ✨ معرفی پروژه

**Fetchlink** یک کوتاه‌کننده لینک حرفه‌ای و مدرن است که به شما امکان می‌دهد لینک‌های طولانی را در چند ثانیه به لینک‌های کوتاه، زیبا و قابل اشتراک‌گذاری تبدیل کنید.

طراحی شده با تمرکز روی **تجربه کاربری عالی**، **رابط کاربری فارسی (RTL)** و **عملکرد سریع**.

<div align="center">
  <img src="https://user-images.githubusercontent.com/74038190/212284158-e840e285-664b-44d7-b79b-e264b5e54825.gif" width="400" />
</div>

---

## 🚀 ویژگی‌های کلیدی

<table>
<tr>
<td width="50%">

### 🔗 کوتاه‌سازی هوشمند
- تبدیل لینک‌های بلند به کوتاه در یک لحظه
- پشتیبانی از لینک‌های سفارشی
- ذخیره امن در پایگاه داده MySQL

</td>
<td width="50%">

### 🎯 دو نوع لینک
- **لینک مستقیم (Direct)**: ریدایرکت فوری
- **لینک غیرمستقیم (Indirect)**: صفحه واسط با تبلیغات

</td>
</tr>
<tr>
<td width="50%">

### 🎨 رابط کاربری مدرن
- طراحی تمیز و مینیمال
- پشتیبانی کامل از **RTL** و فونت‌های فارسی
- انیمیشن‌ها و افکت‌های نرم

</td>
<td width="50%">

### 🛡️ امن و سبک
- استفاده از Prepared Statements
- بدون وابستگی سنگین
- سرعت بالا و مصرف منابع کم

</td>
</tr>
</table>

---

## 📸 پیش‌نمایش

<div align="center">

| صفحه اصلی | صفحه ریدایرکت |
|:---------:|:-------------:|
| ![Home](https://via.placeholder.com/400x250/4A50F5/FFFFFF?text=Home+Page) | ![Redirect](https://via.placeholder.com/400x250/172343/FFFFFF?text=Redirect+Page) |

> *به زودی اسکرین‌شات‌های واقعی اضافه می‌شود*

</div>

---

## 🛠️ تکنولوژی‌های استفاده شده

<div align="center">

| تکنولوژی | توضیح |
|:--------:|:-----:|
| **PHP** | منطق سمت سرور و مدیریت لینک‌ها |
| **MySQL** | ذخیره‌سازی لینک‌ها |
| **HTML5 + CSS3** | رابط کاربری مدرن و واکنش‌گرا |
| **Vazirmatn + Space Mono** | فونت‌های زیبای فارسی و انگلیسی |

</div>

---

## 📦 نصب و راه‌اندازی

### پیش‌نیازها
- PHP 7.4 یا بالاتر
- MySQL / MariaDB
- وب‌سرور (Apache / Nginx / XAMPP / Laragon)

### مراحل نصب

```bash
# ۱. کلون کردن مخزن
git clone https://github.com/salehsarlak/Fetchlink-A-modern-link-shortener.git

# ۲. ورود به پوشه پروژه
cd Fetchlink-A-modern-link-shortener

# ۳. تنظیم پایگاه داده
# فایل config/db.php را ویرایش کنید:
```

```php
$servername = "localhost";
$username   = "root";
$password   = "your_password";
$dbname     = "link";
```

```sql
-- ۴. ایجاد جدول در دیتابیس
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
# ۵. اجرای پروژه
# پروژه را روی localhost قرار دهید (مثلاً با XAMPP)
# سپس به آدرس زیر بروید:
http://localhost/Fetchlink-A-modern-link-shortener
```

---

## 📂 ساختار پروژه

```
Fetchlink-A-modern-link-shortener/
├── assets/
│   └── imagees/
│       ├── ads/          # گیف‌های تبلیغاتی صفحه ریدایرکت
│       ├── back.webp
│       └── prof.png
├── config/
│   └── db.php            # تنظیمات اتصال به دیتابیس
├── css/
│   ├── reset.css
│   └── style.css         # استایل‌های اصلی
├── index.php             # فایل اصلی برنامه
└── README.md
```

---

## 🎯 نحوه استفاده

1. **کوتاه کردن لینک**:
   - لینک طولانی را وارد کنید
   - (اختیاری) لینک سفارشی خود را تنظیم کنید
   - نوع لینک را انتخاب کنید (مستقیم / غیرمستقیم)
   - روی دکمه «کوتاه کن» کلیک کنید

2. **استفاده از لینک کوتاه**:
   - لینک کوتاه را کپی و به اشتراک بگذارید
   - کاربران با کلیک روی آن به مقصد هدایت می‌شوند

---

## 🌟 ویژگی‌های آینده (Roadmap)

- [ ] داشبورد مدیریت لینک‌ها
- [ ] آمار کلیک و بازدید
- [ ] سیستم احراز هویت کاربران
- [ ] API برای توسعه‌دهندگان
- [ ] پشتیبانی از QR Code
- [ ] تم تاریک (Dark Mode)
- [ ] نسخه انگلیسی کامل

---

## 🤝 مشارکت

مشارکت‌ها بسیار خوش‌آمد هستند!

1. Fork کنید
2. برنچ جدید بسازید (`git checkout -b feature/AmazingFeature`)
3. تغییرات را commit کنید (`git commit -m 'Add some AmazingFeature'`)
4. Push کنید (`git push origin feature/AmazingFeature`)
5. یک Pull Request باز کنید

---

## 👨‍💻 توسعه‌دهنده

<div align="center">

**Saleh Sarlak**  
Web Designer & WordPress Developer | Founder of [Tarhfam](https://tarhfam.ir)

[![GitHub](https://img.shields.io/badge/GitHub-salehsarlak-181717?style=for-the-badge&logo=github)](https://github.com/salehsarlak)
[![Instagram](https://img.shields.io/badge/Instagram-ixxsaleh-E4405F?style=for-the-badge&logo=instagram)](https://instagram.com/ixxsaleh)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-salehsarlak-0A66C2?style=for-the-badge&logo=linkedin)](https://www.linkedin.com/in/salehsarlak)
[![Website](https://img.shields.io/badge/Website-tarhfam.ir-4A50F5?style=for-the-badge)](https://tarhfam.ir)

</div>

---

## 📄 لایسنس

این پروژه تحت لایسنس MIT منتشر شده است. برای جزئیات بیشتر فایل `LICENSE` را ببینید.

---

<div align="center">

### ⭐ اگر این پروژه را دوست داشتید، ستاره بدهید!

<img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&size=18&duration=3000&pause=1000&color=808BA1&center=true&vCenter=true&width=500&lines=Made+with+%E2%9D%A4%EF%B8%8F+by+Saleh+Sarlak;Thank+you+for+visiting!" alt="Footer" />

<br/>

**Fetchlink** — لینک‌های بلند رو کوتاه کن! 🚀

</div>
