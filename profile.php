<?php
session_start();

/*
 * ==========================
 * Login Protection
 * ==========================
 */

if (
    !isset($_SESSION["logged_in"])
    || $_SESSION["logged_in"] !== true
    || !isset($_SESSION["email"])
) {
    header("Location: login.php");
    exit;
}


/*
 * ==========================
 * Current User
 * ==========================
 */

$currentEmail = $_SESSION["email"];

$userFile = "data/User/user.txt";

$userData = [
    "First Name" => "",
    "LastName" => "",
    "DOB" => "",
    "Gender" => "",
    "Email" => "",
    "Hometown" => "",
    "Password" => ""
];

$profileImage = "";


/*
 * ==========================
 * Read User Data
 * ==========================
 */

if (file_exists($userFile)) {

    $users = file(
        $userFile,
        FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
    );

    foreach ($users as $user) {

        $fields = explode("|", $user);

        $tempUser = [];

        foreach ($fields as $field) {

            $parts = explode(":", $field, 2);

            if (count($parts) !== 2) {
                continue;
            }

            $key = trim($parts[0]);
            $value = trim($parts[1]);

            $tempUser[$key] = $value;
        }


        /*
         * Find the currently logged-in user
         * using the email stored in the session.
         */

        if (
            isset($tempUser["Email"])
            && strtolower($tempUser["Email"]) === strtolower($currentEmail)
        ) {

            foreach ($userData as $key => $value) {

                if (isset($tempUser[$key])) {
                    $userData[$key] = $tempUser[$key];
                }
            }

            /*
             * Profile Image
             *
             * This field can be added to user.txt later
             * when the profile image saving function is implemented.
             */

            if (isset($tempUser["Profile Image"])) {
                $profileImage = $tempUser["Profile Image"];
            }

            break;
        }
    }
}


/*
 * ==========================
 * Display Values
 * ==========================
 */

$fullName = trim(
    $userData["First Name"] . " " . $userData["LastName"]
);


/*
 * Convert DOB to:
 * 31 December 2026
 */

$formattedDob = "";

if ($userData["DOB"] !== "") {

    $dobDate = DateTime::createFromFormat(
        "d-m-Y",
        $userData["DOB"]
    );

    if ($dobDate !== false) {

        $formattedDob = $dobDate->format("d F Y");

    } else {

        /*
         * Fallback in case the stored DOB uses
         * another valid date format.
         */

        $timestamp = strtotime($userData["DOB"]);

        if ($timestamp !== false) {
            $formattedDob = date("d F Y", $timestamp);
        }
    }
}


/*
 * ==========================
 * Profile Image
 * ==========================
 */

$profileImagePath = "";

if ($profileImage !== "") {

    $possibleImagePath =
        "profile_images/" . basename($profileImage);

    if (file_exists($possibleImagePath)) {
        $profileImagePath = $possibleImagePath;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Profile</title>


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


    <!-- Custom Navbar CSS -->
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


    <!-- Profile Page -->
    <main class="profile-page container py-5">


        <!-- Page Heading -->
        <div class="profile-page-heading">

            <h1>Profile</h1>

            <p>
                View and manage your personal information.
            </p>

        </div>


        <!-- Profile Layout -->
        <div class="profile-layout">


            <!-- ==========================
                 Left: Profile Card
                 ========================== -->

            <section class="profile-card">


                <!-- Profile Picture -->

                <div class="profile-picture-container">

                    <?php if ($profileImagePath !== ""): ?>

                        <img
                            src="<?php echo htmlspecialchars($profileImagePath); ?>"
                            alt="Profile picture"
                            class="profile-picture"
                        >

                    <?php else: ?>

                        <div
                            class="profile-picture profile-picture-default"
                            aria-label="Default profile picture"
                        >

                            <i class="bi bi-person-fill"></i>

                        </div>

                    <?php endif; ?>

                </div>


                <!-- Profile Picture Buttons -->

                <div class="profile-picture-actions">

                    <button
                        type="button"
                        class="btn profile-upload-button"
                        id="uploadProfileButton"
                    >
                        <i class="bi bi-upload me-2"></i>
                        Upload Profile
                    </button>


                    <button
                        type="button"
                        class="btn profile-camera-button"
                        id="cameraProfileButton"
                    >
                        <i class="bi bi-camera me-2"></i>
                        Take from Camera
                    </button>

                </div>


            </section>



            <!-- ==========================
                 Right: Profile Information
                 ========================== -->

            <section class="profile-information">


                <!-- Action Buttons -->

                <div class="profile-actions">

                    <button
                        type="button"
                        class="btn profile-edit-button"
                        id="editProfileButton"
                    >
                        <i class="bi bi-pencil me-2"></i>
                        Edit
                    </button>


                    <div
                        class="profile-edit-actions d-none"
                        id="profileEditActions"
                    >

                        <button
                            type="button"
                            class="btn profile-save-button"
                            id="saveProfileButton"
                        >
                            <i class="bi bi-check-lg me-2"></i>
                            Save
                        </button>


                        <button
                            type="button"
                            class="btn profile-cancel-button"
                            id="cancelProfileButton"
                        >
                            <i class="bi bi-x-lg me-2"></i>
                            Cancel
                        </button>

                    </div>

                </div>

                <!-- ==========================
                     Non-editable Information
                     ========================== -->

                <div class="profile-fixed-information">

                    <!-- Student ID -->
                    <div class="profile-fixed-field">

                        <label>
                            Student ID
                        </label>

                        <div class="profile-fixed-value">

                            YOUR_STUDENT_ID

                        </div>

                    </div>


                    <!-- Student Email -->
                    <div class="profile-fixed-field">

                        <label>
                            Student Email
                        </label>

                        <div class="profile-fixed-value">

                            <?php
                                echo htmlspecialchars(
                                    $userData["Email"]
                                );
                            ?>

                        </div>

                    </div>

                </div>




                <!-- ==========================
                     Username
                     ========================== -->

                <div class="profile-field">

                    <label>
                        Username
                    </label>

                    <div class="profile-field-value">

                        <?php
                            echo htmlspecialchars(
                                $fullName
                            );
                        ?>

                    </div>

                </div>

                <!-- ==========================
                     Date of Birth
                     ========================== -->

                <div class="profile-field">

                    <label>
                        Date of Birth
                    </label>

                    <div class="profile-field-value">

                        <?php
                            echo htmlspecialchars(
                                $formattedDob
                            );
                        ?>

                    </div>

                </div>



                <!-- ==========================
                     Gender
                     ========================== -->

                <div class="profile-field">

                    <label>
                        Gender
                    </label>

                    <div class="profile-field-value">

                        <?php
                            echo htmlspecialchars(
                                $userData["Gender"]
                            );
                        ?>

                    </div>

                </div>



                <!-- ==========================
                     Hometown
                     ========================== -->

                <div class="profile-field profile-hometown-field">

                    <label>
                        Hometown
                    </label>

                    <div class="profile-field-value profile-hometown-value">

                        <?php
                            echo nl2br(
                                htmlspecialchars(
                                    $userData["Hometown"]
                                )
                            );
                        ?>

                    </div>

                </div>



                <!-- ==========================
                     Academic Integrity
                     ========================== -->

                <section class="academic-integrity-section">

                    <h2>
                        Academic Integrity Declaration
                    </h2>

                    <div class="academic-integrity-box">

                        <!--
                            INSERT THE OFFICIAL ACADEMIC INTEGRITY
                            DECLARATION HERE.

                            The wording has intentionally been left
                            empty because the official declaration
                            text has not been provided yet.
                        -->

                    </div>

                </section>


            </section>


        </div>

    </main>



    <!-- ==========================
         Hidden Image Input
         ========================== -->

    <input
        type="file"
        id="profileImageInput"
        accept="image/*"
        hidden
    >

    <!-- Bootstrap JavaScript -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYjWVrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"
    ></script>

    <!-- Navbar JavaScript -->
    <script src="components/navbar.js"></script>


    <!-- Profile JavaScript -->
    <script>

        /*
         * ==========================
         * Edit Mode
         * ==========================
         */

        const editProfileButton =
            document.getElementById("editProfileButton");

        const profileEditActions =
            document.getElementById("profileEditActions");

        const saveProfileButton =
            document.getElementById("saveProfileButton");

        const cancelProfileButton =
            document.getElementById("cancelProfileButton");

        editProfileButton.addEventListener(
            "click",
            function () {

                document
                    .querySelector(".profile-information")
                    .classList.add("profile-editing");

                editProfileButton.classList.add("d-none");

                profileEditActions.classList.remove("d-none");

            }
        );


        cancelProfileButton.addEventListener(
            "click",
            function () {

                const confirmed =
                    confirm(
                        "Are you sure you want to cancel? Any unsaved changes will be lost."
                    );

                if (confirmed) {

                    window.location.reload();

                }

            }
        );


        saveProfileButton.addEventListener(
            "click",
            function () {

                /*
                 * The actual save functionality will be
                 * connected to update_profile.php.
                 */

            }
        );



        /*
         * ==========================
         * Upload Profile
         * ==========================
         */

        const uploadProfileButton =
            document.getElementById("uploadProfileButton");

        const profileImageInput =
            document.getElementById("profileImageInput");


        uploadProfileButton.addEventListener(
            "click",
            function () {

                profileImageInput.click();

            }
        );


        /*
         * Camera button intentionally has no
         * camera functionality yet.
         */

        const cameraProfileButton =
            document.getElementById("cameraProfileButton");


        cameraProfileButton.addEventListener(
            "click",
            function () {

                /*
                 * Camera functionality will be
                 * implemented separately if required.
                 */
            }
        );

    </script>


</body>

</html>
```
