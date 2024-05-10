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
$current_page = 'News'; // Get the current page name
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
    <title>News</title>
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
    
            <!-- <div class="inline-flex items-center ml-5 space-x-6 lg:justify-end">
                <a href="#" class="text-base font-medium leading-6 text-gray-600 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-900">
                    Sign in
                </a>
                <a href="#" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                    Sign up
                </a>
            </div> -->
        </div>
    </section>

    <section class="py-20 bg-orange-100">
        <div class="box-border max-w-6xl px-4 pb-12 mx-auto border-solid sm:px-6 md:px-6 lg:px-4">
            <div class="flex flex-col leading-7 text-gray-900">
                <h2 class="box-border m-0 text-3xl font-semibold leading-tight tracking-tight text-black border-solid sm:text-4xl md:text-5xl">
                    Lastest News
                </h2>
                <p class="box-border mt-4 text-2xl leading-normal text-gray-900 border-solid">
                    Empower Your Journey, One Plan at a Time.
                </p>
            </div>

            <div class="mt-10">
                <h2 class="mb-2 text-lg font-semibold text-gray-900">Events & Challenges:</h2>
                <ul class="space-y-1 text-gray-600 list-disc list-inside dark:text-gray-400">
                    <li>
                        Community Runs: Announcing participation or organization of marathon or shorter-distance runs.
                    </li>
                    <li>
                        Monthly Fitness Challenges: E.g., "30-day Abs Challenge" or "Summer Slimdown Challenge."
                    </li>
                    <li>
                        Charity Events: Maybe a workout fundraiser for a good cause.
                    </li>
                </ul>
            </div>

            <div class="mt-10">
                <h2 class="mb-2 text-lg font-semibold text-gray-900">Spotlights:</h2>
                <ul class="space-y-1 text-gray-600 list-disc list-inside dark:text-gray-400">
                    <li>
                        Member of the Month: Karan Khana -- Completed 20k steps everyday
                    </li>
                    <li>
                        Trainer Profile: Meet Sophia Bennett, our functional training maestro with a passion for nutrition.
                    </li>
                    <li>
                        Success Stories: Dive into the joint fitness journey of siblings Maya & Jake, from gym routines to marathon finishes
                    </li>
                </ul>
            </div>

            <div class="mt-10">
                <h2 class="mb-2 text-lg font-semibold text-gray-900">Deals:</h2>
                <ul class="space-y-1 text-gray-600 list-disc list-inside dark:text-gray-400">
                    <li>
                        Early Bird Bonus: First 50 sign-ups receive a complimentary personal training session.
                    </li>
                    <li>
                        Refer & Reap: Introduce a friend to FlexFit and both enjoy a free month of premium access.
                    </li>
                    <li>
                        Summer Special: Enroll in any group class this season and snag a 20% discount on nutrition counseling sessions.
                    </li>
                </ul>
            </div>
        </div>
    </section>
</body>
</html>