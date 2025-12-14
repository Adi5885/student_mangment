<?php
// backend/router.php
// Handle specific API routes

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/students') {
    require __DIR__ . '/students.php';
    exit;
}

// Serve static files if they exist, otherwise 404
if (file_exists(__DIR__ . $uri)) {
    return false;
}

http_response_code(404);
echo json_encode(['error' => 'Not Found']);
?>
