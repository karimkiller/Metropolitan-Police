function saveUserData() {
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var callSign = document.getElementById('callSign').value;

    // Send the data to a PHP file for processing
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save_data.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText); // Display the response from the server
        }
    };
    xhr.send("firstName=" + firstName + "&lastName=" + lastName + "&callSign=" + callSign);
}

function viewSavedData() {
    // Fetch and display saved data from the PHP file
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "view_data.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('userDataDisplay').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
