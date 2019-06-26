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

class DateTime extends \DateTime
{
    public function __construct(string $time = "now", DateTimeZone $timezone = NULL)
    {
        if (!isset($GLOBALS['mynow'])) {
            parent::__construct($time, $timezone);
            return;
        }

        $mynow = $GLOBALS['mynow'];
        parent::__construct();

        try {
            $this->setTimestamp((int)$mynow->getTimestamp());
        } catch(\Exception $e) {
            $this->setTimestamp(null);
            $this->modify($time);
            // No exception returned
        }
    }
}