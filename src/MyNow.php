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

class MyNow
{
    protected $loader;

    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;
    }

    public static function create($path, $file = null)
    {
        $loader = new FileLoader($path, $file ?: '.time');
        $instance = new self($loader);
        $GLOBALS['mynow'] = $instance;
        return $instance;
    }
    
    public function getTimestamp()
    {
        return $this->loader->load();
    }
}