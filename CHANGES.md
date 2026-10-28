# CHANGES

One entry per rewrite: what was wrong, what was done, why it is better.

## Step 2 - Image optimization
**Problem.** `images/` weighed about 31 MB. Photos were up to 6000 px wide for spots that show them a few hundred pixels wide. Some files (HEIC, CR2, PDF) cannot be shown by a browser, others were unused. The code asked for `crepes.jpg` and `parfuncitron.jpg` but the files were `crepes.JPG` and `parfuncitron.JPG`: Windows and Mac ignore capital letters, Linux hosting does not, so those images would not load online.
**Fix.** The 6 big photos were resized (1600 px max) and saved as WebP. `crepes` and `parfuncitron` are now lowercase `.webp` files. Nine unused files left the project (kept in a separate backup zip). The favicon pointed to `cone.jpg` while the file is `CONE.jpg`: fixed (owner approved).
**Why better.** Images went from about 31 MB to 0.7 MB, pages load faster, and every file name matches exactly so it also works on Linux.

## Steps 3 and 4 - Project structure, layout and pages
**Problem.** Every page started with the same `require`, `include header`, `include footer` boilerplate. Page addresses ended in `.php`, files sat loose in one folder, and PHP code was mixed with HTML everywhere.
**Fix.**
- New structure: `public/` (only folder the web server shows), `src/` (PHP classes), `views/` (HTML), `config/`, `storage/` (database and logs, never web-accessible).
- `header.php` + `footer.php` became one `views/layout.php`. Each page is now a view that holds only its own HTML.
- One entry point, `public/index.php`, with a small router. Addresses are now `/`, `/produits`, `/points-de-vente`, `/devenir-glacier`, `/contact`, `/fidelite`. Old `.php` addresses redirect to the new ones.
- Secrets and settings moved to `.env` (loaded by Composer package `vlucas/phpdotenv`). `config/app.php` holds the non-secret settings.
- The flat copy of PHPMailer in `vendor/` was removed: Composer installs it (`composer.json`).
- Active menu link no longer uses `basename($_SERVER['PHP_SELF'])`; the router tells the layout which page is open.
- Footer phone, email and address come from one place (`config/app.php` / `.env`), same text as before.
- The shop list of the contact page moved from the page to `config/locations.php`.
- Pages now have a meta description (invisible, helps search engines). Page titles are unchanged.
**Why better.** One place for the layout means a menu change is made once. Clean addresses are easier to read and share. Only `public/` is reachable from the internet, so secrets, database and code cannot be downloaded.

## Loyalty card (owner decision: keep the public page, drop the backend)
**Problem.** `process_fidelite.php` queued emails like the other forms, and depended on the missing email config.
**Fix.** `process_fidelite.php`, its session handling and the "fidelite" email colour are gone. The page, menu links and footer link stay, with the same HTML. The form posts to `/fidelite`, which saves nothing, sends nothing and just reloads the page.
**Why better.** No dead code behind a form. When the owner decides how the card works, a real handler can be added in `src/Controllers/FideliteController.php`.

## Step 5 and 6 - Forms (contact and devenir partenaire) and database
**Problem.**
- Emails were written as JSON files in `queue/`, and a script called its own site with a hardcoded secret to send them. The secret was also readable in the page source, and the browser script that was supposed to trigger it sent a different value, so it never worked.
- `send-email.php` was a second, unused copy of the contact handler.
- The forms crashed because `config/email_config.php` is missing.
- No CSRF token, honeypot or rate limit. Input was cleaned with `strip_tags` and `htmlspecialchars` before being used, which damages text (for example `&`) and escapes it twice.
- Nothing was saved: if an email failed, the visitor's message was lost.
- The partner form had three application types, but the handler ignored them and demanded a `motivation` field that does not exist.
**Fix.**
- Removed: the queue, `queue_processor.php`, the hardcoded token, the self-calling `file_get_contents`, `send-email.php`, the footer queue script.
- Each form now: checks a CSRF token, a hidden honeypot field and a rate limit (8 tries per 10 minutes per visitor), validates every field on the server, **saves to SQLite first** (`contact_messages`, `franchise_applications`, each with `created_at`, `status`, `email_sent`, `email_error`), then sends the emails with PHPMailer **after** the visitor has been redirected, so nobody waits for the mail server. A failure is written to `storage/logs/app.log` and to the row, never lost.
- Input is stored as typed and escaped only when displayed.
- The partner form validates the fields of the chosen type (franchise, partenaire B2B, matières premières) and stores the type-specific answers as JSON in `details`. Allowed select values are listed in `config/forms.php`.
- All queries use prepared statements. Success and error messages keep their original French text and place.
**Why better.** No lead is lost, no secret in the code, no fake queue, and forms resist spam and cross-site attacks.

## Step 8 - Production hardening
- `display_errors` off, errors written to `storage/logs/php-error.log`, visitors see a friendly error page.
- Security headers (`nosniff`, `X-Frame-Options`, `Referrer-Policy`, `Permissions-Policy`, HSTS on https).
- HTTPS redirect, switched on with `FORCE_HTTPS=true` in `.env` once https works.
- Custom 404 page, `robots.txt`, `.htaccess` (single entry point, no directory listing, hidden files blocked, browser caching for static files).
- Sessions are stored in `storage/sessions`, cookies are `HttpOnly`, `SameSite=Lax`, and `Secure` on https.
- `.gitignore` rewritten: the old one ignored every `*.md` file, so this file would never have been committed.
- Not added on purpose: a Content-Security-Policy header, because the Tailwind CDN script needs unsafe rules that would make it useless.

## Front-end changes (HTML output)
- Asset links now start with `/assets/...` (files moved into `public/assets/`), page links use the new clean addresses.
- Lucide icons are pinned to version 0.525.0 instead of `@latest`. **Visible effect:** the live site loads Lucide v1, which removed the Facebook, Instagram and Twitter icons, so the three social circles are empty today. With the pinned version the icons appear in them.
- `points-de-vente`: removed an inline script placed after `</html>`. It always failed on its first line (`lucide` not loaded yet) and duplicated the footer's menu code, so behaviour is the same. Duplicate closing `</body></html>` tags removed with it.

## Found, not changed (needs owner's decision)
- **`devenir-glacier` page script:** the inline script at the bottom starts with `lucide.createIcons();` before Lucide is loaded, so it stops at line 1. The code that shows the fields of each application type never runs, so the franchise, partenaire and matières fields stay hidden today. Fixing it changes behaviour (the form would start working as designed), so it is left as it was.
- `produits` loads `products.js` twice (page and footer); the second load logs an error in the browser console and has no visible effect.
