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
$current_page = 'Contact'; // Get the current page name
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
    <title>Contact</title>
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
                    <a href="./contact.php" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Contact</a>
                    <a href="./user.php" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">User</a>
                    <a href="./track.php" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Visited</a>
                </nav>
            </div>
        </div>
    </section>

    <?php ?>

    <section class="bg-pink-100">
        <div class="box-border max-w-6xl px-4 pb-12 mx-auto border-solid sm:px-6 md:px-6 lg:px-4">
            <div class="flex flex-col leading-7 text-gray-900">
                <h2 class="box-border m-0 text-3xl font-semibold leading-tight tracking-tight text-black border-solid sm:text-4xl md:text-5xl">
                    Connect with us
                </h2>
                <p class="box-border mt-4 text-2xl leading-normal text-gray-500 border-solid">
                    Our reps are at your service
                </p>
            </div>

            <?php 
            
            $file_path = 'contacts.txt'; // Path to your contacts file

            if (file_exists($file_path)) {
                $lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
                foreach ($lines as $line) {
                    list($name, $email, $phone) = explode(', ', $line);
                    echo "<li><strong>Name:</strong> $name, <strong>Email:</strong> $email, <strong>Phone:</strong> $phone</li>";
                }
            } else {
                echo "<li>Contacts file not found!</li>";
            }
            ?>
        </div>
    </section>
</body>
</html>