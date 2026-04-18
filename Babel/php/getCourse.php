<!-- 
    @author margarita
    @author jasmine
    @author Marione-G
-->
<?php
/**
 * This retrieves a course identified by the provided ID.
 *
 * It first informs the browser that the response will be in JSON format.
 * Then it reads the id from the URL (e.g., getCourse.php?id=1), loads 
 * the XML file, and stores it in $xml.
 *
 * It then iterates through every <Course> node in the XML file and checks 
 * for a matching ID. If a match is found, the course data is converted 
 * into an array and returned as JSON to the client.
 */
    header("Content-Type: application/json");

    $id = $_GET["id"];
    $xml = simplexml_load_file("../xml/course.xml");

    foreach ($xml->Course as $course) {
        if ((string)$course->id == $id) {
            echo json_encode([
                "id" => (string)$course->id,
                "title" => (string)$course->Title,
                "type" => (string)$course->Type,
                "level" => (string)$course->Level,
                "price" => (string)$course->Price,
                "duration" => (string)$course->Duration,
                "description" => (string)$course->Description
            ]);
            exit;
        }
    }

    echo json_encode(["error" => "not found"]);
?>