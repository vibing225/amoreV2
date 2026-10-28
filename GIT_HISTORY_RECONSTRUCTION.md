# Reconstructing Amore Mio's Git history

This project currently has no Git repository. Use this guide with a coding assistant to start tracking it and, if the original work dates are known, create a small number of commits that accurately represent that work.

## Important

- A push is not a contribution by itself. GitHub counts eligible commits, and several commits can be sent in one push.
- It is possible to set dates on commits when reconstructing history. Use dates only when they reflect when the corresponding work was actually done. Do not invent dates or spread one day's work across other days just to color the chart.
- For contributions to appear, the commits generally need to use an email address verified on your GitHub account and be on the repository's default branch. GitHub can take a little time to update the chart.
- A new Git repository can track the current files, but it cannot recover earlier file versions that were never saved in Git. The `CHANGES.md` file describes project milestones, but it does not prove the exact dates those milestones happened.

## Give this task to your coding assistant

> Initialize Git in the project root and prepare a reviewable commit history for the existing Amore Mio project.
>
> 1. First inspect the full project tree, `.gitignore`, `.env.example`, and `CHANGES.md`. Confirm there is no existing `.git` directory. Do not change application code or the website.
> 2. Protect private/runtime files. Never stage `.env`, `vendor/`, `composer.phar`, `composer-setup.php`, SQLite files, logs, sessions, or credentials. Verify the ignore rules before staging. Do not print secret values.
> 3. Use `CHANGES.md` to propose a concise sequence of meaningful commits matching real project milestones, such as project structure, page/layout work, forms and database, and hardening. Do not make empty, cosmetic, or artificially fragmented commits. Show the proposed commit list and the files in each group before creating commits.
> 4. Ask me for the actual date (and time zone) of each milestone if it is not already known. Do not infer exact dates from the order of `CHANGES.md`, file timestamps, or the current date. If I cannot provide reliable dates, create commits with the current date instead.
> 5. Ask me which verified GitHub email and author name to use if they are not configured. Do not guess them. Do not put credentials or tokens in Git configuration or files.
> 6. Only after I approve the proposed groups and dates, run `git init` in the project root and create the commits in chronological order. Set both Git author and committer dates to the approved date for each commit. Keep commit messages factual and concise.
> 7. Before every commit, show what is staged and verify that no ignored/private files are included. Afterward, show `git log` with the commit dates and `git status`.
> 8. Do not create a GitHub repository, add a remote, authenticate, or push anything unless I explicitly ask. If I ask to publish it, explain how to create the GitHub repository and confirm its URL and default branch before pushing.
>
> If an existing `.git` directory is found, stop and inspect it rather than initializing or overwriting anything.

## Date syntax for PowerShell

For a commit whose actual work date and time have been confirmed, Git accepts ISO 8601 dates. For example:

```powershell
$env:GIT_AUTHOR_DATE = '2025-11-15T14:00:00-05:00'
$env:GIT_COMMITTER_DATE = $env:GIT_AUTHOR_DATE
git commit -m "Add the shared page layout"
Remove-Item Env:GIT_AUTHOR_DATE
Remove-Item Env:GIT_COMMITTER_DATE
```

Replace the example with the real date, time, and UTC offset. The assistant should set these variables separately for each approved commit and clear them afterward. Setting a date does not make an otherwise ineligible commit count: the GitHub account email and branch requirements still apply.

## Publishing after review

Once the commits look right, create an empty repository on GitHub (do not have GitHub add a README or license if the local project already has them). Then add that repository as `origin`, push the intended branch, and make it the default branch on GitHub if needed. Review the GitHub contribution rules if the commits do not appear.
