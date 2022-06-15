/*
 * Author:           Pierre-Henry Soria <ph7software@gmail.com>
 * Copyright:        (c) 2012-2014, Pierre-Henry Soria. All Rights Reserved.
 * License:          GNU General Public License <http://www.gnu.org/licenses/gpl.html>
 */

$("#characters").keyup(function() {
    countCharacters($(this).val())
});

function countCharacters(a) {
    $.post("ajax.php", {
        characters: a
    }, function(a) {
        $("#nb_characters").html(a)
    })
};