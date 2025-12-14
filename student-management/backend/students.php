<?php
// backend/students.php

// Implement CORS as per instructions to "Fix CORS and fetch API issues"
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include "db.php";

$method = $_SERVER['REQUEST_METHOD'];

// Handle Preflight for CORS
if ($method === 'OPTIONS') {
    http_response_code(200);
    exit;
}

switch ($method) {

    // CREATE
    case "POST":
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['name']) || empty($data['email'])) {
            echo json_encode(["error" => "All fields required"]);
            exit;
        }

        $stmt = $conn->prepare(
            "INSERT INTO students (name, email, course, phone) VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "ssss",
            $data['name'],
            $data['email'],
            $data['course'],
            $data['phone']
        );
        
        if($stmt->execute()) {
            echo json_encode(["message" => "Student added"]);
        } else {
            echo json_encode(["error" => "Failed to add student"]);
        }
        break;

    // READ
    case "GET":
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $result = $conn->query("SELECT * FROM students WHERE id=$id");
            echo json_encode($result->fetch_assoc());
        } else {
            $result = $conn->query("SELECT * FROM students ORDER BY id DESC");
            echo json_encode($result->fetch_all(MYSQLI_ASSOC));
        }
        break;

    // UPDATE
    case "PUT":
        if(!isset($_GET['id'])) {
            echo json_encode(["error" => "ID required"]);
            exit;
        }
        $id = intval($_GET['id']);
        $data = json_decode(file_get_contents("php://input"), true);

        $stmt = $conn->prepare(
            "UPDATE students SET name=?, email=?, course=?, phone=? WHERE id=?"
        );
        $stmt->bind_param(
            "ssssi",
            $data['name'],
            $data['email'],
            $data['course'],
            $data['phone'],
            $id
        );
        
        if($stmt->execute()) {
             echo json_encode(["message" => "Student updated"]);
        } else {
             echo json_encode(["error" => "Failed to update"]);
        }
        break;

    // DELETE
    case "DELETE":
        if(!isset($_GET['id'])) {
            echo json_encode(["error" => "ID required"]);
            exit;
        }
        $id = intval($_GET['id']);
        $conn->query("DELETE FROM students WHERE id=$id");
        echo json_encode(["message" => "Student deleted"]);
        break;
}
?>
