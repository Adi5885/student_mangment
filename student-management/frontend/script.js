// Adjust this URL based on where you host your backend.
// If using PHP built-in server: 'http://localhost:8000/students.php'
// If using XAMPP: 'http://localhost/student-management/backend/students.php'
const API_URL = "http://localhost:8000/students.php";

function loadStudents() {
    fetch(API_URL)
        .then(res => res.json())
        .then(data => {
            let rows = "";
            if (Array.isArray(data)) {
                data.forEach(s => {
                    rows += `
                    <tr>
                        <td>${s.name}</td>
                        <td>${s.email}</td>
                        <td>${s.course}</td>
                        <td>${s.phone}</td>
                        <td>
                            <button onclick="deleteStudent(${s.id})" style="background-color:red;">Delete</button>
                        </td>
                    </tr>`;
                });
            }
            document.getElementById("students").innerHTML = rows;
        })
        .catch(err => console.error("Error loading students:", err));
}

function addStudent() {
    const nameFn = document.getElementById('name').value;
    const emailFn = document.getElementById('email').value;
    const courseFn = document.getElementById('course').value;
    const phoneFn = document.getElementById('phone').value;

    if (!nameFn || !emailFn) {
        alert("Name and Email are required");
        return;
    }

    const student = {
        name: nameFn,
        email: emailFn,
        course: courseFn,
        phone: phoneFn
    };

    fetch(API_URL, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(student)
    })
        .then(res => res.json()) // Keep this line to parse JSON response
        .then(data => {
            if (data.error) {
                alert("Server Error: " + data.error);
            } else if (data.message) {
                // Success
                alert("Success: " + data.message);
                // Clear inputs
                document.getElementById('name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('course').value = '';
                document.getElementById('phone').value = '';
                loadStudents();
            } else if (data.id) {
                // Success (sometimes returns object)
                alert("Success: Student Added");
                loadStudents();
            }
        })
        .catch(err => {
            console.error(err);
            alert("Network/Fetch Error: Check console. Is PHP server running?");
        });
}

function deleteStudent(id) {
    if (confirm("Are you sure?")) {
        fetch(`${API_URL}?id=${id}`, { method: "DELETE" })
            .then(() => loadStudents())
            .catch(err => console.error(err));
    }
}

// Initial load
loadStudents();
