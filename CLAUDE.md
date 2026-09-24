# COS30020 Web Application Development — Assignment 1 Requirements
# COS30020 Web 应用开发 — Assignment 1 要求整理

> Source: Assignment 1 [Brief & Marking Scheme].pdf  
> Semester 2, 2026  
> Due: Week 6 | Worth: 35% of total marks  
> 截止：Week 6 | 占总成绩 35%

---

## 1. Overview / 概述

**EN:**  
This assignment is open-ended by design. Choose a real-world problem or an idea you are genuinely interested in and build a website that helps solve it. The technical requirements stay the same: registration, login, profile, an activity/booking feature, an about page, etc. You decide what business, service, or community the site is for.

**中文：**  
这个作业是开放式的。你需要选择一个真实世界的问题或你真正感兴趣的想法，并建立一个帮助解决该问题的网站。技术要求保持不变：注册、登录、个人资料、活动/预订功能、关于页面等。网站面向什么行业、服务或社区由你自己决定。

Your project must have / 你的项目必须有：

- **EN:** Something to browse or offer (products, services, listings, resources, etc.).
- **中文：** 可浏览或提供的内容，例如产品、服务、列表、资源等。
- **EN:** Something a user can book, register for, or schedule (a session, an event, a slot, an order, etc.).
- **中文：** 用户可预订、注册或预约的内容，例如场次、活动、时段、订单等。
- **EN:** A reason for users to create an account and log in.
- **中文：** 用户需要创建账号并登录的理由。
- **EN:** A way for users to contribute or share something, even simple, e.g. a review, a photo, a note.
- **中文：** 用户可贡献或分享内容的方式，即使很简单，例如评论、照片、笔记。

**EN:** If you are struggling to choose an idea, talk to your convenor before the end of Week 2.

**中文：** 如果难以确定主题，请在 Week 2 结束前联系课程协调员。

---

## 2. Assignment 1 Scope / Assignment 1 范围

**EN:**  
For this assignment, the system will allow users to register for an account, log in, update their own profile, and view their activity (orders/bookings and registrations). The rest of the functionality will be completed in Assignment 2.

**中文：**  
在这个作业中，系统需要允许用户注册账号、登录、更新自己的个人资料，并查看自己的活动记录（订单/预订和注册）。其余功能将在 Assignment 2 完成。

**Required technologies / 必需技术：**

- **EN:** HTML, CSS, PHP and a plain text file to store data.
- **中文：** HTML、CSS、PHP 和纯文本文件存储数据。
- **EN:** You may use other libraries/frameworks, e.g. Tailwind, styleX, TypeScript, Bootstrap.
- **中文：** 可以使用其他库/框架，例如 Tailwind、styleX、TypeScript、Bootstrap。
- **EN:** Save and test all HTML, CSS and PHP files in `xampp/htdocs/COS30020`.
- **中文：** 所有 HTML、CSS 和 PHP 文件保存并测试于 `xampp/htdocs/COS30020`。
- **EN:** Your data text file(s) should live in `xampp/htdocs/COS30020/data`.
- **中文：** 数据文本文件应放在 `xampp/htdocs/COS30020/data`。

**Video requirement / 视频要求：**

- **EN:** Create a short video, maximum 5 minutes, demonstrating your website's functionality.
- **中文：** 创建一个最多 5 分钟的短视频，演示网站功能。
- **EN:** Upload it to YouTube as unlisted and link it from your `about.php` page.
- **中文：** 上传到 YouTube，设为 unlisted，并在 `about.php` 页面提供链接。

---

## 3. Site Structure / 网站目录结构

```text
COS30020/
├── index.php
├── main_menu.php
├── catalog.php
├── activities.php
├── community.php
├── community_detail.php
├── profile.php
├── update_profile.php
├── registration.php
├── process_registration.php
├── activity_reg.php
├── login.php
├── about.php
├── style/              → all CSS files
├── img/                → all images
├── data/               → text file(s)
└── profile_images/     → default profile images, per Task 8
```

**Rules / 规则：**

- **EN:** PHP files should only be in the root `COS30020/` folder.
- **中文：** PHP 文件只能放在根目录 `COS30020/` 中。
- **EN:** All links, including links to data files, must be relative. Absolute links break when files are transferred for marking.
- **中文：** 所有链接，包括数据文件链接，必须使用相对路径。绝对路径在文件转移用于评分时会失效。
- **EN:** You may add additional PHP files and use Bootstrap or another front-end framework.
- **中文：** 可以添加额外 PHP 文件，并使用 Bootstrap 或其他前端框架。

> **Note / 注意：**  
> The PDF has a conflict: Task 10 says `xampp/data`, but the Site Structure says `COS30020/data`.  
> PDF 中存在冲突：Task 10 写 `xampp/data`，但 Site Structure 写 `COS30020/data`。  
> Recommended: follow the Site Structure and use `COS30020/data`.  
> 建议：遵循 Site Structure，使用 `COS30020/data`。

---

## 4. Tasks / 任务清单

### Task 1 — Home Page `index.php`
### Task 1 — 首页 `index.php`

**EN:** This page contains:
- A short introduction to your project, what problem it solves and who it is for.
- Photos related to your project, randomly displayed.
- Three buttons: link to the main menu page, log in, and register an account.
- Link to `about.php` from `index.php`.

**中文：** 此页面包含：
- 项目简短介绍：解决什么问题、面向谁。
- 与项目相关的照片，随机显示。
- 三个按钮：进入主菜单页、登录、注册账号。
- 从 `index.php` 链接到 `about.php`。

---

### Task 2 — Main Menu Page `main_menu.php`
### Task 2 — 主菜单页 `main_menu.php`

**EN:** Create a main menu with the following options. Rename them to fit your project:
- Catalogue / Services — an overview of what your project offers.
- Activity — details of a bookable activity, including date/time, price and venue.
- Community / Showcase — a page where users can view contributions from others. Upload feature added in Assignment 2.
- Smart Feature (Assignment 2) — a page reserved for a more advanced feature, e.g. an identification tool, a recommendation, a calculator, that outputs a result the user can use or download.

Use HTML cards to link to each option above.

**中文：** 创建主菜单，包含以下选项，可根据项目重命名：
- Catalogue / Services — 项目提供的服务/产品概览。
- Activity — 可预订活动的详细信息，包括日期/时间、价格和场地。
- Community / Showcase — 用户查看他人贡献的页面。上传功能在 Assignment 2 添加。
- Smart Feature (Assignment 2) — 为更高级功能预留的页面，例如识别工具、推荐、计算器，并输出用户可使用或下载的结果。

使用 HTML 卡片链接到以上每个选项。

**Requirements / 要求：**
- **Req-1 EN:** The main menu page should have a navigation bar, a home button, a logout button, and the 4 options above.
- **Req-1 中文：** 主菜单页应有导航栏、Home 按钮、Logout 按钮，以及上述 4 个选项。
- **Req-2 EN:** All links/buttons work as expected and use relative addressing. The logout button redirects to `index.php`.
- **Req-2 中文：** 所有链接/按钮正常工作并使用相对路径。Logout 按钮重定向到 `index.php`。
- **Req-3 EN:** Users can view this page, the catalogue page, and the activity page without logging in, but registering for an activity requires login. Redirect to main menu for login/registration.
- **Req-3 中文：** 用户无需登录即可查看此页面、目录页和活动页，但注册活动需要登录。未登录时重定向到主菜单进行登录/注册。

---

### Task 3 — Catalogue / Service Page `catalog.php`
### Task 3 — 目录/服务页 `catalog.php`

**EN:** Introduce what your project offers. Organise items into a minimum of 3 categories that make sense for your idea, with a minimum of 6 items shown per category.

**中文：** 介绍项目提供的内容。将项目组织为至少 3 个符合主题的分类，每个分类至少显示 6 个项目。

**Req-1 EN:** Buttons redirect users to a purchase/order page, built in Assignment 2.  
**Req-1 中文：** 按钮将用户重定向到购买/下单页，该页在 Assignment 2 构建。

---

### Task 4 — Activity Page `activities.php`
### Task 4 — 活动页 `activities.php`

**EN:** Display the bookable activities/events/sessions your project offers, including type, date & time, price and venue. Users register via this page, linking to the form in Task 11, after login.

**中文：** 显示项目提供的可预订活动/事件/场次，包括类型、日期和时间、价格和场地。用户通过此页面注册，登录后链接到 Task 11 的表单。

---

### Task 5 — Community / Showcase Page `community.php`
### Task 5 — 社区/展示页 `community.php`

**EN:** List the contributions currently stored for your project. The upload feature for users to add their own contribution is added in Assignment 2.

**中文：** 列出当前为项目存储的贡献内容。用户添加自己贡献的上传功能将在 Assignment 2 添加。

**Requirements / 要求：**
- **Req-1 EN:** The page displays a photo/video for each contribution.
- **Req-1 中文：** 页面为每个贡献显示照片/视频。
- **Req-2 EN:** Clicking a card opens the detail page, Task 6, with more information.
- **Req-2 中文：** 点击卡片打开详情页 Task 6，显示更多信息。

---

### Task 6 — Contribution Detail Page `community_detail.php`
### Task 6 — 贡献详情页 `community_detail.php`

**EN:** Displays the detailed information for a single contribution. Assume some sample data exists. Fields to display:
- Photo/video of the contribution
- Name of the contributor
- The activity/service the contribution relates to

**中文：** 显示单个贡献的详细信息。假设已有一些示例数据。需显示字段：
- 贡献的照片/视频
- 贡献者姓名
- 贡献相关的活动/服务

---

### Task 7 — Profile Page `profile.php`
### Task 7 — 个人资料页 `profile.php`

**EN:** Displays:
- A profile photo of yourself, your real photo.
- Your name.
- Your student ID.
- Your student email address.
- The standard academic integrity declaration, unchanged. See original wording provided separately.
- A link to the home page `index.php`.
- A link to the about page `about.php`.

**中文：** 显示：
- 你自己的个人照片，必须是真实照片。
- 你的姓名。
- 你的 Student ID。
- 你的学生邮箱地址。
- 标准 academic integrity declaration，必须保持不变，见单独提供的原文。
- 链接到首页 `index.php`。
- 链接到关于页 `about.php`。

---

### Task 8 — Update Profile Page `update_profile.php`
### Task 8 — 更新资料页 `update_profile.php`

**EN:** Let the user update their stored information.

**中文：** 允许用户更新已存储的信息。

**Requirements / 要求：**
- **Req-1 EN:** Displays the user's information currently stored in the text file.
- **Req-1 中文：** 显示文本文件中当前存储的用户信息。
- **Req-2 EN:** Displays a default profile image based on gender, provided on Canvas. Place under `profile_images`.
- **Req-2 中文：** 根据性别显示默认头像，头像由 Canvas 提供，放在 `profile_images` 下。
- **Req-3 EN:** The Update button saves changes to the text file. Cancel returns to the main menu.
- **Req-3 中文：** Update 按钮将更改保存到文本文件。Cancel 返回主菜单。
- **Req-4 EN:** Accessible from the main menu's "View Profile" button.
- **Req-4 中文：** 可从主菜单的 "View Profile" 按钮进入。

---

### Task 9 — Account Registration Page `registration.php`
### Task 9 — 账号注册页 `registration.php`

**EN:** A registration form with:
- First name & last name: text input
- Date of birth: date input
- Gender: default Female; options Male / Female
- Email: text input, **not** `type="email"`, not null
- Hometown: text input
- Password & confirm password: text input

**中文：** 注册表单包含：
- First name & last name：文本输入
- Date of birth：日期输入
- Gender：默认 Female；选项 Male / Female
- Email：文本输入，**不要用** `type="email"`，不能为空
- Hometown：文本输入
- Password & confirm password：文本输入

**Requirements / 要求：**
- **Req-2 EN:** The form is submitted using POST.
- **Req-2 中文：** 表单使用 POST 提交。
- **Req-3 EN:** All buttons function correctly.
- **Req-3 中文：** 所有按钮功能正常。

---

### Task 10 — Process Registration `process_registration.php`
### Task 10 — 处理注册 `process_registration.php`

**EN:** Validates and saves registration data, and responds with the appropriate HTML output.

**中文：** 验证并保存注册数据，并输出适当的 HTML。

**Requirements / 要求：**
- **Req-1a EN:** All fields are mandatory.
- **Req-1a 中文：** 所有字段必填。
- **Req-1b EN:** Names may only contain letters and spaces.
- **Req-1b 中文：** 姓名只能包含字母和空格。
- **Req-1c EN:** Email format is validated with PHP.
- **Req-1c 中文：** 使用 PHP 验证 Email 格式。
- **Req-1d EN:** Password must be at least 8 characters with 1 number and 1 symbol.
- **Req-1d 中文：** 密码至少 8 个字符，包含 1 个数字和 1 个符号。
- **Req-1e EN:** Confirm password must match password.
- **Req-1e 中文：** 确认密码必须与密码匹配。
- **Req-2 EN:** Do not save if any required field is missing; show a clear error message instead.
- **Req-2 中文：** 如果任何必填字段缺失，不要保存；显示清楚的错误信息。
- **Req-3 EN:** If it doesn't already exist, the script automatically creates a "User" directory inside `xampp/data` to store `user.txt`.
- **Req-3 中文：** 如果不存在，脚本自动在 `xampp/data` 内创建 "User" 目录来存储 `user.txt`。
- **Req-4 EN:** Each record is saved on a new line, fields separated by `|`.
- **Req-4 中文：** 每条记录保存为新的一行，字段用 `|` 分隔。

**Example format / 示例格式：**

```text
First Name: John|LastName: Doe|DOB:20-06-2000|Gender: Male|Email: john@gmail.com|Hometown:Kuching,Sarawak|Password:abc d123!
```

---

### Task 11 — Activity Registration Page `activity_reg.php`
### Task 11 — 活动注册页 `activity_reg.php`

**EN:** Lets a logged-in user register for an activity/booking. Fields:
- First name & last name: text input
- Contact number: text input
- Email: text input, **not** `type="email"`, not null
- Activity date and time: date/time input
- Activity title: text input

**中文：** 允许已登录用户注册活动/预订。字段：
- First name & last name：文本输入
- Contact number：文本输入
- Email：文本输入，**不要用** `type="email"`，不能为空
- Activity date and time：日期/时间输入
- Activity title：文本输入

**Req-2 EN:** Follows the same processing requirements as Task 10: validation, storage, uniqueness check, error handling.

**Req-2 中文：** 遵循与 Task 10 相同的处理要求：验证、存储、唯一性检查、错误处理。

---

### Task 12 — Login Page `login.php`
### Task 12 — 登录页 `login.php`

**EN:** A self-calling login page that validates credentials against the stored data.

**中文：** 一个自调用登录页，根据存储的数据验证凭据。

**Requirements / 要求：**
- **Req-1 EN:** Contains an email field `type="email"`, a password field, a Login button, and a Register link.
- **Req-1 中文：** 包含 email 字段 `type="email"`、password 字段、Login 按钮和 Register 链接。
- **Req-2 EN:** Shows a clear error message on incorrect credentials.
- **Req-2 中文：** 凭据错误时显示清楚的错误信息。
- **Req-3 EN:** On success, redirects to the main menu page.
- **Req-3 中文：** 成功后重定向到主菜单页。
- **Req-4 EN:** Linked from `index.php`; "Register" links to the registration page.
- **Req-4 中文：** 从 `index.php` 链接过来；"Register" 链接到注册页。

---

### Task 13 — About Page `about.php`
### Task 13 — 关于页 `about.php`

**EN:** A page presenting what you've done, answering in bullet points:
- What problem does your project solve, and why did you choose it?
- What is the PHP version used? Generate this with a PHP function.
- What tasks have you completed?
- What tasks, if any, have you not attempted or not completed?
- What frameworks/3rd-party libraries did you use, including version?
- Link to your video presentation demonstrating the site.
- A link back to the home page.
- Link this page from `index.php`.

**中文：** 一个展示你已完成内容的页面，用项目符号回答：
- 你的项目解决什么问题，为什么选择它？
- 使用的 PHP 版本是什么？用 PHP 函数生成。
- 你完成了哪些任务？
- 哪些任务没有尝试或没有完成？
- 使用了哪些框架/第三方库，包括版本？
- 链接到演示网站的视频。
- 返回首页的链接。
- 从 `index.php` 链接到此页面。

---

## 5. Access Control / 权限控制

**Public pages / 公开页面：**
- `index.php`
- `main_menu.php`
- `catalog.php`
- `activities.php`
- `community.php`
- `community_detail.php`
- `about.php`
- `login.php`
- `registration.php`

**Login required / 需要登录：**
- `profile.php`
- `update_profile.php`
- `activity_reg.php`

**Rules / 规则：**
- **EN:** Users can view main menu, catalogue, and activity pages without logging in.
- **中文：** 用户无需登录即可查看主菜单、目录和活动页面。
- **EN:** Registering for an activity requires login. If not logged in, redirect to main menu for login/registration.
- **中文：** 注册活动需要登录。如果未登录，重定向到主菜单进行登录/注册。
- **EN:** Logout redirects to `index.php`.
- **中文：** Logout 重定向到 `index.php`。

---

## 6. Do's and Don'ts / 注意事项与禁止事项

### Must do / 必须做

- **EN:** Use relative links for all pages, images, CSS and data files.
- **中文：** 所有页面、图片、CSS 和数据文件都必须使用相对链接。
- **EN:** Put PHP files only in the root `COS30020/` folder.
- **中文：** PHP 文件只能放在根目录 `COS30020/`。
- **EN:** Use POST for registration form.
- **中文：** 注册表单使用 POST。
- **EN:** Validate all required fields.
- **中文：** 验证所有必填字段。
- **EN:** Show clear error messages.
- **中文：** 显示清楚的错误信息。
- **EN:** Save data in plain text files with `|` separators.
- **中文：** 数据保存为纯文本文件，用 `|` 分隔。
- **EN:** Use session handling for login state.
- **中文：** 使用 session 管理登录状态。
- **EN:** Link the YouTube unlisted video from `about.php`.
- **中文：** 在 `about.php` 链接 YouTube unlisted 视频。
- **EN:** Include the academic integrity declaration in `profile.php`.
- **中文：** 在 `profile.php` 包含 academic integrity declaration。

### Must not do / 不能做

- **EN:** Do not put PHP files in subfolders.
- **中文：** 不要把 PHP 文件放在子文件夹。
- **EN:** Do not use absolute links, e.g. `http://localhost/...` or `C:\xampp\...`.
- **中文：** 不要使用绝对链接，例如 `http://localhost/...` 或 `C:\xampp\...`。
- **EN:** Do not use `type="email"` for the registration page or activity registration page email field. Only `login.php` uses `type="email"`.
- **中文：** 注册页和活动注册页的 Email 字段不要用 `type="email"`。只有 `login.php` 使用 `type="email"`。
- **EN:** Do not save invalid registration data.
- **中文：** 不要保存无效的注册数据。
- **EN:** Do not save duplicate activity registrations; Task 11 requires a uniqueness check.
- **中文：** 不要保存重复的活动注册；Task 11 要求唯一性检查。
- **EN:** Do not skip error handling.
- **中文：** 不要跳过错误处理。
- **EN:** Do not forget the PHP version, video link, and task completion notes in `about.php`.
- **中文：** 不要忘记在 `about.php` 写 PHP 版本、视频链接和任务完成情况。
- **EN:** Do not forget the academic integrity declaration.
- **中文：** 不要忘记 academic integrity declaration。
- **EN:** Do not use a database as the main storage; this assignment requires plain text files.
- **中文：** 不要用数据库作为主要存储；本作业要求纯文本文件。
- **EN:** Do not submit a website that cannot run. If it cannot run, the result may be 0 marks.
- **中文：** 不要提交无法运行的网站。如果无法运行，结果可能为 0 分。

---

## 7. Marking Scheme / 评分标准

**Overall Quality — 24 marks / 整体质量 — 24 分**

### UI/UX & Visual Design — 14 marks / UI/UX 与视觉设计 — 14 分

- **EN:** Interface goes beyond the sample screenshots/wireframes.
- **中文：** 界面超越示例截图/线框图。
- **EN:** CSS used consistently for colour and style with good contrast.
- **中文：** CSS 在颜色和风格上使用一致，对比度良好。
- **EN:** Layout is coherent, readable, and fits the chosen project's theme.
- **中文：** 布局连贯、可读，并符合所选项目主题。
- **EN:** Improved usability, navigation, feedback, error states.
- **中文：** 改进可用性、导航、反馈和错误状态。

### Coding Best Practices — 5 marks / 编码最佳实践 — 5 分

- **EN:** Clear, consistent naming for files, variables and functions.
- **中文：** 文件、变量和函数命名清楚一致。
- **EN:** Sensible code organisation and comments where useful.
- **中文：** 代码组织合理，有必要注释。
- **EN:** Basic input sanitisation/escaping; no obviously insecure code.
- **中文：** 基本输入清理/转义；没有明显不安全代码。
- **EN:** No dead code, duplicated logic minimised (DRY).
- **中文：** 无死代码，尽量减少重复逻辑（DRY）。

### Innovation & Enhancements — 5 marks / 创新与增强 — 5 分

- **EN:** Extra effort/initiative demonstrated beyond the brief.
- **中文：** 展示超出任务要求的额外努力/主动性。
- **EN:** Use of ideas, features or technology not covered in lectures, e.g. TS, JS validation, APIs, session handling, responsive/mobile-first design, accessibility features.
- **中文：** 使用课堂未覆盖的想法、功能或技术，例如 TS、JS 验证、API、session 处理、响应式/移动优先设计、无障碍功能。
- **EN:** Thoughtful extra functionality that genuinely fits the student's chosen problem.
- **中文：** 有思考的额外功能，真正符合学生所选问题。

**Total: 80 marks / 总分：80 分**

**Notes / 注意：**
- **EN:** Full marks for a task will not be awarded if there are errors, or if usability isn't considered properly.
- **中文：** 如果任务有错误，或没有妥善考虑可用性，不会给满分。
- **EN:** If your assignment cannot be properly tested, or cannot run, your result will be 0 marks for this assignment.
- **中文：** 如果你的作业无法被正确测试，或无法运行，本作业结果为 0 分。

---

## 8. Submission / 提交

- **EN:** Submit your assignment individually on Canvas.
- **中文：** 在 Canvas 上单独提交作业。
- **EN:** Zip all source code files.
- **中文：** 将所有源代码文件打包为 zip。
- **EN:** You may submit more than once before the due date; the latest submission overwrites the previous one.
- **中文：** 在截止日期前可以多次提交；最新提交会覆盖之前的提交。
- **EN:** Test your website before submission.
- **中文：** 提交前测试网站。
- **EN:** Full marks for a task will not be awarded if there are errors, or if usability isn't considered properly.
- **中文：** 如果任务有错误，或没有妥善考虑可用性，不会给满分。
- **EN:** If your assignment cannot run, your result will be 0 marks.
- **中文：** 如果作业无法运行，结果为 0 分。

---

## 9. Suggested Development Order / 建议开发顺序

1. **EN:** Create folders: `COS30020/`, `style/`, `img/`, `data/`, `profile_images/`.
   **中文：** 创建目录：`COS30020/`、`style/`、`img/`、`data/`、`profile_images/`。
2. **EN:** Build `index.php`, `registration.php`, `process_registration.php`.
   **中文：** 完成 `index.php`、`registration.php`、`process_registration.php`。
3. **EN:** Build `login.php`, session handling, `main_menu.php`, logout.
   **中文：** 完成 `login.php`、session 处理、`main_menu.php`、logout。
4. **EN:** Build `profile.php`, `update_profile.php`.
   **中文：** 完成 `profile.php`、`update_profile.php`。
5. **EN:** Build `catalog.php`, `activities.php`.
   **中文：** 完成 `catalog.php`、`activities.php`。
6. **EN:** Build `community.php`, `community_detail.php`.
   **中文：** 完成 `community.php`、`community_detail.php`。
7. **EN:** Build `activity_reg.php`.
   **中文：** 完成 `activity_reg.php`。
8. **EN:** Build `about.php` with PHP version and video link.
   **中文：** 完成 `about.php`，加入 PHP 版本和视频链接。
9. **EN:** Test all links, form validation, login access, data writing.
   **中文：** 测试所有链接、表单验证、登录权限、数据写入。
10. **EN:** Record a video ≤ 5 minutes, upload to YouTube as unlisted, link in `about.php`.
    **中文：** 录制 ≤ 5 分钟视频，上传 YouTube 设为 unlisted，在 `about.php` 链接。
11. **EN:** Zip and submit on Canvas.
    **中文：** 打包 zip 并在 Canvas 提交。

---

## 10. Final Checklist / 最终检查清单

- [ ] **EN:** All 13 PHP pages completed.  
      **中文：** 13 个 PHP 页面全部完成。
- [ ] **EN:** Registration, login, update profile, activity registration work.  
      **中文：** 注册、登录、更新资料、活动注册能正常运行。
- [ ] **EN:** Data is stored in plain text files using `|` separators.  
      **中文：** 数据存储在纯文本文件中，使用 `|` 分隔。
- [ ] **EN:** All links use relative paths.  
      **中文：** 所有链接使用相对路径。
- [ ] **EN:** Public pages and login-required pages have correct access control.  
      **中文：** 公开页面和需登录页面的权限正确。
- [ ] **EN:** Form validation is complete and error messages are clear.  
      **中文：** 表单验证完整，错误信息清楚。
- [ ] **EN:** `about.php` includes PHP version, video link, and task notes.  
      **中文：** `about.php` 包含 PHP 版本、视频链接和任务说明。
- [ ] **EN:** `profile.php` includes your real photo and the academic integrity declaration.  
      **中文：** `profile.php` 包含真实照片和 academic integrity declaration。
- [ ] **EN:** Video is ≤ 5 minutes and uploaded to YouTube as unlisted.  
      **中文：** 视频 ≤ 5 分钟，上传 YouTube 并设为 unlisted。
- [ ] **EN:** Website tested locally with no errors before zipping.  
      **中文：** 打包前本地测试网站无错误。