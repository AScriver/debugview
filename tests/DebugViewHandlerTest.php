<?php
use PHPUnit\Framework\TestCase;
use Ascriver\DebugViewHandler;
use Monolog\Level;
use Monolog\LogRecord;
use FFI;

class DebugViewHandlerTest extends TestCase {
  public function testConstructor() {
    $handler = new DebugViewHandler(Level::Debug, TRUE);
    $this->assertInstanceOf(DebugViewHandler::class, $handler);
  }

  public function testWrite() {
    $handler = new DebugViewHandler(Level::Debug, TRUE);
    $record = new LogRecord(
      datetime: new \DateTimeImmutable(),
      channel: 'test',
      level: Level::Debug,
      message: 'Test message',
      context: [],
      extra: []
    );

    // Mock FFI
    $ffiMock = $this->createMock(FFI::class);
    $ffiMock->method('OutputDebugStringA')->with('Test message');

    // Use reflection to set the private $ffi property
    $reflection = new \ReflectionClass($handler);
    $ffiProperty = $reflection->getProperty('ffi');
    $ffiProperty->setAccessible(TRUE);
    $ffiProperty->setValue($handler, $ffiMock);

    $handler->handle($record);
  }
}
