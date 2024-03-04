<?php

namespace unit\TungatarovKl\LiveProfiler;

class SimpleProfilerTest extends \unit\TungatarovKl\BaseTestCase
{
    public function testRunWithoutTags()
    {
        \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->enable();
        $data = \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->disable();

        self::assertEquals(['main()'], array_keys($data));
        self::assertEquals(['wt', 'mu', 'ct'], array_keys($data['main()']));
    }

    public function testRunWithTag()
    {
        \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->enable();

        \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->startTimer('tag');
        \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->endTimer('tag');

        $data = \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->disable();

        self::assertEquals(['main()', 'main()==>tag'], array_keys($data));
    }

    public function testNotClosedTag()
    {
        \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->enable();

        \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->startTimer('tag');

        $data = \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->disable();

        self::assertEquals([], $data);
    }

    public function testInvalidClosedTag()
    {
        \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->enable();

        \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->startTimer('tag');
        \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->endTimer('invalid');

        $data = \TungatarovKl\LiveProfiler\SimpleProfiler::getInstance()->disable();

        self::assertEquals([], $data);
    }
}
