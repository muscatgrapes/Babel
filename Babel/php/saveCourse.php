<!-- 
    @author margarita
    @author jasmine
    @author Marione-G
-->

<?php
/**
 * This reads raw data sent from fetch() and stores it in $data.
 * It then defines the path of the XML file and loads the XML file
 * into a PHP object for processing.
 */
    $data = json_decode(file_get_contents("php://input"), true);
    $file = "../xml/course.xml";
    $xml = simplexml_load_file($file);

/**
 * If the mode attribute of the data object is set to "update",
 * the update logic is executed. This iterates over each <Course>
 * node. If a matching course is found, its data is updated and
 * the XML file is overwritten with the modified content.
 */
    if ($data["mode"] === "update") {
        $found = false;
        foreach ($xml->Course as $course) {
            if ((string)$course->id === (string)$data["id"]) {
                $course->Title = $data["title"];
                $course->Type = $data["type"];
                $course->Level = $data["level"];
                $course->Price = $data["price"];
                $course->Duration = $data["duration"];
                $course->Description = $data["description"];
                $found = true;
                break;
            }
        }

        if ($found) {
            $xml->asXML($file);
            echo "UPDATED";
        } else {
            echo "UPDATE FAILED - ID NOT FOUND";
        }

    } 
   
/**
 * If the mode attribute of the data object is set to "add",
 * the add logic is executed. A new course entry is created in the XML,
 * and the XML file is overwritten with the updated data.
 */
    else {
        $new = $xml->addChild("Course");
        $new->addChild("id", $data["id"]);
        $new->addChild("Title", $data["title"]);
        $new->addChild("Type", $data["type"]);
        $new->addChild("Level", $data["level"]);
        $new->addChild("Price", $data["price"]);
        $new->addChild("Duration", $data["duration"]);
        $new->addChild("Description", $data["description"]);
        $xml->asXML($file);
        echo "ADDED";
    }
?>