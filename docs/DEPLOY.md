## ✅ Prerequisites

- A production server (VPS like DigitalOcean, AWS EC2, etc.)
- SSH access to the server
- PHP (Laravel requires PHP 8.1+)
- Composer
- Web server: Nginx or Apache
- MySQL/PostgreSQL
- Laravel application ready in Git or local files

---

## 🚀 Deployment Steps

### 1. **Upload Laravel Project**

**Option A: Clone via Git**

```bash
cd /var/www
git clone https://github.com/your-username/your-laravel-app.git
cd your-laravel-app
```

**Option B: Upload via SFTP/FTP or SCP**

---

### 2. **Set File Permissions**

```bash
sudo chown -R www-data:www-data .
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
```

---

### 3. **Install Dependencies**

Make sure Composer is installed. Then run:

```bash
composer install --optimize-autoloader --no-dev
```

---

### 4. **Configure Environment**

Copy `.env.example` to `.env` and update the settings:

```bash
cp .env.example .env
nano .env
```

Set the correct:

- `APP_ENV=production`
- `APP_KEY`
- `DB_*` credentials

Then:

```bash
php artisan key:generate
```

---

### 5. **Set Up Web Server**

#### **Option A: Nginx**

Create a new site configuration (e.g., `/etc/nginx/sites-available/laravel`):

```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/your-laravel-app/public;

    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

Enable the site:

```bash
ln -s /etc/nginx/sites-available/laravel /etc/nginx/sites-enabled/
nginx -t
systemctl reload nginx
```

#### **Option B: Apache**

Update the virtual host:

```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    DocumentRoot /var/www/your-laravel-app/public

    <Directory /var/www/your-laravel-app>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Then enable mod_rewrite and restart Apache:

```bash
a2enmod rewrite
systemctl restart apache2
```

---

### 6. **Set Up Database**

Create a database and user, and update `.env`. Then run:

```bash
php artisan migrate --force
```

If you have seeders:

```bash
php artisan db:seed --force
```

---

### 7. **Set Laravel to Production Mode**

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

### 8. **Set Up Scheduler and Queue (Optional)**

#### Scheduler (cron)

Edit crontab:

```bash
crontab -e
```

Add:

```bash
* * * * * cd /var/www/your-laravel-app && php artisan schedule:run >> /dev/null 2>&1
```

#### Queue Worker (Supervisor or systemd)

---

## 🧪 Testing

- Visit your domain or IP: `http://yourdomain.com`
- Check logs in `storage/logs/` if any issues arise

---
