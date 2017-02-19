<?php
namespace sjestadt\Larapedia\Test;

use sjestadt\Larapedia\Wiki;
use sjestadt\Larapedia\Exception\EngineNotSupportedException;
use sjestadt\Larapedia\Exception\LanguageNotSupportedException;

class LarapediaTest extends \PHPUnit_Framework_TestCase
{
    private $wiki;

    public function setUp()
    {
        $this->wiki = new Wiki(['language' => 'en', 'engine' => 'pedia']);
    }

    public function tearDown()
    {
        $this->wiki = null;
    }

    public function testGetApiLanguage()
    {
        $this->assertEquals('en', $this->wiki->getApiLanguage());
    }

    public function testGetSupportedLanguages()
    {
        $supportedLanguages = ['de', 'en', 'es', 'fr', 'it', 'nl', 'pl', 'ru', 'ceb', 'sv', 'vi', 'war'];

        $this->assertEquals($supportedLanguages, $this->wiki->getSupportedLanguages());
    }

    public function testGetSupportedEngines()
    {
        $this->assertEquals(['pedia', 'quote'], $this->wiki->getSupportedEngines());
    }

    public function testGetNewRandomArticle()
    {
        $result = $this->wiki->getNewRandomArticle();
        $this->assertTrue(is_array($result) && is_int($result[0]));
    }

    public function testGetId()
    {
        $this->assertTrue(is_int((int) $this->wiki->getId()));
    }

    public function testGetIds()
    {
        $result = $this->wiki->getIds();
        $this->assertTrue(is_array($result) && is_int($result[0]));
    }

    public function testGetTitle()
    {
        $this->assertTrue(is_string($this->wiki->getTitle()));
    }

    public function testGetLink()
    {
        $result = $this->wiki->getLink();
        $this->assertEquals('https://en.wikipedia.org/wiki/', substr($result, 0, 30));
    }

    public function testGetFirstSentence()
    {
        $this->assertTrue(is_string($this->wiki->getFirstSentence()));
    }

    public function testGetPlainTextArticle()
    {
        $this->assertTrue(is_string($this->wiki->getPlainTextArticle()));
    }

    public function testGetNChar()
    {
        $this->assertTrue(is_string($this->wiki->getNChar()));
    }

    public function testGetCategoriesRelated()
    {
        $result = $this->wiki->getCategoriesRelated();
        $this->assertTrue(is_array($result));
    }

    public function testGetArticleImages()
    {
        $result = $this->wiki->getArticleImages();
        $this->assertTrue(is_array($result));
    }

    public function testGetOtherLangLinks()
    {
        $result = $this->wiki->getOtherLangLinks();

        if (empty($result)) {
            $this->assertTrue(is_array($result));
        } else {
            $this->assertTrue(is_array($result) && is_array($result[0]));
            $this->assertArrayHasKey('lang', $result[0]);
            $this->assertArrayHasKey('url', $result[0]);
            $this->assertArrayHasKey('*', $result[0]);
        }
    }

    public function testGetBulkData()
    {
        $result = $this->wiki->getBulkData();

        if (empty($result)) {
            $this->assertTrue(is_array($result));
        } else {
            $this->assertTrue(is_array($result) && is_array($result[0]));
            $this->assertArrayHasKey('page_id', $result[0]);
            $this->assertArrayHasKey('title', $result[0]);
            $this->assertArrayHasKey('length', $result[0]);
            $this->assertArrayHasKey('url', $result[0]);
            $this->assertArrayHasKey('text', $result[0]);
        }
    }

//	--------------------------------------Make provision for these tests to pass-------------------------------------

	public function supportedLanguages()
	{
		return [['de'], ['en'], ['es'], ['fr'], ['it'], ['nl'], ['pl'], ['ru'], ['ceb'], ['sv'], ['vi'], ['war']];
	}

	/**
	 * @dataProvider supportedLanguages
	 */
	public function testSetLanguage($language)
	{
		if ($language !== 'en') {
			$this->assertNotEquals($language, $this->wiki->getLanguage());
		}

		$this->wiki->setLanguage($language);
		$this->assertEquals($language, $this->wiki->getLanguage());
	}

	public function testSetLanguageForException()
	{
		$this->setExpectedException('\sjestadt\Larapedia\Exception\LanguageNotSupportedException', sprintf('Language [%s] is not supported', 'ar'));
		$this->wiki->setLanguage('ar');
	}

	public function supportedEngines()
	{
		return [['pedia'], ['quote']];
	}

	/**
	 * @dataProvider supportedEngines
	 */
	public function testSetEngines($engine)
	{
		if ($engine !== 'pedia') {
			$this->assertNotEquals($engine, $this->wiki->getEngine());
		}

		$this->wiki->setEngine($engine);
		$this->assertEquals($engine, $this->wiki->getEngine());
	}

	public function testSetEngineForException()
	{
		$this->setExpectedException('\sjestadt\Larapedia\Exception\EngineNotSupportedException', sprintf('Engine [%s] is not supported', 'rhyme'));
		$this->wiki->seEngine('rhyme');
	}

}
