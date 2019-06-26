<?php
/*
 * This file is part of MyNow package.
 *
 * (c) Antony Zanetti
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MyNow;

class FileLoader implements LoaderInterface
{
    private $filename;

    public function __construct($path, $file)
    {
        $this->filename = $path . '/' . $file;
    }

    public function load()
    {
        return (int)file_get_contents($this->filename);
    }
}  