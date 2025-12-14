@echo off
echo Setting up Maniora Simple Database...
echo Please ensure XAMPP/MySQL is running.

mysql -u root -e "DROP DATABASE IF EXISTS student_db; CREATE DATABASE student_db;"
if %errorlevel% neq 0 (
    echo Error connecting to MySQL. Is XAMPP running?
    pause
    exit /b
)

mysql -u root student_db < database/students.sql
if %errorlevel% neq 0 (
    echo Error importing database/students.sql
    pause
    exit /b
)

echo Database Setup Complete!
pause
