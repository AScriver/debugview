# DebugView

DebugView is a custom Monolog handler that sends log messages to the Windows DebugView utility using the `OutputDebugStringA` function from the Windows API.

## Features

- Integrates with [Monolog](https://github.com/Seldaek/monolog) for logging.
- Sends log messages directly to DebugView for real-time debugging on Windows systems.
- Lightweight and easy to use.

## Installation

To install the package, use Composer:

```bash
composer require ascriver/debugview
```

## Usage

Here is an example of how to use the `DebugViewHandler` in your project:

```php
use Monolog\Logger;
use Ascriver\DebugViewHandler;

// Create a logger instance
$logger = new Logger('debug');

// Add the DebugViewHandler
$logger->pushHandler(new DebugViewHandler());

// Log a message
$logger->debug('This is a debug message');
```

## Requirements

- PHP 8.1 or higher
- Windows operating system (required for OutputDebugStringA)

## Development

### Running Tests

This project uses PHPUnit for testing. To run the tests, first install the dependencies:

```bash
composer install
```

Then, run the tests:

```bash
vendor/bin/phpunit
```

### Project Structure

- `src/`: Contains the main source code, including the `DebugViewHandler` class.
- `tests/`: Contains unit tests for the project.
- `composer.json`: Defines the project dependencies and autoloading configuration.

### Testing Notes

The `DebugViewHandlerTest` includes a test for the `write` method, which uses PHP's `FFI` to mock the `OutputDebugStringA` function. Reflection is used to inject the mock into the handler.

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bugfix.
3. Write tests for your changes.
4. Submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
