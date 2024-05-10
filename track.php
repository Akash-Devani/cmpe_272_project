<?php
// Step 1: Check if the cookie 'visited_pages' is already set
if (!isset($_COOKIE['visited_pages'])) {
    // Step 2: If the cookie is not set, create an empty array
    $visited_pages = [];
} else {
    // Step 3: If the cookie is set, unserialize its value to an array
    $visited_pages = unserialize($_COOKIE['visited_pages']);
}

// Step 4: Append the current page name to the array
$current_page = 'Track'; // Get the current page name
if (!in_array($current_page, $visited_pages)) {
    // Add the current page name only if it's not already in the array
    $visited_pages[] = $current_page;
}

// Step 5: Serialize the array and set it as a cookie named 'visited_pages' with a one-hour expiration time
setcookie('visited_pages', serialize($visited_pages), time() + 3600, '/');

// Now you can continue with the rest of your PHP code and HTML content for this page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlexFit Gym & Wellness Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
<!-- Navbar -->
<section class="w-full px-8 text-gray-700 bg-yellow-200">
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <div class="relative flex flex-col md:flex-row">
            <a href="#_" class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span class="mx-auto text-xl font-black leading-none text-gray-900 select-none">FlexiFit<span class="text-indigo-600">.</span></span>
            </a>
            <nav class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                <a href="./index.php" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Home</a>
                <a href="./about.php" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">About</a>
                <a href="./services.php" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Services</a>
                <a href="./news.php" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">News</a>
                <a href="./authenticate.php" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Contact</a>
                <a href="./user.php" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">User</a>
                <a href="./track.php" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Visited</a>
            </nav>
        </div>
    </div>
</section>
<section class="px-2 py-24 bg-green-200 md:px-0">
<?php
// Check if the cookie 'visited_pages' is set
if(isset($_COOKIE['visited_pages'])) {
    // Decode the serialized cookie value into an array
    $visited_pages = unserialize($_COOKIE['visited_pages']);

    // Check if there are any visited pages
    if (!empty($visited_pages)) {
        echo "<h2 class='text-lg font-medium mb-4'>Previously Visited Pages:</h2>";
        echo "<ul class='list-disc ml-8'>";
        // Loop through the visited pages array and display each page name
        foreach($visited_pages as $page) {
            echo "<li>$page</li>";
        }
        echo "</ul>";
    } else {
        // Display a message if no pages have been visited
        echo "<p class='text-gray-600'>No previously visited pages.</p>";
    }
} else {
    // Display a message if the cookie is not set
    echo "<p class='text-gray-600'>No previously visited pages.</p>";
}
?>

</section>

</body>
</html>