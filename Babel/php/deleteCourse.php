<!-- 
    @author margarita
    @author jasmine
    @author Marione-G
-->
<?php
/**
 * This block of code instructs the program to delete the course
 * identified by the id sent from the URL (e.g., deleteCourse.php?id=1).
 * 
 * It first stores the path of the XML file in the variable $file. If the
 * file exists, the rest of the code is executed. Otherwise, the die()
 * function stops the script immediately and outputs the specified error message.
 * 
 * The XML file located at the specified $file path is then loaded into $xml,
 * and a boolean flag is created to track whether the target course is found.
 * 
 * Subsequently, the code iterates through all <Course> elements in the XML
 * to find the course that matches the provided id. If a match is found, the
 * flag is set to true, the course is removed from the XML using unset(),
 * and the loop is terminated.
 * 
 * Finally, the XML file is overwritten with the updated data, and a response
 * message is displayed to the user depending on whether the deletion was
 * successful or not.
 */
    $id = $_GET["id"];
    $file = "../xml/course.xml";

    if (!file_exists($file)) {
        die("XML file not found");
    }

    $xml = simplexml_load_file($file);
    $found = false;

    for ($i = 0; $i < count($xml->Course); $i++) {
        if ((string)$xml->Course[$i]->id === $id) {
            unset($xml->Course[$i]);
            $found = true;
            break;
        }
    }

    $xml->asXML($file);

    if ($found) {
        echo "Course deleted successfully!";
    } else {
        echo "Course not found!";
    }
?>