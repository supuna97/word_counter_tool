<?php
/**
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2012-2014, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License <http://www.gnu.org/licenses/gpl.html>
 */

define('PH7_ENCODING', 'utf-8');


/**
 * Remove spaces in text.
 *
 * @param string $sText
 * @return integer
 */
function strip_spaces($sText)
{
    return str_replace(array("\r\n","\r","\s","\t","\n","\s\r\n\t",' ','  ','   ','    ','     ','      '), '', $sText);
}

/**
 * Count the number of sentences.
 *
 * @param string $sText
 * @return integer
 */
function sentence_count($sText)
{
    return preg_match_all('/(?:[\w,]+[\s]?)(\.|\!|\?)(?!\w)/', $sText, $aMatch);
}

/**
 * Calculate the reading time of text.
 *
 * @param string $sText
 * @param string $iWordPerMin Word per minute. Default: 190
 * @return array ['min' => INTEGER, 'sec' => INTEGER]
 */
function reading_time($sText, $iWordPerMin = 190)
{
    $sText = str_word_count(strip_tags($sText));
    $iMin = floor($sText / $iWordPerMin);
    $iSec = floor($sText % $iWordPerMin / ($iWordPerMin / 60));
    return array('min' => $iMin, 'sec' => $iSec);
}

/**
 * Language helper function.
 *
 * @param string $sVar [, string $... ]
 * @return string
 */
function t()
{
    $sToken = func_get_arg(0);
    //$sToken = gettext($sToken); // We don't yet have the translation mode
    for ($i = 1, $iFuncArgs = func_num_args(); $i < $iFuncArgs; $i++)
        $sToken = str_replace('%'. ($i-1) . '%', func_get_arg($i), $sToken);
    return $sToken;
}
