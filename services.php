<?php

if (!isset($_COOKIE['visited_pages'])) {
    // Step 2: If the cookie is not set, create an empty array
    $visited_pages = [];
} else {
    // Step 3: If the cookie is set, unserialize its value to an array
    $visited_pages = unserialize($_COOKIE['visited_pages']);
}

// Step 4: Append the current page name to the array
$current_page = 'Services'; // Get the current page name
if (!in_array($current_page, $visited_pages)) {
    // Add the current page name only if it's not already in the array
    $visited_pages[] = $current_page;
}

// Step 5: Serialize the array and set it as a cookie named 'visited_pages' with a one-hour expiration time
setcookie('visited_pages', serialize($visited_pages), time() + 3600, '/');

// Check if the cookie for previously visited products exists
if(isset($_COOKIE['visited_products'])) {
    $visited_products = json_decode($_COOKIE['visited_products'], true);
} else {
    $visited_products = array();
}

// Function to add a product to visited products list
function addVisitedProduct($product) {
    global $visited_products;
    // Check if the product is already in the visited list
    $index = array_search($product['name'], array_column($visited_products, 'name'));
    if($index === false) {
        // Add the product to the beginning of the array
        array_unshift($visited_products, $product);
        // Keep only the last five visited products
        $visited_products = array_slice($visited_products, 0, 5);
        // Save the updated list in a cookie
        setcookie('visited_products', json_encode($visited_products), time() + (86400 * 30), "/"); // 30 days
    }
}

// Dummy product data (you can replace it with your own product data)
$products = array(
    array(
        'name' => 'Burger',
        'description' => 'its a symphony of flavors dancing on the palate',
        'image' => 'burger.jpg',
        'review' => 'very nice'
    ),
    array(
        'name' => 'Veg Burger',
        'description' => 'a tale of tradition, culture, and creativity',
        'image' => 'burger2.jpg',
        'review' => 'good'
    ),
    array(
        'name' => 'bowl',
        'description' => 'each ingredient whispers secrets of nature bounty',
        'image' => 'burger3.jpg',
        'review' => 'very nice'
    ),
    array(
        'name' => 'chines food',
        'description' => 'igniting passion with every bite',
        'image' => 'burger4.jpg',
        'review' => 'amazing'
    ),
    array(
        'name' => 'salad',
        'description' => 'With every taste, memories awaken, transporting us to moments of joy and nostalgia.',
        'image' => 'fruit.jpg',
        'review' => 'well done!'
    ),
    array(
        'name' => 'pomegranate',
        'description' => 'Food nourishes not only the body but also the soul',
        'image' => 'fruit2.jpg',
        'review' => 'looks good'
    ),
    array(
        'name' => 'blueberry',
        'description' => 'food is a delightful adventure ',
        'image' => 'fruit3.jpg',
        'review' => 'must try'
    ),
    array(
        'name' => 'mix fruit',
        'description' => 'every meal is an opportunity to celebrate life abundance and diversity.',
        'image' => 'fruit4.jpg',
        'review' => 'nostalgia'
    ),
    array(
        'name' => 'pizza',
        'description' => 'The art of cooking is a universal language',
        'image' => 'pizza.jpg',
        'review' => 'best selling'
    ),
    array(
        'name' => 'backed pizza',
        'description' => 'culinary masterpieces under skilled hands',
        'image' => 'pizza1.jpg',
        'review' => 'perfect'
    )
);

// Add visited product to the list if a product ID is provided
if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    if(isset($products[$product_id])) {
        addVisitedProduct($products[$product_id]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
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

    <!-- Pricing services -->
    <section class="py-20 bg-purple-200">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold mb-8">Products</h2>
            <div class="grid grid-cols-2 gap-6">
                <?php foreach($products as $key => $product): ?>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="mb-4">
                        <h3 class="text-xl font-semibold mb-2"><?php echo $product['name']; ?></h3>
                        <p class="text-gray-700 mb-4"><?php echo $product['description']; ?></p>
                        <p class="text-gray-500"><?php echo $product['review']; ?></p>
                        <!-- Add a link to track product visit -->
                        <a href="?product_id=<?php echo $key; ?>" class="text-indigo-600 hover:underline">View Product</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Last five previously visited products -->
    <section class="py-20 bg-yellow-100">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold mb-8">Last Five Previously Visited Products</h2>
            <div class="grid grid-cols-2 gap-6">
                <?php foreach($visited_products as $product): ?>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="mb-4">
                        <h3 class="text-xl font-semibold mb-2"><?php echo $product['name']; ?></h3>
                        <p class="text-gray-700 mb-4"><?php echo $product['description']; ?></p>
                        <p class="text-gray-500"><?php echo $product['review']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-20 bg-blue-200">
            <div class="container mx-auto">
                <h2 class="text-3xl font-semibold mb-8">Top 5 Products Based on Review</h2>
                <div class="grid grid-cols-2 gap-6">
                    <?php

                    // Display the top 5 products
                    $top_five = array(
                                    array(
                                        'name' => 'Burger',
                                        'description' => 'its a symphony of flavors dancing on the palate',
                                        'image' => 'burger.jpg',
                                        'review' => 'very nice'
                                    ),
                                    array(
                                        'name' => 'bowl',
                                        'description' => 'each ingredient whispers secrets of nature bounty',
                                        'image' => 'burger3.jpg',
                                        'review' => 'very nice'
                                    ),
                                    array(
                                        'name' => 'salad',
                                        'description' => 'With every taste, memories awaken, transporting us to moments of joy and nostalgia.',
                                        'image' => 'fruit.jpg',
                                        'review' => 'well done!'
                                    ),
                                    array(
                                        'name' => 'blueberry',
                                        'description' => 'food is a delightful adventure ',
                                        'image' => 'fruit3.jpg',
                                        'review' => 'must try'
                                    ),
                                    array(
                                        'name' => 'mix fruit',
                                        'description' => 'every meal is an opportunity to celebrate life abundance and diversity.',
                                        'image' => 'fruit4.jpg',
                                        'review' => 'nostalgia'
                                    ),
                                    );
                    foreach($top_five as $product):
                    ?>
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="mb-4">
                            <h3 class="text-xl font-semibold mb-2"><?php echo $product['name']; ?></h3>
                            <p class="text-gray-700 mb-4"><?php echo $product['description']; ?></p>
                            <p class="text-indigo-600"><?php echo $product['review']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
</body>
</html>
