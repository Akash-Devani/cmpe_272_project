
<?php
// Define the path to the contacts file
$file_path = 'contacts.txt';

// Check if the file exists
if (file_exists($file_path)) {
    // Read the file's content into an array; each line is an array element
    $lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Iterate through each line and display the contact
    foreach ($lines as $line) {
        list($name, $email, $phone) = explode(', ', $line);
        
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<hr>"; // To separate each contact
    }
} else {
    echo "Contacts file not found!";
}
?>