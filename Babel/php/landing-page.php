<!-- 
    @author margarita
    @author jasmine
    @author Marione-G
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Babel | Homepage</title>

    <!-- Links external stylesheets to the PHP file-->
    <link rel="stylesheet" href="../css/landing-page.css"/>
    <link rel="stylesheet" href="../css/constant-variables.css"/>
    <link rel="stylesheet" href="../css/reusable-components.css"/>
    <link rel="stylesheet" href="../css/element-configuration.css"/>

    <!-- Fetches external fonts from Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&amp;family=Sora:wght@100..800&amp;display=swap">

    <!-- Embeds Font Awesome library to the HTML file -->
    <script src="https://kit.fontawesome.com/b177f37ca1.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- [A. HEADER] This contains three components: 1) the brand logo, 2) the navigation panel, and 3) a button 
         that directs the user to the webpage where they can manage courses. The contents of this block are arranged 
         using flex layout. 

         Note: Since the header is shared across webpages, its styles are defined in reusable-components.css 
         instead of landing-page.css to reduce boilerplate and make future updates (such as adding more pages)
         easier.
     -->
    <header>
        <!-- [Component A.1] -->
        <a class="babel-logo" href="landing-page.php">
            <img src="../images/babel-logo.png">
        </a>

        <!-- [Component A.2] -->
        <nav class="main-navigation">
            <ul>
                <a href="landing-page.php"><li>Home</li></a>
                <a href="explore-courses.php"><li>Explore</li></a>
            </ul>
        </nav>
        
        <!-- [Component A.3] -->
        <a class="gradient-button" href="explore-courses.php">Manage Courses</a>
    </header>


    <!-- [B. MAIN] This contains seven components: 1) hero section, 2) background gradient, 3) employers, 
         4) top courses, 5) reasons, 6) testimonials, 7) questions. The contents of this block are 
         arranged using flex layout. Further details for each section are described in their
         own documentation. 
         
         Note: Components in this block are styled using landing-page.css,  reusable-components.css, 
         and element-configuration.css. The stylesheets used are defined in the documentation of each 
         section, however, for a complete overview, please consult the table of contents of both 
         stylesheets to see the full list of included components.
    -->
    <main>
        <!-- [Component B.1] The hero section contains five components: 1) outlined badge, 
            2) section title, 3) subtext, 4) buttons contained inside a div, 5) dashboard photo. 
            The contents of this block are arranged using flex layout (column).

            Stylesheet: landing-page.css
         -->
        <section class="hero-section">
            <!-- [Component B.1.1] Stylesheet: reusable-components.css -->
            <p class="outlined-badge" href="">From Leading Institutions Worldwide</p>

            <!-- [Component B.1.2] Stylesheet: element-configuration.css -->
            <h1>Where All Programming<br>Languages Meet</h1>

            <!-- [Component B.1.3] Stylesheet: element-configuration.css -->
            <p>Babel brings together online programming courses from leading universities worldwide,<br>
            so you can learn programming at your own pace, entirely free of charge</p>

            <!-- [Component B.1.4] Stylesheet: landing-page.css -->
            <div class="hero-section-buttons">
                <!-- [Component B.1.4.1] Stylesheet: reusable-components.css -->
                <a class="bright-blue-button" href="explore-courses.php">Enroll Now</a>

                <!-- [Component B.1.4.1] Stylesheet: reusable-components.css -->
                <a class="gradient-button" href="explore-courses.php">Explore Courses</a>
            </div>

            <!-- [Component B.1.5] Stylesheet: landing-page.css -->
            <img class="dashboard" src="../images/dashboard-cropped.png"/>
        </section>


        <!-- [Component B.2] This photo is positioned at the lowest level of the z-index stack 
             and serves as the background image for the hero section.

             Stylesheet: landing-page.css
        -->
        <img class="blue-gradient" src="../images/gradient-cropped.png" alt="Blue gradient background">


        <!-- [Component B.3] The employers section contains two components: 1) section title, 
             2) an unordered list of company logos. The contents of this block are arranged
             using flex layout (row). 
            
             Stylesheet: landing-page.css
        -->
        <section class="employers">
            <!-- [Component B.3.1] Stylesheet: element-configuration.css -->
            <p>More than 700,000 Babel students work in companies such as</p>

            <!-- [Component B.3.2] Stylesheet: landing-page.css -->
            <ul class="employers-list">
                <!-- [Component B.3.3] The list items and [Component B.3.4] the images
                     Stylesheet: landing-page.css 
                -->
                <li class="logo"><img src="../images/meta-logo.png" alt="Meta logo"></li>
                <li class="logo"><img src="../images/windows-logo.png" alt="Windows logo"></li>
                <li class="logo"><img src="../images/google-logo.png" alt="Google logo"></li>
                <li class="logo"><img src="../images/apple-logo.png" alt="Apple logo"></li>
                <li class="logo"><img src="../images/spotify-logo.png" alt="Spotify logo"></li>
                <li class="logo"><img src="../images/reddit-logo.png" alt="Reddit logo"></li>
                <li class="logo"><img src="../images/ibm-logo.png" alt="IBM logo"></li>
            </ul>
        </section>


        <!-- [Component B.4] The top courses section contains seven components: 1) section-heading,
              2), 3), 4), 5), 6) template, and a button that navigates to explore-courses.php. 
              The contents of this block is arranged using flex layout (column)

              To avoid redundant documentation, only the first instance of the template is documented. 
              The remaining elements using the same classes follow the same behavior. the template
              is identified with the unique code [Component B.4.T]

              Stylesheet: landing-page.css
        -->
        <section class="top-courses">

            <!-- [Component B.4.1] Stylesheet: landing-page.css -->
            <div class="section-heading">
                <!-- [Component B.4.2] Stylesheet: element-configuration.css -->
                <h2>Top Programming<br>Courses</h2>

                <!-- [Component B.4.3] Stylesheet: element-configuration.css -->
                <p>Browse a curated collection of top programming courses from leading<br>universities around the world</p>
            </div>

            <!-- [Component B.4.T] Stylesheet: landing-page.css -->
            <div class="template">

                <!-- [Component B.4.T.1] Stylesheet: landing-page.css -->
                <div class="gradient-fade-out">
                    <img src="../images/web-dev.png">
                </div>

                <!-- [Component B.4.T.2] Stylesheet: landing-page.css -->
                <div class="template-text">
                    <!-- [Component B.4.T.2.1] Stylesheet: element-configuration.css -->
                    <p class="bright-blue-subtext">Web Development</p>

                    <!-- [Component B.4.T.2.2] Stylesheet: element-configuration.css -->
                    <h3>The Complete Full-Stack Web Development Bootcamp</h3>

                    <!-- [Component B.4.T.2.3] Stylesheet: element-configuration.css -->
                    <p>Become a Full-Stack Web Developer with just ONE course. HTML, CSS, Javascript, Node, React, 
                    PostgreSQL, Web3 and DApps</p>

                    <!-- [Component B.4.T.2.4] Stylesheet: landing-page.css -->
                    <div class="course-tags">
                        <!-- [Component B.4.T.2.4.1] Stylesheet: reusable-components.css -->
                        <a class="outlined-badge-subtext">Free</a>
                        <a class="outlined-badge-subtext">Beginner</a>
                        <a class="outlined-badge-subtext">Certificate</a>
                        <a class="outlined-badge-subtext">&starf;&emsp;4.9</a>
                        <a class="outlined-badge-subtext">12 hours</a>
                    </div>

                    <!-- [Component B.4.T.2.5] Stylesheet: reusable-components.css -->
                    <a class="bright-blue-button" href="explore-courses.php">Enroll Now</a>
                </div>
            </div>

            <!-- [Component B.4.T] Stylesheet: landing-page.css -->
            <div class="template">
                <div class="template-text">
                    <p class="bright-blue-subtext">Database Management</p>
                    <h3>MySQL Database Administration: Beginner SQL Database Design</h3>
                    <p>Learn SQL for data analysis, relational database management &amp; administration w/ MySQL Workbench (SQL DBA for beginners!)</p>
                    <div class="course-tags">
                        <a class="outlined-badge-subtext">Free</a>
                        <a class="outlined-badge-subtext">Beginner</a>
                        <a class="outlined-badge-subtext">Certificate</a>
                        <a class="outlined-badge-subtext">&starf;&emsp;4.8</a>
                        <a class="outlined-badge-subtext">10 hours</a>
                    </div>
                    <a class="bright-blue-button" href="explore-courses.php">Enroll Now</a>
                </div>
                <div class="gradient-fade-out">
                    <img src="../images/dbm.png">
                </div>
            </div>

            <!-- [Component B.4.T] Stylesheet: landing-page.css -->
            <div class="template">
                <div class="gradient-fade-out">
                    <img src="../images/python.png">
                </div>
                <div class="template-text">
                    <p class="bright-blue-subtext">Artificial Intelligence</p>
                    <h3>Complete Artificial Intelligence and Python Developer Course</h3>
                    <p>Master Machine Learning, Deep Learning, Data Science, NLP, and Computer Vision by Building Real-World AI Projects</p>
                    <div class="course-tags">
                        <a class="outlined-badge-subtext">Free</a>
                        <a class="outlined-badge-subtext">Beginner</a>
                        <a class="outlined-badge-subtext">Certificate</a>
                        <a class="outlined-badge-subtext">&starf;&emsp;4.9</a>
                        <a class="outlined-badge-subtext">17 hours</a>
                    </div>
                    <a class="bright-blue-button" href="explore-courses.php">Enroll Now</a>
                </div>
            </div>

            <!-- [Component B.4.T] Stylesheet: landing-page.css -->
            <div class="template">
                <div class="template-text">
                    <p class="bright-blue-subtext">Game Development</p>
                    <h3>Game Design and Development with Unity Specialization</h3>
                    <p>Break into the video game industry with theoretical, technical, and practical knowledge from one of the world’s best programs.
                    <div class="course-tags">
                        <a class="outlined-badge-subtext">Free</a>
                        <a class="outlined-badge-subtext">Beginner</a>
                        <a class="outlined-badge-subtext">Certificate</a>
                        <a class="outlined-badge-subtext">&starf;&emsp;4.7</a>
                        <a class="outlined-badge-subtext">18 hours</a>
                    </div>
                    <a class="bright-blue-button" href="explore-courses.php">Enroll Now</a>
                </div>
                <div class="gradient-fade-out">
                    <img src="../images/game-development.png">
                </div>
            </div>

            <!-- [Component B.4.T] Stylesheet: landing-page.css -->
            <div class="template">
                <div class="gradient-fade-out">
                    <img src="../images/mobile.png">
                </div>
                <div class="template-text">
                    <p class="bright-blue-subtext">Mobile Development</p>
                    <h3>The Complete Flutter Guide: Build Android, iOS and Web apps</h3>
                    <p>Flutter 2026: Build fast, production-grade apps for Android, iOS & Web with Flutter & Dart</p>
                    <div class="course-tags">
                        <a class="outlined-badge-subtext">Free</a>
                        <a class="outlined-badge-subtext">Beginner</a>
                        <a class="outlined-badge-subtext">Certificate</a>
                        <a class="outlined-badge-subtext">&starf;&emsp;4.8</a>
                        <a class="outlined-badge-subtext">14 hours</a>
                    </div>
                    <a class="bright-blue-button" href="explore-courses.php">Enroll Now</a>
                </div>
            </div>

            <!-- [Component B.4.T] Stylesheet: landing-page.css -->
            <a class="gradient-button" href="explore-courses.php">Explore More Courses</a>
        </section>

        <!-- [Component B.5] The reasons section contains two components: 1) section-heading, 
             2) horizontally-scrollable. The contents of this block are arranged using flex 
             layout (row). 

             To avoid redundant documentation, only the first div inside the horizontally-scrollable
             is documented. The remaining elements using the same classes follow the same behavior. 
            
             Stylesheet: landing-page.css
        -->
        <section class="reasons">
            <!-- [Component B.4.1] Stylesheet: landing-page.css -->
            <div class="section-heading">
                <h2>Why Learn With Babel?</h2>
                <p>Discover why learners choose Babel. Learn programming through a focused, accessible<br>platform designed for real progress.</p>
            </div>

            <!-- [Component B.5.2] Stylesheet: landing-page.css -->
            <div class="horizontally-scrollable">
                <!-- [Component B.4.T.1] Stylesheet: landing-page.css -->
                <div class="gradient-fade-out">
                    <!-- [Component B.5.2.1.2] Stylesheet: no stylesheet -->
                    <img src="../images/completely-free.png">

                    <!-- [Component B.5.2.1.2] Stylesheet: element-configuration.css -->
                    <h4>Completely Free</h4>

                    <!-- [Component B.5.2.1.2] Stylesheet: element-configuration.css -->
                    <p>Access high-quality programming courses with no subscriptions or hidden costs.</p>
                </div>

                <!-- [Component B.5.2.2] Stylesheet: landing-page.css -->
                <div class="gradient-fade-out">
                    <img src="../images/comprehensive-curriculum.png">
                    <h4>Comprehensive Curriculum</h4>
                    <p>A complete learning path from beginner to advanced topics.</p>
                </div>

                <!-- [Component B.5.2.3] Stylesheet: landing-page.css -->
                <div class="gradient-fade-out">
                    <img src="../images/recognized-certifications.png">
                    <h4>Recognized Certifications</h4>
                    <p>Earn certifications that can help you advance your career.</p>
                </div>

                <!-- [Component B.5.2.4] Stylesheet: landing-page.css -->
                <div class="gradient-fade-out">
                    <img src="../images/community.png">
                    <h4>Growing Community</h4>
                    <p>Join a growing community of learners around the world and share your progress.</p>
                </div>

                <!-- [Component B.5.2.5] Stylesheet: landing-page.css -->
                <div class="gradient-fade-out">
                    <img src="../images/hands-on.png">
                    <h4>Hands-On Learning</h4>
                    <p>Learn by doing through practical exercises and coding-based practice.</p>
                </div>
            </div>
        </section>

        <!-- [Component B.6] The testimonials section contains two components: 1) section-heading, 
             2) testimonials-container. The contents of this block are arranged using flex 
             layout (row). 

             To avoid redundant documentation, only the first div inside the testimonials-container
             is documented. The remaining elements using the same classes follow the same behavior. 
            
             Stylesheet: landing-page.css
        -->
        <section class="testimonials">
            <!-- [Component B.4.1] Stylesheet: landing-page.css -->
            <div class="section-heading">
                <h2>Real Success From Real Learners</h2>
                <p>Browse a curated collection of top programming courses from reputable institutions worldwide.<br>
                Gain in-demand skills and deepen your expertise through flexible, self-paced learning.</p>
            </div>

            <!-- [Component B.6.2] Stylesheet: landing-page.css -->
            <div class="testimonials-container">
                <!-- [Component B.6.2.1] Stylesheet: landing-page.css -->
                <div class="gradient-fade-out">
                    <!-- [Component B.6.2.1] Stylesheet: element-configuration.css -->
                    <p>"I earned a certification through Babel that helped me stand out during interviews and eventually 
                        land a job at Microsoft. The hands-on practice made the learning process truly effective."</p>

                    <!-- [Component B.6.2.2] Stylesheet: landing-page.css -->
                    <div class="testimonial-author">
                        <!-- [Component B.6.2.2.1] Stylesheet: no stylesheet -->
                        <img src="../images/testimonial-1.png">

                        <!-- [Component B.6.2.2.2] Stylesheet: landing-page.css -->
                        <div class="testimonial-author-text">
                            <h5>Chloe Williams</h5>
                            <p>Microsoft Corporation</p>
                        </div>
                </div>
            </div>

                <div class="gradient-fade-out">
                    <p>"Started here as a college student, with no clear direction in programming. Now I’m working at Google, and Babel played a key role in that journey."</p>
                    <div class="testimonial-author">
                        <img src="../images/testimonial-2.png">
                        <div class="testimonial-author-text">
                            <h5>Caleb Taylor</h5>
                            <p>Google Corporation</p>
                        </div>
                    </div>
                </div>

                <div class="gradient-fade-out">
                    <p>"The fact that everything is free and from real universities is insane. It feels like a legit degree path without the cost. It’s the closest thing to a real computer science program I’ve experienced online."</p>
                    <div class="testimonial-author">
                        <img src="../images/testimonial-3.png">
                        <div class="testimonial-author-text">
                            <h5>Andrew Rowan</h5>
                            <p>Meta Platforms, Inc.</p>
                        </div>
                    </div>
                </div>

                <div class="gradient-fade-out">
                    <p>"I love how structured everything is. I used to jump between random tutorials, but Babel actually keeps me on track. Now I actually finish courses instead of starting and stopping endlessly."</p>
                    <div class="testimonial-author">
                        <img src="../images/testimonial-4.png">
                        <div class="testimonial-author-text">
                            <h5>Emma Avanzini</h5>
                            <p>Spotify Technology S.A</p>
                        </div>
                    </div>
                </div>

                <div class="gradient-fade-out">
                    <p>"The self-paced format is perfect for me. I can study after work without feeling pressured or rushed. It fits naturally into my daily routine without adding stress."</p>
                    <div class="testimonial-author">
                        <img src="../images/testimonial-5.png">
                        <div class="testimonial-author-text">
                            <h5>Meghan Anderson</h5>
                            <p>Apple Inc.</p>
                        </div>
                    </div>
                </div>

                <div class="gradient-fade-out">
                    <p>"Babel finally made it easy to find quality programming courses in one place. I don’t waste time searching anymore—I just learn. It’s completely changed how I approach learning programming."</p>
                    <div class="testimonial-author">
                        <img src="../images/testimonial-6.png">
                        <div class="testimonial-author-text">
                            <h5>Jessica Jeung</h5>
                            <p>Samsung Corporation</p>
                        </div>
                    </div>
                </div>

                <div class="gradient-fade-out">
                    <p>"I started here as a college student just trying to understand programming basics. Now I’m working independently as a game developer, building small projects and releasing my own games."</p>
                    <div class="testimonial-author">
                        <img src="../images/testimonial-7.png">
                        <div class="testimonial-author-text">
                            <h5>Leonardo Jackson</h5>
                            <p>Pearl Software</p>
                        </div>
                    </div>
                </div>

                <div class="gradient-fade-out">
                    <p>"The community aspect keeps me motivated. Seeing others learning the same things makes a big difference. It helps me stay consistent and push through difficult topics."</p>
                    <div class="testimonial-author">
                        <img src="../images/testimonial-8.png">
                        <div class="testimonial-author-text">
                            <h5>Teyana Alvarez</h5>
                            <p>Microsoft Corporation</p>
                        </div>      
                    </div>
                </div>

                <div class="gradient-fade-out">
                    <p>"I like how everything is organized by topic and skill level. It makes learning programming feel much less overwhelming. I always know exactly what to learn next without getting lost."</p>
                    <div class="testimonial-author">
                        <img src="../images/testimonial-9.png">
                        <div class="testimonial-author-text">
                            <h5>Hugh Jones</h5>
                            <p>Google Corporation</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!-- [Component B.7] The questions section contains two components: 1) section-heading, 
             2) common-questions-container. The contents of this block are arranged using flex 
             layout (column). 

             To avoid redundant documentation, only the first div inside the commoon-questions-container
             is documented. The remaining elements using the same classes follow the same behavior. 
            
             Stylesheet: landing-page.css
        -->
        <section class="questions">

            <!-- [Component B.7.1] Stylesheet: landing-page.css -->
            <div class="section-heading-questions">
                <h2>Common Questions</h2>
                <p>Get answers to common questions about Babel and how it works. Everything you need to know about learning, courses, and certifications.</p>
            </div>

            <!-- [Component B.7.2] Stylesheet: landing-page.css-->
            <div class="common-questions-container">
                <!-- [Component B.7.2.1] Stylesheet: landing-page.css-->
                <details>
                    <!-- [Component B.7.2.1.1] Stylesheet: landing-page.css-->
                    <summary class="question">What is Babel?<span class="arrow">+</span></summary>
                    <!-- [Component B.7.2.1.2] Stylesheet: landing-page.css-->
                    <div class="answer">
                        <p>Babel is a free learning platform that brings together programming courses from leading universities, allowing you to learn at your own pace in one structured place.</p>
                    </div>
                </details>
                <details>
                    <summary class="question">Is Babel really free?<span class="arrow">+</span></summary>
                    <div class="answer">
                        <p>Yes. All courses on Babel are completely free to access, with no subscriptions or hidden fees required.</p>
                    </div>
                </details>
                <details>
                    <summary class="question">Do I need prior experience to start learning?<span class="arrow">+</span></summary>
                    <div class="answer">
                        <p>No. Babel offers structured learning paths that include beginner-friendly courses, so you can start from scratch.</p>
                    </div>
                    </details>
                <details>
                    <summary class="question">Can I learn while working or studying?<span class="arrow">+</span></summary>
                    <div class="answer">
                        <p>Yes. All courses are self-paced, so you can learn anytime and fit studying around your schedule.</p>
                    </div>
                </details>
                <details>
                    <summary class="question">Do I get a certificate after completing courses?<span class="arrow">+</span></summary>
                    <div class="answer">
                        <p>Yes. Many courses offer recognized certifications that can strengthen your resume and help you stand out to employers.</p>
                    </div>
                </details>
            </div>
        </section>
    </main>

    <!-- [C. FOOTER] This contains two components: 1) footer-contents, 2) gradient-footer. The
        contents of this block is arranged using flex layout (column).
         
         Note: Components in this block are styled using landing-page.css,  reusable-components.css, 
         and element-configuration.css. The stylesheets used are defined in the documentation of each 
         section, however, for a complete overview, please consult the table of contents of both 
         stylesheets to see the full list of included components.
    -->
    <footer>
        <div class="footer-contents">
            <!-- [Component C.1] Stylesheet: reusable-components.css -->
            <div class="top-footer">
                <!-- [Component C.1.1] Stylesheet: reusable-components.css -->
                <div class="left-footer">
                    <!-- [Component C.1.1.1] Stylesheet: reusable-components.css -->
                    <a class="babel-logo" href="landing-page.php">
                        <img src="../images/babel-logo.png">
                    </a>
                    
                    <!-- [Component C.1.1.2] Stylesheet: element-configuration.css -->
                    <p>Where All Programming Languages Meet<br>Babel Learning Platform</p>
                </div>
                <!-- [Component C.1.2] Stylesheet: reusable-components.css -->
                <nav class="main-navigation">
                    <ul>
                        <a href="landing-page.php"><li>Home</li></a>
                        <a href="explore-courses.php"><li>Explore</li></a>
                    </ul>
                </nav>
            </div>

            <!-- [Component C.2] Stylesheet: reusable-components.css -->
            <div class="bottom-footer">
                <!-- [Component C.2.1] Stylesheet: element-configuration.css -->
                <p>Copyright © 2026 Babel.<br>All Rights Reserved</p>

                <!-- [Component C.2.2] Stylesheet: reusable-components.css -->
                <nav class="main-navigation">
                    <ul>
                        <a><li>Privacy Policy</li></a>
                        <a><li>Terms & Conditions</li></a>
                    </ul>
                </nav>

                <!-- [Component C.2.3] Stylesheet: reusable-components.css -->
                <nav class="social-media">
                    <ul>
                        <a><i class="fa-brands fa-facebook"></i></a>
                        <a><i class="fa-brands fa-instagram"></i></a>
                        <a><i class="fa-brands fa-x-twitter"></i></a>
                        <a><i class="fa-brands fa-linkedin"></i></a>
                    </ul>
                </nav>
            </div>

            <!-- [Component C.3] Stylesheet: reusable-components.css -->
            <img class="gradient-footer" src="../images/gradient-footer.png">
        </div>
    </footer>
</body>
</html>