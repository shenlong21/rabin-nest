# Rabin's Nest

A small PHP + MySQL social networking site built as a college project. Think of it as a mini Facebook clone: users can sign up, log in, add friends, send messages, and edit a personal profile.

> **⚠️ Archived**: This repository is no longer maintained. It was a learning project from college and is kept here for reference/nostalgia only. Please don't use it in production — see [Notes](#notes) below.

## Features

- User sign up / login / logout (`signup.php`, `login.php`, `logout.php`)
- Member directory (`members.php`)
- Friends list (`friends.php`)
- Private messaging (`messages.php`)
- Editable profile with bio and photo (`profile.php`)
- UI built with [Materialize CSS](https://materializecss.com/) and jQuery

## Tech stack

- PHP (procedural, `mysqli`)
- MySQL / MariaDB
- Materialize CSS + jQuery (loaded via CDN/local files)

## Getting started

1. Set up a MySQL/MariaDB server and create a database (e.g. `rabinNest`).
2. Update the DB credentials in `functions.php` (`$dbhost`, `$dbname`, `$dbuser`, `$dbpass`).
3. Import `rabinsnest.sql` or run `setup.php` once to create the required tables (`members`, `messages`, `friends`, `profiles`).
4. Serve the project with PHP (e.g. `php -S localhost:8000`) or a local Apache/XAMPP stack, pointing the document root at this folder.
5. Visit `index.php` in your browser.

## Notes

- This was written early on while learning PHP, so passwords and inputs are not handled with modern security practices (e.g. no password hashing, minimal input validation). Do not deploy this as-is or reuse this code for anything handling real user data.
- Kept public as a snapshot of an early project.
