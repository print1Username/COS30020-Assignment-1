<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Community</title>

        <!-- Bootstrap 5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        >

        <!-- Custom Navbar CSS -->
        <link
            rel="stylesheet"
            href="style/navbar.css"
        >

        <link
            rel="stylesheet"
            href="style/community.css"
        >

        <!-- Bootstrap Icons -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        >
    </head>

    <body>
        <!-- Navbar will be inserted here -->
        <div id="navbar-container"></div>

        <?php include "navbar.php"; ?>

        <!-- Your page content -->
        <main class="container py-5">
            <h1>Community</h1>
            <p>This is my website homepage.</p>
        </main>

        <!-- Bootstrap JavaScript -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>

</html>