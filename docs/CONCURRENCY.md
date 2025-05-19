### Comparison Table

| Feature                | Process (Default)                     | Fork                                   | Sync                                  |
|------------------------|---------------------------------------|----------------------------------------|---------------------------------------|
| **Execution Model**    | Parallel (subprocesses)              | Parallel (forked processes)           | Sequential (same process)            |
| **Performance**        | Moderate                             | High                                   | Low                                  |
| **Platform Support**   | Cross-platform (Windows, Unix)       | Unix-like only (no Windows)           | Cross-platform                      |
| **Requirements**       | None (uses Symfony Process)          | PCNTL extension, `spatie/fork`        | None                                |
| **Use Case**           | General concurrency                  | High-performance CLI tasks            | Testing, debugging, simple tasks     |
| **Overhead**           | Higher (process creation)            | Lower (shared memory, copy-on-write)  | None (no concurrency)               |
| **Debugging**          | Moderate complexity                  | More complex (forked processes)       | Simple (sequential execution)       |

### How to Configure Drivers
You can specify the driver in your Laravel application by setting the `concurrency` configuration or passing the driver explicitly when using the `Concurrency` facade. For example:

```php
use Illuminate\Support\Facades\Concurrency;

// Using the process driver (default)
Concurrency::run([
    fn() => doTask1(),
    fn() => doTask2(),
]);

// Using the fork driver
Concurrency::driver('fork')->run([
    fn() => doTask1(),
    fn() => doTask2(),
]);

// Using the sync driver
Concurrency::driver('sync')->run([
    fn() => doTask1(),
    fn() => doTask2(),
]);
```
