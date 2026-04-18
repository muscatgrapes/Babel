/*
    @author margarita
    @author jasmine
    @author Marione-G
 */
/**
 * A boolean variable that determines whether the form should be autofilled.
 * If isUpdate is set to true, the form is autofilled with existing course data.
 * Otherwise, the form remains empty for creating a new course.
 *
 * This value is used to set the mode attribute of the data object below.
 * The mode value is sent to saveCourse.php, which determines whether to
 * update an existing course or add a new one.
 */
let isUpdate = false;

/**
 * Displays the modal box where users can enter course data.
 * Instead of using the built-int showModal() function, this displays
 * the modal dialog manually using CSS. This approach was used because
 * the modal box cannot be centered on the screen using showModal().
 */
function openModal() {
    isUpdate = false; 
    document.getElementById("courseForm").reset();
    document.getElementById("id").value = "";
    document.getElementById("modalTitle").innerText = "Add Course";
    document.getElementById("modal").classList.add("show");
}

/**
 * This closes the modal box manually using CSS. For further details,
 * please consult explore-courses.css.
 */
function closeModal() {
    document.getElementById("modal").classList.remove("show");
}

/**
 * This block of code locates the form with the id "courseForm" and runs the
 * following instructions when the form is submitted (either for adding
 * or updating a course).
 *
 * It first creates an object with several attributes such as id, title,
 * type, level, price, and others. These attributes are assigned values by
 * retrieving user input from the form fields using the .value property.
 *
 * The value of the mode attribute depends on the value of isUpdate.
 * If the user clicks the "Add Course" button, isUpdate is set to false
 * by openModal() and the form is reset to blank. If the "Update" button 
 * is clicked, isUpdate is set to true by editCourse() and the form
 * is autofilled with the course data.
 *
 * Both adding and updating use the same form. What determines whether the
 * operation will insert a new record or update an existing one is the mode
 * attribute. When sent to saveCourse.php, the mode value is used to decide
 * whether to update or add a record.
 *
 * After initializing the data object, the code uses the fetch() function,
 * which follows Promise chaining as described above. This sends an HTTP POST
 * request to saveCourse.php, with the data object converted into JSON format
 * and included in the request body.
 *
 * The subsequent then() methods process the response by converting it to
 * text, logging it to the console, and reloading the page after the operation
 * is completed.
 */
document.getElementById("courseForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const data = {
        id: document.getElementById("id").value,
        title: document.getElementById("title").value,
        type: document.getElementById("type").value,
        level: document.getElementById("level").value,
        price: document.getElementById("price").value,
        duration: document.getElementById("duration").value,
        description: document.getElementById("description").value,
        mode: isUpdate ? "update" : "add"
    };

    fetch("saveCourse.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    })
    .then(res => res.text())
    .then(res => {
        console.log(res);
        location.reload();
    });
});

/**
 * This function follows the same Promise chaining approach as described above. 
 * It first sends an HTTP request to load course.xml, where ?nocache= + Date.now() 
 * is used to prevent browser caching and force the browser to fetch a fresh file 
 * each time.
 * 
 * The then() functions are used to retrieve the response text and execute the update
 * logic. It first parses the XML string into a DOM object and stores it in the constant 
 * xml. After this parsing, JavaScript can navigate the XML structure similarly to how 
 * it interacts with an HTML document.
 * 
 * It then retrieves all <Course> elements from the XML and stores them in the 
 * constant courses, which behaves like an array-like structure. Using a for loop, 
 * the code iterates over the courses collection and searches for the course with the 
 * matching id. If a match is found, that course is assigned to the variable target.
 * 
 * If target is null, the function returns and skips the remaining code because 
 * the course cannot be found. If it finds a match, the function continues by 
 * populating the form fields with the corresponding course data and opening the 
 * modal for editing.
 * 
 * @param {*} id an integer that serves as the unique identifier for a course
 */
function editCourse(id) {
    fetch("../xml/course.xml?nocache=" + Date.now())
    .then(res => res.text())
    .then(str => {
        const xml = new DOMParser().parseFromString(str, "text/xml");
        const courses = xml.getElementsByTagName("Course");

        let target = null;

        for (let i = 0; i < courses.length; i++) {
            if (courses[i].getElementsByTagName("id")[0].textContent === id) {
                target = courses[i];
                break;
            }
        }

        if (!target) return;

        isUpdate = true; 
        document.getElementById("modalTitle").innerText = "Update Course";
        document.getElementById("id").value = target.getElementsByTagName("id")[0].textContent;
        document.getElementById("title").value = target.getElementsByTagName("Title")[0].textContent;
        document.getElementById("type").value = target.getElementsByTagName("Type")[0].textContent;
        document.getElementById("level").value = target.getElementsByTagName("Level")[0].textContent;
        document.getElementById("price").value = target.getElementsByTagName("Price")[0].textContent;
        document.getElementById("duration").value = target.getElementsByTagName("Duration")[0].textContent;
        document.getElementById("description").value = target.getElementsByTagName("Description")[0].textContent;
        document.getElementById("modal").classList.add("show");
    });
}

/**
 * The confirm() displays a confirmation dialog. If the user clicks 'Cancel',
 * it returns and skips the code. Otherwise, the remaining code is executed 
 * and the selected course is deleted. 
 *  
 * The fetch() function uses Promise chaining, which is similar in style to 
 * method chaining in Java. It first sends an HTTP request to the server, 
 * including the PHP destination file and the course ID as a query parameter. 
 * 
 * The response is then passed through the subsequent then() functions, which 
 * process the response text, display an alert popup, and reload the webpage. 
 * If any of the previous steps fail, the error is caught by catch(), 
 * and an error message is displayed in the console.
 * 
 * @param {*} id an integer that serves as the unique identifier for a course
 * @returns undefined, if user clicks 'Cancel'
 */
function deleteItem(id) {
    if (!confirm("Are you sure you want to delete this course?")) return;

    fetch("deleteCourse.php?id=" + id)
    .then(res => res.text())
    .then(msg => {
        alert(msg);
        location.reload(); 
    })
    .catch(err => console.error("Delete error:", err));
}