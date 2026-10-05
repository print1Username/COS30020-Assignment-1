# Boardgame Hub

[中文说明 / Chinese README](README.zh-CN.md)

Boardgame Hub is a beginner-friendly PHP web application for discovering board games, viewing venue activities, registering for events, and connecting with a board-game community. It was created for the COS30020 Web Application Development Assignment 1.

## Clone the project

Open PowerShell or Git Bash and run:

```bash
git clone https://github.com/print1Username/COS30020-Assignment-1.git
cd COS30020-Assignment-1
```

## What it does

- Browse a board-game catalogue organised by category.
- View upcoming activities, including date, time, price, venue, and table.
- Create an account and sign in with PHP sessions.
- Register for an activity; duplicate registrations are rejected.
- View and update an account profile, including an optional profile image.
- Browse community showcases and their detail pages.

## Technology

- PHP 8+ (run through XAMPP Apache)
- HTML5, CSS, and JavaScript
- Bootstrap 5.3.8 and Bootstrap Icons 1.11.3, loaded from CDN
- JSON files and plain-text files for storage; no database is required

Internet access is needed for the Bootstrap CDN resources to load. The main PHP features can still be tested locally through Apache.

## Project structure

```text
COS30020-Assignment-1/
├── index.php                    # Home page
├── main_menu.php                # Main navigation page
├── catalog.php                  # Board-game catalogue
├── activities.php               # Activity listing
├── activity_reg.php             # Logged-in activity registration
├── community.php                # Community showcase
├── community_detail.php         # Community item details
├── registration.php             # Account registration form
├── process_registration.php     # Registration validation and storage
├── login.php                    # Login and session creation
├── profile.php                  # User profile
├── update_profile.php           # Profile editing and image upload
├── about.php                    # Project and technology information
├── navbar.php                   # Shared session-aware navbar data
├── components/                  # Reusable JavaScript components
├── style/                       # Page-specific CSS files
├── img/                         # Site images
├── profile_images/              # Uploaded profile images
└── data/                        # JSON content and runtime text data
    ├── catalog.json
    ├── activities.json
    ├── community.json
    └── User/user.txt            # Registered accounts
```

`data/activity_registrations.txt` is created when an activity is registered. `profile_images/` receives profile images uploaded through the update-profile page.

## Run locally with XAMPP

### 1. Install and start XAMPP

1. Install XAMPP with Apache and PHP.
2. Open the XAMPP Control Panel.
3. Start **Apache**. Its status should turn green.

### 2. Place the project in the web root

Copy or move this project folder into XAMPP's `htdocs` directory and name it `COS30020`:

```text
C:\xampp\htdocs\COS30020
```

The important part is that `index.php` is directly inside `COS30020`, not inside another nested folder.

### 3. Open the website

In a browser, visit:

```text
http://localhost/COS30020/
```

Do not open `index.php` by double-clicking it or with a `file:///` URL. PHP only runs when the page is served by Apache.

### 4. Test the main flow

1. Open the home page.
2. Choose **Sign Up** and create an account.
3. Sign in using the same email and password.
4. Open **Activities**, choose an activity, and submit a registration.
5. Open **Account** to view or update the profile.

The web server must be allowed to write to `data/` and `profile_images/`. On a normal local XAMPP installation on Windows, the project inside `htdocs` is usually writable. If saving a user, registration, or profile image fails, check the folder permissions and confirm Apache has been restarted after any PHP configuration change.

## Configure PhpStorm

PhpStorm is used to edit the project; XAMPP Apache runs it.

1. In PhpStorm, select **File → Open** and choose the `COS30020` project folder inside `C:\xampp\htdocs`.
2. Go to **File → Settings → PHP**.
3. Next to **CLI Interpreter**, add a local interpreter and choose:

   ```text
   C:\xampp\php\php.exe
   ```

4. PhpStorm should show the detected PHP version. Click **Apply** and **OK**.
5. Use the browser URL below to test the website:

   ```text
   http://localhost/COS30020/
   ```

For optional URL mapping inside PhpStorm, add a server under **Settings → PHP → Servers** with host `localhost`, port `80`, and a project path mapped to `/COS30020`. This mapping helps with debugging, but it is not needed for normal editing and browser testing.

## Data files

| File | Purpose |
| --- | --- |
| `data/catalog.json` | Board-game catalogue content |
| `data/activities.json` | Activity details shown on the activities page |
| `data/community.json` | Community and showcase content |
| `data/User/user.txt` | Registered user records, separated with `|` |
| `data/activity_registrations.txt` | Activity registrations created while using the site |

The files under `data/` are part of the application. Keep their names and relative locations unchanged, because the PHP pages read them using relative paths.

## Troubleshooting

- **`localhost` does not open:** Start Apache in the XAMPP Control Panel. If its port is already in use, resolve the Apache port conflict in XAMPP first.
- **You see PHP source code or a download prompt:** Open the site through `http://localhost/COS30020/`, not from the file system.
- **Login does not work:** Create an account first, then use the same email and password. The account is saved in `data/User/user.txt`.
- **Registration or image upload cannot save:** Ensure `data/` and `profile_images/` are writable and that PHP uploads are enabled in XAMPP.
- **The layout looks unstyled:** Check your internet connection, because Bootstrap and Bootstrap Icons are loaded from CDN.

## Assignment notes

The project follows the assignment's required root-level PHP page structure, relative links, session handling, plain-text user storage, and JSON content files. The planned Assignment 2 features are documented on the About page.
