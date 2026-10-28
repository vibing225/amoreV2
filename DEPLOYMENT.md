# Deploying Amore Mio on AlwaysData (free plan, 100 MB)

Menu names in the AlwaysData panel can change slightly; the ideas stay the same.

## 1. Prepare the account
1. **Enable SSH:** in the panel go to *Remote access > SSH* and enable it for your user. Set a password.
2. **PHP version:** *Web > Sites*, edit your site, pick PHP 8.1 or newer (8.2 or 8.3 is fine).

## 2. Upload the project
1. Upload the whole project folder to your home directory (for example `~/amore-mio`), **not** inside `www/`. Use SFTP (FileZilla) or `scp`.
2. Do not upload `vendor/` (Composer creates it) or any `.sqlite` file.

## 3. Point the site to `public/`
In *Web > Sites*, edit the site and set the **root directory** to the `public` folder, for example `/amore-mio/public`. Only that folder is then reachable from the internet.

## 4. Install the packages
```
ssh YOUR_ACCOUNT@ssh-YOUR_ACCOUNT.alwaysdata.net
cd ~/amore-mio
composer install --no-dev --optimize-autoloader
```
If `composer` is not found, ask AlwaysData support or download it from getcomposer.org.

## 5. Configure `.env`
```
cp .env.example .env
nano .env
```
Fill in at least:
- `APP_URL=https://YOUR_SITE.alwaysdata.net` (or your domain, no trailing slash)
- `OWNER_EMAIL` - where messages arrive (today: temporary address)
- `SMTP_HOST`, `SMTP_PORT`, `SMTP_ENCRYPTION`, `SMTP_USERNAME`, `SMTP_PASSWORD`
  - With Gmail: host `smtp.gmail.com`, port 587, `tls`, and an **app password** (Google account > Security > 2-step verification > App passwords), not the normal password.
  - Or use an AlwaysData mailbox and its SMTP details.
- `FORCE_HTTPS=true` once `https://` opens your site correctly.

Keep `APP_DEBUG=false` on the server.

## 6. Folder rights
`storage/`, `storage/logs/` and `storage/sessions/` must be writable by your user (they are by default). The SQLite database `storage/amore.sqlite` is created automatically on the first form submission.

## 7. Test
1. Open each page: `/`, `/produits`, `/points-de-vente`, `/devenir-glacier`, `/fidelite`, `/contact`, and a wrong address (404 page).
2. Send one contact message and one partner application.
3. Check the data: `sqlite3 storage/amore.sqlite "SELECT id, name, email_sent, email_error, created_at FROM contact_messages;"`
4. If an email did not arrive, read `storage/logs/app.log`: the message is saved anyway and the reason is written there.

## 8. Check disk usage
```
du -sh ~/amore-mio
du -sh ~
```
The project is about 1 MB; `vendor/` adds a few MB. The limit is 100 MB.

## Updating later
Upload the changed files, run `composer install --no-dev --optimize-autoloader` again if `composer.json` changed. Never overwrite `.env` or `storage/amore.sqlite`.
