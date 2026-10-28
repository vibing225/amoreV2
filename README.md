# Amore Mio website

Artisan ice cream shop, Conakry. Plain PHP 8.1+, SQLite, PHPMailer.

- `public/` contains the browser-facing entry point and assets.
- `src/` contains PHP classes; `views/` contains page templates.
- `config/` contains application settings; `storage/` contains the database, logs, and sessions.
- `.env` contains local settings and secrets; never commit it.

## Run locally with XAMPP

The project folder should be `C:\xampp\htdocs\amore-mio-v2.0`. The root `.htaccess` forwards requests into `public/`, so the project opens at:

`http://localhost/amore-mio-v2.0/`

1. In the XAMPP Control Panel, start **Apache**. MySQL is not used.
2. Select **Apache > Config > PHP (php.ini)** in the Control Panel to open the PHP configuration Apache uses. Confirm PHP is 8.1 or newer and these extensions are enabled (remove a leading `;` if present): `pdo_sqlite`, `mbstring`, and `openssl`. Restart Apache after editing. The app uses PDO's SQLite driver, not MySQL.
3. Ensure `mod_rewrite` is enabled in Apache's `httpd.conf` and that `.htaccess` overrides are allowed for `C:\xampp\htdocs` (the setting is `AllowOverride All`). Restart Apache after changing Apache configuration.
4. Install dependencies from this project folder if needed:

   ```powershell
   cd C:\xampp\htdocs\amore-mio-v2.0
   C:\xampp\php\php.exe composer.phar install
   ```

5. The supplied `.env` is configured for this folder URL with `APP_DEBUG=true` and `FORCE_HTTPS=false`. SMTP can remain unconfigured while browsing. Submitted form data is saved in `storage/amore.sqlite`; mail is only sent when SMTP settings are configured.
6. Visit `http://localhost/amore-mio-v2.0/`.

The app's base path is set to `/amore-mio-v2.0` in `.env`. If you rename or move the project folder, update both `APP_BASE_PATH` and `APP_URL` to match. Do not use the project parent URL as a replacement for Apache's web root configuration in production: production should serve `public/` directly.

## Built-in PHP server

For development without Apache, run from the project folder:

```powershell
php -S localhost:8000 -t public public/index.php
```

Set `APP_BASE_PATH=` and `APP_URL=http://localhost:8000` in `.env` when using this command, since it serves the site at the domain root. Restore the XAMPP values above when switching back.

Deployment notes: see [DEPLOYMENT.md](DEPLOYMENT.md). Rewrite history: see [CHANGES.md](CHANGES.md).
