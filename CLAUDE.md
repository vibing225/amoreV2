# Amore Mio: restructure project (instructions for the AI)

## 1. Goal
Amore Mio is an artisan ice cream shop in Conakry, Guinea. The website works but the PHP behind it is badly structured. Your job: **rebuild the backend cleanly in structuredPHP, andkeep the front-end look exactly as it is.**

Success = the site looks pixel-identical to today, but the code behind it is clean, secure, organized and light enough for hosting.

## 2. Non-negotiable: the layout is frozen
The client already approved the current design. Never change how pages look.
- Do NOT change rules in `styles.css`, the Tailwind config (inline in `includes/header.php`), HTML structure, class names, colors, fonts, spacing, images used or text content, unless the owner asks.
- Moving files or splitting header/footer into a layout is fine, as long as the rendered HTML stays the same.
- Reference screenshots are in `Screen/` (mobile only, from the live site). Compare against them after each step.

## 3. You may rewrite bad code: but you must tell the owner
The owner wrote this a long time ago and knew little about project structure. You have permission to **rewrite any backend code that is badly written, insecure, duplicated, or not optimized**. Do not preserve bad patterns just because they exist.

The rule that goes with it: **every time you rewrite something, tell the owner**, in plain language:
1. What was wrong (the problem)
2. What you did instead (the fix)
3. Why it is better

Keep a running log in `CHANGES.md` (one entry per rewrite) and summarise it at the end of each step. The owner is learning, so explain simply and do not assume he already knows the concept.

Front-end JS (`script.js`, `products.js`) may be cleaned up too, but only if the rendered result and behavior stay identical. Say so when you do.

## 4. Decisions already made
- **Stack:** structured plain PHP (no Laravel), Composer for packages (PHPMailer, a `.env` loader).
- **Hosting:** AlwaysData free plan (the only deployment the owner knows). Limit: **100 MB disk**. SSH is off by default and must be enabled in the AlwaysData panel. Keep the project light. Do not suggest paid plans or other hosts without asking.
- **Loyalty card feature is DROPPED.** Delete `fidelite.php`, `process_fidelite.php` and every link or mention of it (navigation, footer, home page).
- **Database:** SQLite file in `storage/` (outside `public/`), accessed with PDO and prepared statements. MySQL later only if the owner asks.
- Site language is **French**. Keep all visible text as is. Write code and comments in English. Talk to the owner in English unless he writes in French.

## 5. Target structure
```
public/        index.php (single entry point), assets/ (css, js, images)
src/           Controllers/, Mailer, Validator, Database
views/         layout.php (header + footer), pages/, emails/
config/        settings read from .env
storage/       logs and the SQLite file (never web-accessible)
.env           SMTP + owner email (NEVER committed)
.env.example   same keys, empty values (committed)
composer.json
.gitignore     .env, vendor/, storage/*.sqlite, storage/logs
```
Keep the same public URLs where possible (`/`, `/produits`, `/points-de-vente`, `/devenir-glacier`, `/contact`). If old `.php` URLs must keep working, add redirects.

## 6. Work order (stop and report after each step)
1. **Read everything first.** List all files, what each does, and what is broken or missing. Do not change anything yet. Report to the owner.
2. **Image optimization.** `images/` is about 44 MB and contains HEIC, CR2 and PDF files that browsers cannot display. Check which images the site really uses, convert those to WebP (resized sensibly), remove the rest from the deployed project. Target: a few MB total. Keep visuals identical.
3. **Project skeleton.** Create the structure above, Composer, `.env` loading, `.gitignore`.
4. **Layout and pages.** Turn `header.php` and `footer.php` into one `layout.php`; each page becomes a view with the same HTML. Add the router in `public/index.php`.
5. **Forms: contact and devenir glacier.** For each: server-side validation, CSRF token, honeypot field, simple rate limit, escape all output, save to SQLite, send email with PHPMailer. Show success/error messages exactly where the current design shows them. Remove: the JSON email queue, `queue_processor.php`, the hardcoded token, the self-calling `file_get_contents`, and `send-email.php` (legacy duplicate). If sending is slow, do it directly and handle failures: never block or lose a submission.
6. **Tables:** `contact_messages` and `franchise_applications`, with created-at timestamps and a status column. Save first, send email second, so no lead is lost if email fails.
7. **Visual check.** Compare every page with `Screen/` at mobile, tablet and desktop widths (use Playwright for screenshots if available). Fix differences until identical.
8. **Production hardening:** `display_errors` off, errors logged to `storage/logs`, HTTPS redirect, security headers, `robots.txt`, a custom 404 page, page titles and meta descriptions.
9. **Deployment notes** for AlwaysData: enable SSH, set PHP version, set the site's document root to `public/`, upload, `composer install --no-dev --optimize-autoloader`, set `.env`, check disk usage.

## 7. Known problems in the old code (remove all of them)
- Email queue as JSON files in `queue/`, triggered by a script that calls its own site with a hardcoded token, also visible in `footer.php`.
- `send-email.php` duplicates the other form handlers.
- `config.php` mixes site constants with SMTP settings; `display_errors` is on.
- `includes/email_queue.php` requires `config/email_config.php`, which is **missing**. `OWNER_EMAIL` is probably defined there. Do not guess: ask the owner for the owner email.
- PHPMailer and `vendor/` are missing from the repo.
- Tailwind loads from the CDN and Lucide from unpkg `@latest`. For now keep Tailwind exactly as is. Pin Lucide to a fixed version. Compiling Tailwind locally is optional, only with the owner's approval and only if screenshots still match.

## 8. Ask the owner before you
- Change anything visible (text, image, color, spacing).
- Add a dependency or paid service.
- Delete anything other than the files listed in this document.
- Guess missing information: real phone number (current `+224 123 456 789` looks fake), social links (currently `#`), owner email, SMTP credentials.

## 9. Security rules
- Never commit passwords or API keys. Real SMTP credentials live only in `.env`.
- Prepared statements for every query. Escape all output (`htmlspecialchars`). Validate and sanitize all input. Use `random_int`, never `rand`, for anything that must be unpredictable.
- Uploaded or stored data must never live inside `public/`.

## 10. Definition of done
- All pages look identical to the originals.
- Forms validate, save to the database and send the email; failures are logged, not silent.
- No leftover queue, token, legacy handler or loyalty feature.
- Total project size is comfortably under 100 MB.
- `CHANGES.md` lists every rewrite with problem, fix and reason.
- The owner can deploy it on AlwaysData by following the notes from step 9.
