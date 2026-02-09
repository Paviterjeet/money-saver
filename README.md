# 💰 Savings Tracker App

A simple and intuitive **Savings Tracker App** to help users track their income, expenses, and savings goals efficiently. Built with a clean UI and a secure backend, this app makes personal finance management easy and transparent.

---

## 🚀 Features

* 🔐 **User Authentication** (Login & Register)
* 🔑 Secure password handling using `password_hash()` & `password_verify()`
* 💸 Add, edit, and delete **Income & Expenses**
* 📊 Track total savings in real time
* 📅 Monthly & category-wise expense tracking
* 🧾 Transaction history
* 🖥️ Simple, clean, and responsive UI
* 🔒 Session-based login protection

---

## 🛠️ Tech Stack

### Frontend

* HTML5
* CSS3 / Bootstrap
* JavaScript

### Backend

* PHP (MVC structure)
* MySQL Database

### Security

* PHP Sessions
* Password hashing & verification

---

## 🔐 Authentication Logic

### Password Verification

```php
if (!password_verify($password, $user['password'])) {
    return redirect()->back()->with('error', 'Incorrect password');
}
```

### Session Check (Protected Routes)

```php
if (!session()->get('isLoggedIn')) {
    return redirect()->to('/login');
}
```

---

## 🗄️ Database Structure (Example)

### users table

| Column     | Type     |
| ---------- | -------- |
| id         | INT (PK) |
| name       | VARCHAR  |
| email      | VARCHAR  |
| password   | VARCHAR  |
| created_at | DATETIME |

### transactions table

| Column   | Type                     |
| -------- | ------------------------ |
| id       | INT (PK)                 |
| user_id  | INT                      |
| type     | ENUM('income','expense') |
| amount   | DECIMAL                  |
| category | VARCHAR                  |
| date     | DATE                     |

---

## 📦 Installation

1. Clone the repository

```bash
git clone https://github.com/your-username/savings-tracker.git
```

2. Move project to your server directory (e.g., `htdocs`)

3. Create a database and import the SQL file

4. Update database credentials in config file

5. Run the app in browser

```bash
http://localhost/savings-tracker
```

---

## 📸 Screenshots

*(Add screenshots here)*

---

## 🎯 Future Improvements

* 📈 Graphs & analytics dashboard
* 💳 Bank API integration
* 📱 Mobile app version
* ☁️ Cloud backup
* 🧠 AI-based saving suggestions

---

## 🤝 Contributing

Contributions are welcome! Feel free to fork the repo and submit a pull request.

---

## 📄 License

This project is licensed under the **MIT License**.

---

## 👨‍💻 Author

**UNO Codes**
*Your Business. Our Code.*

---

⭐ If you like this project, don’t forget to star the repository!
