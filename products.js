function login() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Dummy user data (for demonstration purposes only)
    var users = [
        { username: "user1", password: "pass1" },
        { username: "user2", password: "pass2" }
    ];

    var isValidUser = users.some(user => user.username === username && user.password === password);

    if (isValidUser) {
        document.getElementById("login-container").style.display = "none";
        document.getElementById("product-container").style.display = "block";
        // You may fetch and display products here
    } else {
        alert("Invalid username or password. Please try again.");
    }
}
