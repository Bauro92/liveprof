<?php

namespace TungatarovKl\LiveProfiler;

interface DataPackerInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function pack(array $data);

    /**
     * @param string $data
     * @return array
     */
    public function unpack($data);
}
