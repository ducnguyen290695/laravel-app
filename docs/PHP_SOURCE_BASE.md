## ✅ Grouping by Archetype (by role/type)

```bash
my-app/
├── bin/                            # Command-line scripts or executables
│   └── console                     # Entry point for CLI commands
├── config/                         # Configuration files
│   ├── app.php                     # App-level config (e.g., env, debug)
│   └── database.php                # Database connection settings
├── public/                         # Public web root (for web server)
│   └── index.php                   # Entry point for web requests
├── resources/                      # Static resources or raw view templates
│   └── views/                      # View files organized by feature
│       ├── cart.php                # HTML for cart UI
│       ├── product.php             # HTML for product UI
│       └── user.php                # HTML for user UI
├── src/                            # All PHP source code
│   ├── Controller/                 # Request handlers (MVC Controllers)
│   │   ├── CartController.php      # Handles cart-related HTTP requests
│   │   ├── ProductController.php   # Handles product-related HTTP requests
│   │   └── UserController.php      # Handles user-related HTTP requests
│   ├── Model/                      # Domain entities or data models
│   │   ├── Cart.php                # Represents a shopping cart
│   │   ├── Product.php             # Represents a product item
│   │   └── User.php                # Represents a user
│   ├── Repository/                 # Data persistence layer
│   │   ├── CartRepository.php      # CRUD for cart data
│   │   ├── ProductRepository.php   # CRUD for product data
│   │   └── UserRepository.php      # CRUD for user data
│   └── Service/                    # Business logic and use cases
│       ├── CartService.php         # Handles cart logic (add/remove)
│       ├── ProductService.php      # Handles product logic
│       └── UserService.php         # Handles user logic
├── templates/                      # General layout templates
│   └── layout.php                  # Base HTML layout
├── tests/                          # Unit and integration tests
│   ├── CartTest.php                # Test suite for cart feature
│   ├── ProductTest.php             # Test suite for product feature
│   └── UserTest.php                # Test suite for user feature
├── composer.json                   # Composer dependency and autoload config
└── README.md                       # Project documentation
```

---

## ✅ Grouping by Feature (modular structure)

```bash
my-app/
├── bin/
│   └── console                     # CLI entry point
├── config/
│   ├── app.php                     # App settings
│   └── database.php                # Database config
├── public/
│   └── index.php                   # Main web entry point
├── resources/
│   └── views/                      # Shared or raw view files
├── src/                            # All source code, grouped by feature
│   ├── Cart/
│   │   ├── Cart.php                # Cart domain model
│   │   ├── CartController.php      # Handles cart HTTP requests
│   │   ├── CartRepository.php      # Data access for cart
│   │   └── CartService.php         # Cart business logic
│   ├── Product/
│   │   ├── Product.php             # Product model
│   │   ├── ProductController.php   # Product request handling
│   │   ├── ProductRepository.php   # Product persistence logic
│   │   └── ProductService.php      # Product business rules
│   └── User/
│       ├── User.php                # User model
│       ├── UserController.php      # Handles user-related requests
│       ├── UserRepository.php      # User data access
│       └── UserService.php         # User services (auth, profile, etc.)
├── templates/
│   └── layout.php                  # Layout file used across views
├── tests/
│   ├── Cart/
│   │   └── CartTest.php            # Cart tests
│   ├── Product/
│   │   └── ProductTest.php         # Product tests
│   └── User/
│       └── UserTest.php            # User tests
├── composer.json                   # Autoloading and dependencies
└── README.md                       # Description and usage of the project
```

---

## ✅ Separate Domain and General-Purpose Code (clean architecture)

```bash
my-app/
├── bin/
│   └── console                     # CLI script
├── config/
│   ├── app.php                     # Application-level settings
│   └── database.php                # DB connection and config
├── public/
│   └── index.php                   # Web server entry file
├── resources/
│   └── views/                      # View or UI-related resources
├── src/                            # All source code
│   ├── Domain/                     # Core business logic
│   │   ├── Cart/
│   │   │   ├── Cart.php            # Domain model
│   │   │   ├── CartRepository.php  # Domain persistence abstraction
│   │   │   └── CartService.php     # Cart-specific logic
│   │   ├── Product/
│   │   │   ├── Product.php         # Product model
│   │   │   ├── ProductRepository.php # DB logic
│   │   │   └── ProductService.php  # Product business logic
│   │   └── User/
│   │       ├── User.php            # User model
│   │       ├── UserRepository.php  # Persistence logic
│   │       └── UserService.php     # User-related services
│   ├── Http/                       # Web controllers (framework-specific)
│   │   ├── CartController.php      # Handles HTTP routes for cart
│   │   ├── ProductController.php   # Handles HTTP routes for products
│   │   └── UserController.php      # User-related HTTP routes
│   ├── CLI/                        # CLI command handlers
│   │   ├── CreateUserCommand.php   # Adds a new user via CLI
│   │   └── SyncInventoryCommand.php# Syncs product stock
│   ├── Logger/
│   │   └── CustomLogger.php        # Custom logger (could use Monolog)
│   ├── Cache/
│   │   └── CacheAdapter.php        # Abstracts cache system (e.g., Redis)
│   └── Shared/
│       ├── DTO/                    # Data Transfer Objects
│       │   └── UserDTO.php         # Structure for transporting user data
│       └── Utils.php               # Generic helper functions
├── templates/
│   └── layout.php                  # HTML layout template
├── tests/
│   ├── Domain/
│   │   ├── CartTest.php            # Unit tests for cart
│   │   ├── ProductTest.php         # Unit tests for product
│   │   └── UserTest.php            # Unit tests for user
│   ├── LoggerTest.php              # Tests for custom logger
│   └── CacheTest.php               # Tests for cache adapter
├── composer.json                   # Autoload and dependencies config
└── README.md                       # Documentation and project info
```

## ✅ Laravel Source Tree (with Module Descriptions)

```bash
laravel-app/
├── app/                            # Core application logic
│   ├── Console/                    # Artisan commands
│   ├── Exceptions/                 # Custom exception handlers
│   ├── Http/                       # Handles HTTP layer
│   │   ├── Controllers/            # API or web controllers
│   │   ├── Middleware/             # Middleware logic
│   │   ├── Resources/              # (Optional) Custom response formatting (e.g. JSON resources)
│   │   └── Requests/               # Form request validation classes
│   ├── Models/                     # Eloquent ORM models
│   ├── Services/                   # Business logic layer, used by controllers
│   ├── Repositories/               # (Optional) Data access layer for interacting with DB
│   └── Traits/                     # Reusable code via PHP traits (e.g. HasUuid)
│
├── bootstrap/                      # Bootstraps Laravel app
│   ├── app.php                     # Framework bootstrap file
│   └── cache/                      # Cached config, routes, etc.
│
├── config/                         # Application configuration files
│   ├── app.php                     # App-specific settings
│   ├── database.php                # DB connection settings
│   ├── cache.php                   # Caching settings
│   ├── auth.php                    # Authentication settings
│   └── ...                         # Other configs (queue, mail, etc.)
│
├── database/                       # Database version control
│   ├── factories/                  # Test data factories
│   ├── migrations/                 # DB schema migration scripts
│   └── seeders/                    # Seed data scripts
│
├── public/                         # Publicly accessible entry point
│   └── index.php                   # Entry point for HTTP requests
│
├── routes/                         # Route definitions
│   ├── api.php                     # API routes
│   ├── web.php                     # Optional (if some web routes exist)
│   ├── console.php                 # Artisan command routes
│   └── channels.php                # Broadcasting channel routes
│
├── storage/                        # Runtime-generated files
│   ├── app/                        # Application file storage
│   ├── framework/                  # Caches, views, sessions
│   └── logs/                       # Log files
│
├── tests/                          # PHPUnit test cases
│   ├── Feature/                    # High-level application tests
│   └── Unit/                       # Unit tests for classes/functions
│
├── vendor/                         # Composer dependencies
│
├── .env                            # Environment-specific variables
├── .env.example                    # Template for env setup
├── artisan                         # Artisan CLI entry script
├── composer.json                   # PHP package manifest
└── README.md                       # Project instructions and info
```

---

## `app/` – Core Application Logic

Houses the core classes of your application, like controllers, models, and services.

- ### `Console/`

  Contains **custom Artisan commands** (`php artisan make:command`).

- ### `Exceptions/`

  Defines **custom exception handling**, mainly the `Handler.php` to control error responses.

- ### `Http/` – Web Layer

  Handles the **HTTP request/response lifecycle**.

  - #### `Controllers/`

    Where you define **logic for handling routes**, both API and web.

  - #### `Middleware/`

    Filters HTTP requests (e.g., **auth, CORS**, etc.).

  - #### `Resources/` _(optional)_

    For **transforming models into JSON responses**, used mostly in APIs (`JsonResource`).

  - #### `Requests/`

    **Form validation logic** encapsulated in request classes (`php artisan make:request`).

- ### `Models/`

  Contains **Eloquent ORM models** which interact with DB tables.

- ### `Services/` _(custom, optional)_

  A **business logic layer**, used to keep controllers clean.

- ### `Repositories/` _(optional)_

  For **abstracting database queries**, used in larger applications for better separation of concerns.

- ### `Traits/`

  **Reusable pieces of code** using PHP traits (e.g., `HasUuid`, `LogsActivity`).

---

## `bootstrap/` – App Bootstrapping

Initializes and loads the Laravel framework.

- ### `app.php`

  **Main bootstrapping script**, called first when Laravel runs.

- ### `cache/`

  Stores **cached routes, configs, and services**, improves performance.

---

## `config/` – Configuration Files

Contains all **Laravel config files** (env-independent).

- ### `app.php`, `auth.php`, `database.php`, `cache.php`, ...

  Store configuration for various services like:

  - Application name, timezone
  - Authentication guards
  - DB connections
  - Mail, queue, session, and broadcasting

---

## `database/` – Database Layer

Contains files for managing DB structure and data.

- ### `factories/`

  **Blueprints for generating test data**, used in testing and seeding.

- ### `migrations/`

  **Schema version control** for database structure (`php artisan migrate`).

- ### `seeders/`

  Scripts for **populating initial data** (`php artisan db:seed`).

---

## `public/` – Entry Point for Web

This is the **web root**, exposed to the outside world (like Apache/Nginx points here).

- ### `index.php`

  **Main HTTP entry point**, bootstraps the Laravel application and handles requests.

---

## `routes/` – Routing Definitions

Defines how HTTP requests are handled.

- ### `api.php`

  Routes for **API endpoints** (usually `api.example.com` or `/api` prefix).

- ### `web.php`

  Routes for **web UI**, including blade templates, sessions, CSRF.

- ### `console.php`

  Register **custom Artisan commands**.

- ### `channels.php`

  Define **broadcasting channels** for WebSockets.

---

## `storage/` – Application Storage

Stores files generated at runtime.

- ### `app/`

  **User-uploaded files** or internal app files.

- ### `framework/`

  **Compiled views, sessions, and cache files**.

- ### `logs/`

  **Application logs**, typically `laravel.log`.

---

## `tests/` – Automated Tests

Contains test classes for **unit and feature testing** (PHPUnit by default).

- ### `Feature/`

  **High-level tests** that test routes, controllers, services together.

- ### `Unit/`

  **Isolated tests** for models, helpers, classes.

---

## `vendor/` – Composer Dependencies

Managed by **Composer**, contains all **third-party packages** and Laravel itself.

---

## Other Root Files

- ### `.env`

  **Environment-specific settings** (DB credentials, keys, etc.).

- ### `.env.example`

  **Template for `.env`**, shared in version control.

- ### `artisan`

  CLI tool to run **Laravel commands** (e.g., `php artisan serve`, `migrate`, etc.).

- ### `composer.json`

  Lists **PHP dependencies**, autoloading, and scripts.

- ### `README.md`

  Documentation for the project—setup steps, usage, authors, etc.

---

## ✅ Clean Code Architecture in Laravel: A Practical Guide

## What is Clean Code Architecture?

Clean code architecture is a way of organizing your application into _loosely coupled layers_, each with a distinct responsibility. It isn't tied to any specific language or framework. Instead, it promotes:

- Clear separation between business logic, UI, and data access
- High testability and low maintenance cost
- Flexibility to swap implementations without breaking core logic

---

## Why Clean Code Matters

Clean code goes beyond aesthetics—it directly impacts your development experience and your application’s health:

- **Easier Debugging**: Clear structure makes bugs easier to trace.
- **Better Scalability**: Adding new features becomes less risky.
- **Improved Team Collaboration**: Code is easier for teammates (or future-you) to understand.
- **Long-Term Efficiency**: Reduces technical debt and boosts productivity over time.

Laravel encourages rapid development—but with that speed comes the temptation to cut corners. Clean architecture helps balance speed with sustainability.

---

## Core Principles

Here are key ideas that underpin clean architecture:

- **Separation of Concerns**: Keep each layer focused on a single responsibility. Avoid mixing data access with UI or business logic.
- **Dependency Inversion**: Rely on abstractions (interfaces), not concrete implementations.
- **Single Responsibility Principle**: Each class or method should do one thing only, and do it well.

---

## Applying Clean Architecture in Laravel

### Entities and Use Cases

**Entities** represent your core domain objects (e.g., `Post`, `User`).

**Use cases** (or interactors) encapsulate the business rules around these entities (e.g., create, update, delete).

```php
// app/Domain/Post/Post.php
class Post {
    private $title;
    private $content;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }

    // Getters and domain logic
}
```

```php
// app/Services/Post/CreatePostService.php
class CreatePostService {
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function execute(array $data): void {
        $post = new Post($data['title'], $data['content']);
        $this->postRepository->save($post);
    }
}
```

**Note**: You can decouple further by avoiding Eloquent models as your domain entities. Instead, use value objects to represent entities independently of the database.

---

### Repositories and Interfaces

Repositories handle data access. By defining interfaces, your services stay agnostic of the storage layer.

```php
// app/Repositories/PostRepositoryInterface.php
interface PostRepositoryInterface {
    public function save(Post $post): void;
    public function findById($id): ?Post;
}
```

```php
// app/Repositories/EloquentPostRepository.php
class EloquentPostRepository implements PostRepositoryInterface {
    public function save(Post $post): void {
        // Map domain object to Eloquent and save
    }

    public function findById($id): ?Post {
        // Fetch data using Eloquent
    }
}
```

---

### Controllers and Dependency Injection

Controllers should be _thin_—only handling HTTP concerns and delegating logic to services.

```php
// app/Http/Controllers/PostController.php
class PostController extends Controller {
    private $createPostService;

    public function __construct(CreatePostService $createPostService) {
        $this->createPostService = $createPostService;
    }

    public function store(Request $request): JsonResponse {
        $this->createPostService->execute($request->only(['title', 'content']));
        return response()->json(['message' => 'Post created!']);
    }
}
```

---

### Services and Business Logic

Services contain all business rules, decoupled from HTTP and storage layers. This improves reusability and testability.

```php
// app/Services/Post/CreatePostService.php
class CreatePostService {
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function execute(array $data): void {
        $post = new Post($data['title'], $data['content']);
        $this->postRepository->save($post);
    }
}
```

---

## Real-World Example: A Simple Blog

Here’s how to organize a basic blog system:

- **Entities**: `Post`, `User` (domain layer)
- **Repositories**: `PostRepositoryInterface`, implemented by `EloquentPostRepository`
- **Services**: `CreatePostService`, `DeletePostService`, etc.
- **Controllers**: Handle requests and invoke services

This separation means you could easily swap Eloquent for another ORM—or even a NoSQL solution—without touching your business logic.

---

## Best Practices

- ✅ **Keep controllers slim**—delegate logic to services.
- ✅ **Use dependency injection** to keep components decoupled.
- ✅ **Write unit tests** around use cases and services.
- ✅ **Separate concerns**: domain logic, data access, and HTTP should live in distinct layers.

---

## ✅ Distinction between the **three architecture styles**:

---

### 🧱 1. **Grouping by Archetype (by role/type)**

> **Focus:** Organize code by technical role (Controller, Model, Service, etc.)

#### 🔧 Structure Highlights:

- `src/Controller`, `src/Model`, `src/Service`, etc. are separate directories.
- Files of the **same role but different features** are grouped together.
- Follows classic MVC-style layering.

#### ✅ Pros:

- Familiar to many developers.
- Easy to locate code by function/role.

#### ❌ Cons:

- Features are scattered across folders.
- Harder to isolate or remove a feature.
- Can become messy as app scales.

#### 📌 Use when:

- Team is small and prefers conventional MVC.
- The app is not expected to grow too complex.

---

### 🧩 2. **Grouping by Feature (modular structure)**

> **Focus:** Organize code by **business feature** (Cart, Product, User), each feature has its own model, controller, service, etc.

#### 🔧 Structure Highlights:

- `src/Cart/`, `src/Product/`, etc. — each has its full stack: model, controller, service.
- Test code mirrors the feature structure.

#### ✅ Pros:

- High cohesion, low coupling.
- Easy to scale and refactor.
- Great for **cross-functional teams** (e.g., frontend/backend per feature).

#### ❌ Cons:

- Might introduce duplication across modules.
- Not as obvious where shared services go (e.g., shared helpers).

#### 📌 Use when:

- You want **modular** design.
- Project is large or expected to grow.
- Multiple teams work on different features.

---

### 🧼 3. **Clean Architecture (Domain vs. Infrastructure)**

> **Focus:** **Separate domain logic** from delivery mechanisms and infrastructure.

#### 🔧 Structure Highlights:

- `src/Domain/` holds pure business logic.
- `src/Http/` and `src/CLI/` are delivery mechanisms.
- `src/Shared/`, `src/Cache/`, etc. are infrastructure or cross-cutting concerns.

#### ✅ Pros:

- Testable, maintainable, and **framework-agnostic**.
- Domain logic is protected from infrastructure changes.
- Encourages SOLID principles and separation of concerns.

#### ❌ Cons:

- More complex folder structure.
- Higher initial learning curve and boilerplate.

#### 📌 Use when:

- You are building a **long-lived, large-scale system**.
- Business rules are complex and need to be preserved independently from the UI/DB/etc.

---

### Summary Table

| Criteria                   | Group by Archetype | Group by Feature  | Clean Architecture           |
| -------------------------- | ------------------ | ----------------- | ---------------------------- |
| **Organization**           | By technical role  | By feature/module | By domain vs. infrastructure |
| **Scalability**            | ❌ Limited         | ✅ Moderate-High  | ✅✅ Very High               |
| **Testability**            | ⚠️ Basic           | ✅ Good           | ✅✅ Excellent               |
| **Separation of Concerns** | ⚠️ Low             | ✅ Medium         | ✅✅ Strong                  |
| **Learning Curve**         | ✅ Low             | ✅ Medium         | ❌ High                      |

---
