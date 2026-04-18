<!-- 
    @author margarita
    @author jasmine
    @author Marione-G
-->
<?php
    $xml = new DOMDocument();
    $xml->load("../xml/course.xml");

    $x = $xml->getElementsByTagName("Courses")->item(0);
    $fr = $x->getElementsByTagName("Course");

    $data = [];

    foreach ($fr as $course) {
        $data[] = [
            "id" => $course->getElementsByTagName("id")->item(0)->nodeValue,
            "type" => $course->getElementsByTagName("Type")->item(0)->nodeValue,
            "title" => $course->getElementsByTagName("Title")->item(0)->nodeValue,
            "description" => $course->getElementsByTagName("Description")->item(0)->nodeValue,
            "price" => $course->getElementsByTagName("Price")->item(0)->nodeValue,
            "level" => $course->getElementsByTagName("Level")->item(0)->nodeValue,
            "duration" => $course->getElementsByTagName("Duration")->item(0)->nodeValue
        ];
    }

    $filtered_data = $data;

    if(!empty($_GET['search'])) {
        $search = strtolower($_GET['search']);
        $filtered_data = array_filter($filtered_data, function($course) use ($search){
            return  
                strpos(strtolower($course['title']), $search) !==false ||
                strpos(strtolower($course['description']), $search) !==false ||
                strpos(strtolower($course['description']), $search) !==false;
        });
    }

    if(!empty($_GET['level'])) {
        $levels = $_GET['level'];
        $filtered_data = array_filter($filtered_data, function ($course) use ($levels) {
            return in_array(strtolower($course['level']), array_map('strtolower',$levels));
        });
    }

    if(!empty($_GET['price'])) {
        $price = strtolower($_GET['price']);
        $filtered_data = array_filter($filtered_data, function($course) use ($price){
            return strtolower($course['price']) === $price;
        });
    }
    
    if(!empty($_GET['type'])) {
        $types = $_GET['type'];
        $filtered_data = array_filter($filtered_data, function($course) use ($types) {
            return in_array(strtolower($course['type']), array_map('strtolower', (array)$types));
        });
    }
    if(!empty($_GET['duration'])) {
        $dur_key = strtolower($_GET['duration']);
        $filtered_data = array_filter($filtered_data, function($course) use ($dur_key){
            $dur_str = strtolower($course['duration']);
            $hours = 0;
            if (strpos($dur_str, 'hour') !== false || strpos ($dur_str, 'h')!== false){
                $hours = (float) preg_replace('/[^0-9.]/', '', $dur_str) ;
            }
            switch($dur_key) {
                case 'less-than-5-hours': return $hours < 5;
                case '5-10-hours': return $hours >=5 && $hours <=10;
                case '10-20-hours': return $hours >10 && $hours <=20;
                case '20-60-hours': return $hours >20 && $hours <=60;
                case '60-hours': return $hours > 60;
            }
            return true;
        });
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Babel | Explore Courses</title>

    <!-- Links external stylesheets to the PHP file-->
    <link rel="stylesheet" href="../css/explore-courses.css">
    <link rel="stylesheet" href="../css/constant-variables.css">
    <link rel="stylesheet" href="../css/element-configuration.css">
    <link rel="stylesheet" href="../css/reusable-components.css">

    <!-- Fetches external fonts from Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&amp;family=Sora:wght@100..800&amp;display=swap">

    <!-- Embeds Font Awesome library to the HTML file -->
    <script src="https://kit.fontawesome.com/b177f37ca1.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <a class="babel-logo" href="landing-page.php">
            <img src="../images/babel-logo.png">
        </a>
        <nav class="main-navigation">
            <ul>
                <a href="landing-page.php"><li>Home</li></a>
                <a href="explore-courses.php"><li>Explore</li></a>
            </ul>
        </nav>
        <button class="gradient-button" onclick="openModal()">Add Course</button>

        <div id="modal" class="modal">
            <div class="modal-content">
                <h3 id="modalTitle">Add Course</h3>

                <form id="courseForm">
                    <div class="course-field">
                        <label for="id">Course ID</label>
                        <input type="text" name="id" id="id" required><br>
                    </div>

                    <div class="course-field">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" required><br>
                    </div>
                    <div class="course-field">
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" required><br>
                    </div>
                    <div class="course-field">
                        <label for="level">Level</label>
                        <input type="text" name="level" id="level" required><br>
                    </div>
                    <div class="course-field">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" required><br>
                    </div>
                    <div class="course-field">
                        <label for="duration">Duration</label>
                        <input type="text" name="duration" id="duration" required><br>
                    </div>
                    <div class="course-field">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"></textarea><br>
                    </div>
                    <div class="course-form-buttons">
                        <button type="button" class="bright-blue-button" onclick="closeModal()">Close</button>
                        <button type="submit" class="bright-blue-button">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <main>
        <form method="get" action="explore-courses.php" style="display: contents;">
        <section class="search-filter">
            <h4>Filters</h4>
            <div class="filter-div">
                <h5>Level</h5>
                <div class="checkbox-container">
                    <input type="checkbox" name="level[]" value="Beginner" id="beginner" 
                    <?php echo (isset($_GET['level']) && in_array('Beginner', $_GET['level'])) ? 'checked' : ''; ?>>
                    <label for="beginner">
                        Beginner
                    </label>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" name="level[]" value="Intermediate" id="intermediate"
                    <?php echo (isset($_GET['level']) && in_array('Intermediate', $_GET['level'])) ? 'checked' : ''; ?>>
                    <label for="intermediate">
                        Intermediate
                    </label>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" name="level[]" value="Advanced" id="advanced"
                    <?php echo (isset($_GET['level']) && in_array('Advanced', $_GET['level'])) ? 'checked' : ''; ?>>
                    <label for="advanced">
                        Advanced
                    </label>
                </div>
            </div>

            <div class="filter-div">
                <h5>Price</h5>
                <div class="checkbox-container">
                    <input type="checkbox" name="price" value="Free" id="free"
                     <?php echo (isset($_GET['price']) && $_GET['price']=='Free') ? 'checked' : ''; ?>>
                    <label for="free">
                        Free
                    </label>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" name="price"value="Paid" id="paid"
                     <?php echo (isset($_GET['price']) && $_GET['price']=='Paid') ? 'checked' : ''; ?>>
                    <label for="paid">
                        Paid
                    </label>
                </div>
            </div>

            <div class="filter-div">
                <h5>Type</h5>
                <div class="checkbox-container">
                    <input type="checkbox" name="type[]" value="Career Path" id="career-path"
                     <?php echo (isset($_GET['type']) && in_array('Career Path', $_GET['type'])) ? 'checked' : ''; ?>>
                    <label for="career-path">
                        Career Path
                    </label>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" name="type[]" value="Skill Path" id="skill-path"
                     <?php echo (isset($_GET['type']) && in_array('Skill Path', $_GET['type'])) ? 'checked' : ''; ?>>
                    <label for="skill-path">
                        Skill Path
                    </label>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" name="type[]" value="Certification Path" id="certification-path"
                     <?php echo (isset($_GET['type']) && in_array('Certification Path', $_GET['type'])) ? 'checked' : ''; ?>>
                    <label for="certification-path">
                        Certification Path
                    </label>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" name="type[]" value="Course" id="course"
                     <?php echo (isset($_GET['type']) && in_array('Course', $_GET['type'])) ? 'checked' : ''; ?>>
                    <label for="course">
                        Course
                    </label>
                </div>
            </div>

            <div class="filter-div">
                <h5>Average time to complete</h5>
                <div class="checkbox-container">
                    <input type="checkbox" name="duration" value="less-than-5-hours" id="less-than-5-hours"
                    <?php echo (isset($_GET['duration']) && $_GET['duration']=='less-than-5-hours') ? 'checked' : ''; ?>>
                    <label for="less-than-5-hours">
                        Less than 5 hours
                    </label>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox"name="duration" value="5-10-hours" id="5-10-hours"
                    <?php echo (isset($_GET['duration']) && $_GET['duration']=='5-10 hours') ? 'checked' : ''; ?>>
                    <label for="5-10-hours">
                        5-10 hours
                    </label>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" name="duration" value="10-20-hours" id="10-20-hours"
                    <?php echo (isset($_GET['duration']) && $_GET['duration']=='10-20 hours') ? 'checked' : ''; ?>>
                    <label for="10-20-hours">
                        10-20 hours
                    </label>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" name="duration" value="20-60-hours" id="20-60-hours"
                    <?php echo (isset($_GET['duration']) && $_GET['duration']=='20-60 hours') ? 'checked' : ''; ?>>
                    <label for="20-60-hours">
                        20-60 hours
                    </label>
                </div>
                <div class="checkbox-container">
                    <input type="checkbox" name="duration" value="60-hours" id="60-hours"
                    <?php echo (isset($_GET['duration']) && $_GET['duration']=='60-hours') ? 'checked' : ''; ?>>
                    <label for="60-hours">
                        60+ hours
                    </label>
                </div>
            </div>

            <div class="filter-div">
                <button type="submit" class="bright-blue-button">Apply filters</button>
            </div>
    </section>

    <section class="main-content">
            <div class="search-bar">
                <input type="text" name="search" id="search-field" placeholder="Enter a keyword" 
                value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                <button type="submit" class="bright-blue-button">
                    Find Course
                </button>
            </div>

            <div class="card-container">
                <?php if (empty($filtered_data)): ?>
                    <p>No courses match the filters. 
                        <a href="explore-courses.php">
                            <br>
                            Clear and try again</a></p>
                <?php else: ?>
                <?php foreach ($filtered_data as $course): ?>
                <div class="course-card">
                    <div class="course-text">
                        <p class="subtext"><?= $course["type"] ?></p>
                        <h4><?= $course["title"] ?></h4>
                        <p><?= $course["description"] ?></p>
                    </div>
                    <div class="course-info">
                        <a class="outlined-badge"><?= $course["price"] ?></a>
                        <a class="outlined-badge"><?= $course["level"] ?></a>
                        <a class="outlined-badge"><?= $course["duration"] ?></a>
                    </div>
                    <div class="course-info">
                        <span class="text-button"
                            onclick="editCourse('<?= $course['id'] ?>')">
                            Update
                        </span>
                        <span class="text-button danger"
                            onclick="deleteItem('<?= $course["id"] ?>')">
                            Delete
                        </span>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
        </form>
    </main>

    <footer>
        <div class="footer-contents">
            <div class="top-footer">
                <div class="left-footer">
                    <a class="babel-logo" href="landing-page.php">
                        <img src="../images/babel-logo.png" width="119px">
                    </a>
                    <p>Where All Programming Languages Meet<br>Babel Learning Platform</p>
                </div>
                <nav class="main-navigation">
                    <ul>
                        <a href="landing-page.php"><li>Home</li></a>
                        <a href="explore-courses.php"><li>Explore</li></a>
                    </ul>
                </nav>
            </div>
            <div class="bottom-footer">
                <p>Copyright © 2026 Babel.<br>All Rights Reserved</p>
                <nav class="main-navigation">
                    <ul>
                        <a><li>Privacy Policy</li></a>
                        <a><li>Terms & Conditions</li></a>
                    </ul>
                </nav>

                <nav class="social-media">
                    <ul>
                        <a><i class="fa-brands fa-facebook"></i></a>
                        <a><i class="fa-brands fa-instagram"></i></a>
                        <a><i class="fa-brands fa-x-twitter"></i></a>
                        <a><i class="fa-brands fa-linkedin"></i></a>
                    </ul>
                </nav>
            </div>

            <img class="gradient-footer" src="../images/gradient-footer.png">
        </div>
    </footer>

    <script src="../js/explore-courses.js"></script>
</body>
</html>
