<?php
/**
 * GLPI Ticket Template Mass-Styler (Universal Version)
 * Targets all templates regardless of language code.
 */

// 1. DATABASE CREDENTIALS - Amend the password here
$dbuser = 'glpi';
$dbpass = '6bo1Jxj0KLKRpMG1kHqY1ubGcANa8i5'; // Wrap the ENTIRE password in single quotes
$dbname = 'glpi';

// 2. ESTABLISH CONNECTION
$db = new mysqli('127.0.0.1', $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error . "\n");
}

// 3. LOAD YOUR ASSETS
$style_file = 'glpi_styles.css';
$html_file = 'glpi_template.html';

if (!file_exists($style_file) || !file_exists($html_file)) {
    die("Error: Missing $style_file or $html_file in this directory.\n");
}

$template_content = file_get_contents($html_file);

// 4. PREPARE THE WRAPPER
$parts = explode('##ticket.content##', $template_content);
if (count($parts) < 2) {
    die("Error: Could not find ##ticket.content## in your HTML file.\n");
}
$header = $parts[0];
$footer = $parts[1];

// 5. FETCH ALL TEMPLATES (REMOVED LANGUAGE FILTER)
$query = "SELECT id, content_html FROM glpi_notificationtemplatetranslations";
$result = $db->query($query);

$updated_count = 0;
$skipped_count = 0;

while ($row = $result->fetch_assoc()) {
    // Check for our marker to avoid double-styling
    if (strpos($row['content_html'], 'START_CUSTOM_WRAPPER') === false) {
        $new_html = $header . $row['content_html'] . $footer;
        $stmt = $db->prepare("UPDATE glpi_notificationtemplatetranslations SET content_html = ? WHERE id = ?");
        $stmt->bind_param("si", $new_html, $row['id']);
        if ($stmt->execute()) {
            $updated_count++;
        }
    } else {
        $skipped_count++;
    }
}

echo "FINISHED.\n";
echo "Templates Updated: $updated_count\n";
echo "Templates Skipped (Already Styled): $skipped_count\n";

$db->close();
?>