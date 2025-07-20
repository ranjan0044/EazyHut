<?php
// includes/functions.php
// Common utility functions for Eazy Hut

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function get_featured_listings($conn, $limit = 3) {
    $sql = "SELECT l.*, GROUP_CONCAT(DISTINCT i.url) AS images
            FROM listings l
            LEFT JOIN images i ON l.id = i.listing_id
            WHERE l.status = 'approved'
            GROUP BY l.id
            ORDER BY l.id ASC
            LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $listings = [];
    while ($row = $result->fetch_assoc()) {
        // Fetch amenities for each listing
        $row['amenities'] = [];
        $a_sql = "SELECT a.name, a.icon FROM amenities a
                  JOIN listing_amenities la ON la.amenity_id = a.id
                  WHERE la.listing_id = ?";
        $a_stmt = $conn->prepare($a_sql);
        $a_stmt->bind_param('i', $row['id']);
        $a_stmt->execute();
        $a_result = $a_stmt->get_result();
        while ($a = $a_result->fetch_assoc()) {
            $row['amenities'][] = $a;
        }
        $listings[] = $row;
    }
    return $listings;
}

function get_amenities($conn) {
    $result = $conn->query("SELECT * FROM amenities");
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

// Add more utility functions below as needed 