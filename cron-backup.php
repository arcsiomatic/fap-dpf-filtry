<?php

function recurse_copy($src,$dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}


$document_root = $_SERVER['DOCUMENT_ROOT'];
if (strpos($document_root,'wamp64') !== false) { $document_root .='/fap-dpf-filtry.cz/';  }
 elseif (strpos($document_root, 'profi-chiptuning.cz') !== false)
    {
        $document_root .='/';
        $server = 'new';
    }
else { $document_root .= "/";  }


recurse_copy($document_root.'inf',$ddocument_root.'backup');

