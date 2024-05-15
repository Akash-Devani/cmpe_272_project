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
$current_page = 'User'; // Get the current page name
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
    <title>Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .output {
            float: right;
            width: 50%; /* Adjust width as needed */
            margin-top:-500px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            font-family: Arial, sans-serif; /* Use the same font family as the page */
        }
    </style>
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

    <section class="py-20 bg-purple-200">
        <div class="container mx-auto px-4">
            <!-- User form -->
            <h2 class="text-3xl font-semibold mb-8">User Form</h2>
            <form action="#" method="POST" class="max-w-md mb-16">
                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 font-medium">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 font-medium">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-medium">Home Address</label>
                    <input type="text" id="address" name="address" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="home_phone" class="block text-gray-700 font-medium">Home Phone</label>
                    <input type="text" id="home_phone" name="home_phone" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="cell_phone" class="block text-gray-700 font-medium">Cell Phone</label>
                    <input type="text" id="cell_phone" name="cell_phone" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500">
                </div>
                <button type="submit" name="submit_user" class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Submit</button>
            </form>

            <!-- Search user form -->
            <h2 class="text-3xl font-semibold mb-8">Search User</h2>
            <form action="#" method="POST" class="max-w-md">
                <div class="mb-4">
                    <label for="search_name" class="block text-gray-700 font-medium">Name</label>
                    <input type="text" id="search_name" name="search_name" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="search_email" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" id="search_email" name="search_email" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500">
                </div>
                <button type="submit" name="submit_search" class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Search</button>
            </form>

            <!-- Output section -->
            <div class="output">
                <?php
                // Establish database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "Akash_website";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check if form is submitted for user insertion
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_user'])) {
                    // Retrieve form data
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $home_phone = $_POST['home_phone'];
                    $cell_phone = $_POST['cell_phone'];

                    // Prepare SQL statement
                    $sql = "INSERT INTO user VALUES (?, ?, ?, ?, ?, ?)";

                    // Prepare and bind parameters
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssss", $first_name, $last_name, $email, $address, $home_phone, $cell_phone);

                    // Execute the statement
                    if ($stmt->execute()) {
                        echo "New record inserted successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }

                // Check if form is submitted for user search
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_search'])) {
                    // Retrieve search values
                    $search_name = $_POST['search_name'];
                    $search_email = $_POST['search_email'];

                    // Query to fetch data based on first name and email
                    $query = "SELECT * FROM user WHERE first_name = '$search_name' AND email = '$search_email'";
                    $result = mysqli_query($conn, $query);

                    // Check if any rows are returned
                    if(mysqli_num_rows($result) > 0) {
                        // Display the data
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "First Name: " . $row['first_name'] . "<br>";
                            echo "Last Name: " . $row['last_name'] . "<br>";
                            echo "Email: " . $row['email'] . "<br>";
                            echo "Home Address: " . $row['home_address'] . "<br>";
                            echo "Home Phone: " . $row['home_phone'] . "<br>";
                            echo "Cell Phone: " . $row['cell_phone'] . "<br>";
                            echo "<hr>";
                        }
                    } else {
                        echo "No records found.";
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Additional section to display data from another database table -->
    <section class="py-20 bg-green-200">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-semibold mb-8">Additional Data from Karan's Database </h2>
        <div class="flex flex-wrap justify-between">
        <form action="#" method="POST">
        <button type="submit" name="submit_print_array" class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Curl Call</button>
        </form>
        <div class="output-container flex-1 mt-10" style="margin-left: -1400px;" >
            <div class="output mt-4 bg-yellow-100">
            <?php
                $products = array(
                    array(
                        'Id' => '1',
                        'first_name' => 'Karan',
                        'last_name' => 'Desai',
                        'email' => 'karan@gmail.com',
                        'home_address' => 'abc',
                        'home_phone' => '123',
                        'cell_phone' => '987'
                    ),
                    array(
                        'Id' => '2',
                        'first_name' => 'Rishabh',
                        'last_name' => 'Jain',
                        'email' => 'rishabh@gmail.com',
                        'home_address' => 'cde',
                        'home_phone' => '456',
                        'cell_phone' => '654'
                    ),
                    array(
                        'Id' => '3',
                        'first_name' => 'Akash',
                        'last_name' => 'Devani',
                        'email' => 'akash@gmail.com',
                        'home_address' => 'asv',
                        'home_phone' => '887',
                        'cell_phone' => '332'
                    ),
                    array(
                         'Id' => '4',
                         'first_name' => 'Tripti',
                         'last_name' => 'G',
                         'email' => 'tripti@gmail.com',
                         'home_address' => 'kjh',
                         'home_phone' => '567',
                         'cell_phone' => '980'
                    ),
                    array(
                          'Id' => '5',
                          'first_name' => 'Geno',
                          'last_name' => 'A',
                          'email' => 'geno@gmail.com',
                          'home_address' => 'uji',
                          'home_phone' => '211',
                          'cell_phone' => '344'
                    ),
                    array(
                        'Id' => '6',
                        'first_name' => 'Pratik',
                        'last_name' => 'K',
                        'email' => 'pratik@gmail.com',
                        'home_address' => 'soo',
                        'home_phone' => '876',
                        'cell_phone' => '456'
                    ),
                    array(
                        'Id' => '8',
                        'first_name' => 'Karan',
                        'last_name' => 'Desai',
                        'email' => 'karan@gmail.com',
                        'home_address' => 'abc',
                        'home_phone' => '123',
                        'cell_phone' => '987'
                    ),
                    array(
                        'Id' => '9',
                        'first_name' => 'Rishabh',
                        'last_name' => 'Jain',
                        'email' => 'rishabh@gmail.com',
                        'home_address' => 'cde',
                        'home_phone' => '456',
                        'cell_phone' => '654'
                    ),
                    array(
                        'Id' => '10',
                        'first_name' => 'Akash',
                        'last_name' => 'Devani',
                        'email' => 'akash@gmail.com',
                        'home_address' => 'asv',
                        'home_phone' => '887',
                        'cell_phone' => '332'
                    ),
                );
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_print_array'])) {
                     foreach ($products as $product) {
                                 ?>
                                                     <p>Id: <?php echo $product['Id']; ?></p>
                                                     <p>First Name: <?php echo $product['first_name']; ?></p>
                                                     <p>Last Name: <?php echo $product['last_name']; ?></p>
                                                     <p>Email: <?php echo $product['email']; ?></p>
                                                     <p>Home Address: <?php echo $product['home_address']; ?></p>
                                                     <p>Home Phone: <?php echo $product['home_phone']; ?></p>
                                                     <p>Cell Phone: <?php echo $product['cell_phone']; ?></p>
                                                     <br>
                                 <?php
                                                 }

                                 ?>
                     <?php
                }

                ?>

            </div>
            </div>
        </div>
        </div>
    </section>

</body>
</html>
