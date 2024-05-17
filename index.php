<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Banking System</h1>

       

        <!-- Login Form -->
        <h2>Login</h2>
        <form id="loginForm" action="login.php" method="POST">
            <div class="mb-3">
                <label for="loginUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="loginUsername" name="username" required>
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <!-- Logout Button -->
        <form id="logoutForm" action="logout.php" method="POST">
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
        
        <!-- Other existing forms and functionalities -->
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            fetch('register.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
            });
        });

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
            });
        });

        document.getElementById('logoutForm').addEventListener('submit', function(event) {
            event.preventDefault();
            fetch('logout.php', {
                method: 'POST'
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = 'index.php';
                }
            });
        });
    </script>
</body>
</html>
