# Wareflow Inventory System

Created by John Paul Sacil

Wareflow Inventory System is a web-based inventory management application designed to help businesses track products, stock levels, buying prices, selling prices, and basic warehouse operations. The system is built with PHP, MySQL, and Bootstrap, and is intended to be simple, practical, and easy to maintain.

---

## Overview

This project allows users to:

- Manage products and stock quantities
- Track purchasing and selling prices
- Maintain inventory records for warehouse operations
- Handle user access for different roles
- Provide a simple web interface for daily inventory tasks

The application is suitable for small to medium-sized businesses that need a lightweight inventory solution without the complexity of large enterprise systems.

---

## Features

- Product management
- Stock quantity tracking
- Buying price and selling price tracking
- User authentication
- Role-based access
- Responsive UI using Bootstrap
- Database-backed records with MySQL

---

## Technology Stack

- PHP
- MySQL
- Bootstrap
- HTML / CSS / JavaScript
- Apache / XAMPP (recommended for local development)

---

## Requirements

Before installing the project, make sure the following are available on your machine:

- PHP 7.4 or newer
- MySQL
- Apache or XAMPP (optional)
- Docker Desktop or Docker Engine with Docker Compose
- A web browser

For Windows users, Docker Desktop or XAMPP are the easiest options for local development.

---

## Installation

### 1. Clone or download the project

```bash
git clone https://github.com/your-username/wareflow-inventory-system.git
```

### 2. Import/load oswa_inv.sql into your mysql database. This should set up the basic structure of the database system.

### 3. Modify the includes/config.php and change the variables to match your host, database, username and passwords.

### 4. Change all folder permissions inside the uploads folder; use the webserver group or `777` if needed.

### 5. Run locally with Docker Compose (recommended)

```bash
cd wareflow-inventory-system
docker compose up -d
```

Then open `http://localhost:8000` in your browser.

### 6. Login using one of the default demo accounts:

   Administrator        | Special User           | Default User
   ---------------------| -----------------------| -------------------
   **Username** : admin | **Username** : special | **Username** : user
   **Password** : admin | **Password** : special | **Password** : user

### 7. Good luck!

### 5. Then loging by typing **username** and **password**:


   Administrator        | Special User           | Default User
   ---------------------| -----------------------| -------------------
   **Username** : admin | **Username** : special | **Username** : user
   **Password** : admin | **Password** : special | **Password** : user

### 6. Good luck!  

---

## Deploying to Railway (recommended free host)

Railway is a good choice for hosting this PHP + MySQL app because it supports Docker and gives you a public URL.

### Steps to deploy

1. Sign up at https://railway.app/ and install the Railway CLI if you want.
2. Create a new project and choose **Deploy from GitHub** or connect your repository.
3. In Railway, add an environment with the following variables:
   - `DB_HOST` = `mysql` (or the service hostname given by Railway)
   - `DB_USER` = `root`
   - `DB_PASS` = `rootpass`
   - `DB_NAME` = `oswa_inv`
4. Railway can use `docker-compose.yml` directly. If it asks, point it at this repository and let it build the `web` and `db` services.
5. Add the SQL file `oswa_inv.sql` to the project (already present in this repo) so the database initializes correctly.
6. After deploy, Railway provides a live URL. Paste that URL into the `Live Demo` section below.

### Notes

- Railway's free tier is generally enough for a small demo project.
- If the database service hostname differs from `mysql`, update `DB_HOST` accordingly in Railway.
- The app already supports env-based database settings in `includes/config.php`.

---

### Contact and Demo

If you want to see a live demo, contact me and I can share the hosted version directly.

- **Contact:** [John Paul Sacil](https://www.facebook.com/jhaypee.sacil)

### GitHub Actions Docker deployment

This repo includes a workflow at `.github/workflows/docker-build-publish.yml` that builds the Docker image and pushes it to GitHub Container Registry whenever `master` is updated.

To enable it:

1. Go to your GitHub repository settings > Actions > General.
2. Allow GitHub Actions if it is disabled.
3. Make sure the repository has GitHub Packages/GHCR permissions enabled.

After the workflow runs, the Docker image will be available at:

- `ghcr.io/<your-github-username>/wareflow-inventory-system:latest`
- `ghcr.io/<your-github-username>/wareflow-inventory-system:<commit-sha>`

### Use the published image

If you want to deploy the published image elsewhere, update `docker-compose.yml` or your deployment platform to use:

```yaml
image: ghcr.io/<your-github-username>/wareflow-inventory-system:latest
```

Then provide the same environment variables from `docker-compose.yml`.

### Test account for demo

Use this test account to sign in and review the app functionality:

- **Username:** admintest
- **Password:** admin
