<?php 

require_once './src/DetectLang.php';

use PHPUnit\Framework\TestCase;
use DetectLang\DetectLang;

final class Test extends TestCase
{
    public function testClassCanBeInitiated(): void
    {
        $this->assertInstanceOf(
            DetectLang::class,
            new DetectLang()
        );
    }

    public function testLanguageRetrieval(): void
    {
    	$detectlang = new DetectLang();
		$detectlang->set_text('This is a sample text');

        $this->assertArrayHasKey(
            'en', $detectlang->get_language()
        );
    }

    public function testPunctuations(): void
    {
    	$detectlang = new DetectLang();
		$detectlang->set_text('This. !is "a" sample text');

        $this->assertArrayHasKey(
            'en', $detectlang->get_language()
        );
    }

    public function testMultipleLanguageRetrievals()
    {
    	$detectlang = new DetectLang();
		$detectlang->set_text('මේක is a sample text');

        $this->assertArrayHasKey(
            'en', $detectlang->get_scores()
        );

        $this->assertArrayHasKey(
            'si', $detectlang->get_scores()
        );
    }
}

 ?>