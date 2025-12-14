# Student Management System

## 1. Project Overview
Simple CRUD Student Management System using PHP (Core), MySQL, and Vanilla JavaScript.

## 2. API Endpoints
- **POST** `/students.php` → Add student
- **GET** `/students.php` → Get all students
- **PUT** `/students.php?id={id}` → Update student
- **DELETE** `/students.php?id={id}` → Delete student

## 3. Database Structure
| Field | Type | Description |
| :--- | :--- | :--- |
| `id` | INT | Primary key (Auto Increment) |
| `name` | VARCHAR | Student name |
| `email` | VARCHAR | Student email |
| `course` | VARCHAR | Course name |
| `phone` | VARCHAR | Phone number |

## 4. Setup Instructions

1. **Database**:
   - Create database `student_db`.
   - Import `database/students.sql` to create the table.

2. **Backend**:
   - Ensure `backend/db.php` has correct MySQL credentials (default: root, no password).
   - If using XAMPP, place folder in `htdocs`.
   - If using PHP built-in server, run:
     ```bash
     cd backend
     php -S localhost:8000
     ```

3. **Frontend**:
   - Open `frontend/index.html` in your browser.
   - Note: If using PHP built-in server on `localhost:8000`, ensure `frontend/script.js` points to that URL.

## 5. AI Prompting (Required)
**Prompt 1**: "Create a PHP REST API with CRUD operations using MySQL."
**Prompt 2**: "Fix CORS and fetch API issues when connecting PHP backend with JavaScript frontend."

**How AI Helped**: AI helped generate API structure, debug PHP errors, and improve code organization.
