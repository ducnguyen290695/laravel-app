Here’s a simple example of a PHP **CRUD API project** using **pure PHP** and **MySQL**. This version excludes any views (HTML) — it’s API-only.

---

### ✅ Stack

- PHP (no framework)
- MySQL
- RESTful JSON API

---

### 📁 Project Structure

```
php-crud-api/
├── config/
│   └── database.php
├── api/
│   ├── create.php
│   ├── read.php
│   ├── update.php
│   └── delete.php
├── .htaccess
└── index.php
```

---

### 1. `config/database.php`

```php
<?php
class Database {
    private $host = "localhost";
    private $db_name = "testdb";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                                  $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
```

---

### 2. Sample Table (MySQL)

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE
);
```

---

### 3. `index.php`

```php
<?php
$request = $_SERVER['REQUEST_URI'];

switch (true) {
    case preg_match('/\/api\/create/', $request):
        require __DIR__ . '/api/create.php';
        break;
    case preg_match('/\/api\/read/', $request):
        require __DIR__ . '/api/read.php';
        break;
    case preg_match('/\/api\/update/', $request):
        require __DIR__ . '/api/update.php';
        break;
    case preg_match('/\/api\/delete/', $request):
        require __DIR__ . '/api/delete.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(["message" => "Endpoint not found."]);
        break;
}
```

---

### 4. `api/create.php`

```php
<?php
header("Content-Type: application/json");
include_once __DIR__ . '/../config/database.php';

$data = json_decode(file_get_contents("php://input"));
if (!isset($data->name) || !isset($data->email)) {
    http_response_code(400);
    echo json_encode(["message" => "Missing fields."]);
    exit;
}

$db = (new Database())->getConnection();
$query = "INSERT INTO users SET name=:name, email=:email";
$stmt = $db->prepare($query);
$stmt->bindParam(":name", $data->name);
$stmt->bindParam(":email", $data->email);

if ($stmt->execute()) {
    echo json_encode(["message" => "User created."]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Failed to create user."]);
}
```

---

### 5. `api/read.php`

```php
<?php
header("Content-Type: application/json");
include_once __DIR__ . '/../config/database.php';

$db = (new Database())->getConnection();
$stmt = $db->prepare("SELECT * FROM users");
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($users);
```

---

### 6. `api/update.php`

```php
<?php
header("Content-Type: application/json");
include_once __DIR__ . '/../config/database.php';

$data = json_decode(file_get_contents("php://input"));
if (!isset($data->id) || !isset($data->name) || !isset($data->email)) {
    http_response_code(400);
    echo json_encode(["message" => "Missing fields."]);
    exit;
}

$db = (new Database())->getConnection();
$query = "UPDATE users SET name=:name, email=:email WHERE id=:id";
$stmt = $db->prepare($query);
$stmt->bindParam(":name", $data->name);
$stmt->bindParam(":email", $data->email);
$stmt->bindParam(":id", $data->id);

if ($stmt->execute()) {
    echo json_encode(["message" => "User updated."]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Failed to update user."]);
}
```

---

### 7. `api/delete.php`

```php
<?php
header("Content-Type: application/json");
include_once __DIR__ . '/../config/database.php';

$data = json_decode(file_get_contents("php://input"));
if (!isset($data->id)) {
    http_response_code(400);
    echo json_encode(["message" => "Missing ID."]);
    exit;
}

$db = (new Database())->getConnection();
$query = "DELETE FROM users WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(":id", $data->id);

if ($stmt->execute()) {
    echo json_encode(["message" => "User deleted."]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Failed to delete user."]);
}
```

---

### 8. Optional `.htaccess` (for Apache)

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]
```

---

### ✅ Example Requests (using `curl`)

```bash
# Create
curl -X POST http://localhost/api/create -d '{"name":"John","email":"john@example.com"}' -H "Content-Type: application/json"

# Read
curl http://localhost/api/read

# Update
curl -X PUT http://localhost/api/update -d '{"id":1,"name":"Johnny","email":"johnny@example.com"}' -H "Content-Type: application/json"

# Delete
curl -X DELETE http://localhost/api/delete -d '{"id":1}' -H "Content-Type: application/json"
```

---

## Start project

### **Start the server**

#### Option 1: Using built-in PHP server (fastest)

```bash
php -S localhost:8000 index.php
```

Then access the API via:

```
http://localhost:8000/api/read
```

#### Option 2: Using XAMPP / MAMP

- Place the `php-crud-api` folder inside:

  - `htdocs/` (for XAMPP)
  - `MAMP/htdocs/` (for MAMP)

- Then go to:
  `http://localhost/php-crud-api/api/read`

---
