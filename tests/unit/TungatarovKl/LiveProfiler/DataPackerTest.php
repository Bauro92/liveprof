<?php

namespace unit\TungatarovKl\LiveProfiler;

class DataPackerTest extends \unit\TungatarovKl\BaseTestCase
{
    public function testPack()
    {
        $data = ['a' => 1];
        $Packer = new \Badoo\LiveProfiler\DataPacker();

        $result = $Packer->pack($data);

        static::assertEquals(json_encode($data), $result);
    }

    /**
     * @depends testPack
     */
    public function testUnPack()
    {
        $data = ['a' => 1];
        $Packer = new \Badoo\LiveProfiler\DataPacker();
        $packed_data = $Packer->pack($data);

        $result = $Packer->unpack($packed_data);

        static::assertEquals(json_decode($packed_data, true), $result);
    }
}
