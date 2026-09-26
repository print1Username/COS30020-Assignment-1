<?php

session_start();


/*
 * ==========================
 * Login Protection
 * ==========================
 */

if (
    !isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] !== true
) {
    header("Location: main_menu.php");
    exit;
}


/*
 * ==========================
 * Current User
 * ==========================
 */

$currentEmail = $_SESSION["email"] ?? "";

$userFile = "data/User/user.txt";


/*
 * ==========================
 * Default User Data
 * ==========================
 */

$userData = [
    "First Name" => "",
    "LastName" => "",
    "DOB" => "",
    "Gender" => "",
    "Email" => "",
    "Hometown" => "",
    "Password" => ""
];

$userFound = false;


/*
 * ==========================
 * Read User File
 * ==========================
 */

if (file_exists($userFile)) {

    $users = file(
        $userFile,
        FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
    );

    foreach ($users as $user) {

        $fields = explode("|", $user);

        $tempData = [];

        foreach ($fields as $field) {

            $parts = explode(":", $field, 2);

            if (count($parts) !== 2) {
                continue;
            }

            $key = trim($parts[0]);
            $value = trim($parts[1]);

            $tempData[$key] = $value;
        }


        /*
         * Find the currently logged-in user
         */

        if (
            isset($tempData["Email"]) &&
            strtolower($tempData["Email"]) ===
            strtolower($currentEmail)
        ) {

            foreach ($userData as $key => $value) {

                if (isset($tempData[$key])) {
                    $userData[$key] = $tempData[$key];
                }

            }

            $userFound = true;

            break;
        }
    }
}


/*
 * ==========================
 * Date Format
 * ==========================
 *
 * Stored format:
 * DD-MM-YYYY
 *
 * HTML date input:
 * YYYY-MM-DD
 */

$dateValue = "";

if ($userData["DOB"] !== "") {

    $dateParts = explode("-", $userData["DOB"]);

    if (count($dateParts) === 3) {

        $dateValue =
            $dateParts[2] . "-" .
            $dateParts[1] . "-" .
            $dateParts[0];
    }
}


/*
 * ==========================
 * Default Profile Image
 * ==========================
 */

$gender = strtolower($userData["Gender"]);

if ($gender === "male") {

    $profileImage = "profile_images/male.png";

} elseif ($gender === "female") {

    $profileImage = "profile_images/female.png";

} else {

    $profileImage = "profile_images/default.png";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Update Profile</title>


    <!-- Bootstrap 5.3.8 -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    <!-- Navbar CSS -->

    <link
        rel="stylesheet"
        href="style/navbar.css"
    >


    <!-- Profile CSS -->

    <link
        rel="stylesheet"
        href="style/profile.css"
    >

</head>


<body>


    <!-- Navbar -->

    <div id="navbar-container"></div>


    <!-- Update Profile Page -->

    <main class="profile-page">

        <div class="profile-card">


            <!-- Back Button -->

            <button
                type="button"
                class="profile-back-button"
                onclick="history.back()"
            >

                <i class="bi bi-arrow-left"></i>

                <span>Back</span>

            </button>


            <!-- Page Heading -->

            <div class="profile-heading">

                <h1>Update Profile</h1>

                <p>
                    Update your personal information.
                </p>

            </div>


            <?php if (!$userFound): ?>

                <!-- User Not Found -->

                <div
                    class="alert alert-danger"
                    role="alert"
                >

                    <i class="bi bi-exclamation-circle me-2"></i>

                    Unable to find your profile information.

                </div>

            <?php else: ?>


            <!-- Profile Picture -->

            <div class="profile-image-section">

                <div class="profile-image-wrapper">

                    <img
                        src="<?php
                            echo htmlspecialchars(
                                $profileImage
                            );
                        ?>"
                        alt="Profile picture"
                        class="profile-image"
                        id="profileImage"
                    >

                </div>


                <!-- Profile Picture Buttons -->

                <div class="profile-image-actions">

                    <button
                        type="button"
                        class="btn profile-image-button"
                        id="uploadPhotoButton"
                    >

                        <i class="bi bi-upload"></i>

                        Upload Photo

                    </button>


                    <button
                        type="button"
                        class="btn profile-image-button"
                        id="cameraButton"
                    >

                        <i class="bi bi-camera"></i>

                        Camera

                    </button>

                </div>


                <!-- Hidden File Input -->

                <input
                    type="file"
                    id="profileImageInput"
                    name="profile_image"
                    accept="image/*"
                    hidden
                >

            </div>

                <!-- Profile Image Crop Window -->
                <div
                    id="profileCropModal"
                    class="profile-crop-modal"
                    style="display: none;"
                >

                    <div class="profile-crop-container">

                        <canvas
                            id="profileCropCanvas"
                        ></canvas>


                        <!-- Cancel Crop -->

                        <button
                            type="button"
                            id="cropCancelButton"
                            class="profile-crop-button profile-crop-cancel"
                            aria-label="Cancel"
                        >

                            <i class="bi bi-x-lg"></i>

                        </button>


                        <!-- Confirm Crop -->

                        <button
                            type="button"
                            id="cropConfirmButton"
                            class="profile-crop-button profile-crop-confirm"
                            aria-label="Confirm"
                        >

                            <i class="bi bi-check-lg"></i>

                        </button>

                    </div>

                </div>

                <!-- Update Form -->

                <form
                    action="process_update_profile.php"
                    method="POST"
                    enctype="multipart/form-data"
                >


                    <!-- First Name -->

                    <div class="mb-3">

                        <label
                            for="firstName"
                            class="form-label"
                        >
                            First Name
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="firstName"
                            name="first_name"
                            value="<?php
                                echo htmlspecialchars(
                                    $userData["First Name"]
                                );
                            ?>"
                            required
                        >

                    </div>


                    <!-- Last Name -->

                    <div class="mb-3">

                        <label
                            for="lastName"
                            class="form-label"
                        >
                            Last Name
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="lastName"
                            name="last_name"
                            value="<?php
                                echo htmlspecialchars(
                                    $userData["LastName"]
                                );
                            ?>"
                            required
                        >

                    </div>


                    <!-- Date of Birth -->

                    <div class="mb-3">

                        <label
                            for="dob"
                            class="form-label"
                        >
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            class="form-control"
                            id="dob"
                            name="dob"
                            value="<?php
                                echo htmlspecialchars(
                                    $dateValue
                                );
                            ?>"
                            required
                        >

                    </div>


                    <!-- Gender -->

                    <div class="mb-3">

                        <label
                            for="gender"
                            class="form-label"
                        >
                            Gender
                        </label>

                        <select
                            class="form-select"
                            id="gender"
                            name="gender"
                            required
                        >

                            <option
                                value="Female"
                                <?php
                                    echo (
                                        $userData["Gender"]
                                        === "Female"
                                    )
                                    ? "selected"
                                    : "";
                                ?>
                            >
                                Female
                            </option>


                            <option
                                value="Male"
                                <?php
                                    echo (
                                        $userData["Gender"]
                                        === "Male"
                                    )
                                    ? "selected"
                                    : "";
                                ?>
                            >
                                Male
                            </option>

                        </select>

                    </div>


                    <!-- Email -->

                    <div class="mb-3">

                        <label
                            for="email"
                            class="form-label"
                        >
                            Email
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="email"
                            name="email"
                            value="<?php
                                echo htmlspecialchars(
                                    $userData["Email"]
                                );
                            ?>"
                            required
                        >

                    </div>


                    <!-- Hometown -->

                    <div class="mb-3">

                        <label
                            for="hometown"
                            class="form-label"
                        >
                            Hometown
                        </label>

                        <textarea
                            class="form-control"
                            id="hometown"
                            name="hometown"
                            rows="2"
                            required
                        ><?php
                            echo htmlspecialchars(
                                $userData["Hometown"]
                            );
                        ?></textarea>

                    </div>


                    <!-- Password -->

                    <div class="mb-3">

                        <label
                            for="password"
                            class="form-label"
                        >
                            Password
                        </label>


                        <div class="input-group">


                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                value="<?php
                                    echo htmlspecialchars(
                                        $userData["Password"]
                                    );
                                ?>"
                                required
                            >


                            <button
                                type="button"
                                class="password-toggle"
                                id="passwordToggle"
                                aria-label="Show password"
                            >

                                <i
                                    class="bi bi-eye"
                                    id="passwordIcon"
                                ></i>

                            </button>


                        </div>

                    </div>


                    <!-- Form Buttons -->

                    <div class="profile-form-actions">


                        <a
                            href="main_menu.php"
                            class="btn btn-secondary"
                        >
                            Cancel
                        </a>


                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Update
                        </button>


                    </div>


                </form>

            <?php endif; ?>


        </div>
    </main>

    <script src="components/navbar.js"></script>
    <script src="components/profile_crop.js"></script>

</body>

</html>