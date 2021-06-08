<?php

namespace Cerpus\StaticData\Tests;

use Cerpus\StaticData\StaticData;
use PHPUnit\Framework\TestCase;

class StaticDataTest extends TestCase
{
    public function testYouCanGetGradeLevelsInNorwegian_Success()
    {
        $staticData = new StaticData();

        $this->assertIsArray($theLevels = $staticData->getGradeLevels("nb-no"));
        $this->assertStringContainsString("Barnetrinn", json_encode($theLevels));
    }

    public function testYouCanGetGradeLevelsInEnglish_Success()
    {
        $staticData = new StaticData();

        $this->assertIsArray($theLevels = $staticData->getGradeLevels("en-us"));
        $this->assertStringContainsString("Lower Primary", json_encode($theLevels));
    }

    public function testUnsupportedGradeLevelWillReturnFallbackLanguageLevels_Success()
    {
        $staticData = new StaticData();

        $this->assertIsArray($theLevels = $staticData->getGradeLevels("de-de"));
        $this->assertStringContainsString("Lower Primary", json_encode($theLevels));
    }

    public function testYouCanGetCountriesInNorwegian_Success()
    {
        $staticData = new StaticData();

        $this->assertIsArray($theCountries = $staticData->getCountries("nb-no"));
        $this->assertStringContainsString("Norge", json_encode($theCountries));
    }

    public function testYouCanGetCountriesInEnglish_Success()
    {
        $staticData = new StaticData();

        $this->assertIsArray($theCountries = $staticData->getCountries("en-us"));
        $this->assertStringContainsString("Norway", json_encode($theCountries));
    }

    public function testUnsupportedCountryReturnsEnglish_Success()
    {
        $staticData = new StaticData();

        $this->assertIsArray($theCountries = $staticData->getCountries("de-de"));
        $this->assertStringContainsString("Norway", json_encode($theCountries));
    }

    public function testYouCanGetLanguagesInNorwegian_Success()
    {
        $staticData = new StaticData();

        $this->assertIsArray($theCountries = $staticData->getLanguages("nb-no"));
        $this->assertStringContainsString("Norsk Nynorsk", json_encode($theCountries));
    }

    public function testYouCanGetLanguagesInEnglish_Success()
    {
        $staticData = new StaticData();

        $this->assertIsArray($theCountries = $staticData->getLanguages("en_US"));
        $this->assertStringContainsString("Norwegian Nynorsk", json_encode($theCountries));
    }

    public function testUnsupportedLanguageReturnsEnglish_Success()
    {
        $staticData = new StaticData();

        $this->assertIsArray($theCountries = $staticData->getLanguages("de-de"));
        $this->assertStringContainsString("Norwegian Nynorsk", json_encode($theCountries));
    }
}
