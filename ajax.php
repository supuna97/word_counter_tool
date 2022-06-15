<?php
/**
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2012-2014, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License <http://www.gnu.org/licenses/gpl.html>
 */

if(!function_exists('mb_strlen'))
    exit('Please install the "mbstring" PHP module.');

require 'inc/functions.php';

$sText = (isset($_POST['characters'])) ? $_POST['characters'] : '';

$iText = mb_strlen($sText, PH7_ENCODING);
$iTextWithoutSpace =  mb_strlen(strip_spaces($sText), PH7_ENCODING);
$iSpace = ($iText-$iTextWithoutSpace);
$iWord = str_word_count($sText);
$iSentence = sentence_count($sText);
$aReadingTime = reading_time($sText);

echo t('
<div class="col-12" style="margin-bottom: 30px; margin-top: 30px; text-align:center">
<button class="btn  btn-color">%0% Characters</button>
<button class="btn  btn-color">%2% spaces.</button>
<button class="btn  btn-color">%3% Words</button>
<button class="btn  btn-color">%4% sentences.</button>
<button class="btn  btn-color">%5% min, %6% sec read time.</button>
</div>
', $iText, $iTextWithoutSpace, $iSpace, $iWord, $iSentence, $aReadingTime['min'], $aReadingTime['sec']);
