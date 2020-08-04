<?php
namespace tests;

use App\Services\CorrectUrl;
use PHPUnit\Framework\TestCase;

class CorrectUrlTest extends TestCase
{

    /**
     * @test
     */
    public function isReturnFalseIfNotAnUrl()
    {
        $correct = new CorrectUrl('dslodzdkz');
        $value = $correct->isUrl();
        $this->assertSame('Not an Url', $value);
    }

    /**
     * @test
     */
    public function isReturnTrueIfAnUrlWithHttps()
    {
        $uri = 'https://stackoverflow.com/questions/3809401/what-is-a-good-regular-expression-to-match-a-url';
        $correct = new CorrectUrl($uri);
        $value = $correct->isUrl();
        $this->assertTrue($value);
    }

    /**
     * @test
     */
    public function isReturnTrueIfAnUrlWithHttp()
    {
        $uri = 'http://stackoverflow.com/questions/3809401/what-is-a-good-regular-expression-to-match-a-url';
        $correct = new CorrectUrl($uri);
        $value = $correct->isUrl();
        $this->assertTrue($value);
    }

    /**
     * @test
     */
    public function isReturnFalseIfUrlStartWithNumber()
    {
        $correct = new CorrectUrl('12772:http');
        $value = $correct->isUrl();
        $this->assertSame('Not an Url', $value);
    }

}