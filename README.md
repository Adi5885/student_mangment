Project Overview

This project is a simple Student Management System built as part of the Maniora Internship Technical Assignment.
It demonstrates backend development using PHP and MySQL, frontend integration using HTML, CSS, and JavaScript, and full CRUD (Create, Read, Update, Delete) functionality through a REST API.

The goal of this project is to show clean logic, proper API design, database usage, and effective AI-assisted development.

Tech Stack

Backend: PHP (REST API)

Database: MySQL

Frontend: HTML, CSS, JavaScript (Fetch API)

Server: XAMPP (PHP Built-in Server)

Features

Add new students

View all students

Update student details

Delete students

RESTful API with JSON responses

API Endpoints
Method	Endpoint	Description
POST	/students	Add a new student
GET	/students	Fetch all students
GET	/students/{id}	Fetch a single student
PUT	/students/{id}	Update student details
DELETE	/students/{id}	Delete a student
Database Structure

Table: students

Field	Type	Description
id	INT (PK)	Auto-increment student ID
name	VARCHAR(100)	Student name
email	VARCHAR(100)	Student email
course	VARCHAR(100)	Course name
phone	VARCHAR(15)	Contact number
Setup Instructions
Backend

Install XAMPP

Start MySQL

Import students.sql into MySQL

Run PHP server:

php -S localhost:8000 -t backend

Frontend

Open index.html in browser
OR

Run using any frontend server (e.g., Vite)

AI Usage

AI tools were used to:

Design REST API structure

Debug PHP and JavaScript errors

Improve code readability and documentation

Example AI Prompts Used

“Create a PHP REST API with CRUD operations using MySQL.”

“Fix CORS and Fetch API issues between PHP backend and JavaScript frontend.”

AI helped speed up development, reduce errors, and improve overall code quality.
