<?php

header('Content-Type: application/json');

require_once 'db_FB.inc.php';

try {
    $database = new Database();
    $conn = $database->getConnection();

    // Get the video ID from the JSON request body
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id'])) {
        $video_id = intval($data['id']);

        // Prepare SQL query to delete the video by ID
        $stmt = $conn->prepare("DELETE FROM tbl_videopath WHERE id = ?");
        $stmt->execute([$video_id]);

        if ($stmt->rowCount()) {
            echo json_encode(['success' => true, 'message' => 'Video deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: Video not found or could not be deleted']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    }

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}

$conn = null;


