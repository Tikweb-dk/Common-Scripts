<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__.'/getDateFormat.php';

class DateTest extends TestCase{

	public $data;

	protected function setUp(): void {

		$this->data = array(
			'01/01/2019'	=> 'd/m/Y',
			'13/01/2019'	=> 'd/m/Y',
			'2019/01/01'	=> 'Y/m/d',
			'2019/03/21'	=> 'Y/m/d',
			'2019-03-21 20:10:00'	=> 'Y-m-d H:i:s',
			'2019-03-21 20:59'	=> 'Y-m-d H:i',
			'laksjdflkasjdf'	=> false,
			'120912018'			=> false,
      'ab/cd/ef 12:00' => false,
      'a-b-c-d-e-f' => false,
		);

	}

	public function testDateFormat(){
		
		foreach( $this->data as $key => $value ){

			$this->assertSame(
				getDateFormat($key), $value
			);

		}
	}

}
