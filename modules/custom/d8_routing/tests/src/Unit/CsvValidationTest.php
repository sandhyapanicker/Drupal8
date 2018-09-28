<?php
namespace Drupal\d8_routing\Tests\Unit;
use \Drupal\Tests\UnitTestCase;
class csvValidationTest extends UnitTestCase {
	public function test_File_validation() {
		$file = $this->getMock(FileInterface::class);
		$file->method('getFileName')
		->willReturn('Dipak.csv');
		
		$this->assertContains(
				'Upload correct file',
				d8_routing_validate_csv($file)
				);
		
	}
}

