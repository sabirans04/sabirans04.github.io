<h1 align="center">Personal Portfolio Website</h1>

<p align="center">
  <img src="preview.png" alt="Site preview" width="600px">
</p>

<p align="center">
  <a href="https://developer.mozilla.org/en-US/docs/Web/HTML"><img src="https://img.shields.io/badge/HTML-5-orange?logo=html5" alt="HTML"></a>
  <a href="https://developer.mozilla.org/en-US/docs/Web/CSS"><img src="https://img.shields.io/badge/CSS-3-blue?logo=css" alt="CSS"></a>
  <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript"><img src="https://img.shields.io/badge/JavaScript-ES6-yellow?logo=javascript" alt="JavaScript"></a>
  <a href="https://www.php.net/"><img src="https://img.shields.io/badge/PHP-%3E%3D7-777BB4?logo=php" alt="PHP"></a>
</p>

## 🌐 My Open Source Portfolio

A modern and responsive developer portfolio built with clean design and optimized performance.
Showcases projects, skills, and achievements in a professional layout with smooth animations and SEO-friendly structure.

### ✨ Features
- Fully responsive and mobile-friendly design
- SEO optimized structure
- Dynamic project section
- Fast loading and performance-focused
- Easy to customize for any developer

### 🛠️ Tech Stack
HTML • CSS • JavaScript • PHP

## Prerequisites

- A modern web browser
- (Optional, for contact form) PHP 7+ and an SMTP account if you want to use the built-in PHP contact handler

If you only need to preview the static site without the contact form, no server-side runtime is required.

## Deployment / Local Preview

1. Fork this repository

1. Clone the repository:

```powershell
git clone https://github.com/username/YourName.git
```
2. Goto the directory

```powershell
cd YourName
```

3. Install dependencies

```powershell
composer Install
```
Then open your-domain.com in your browser.

## Configuration & Customization

Where to change content:

- Site text & structure: `index.html`
- Styles: `assets/css/style.css`
- Scripts: `assets/js/script.js` and `assets/js/contact.js`
- Images: `assets/img/` (projects, avatars, favicons, etc.)
- Contact backend: `include/mail.php`
- SMTP credentials: `include/config/smtp.php`

Tips:

- Update your name, bio, and social links directly inside `index.html`.
- Replace project images in `assets/img/project/` and update their references in `index.html`.
- For design tweaks, edit `assets/css/style.css` or add new CSS files and link them in `index.html`.

Contact form configuration:

1. Open `include/config/smtp.php` and set your SMTP provider credentials (host, port, username, password, encryption).
2. Ensure `include/mail.php` matches the field names used in the contact form in `index.html`.
3. When testing locally, run a PHP server (see above) or deploy to a host that supports PHP.

Security note: Do not commit real credentials to a public repository. Use environment variables or a private config during production deployments.

## File Structure

```
./
├── assets/                    # Static assets directory
│   ├── css/
│   │   └── style.css         # Main stylesheet
│   ├── img/                  # Image assets
│   │   ├── avatars/         # Profile/user avatars
│   │   ├── clients/         # Client logos/images
│   │   ├── favicon/         # Site favicon files
│   │   │   └── site.webmanifest
│   │   ├── icon/           # UI/UX icons
│   │   ├── project/        # Project screenshots/images
│   │   └── static/         # Static site images
│   └── js/                  # JavaScript files
│       ├── contact.js       # Contact form handler
│       └── script.js        # Main site scripts
├── include/                  # PHP includes
│   ├── config/              # Configuration files
│   │   └── smtp.php         # SMTP settings
│   └── mail.php             # Mail handling logic
├── .htaccess                # Apache configuration
├── composer.json            # PHP dependencies
├── index.html              # Main entry point
├── LICENSE                 # Project license
├── README.md              # Project documentation
└── robots.txt             # Search engine directives
```
## Troubleshooting

- Contact form not sending: Ensure the host supports PHP and SMTP settings in `include/config/smtp.php` are correct. Check server logs and test credentials separately.
- Styles or scripts not loading: Verify the `assets/` paths in `index.html` are correct and relative paths match your hosting setup.
- Images not showing: Confirm image filenames and paths under `assets/img/`.

## Contributing

Contributors are welcome. For small edits (typos, content), open a pull request. For larger features, open an issue first to discuss.

When contributing, please:

1. Fork the repo
2. Create a feature branch
3. Make changes and commit with clear messages
4. Open a pull request describing the change


## License

This project is provided under the terms in the `LICENSE` file in this repository. Please check it before using code in your projects.

## Thanks
Thank you for using this portfolio template. Customize it, make it yours, and let it showcase your work!


