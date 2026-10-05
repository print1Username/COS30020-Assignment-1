# Boardgame Hub（中文版）

[English README](README.md)

Boardgame Hub 是一个适合初学者理解的 PHP 网站。它让用户浏览桌游、查看场地活动、注册活动，并浏览桌游社区内容。本项目为 COS30020 Web Application Development Assignment 1 制作。

## 从 GitHub Clone 项目

打开 PowerShell 或 Git Bash，并执行：

```bash
git clone https://github.com/print1Username/COS30020-Assignment-1.git
cd COS30020-Assignment-1
```

## 功能简介

- 按分类浏览桌游目录。
- 查看活动的日期、时间、价格、场地和桌号。
- 注册账号，并使用 PHP session 登录。
- 登录后报名活动；系统会阻止重复报名。
- 查看和更新个人资料，可上传头像。
- 浏览社区展示内容及其详情页。

## 使用技术

- PHP 8+（通过 XAMPP 的 Apache 运行）
- HTML5、CSS 和 JavaScript
- Bootstrap 5.3.8 与 Bootstrap Icons 1.11.3（CDN 加载）
- JSON 和纯文本文件储存资料；不需要数据库

页面样式依赖 Bootstrap CDN，因此建议保持网络连接。网站的 PHP 功能则在本机 Apache 上执行。

## 项目结构

```text
COS30020-Assignment-1/
├── index.php                    # 首页
├── main_menu.php                # 主菜单
├── catalog.php                  # 桌游目录
├── activities.php               # 活动列表
├── activity_reg.php             # 登录后活动报名
├── community.php                # 社区展示
├── community_detail.php         # 社区内容详情
├── registration.php             # 注册表单
├── process_registration.php     # 注册验证与保存
├── login.php                    # 登录与 session 建立
├── profile.php                  # 个人资料
├── update_profile.php           # 修改资料与头像上传
├── about.php                    # 项目与技术介绍
├── navbar.php                   # 共用、会判断登录状态的导航栏
├── components/                  # 可复用 JavaScript
├── style/                       # 各页面的 CSS
├── img/                         # 网站图片
├── profile_images/              # 用户上传的头像
└── data/                        # JSON 内容及执行时产生的文字资料
    ├── catalog.json
    ├── activities.json
    ├── community.json
    └── User/user.txt            # 已注册账号
```

用户报名活动后会产生 `data/activity_registrations.txt`；用户更新头像后，图片会保存到 `profile_images/`。

## 用 XAMPP 启动项目

### 1. 安装并启动 XAMPP

1. 安装包含 Apache 和 PHP 的 XAMPP。
2. 打开 XAMPP Control Panel。
3. 点击 **Apache** 的 **Start**；状态变绿表示已启动。

### 2. 把项目放入网站根目录

将本项目复制或移动到 XAMPP 的 `htdocs`，并把文件夹命名为 `COS30020`：

```text
C:\xampp\htdocs\COS30020
```

重点是：`index.php` 必须直接在 `COS30020` 文件夹里面，不能多包一层同名目录。

### 3. 在浏览器开启网站

在浏览器输入：

```text
http://localhost/COS30020/
```

不要双击 `index.php`，也不要使用 `file:///` 开启。PHP 必须经过 Apache 才会执行。

### 4. 建议测试流程

1. 打开首页。
2. 点击 **Sign Up** 注册账号。
3. 使用刚才的电邮和密码登录。
4. 开启 **Activities**，选择一项活动并报名。
5. 开启 **Account** 查看或更新个人资料。

Apache 必须可以写入 `data/` 和 `profile_images/`。在 Windows 的一般 XAMPP 安装中，`htdocs` 里的项目通常默认可写。若账号、报名资料或头像无法保存，请检查这两个文件夹的写入权限；修改 PHP 设置后也要重新启动 Apache。

## 配置 PhpStorm

PhpStorm 负责编辑代码，实际运行网站的是 XAMPP Apache。

1. 在 PhpStorm 选择 **File → Open**，打开 `C:\xampp\htdocs` 内的 `COS30020` 项目文件夹。
2. 前往 **File → Settings → PHP**。
3. 在 **CLI Interpreter** 旁新增本地解释器，并选择：

   ```text
   C:\xampp\php\php.exe
   ```

4. PhpStorm 会显示检测到的 PHP 版本；点击 **Apply** 和 **OK**。
5. 仍然通过以下网址测试网站：

   ```text
   http://localhost/COS30020/
   ```

如果需要在 PhpStorm 中设定网址映射，可在 **Settings → PHP → Servers** 新增服务器：主机为 `localhost`、端口为 `80`，将项目路径映射至 `/COS30020`。这对断点调试有帮助，但一般编辑和浏览器测试不是必须设置。

## 资料文件说明

| 文件 | 用途 |
| --- | --- |
| `data/catalog.json` | 桌游目录资料 |
| `data/activities.json` | 活动页面显示的活动资料 |
| `data/community.json` | 社区与展示内容 |
| `data/User/user.txt` | 已注册用户；字段以 `|` 分隔 |
| `data/activity_registrations.txt` | 网站运行时产生的活动报名记录 |

`data/` 下的文件是程序的一部分。不要随意改名或移动它们，因为 PHP 页面以相对路径读取这些文件。

## 常见问题

- **无法打开 `localhost`：** 在 XAMPP Control Panel 启动 Apache。若 Apache 无法启动，请先处理端口被占用的问题。
- **浏览器显示 PHP 原代码或要求下载：** 请用 `http://localhost/COS30020/` 开启，不要从文件系统直接打开。
- **无法登录：** 请先注册，再使用完全相同的电邮和密码登录；账号会保存到 `data/User/user.txt`。
- **报名或上传头像失败：** 确认 `data/` 和 `profile_images/` 可写入，并确认 XAMPP PHP 已启用上传功能。
- **网页没有样式：** 检查网络连接；Bootstrap 与 Bootstrap Icons 从 CDN 加载。

## 作业说明

项目遵循作业所要求的根目录 PHP 页面结构、相对链接、session 登录状态、纯文本用户资料，以及 JSON 内容文件。规划在 Assignment 2 完成的功能已记录在 About 页面。
