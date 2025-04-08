<?php

namespace Ascriver;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;
use FFI;

class DebugViewHandler extends AbstractProcessingHandler {
  private FFI $ffi;

  public function __construct($level = Level::Debug, bool $bubble = TRUE) {
    parent::__construct($level, $bubble);
    $this->ffi = FFI::cdef("void OutputDebugStringA(char *);", "Kernel32.dll");
  }

  protected function write(LogRecord $record): void {
    $this->ffi->OutputDebugStringA((string) $record->formatted);
  }
}
