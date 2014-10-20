<?php
function tolink($text,$root=NULL){

        $text = " ".$text;
        $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
                '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
        $text = eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
                '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
        $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
        '\\1<a href="http://\\2" target="_blank" rel="nofollow">\\2</a>', $text);
        $text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,4})',
        '<a href="mailto:\\1"  rel="nofollow">\\1</a>', $text);
		$text=fixOrdinals($text);
		$text = preg_replace('#@([\\d\\w]+)#', '<a class="btn-link" href="'.$root.'$1">$0</a>', $text);
		$text = preg_replace('/#([\\d\\w]+)/', '<a class="btn-link" href="'.$root.'games/hashtag/$1">$0</a>', $text);
        return $text;
}

function fixOrdinals($string) { 
    return preg_replace_callback("#@([\\d\\w]+)#",
        function ($matches) { 
            return strtolower($matches[0]);
        },
        $string
    );
}

?>