<?php

function seo($s){
    $tr=['ş','Ş','i','I','İ','ğ','Ğ','ü','Ü','ö','Ö','ç','Ç','(',')','/',':',',','?'];
    $eng=['s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','',''];
    $s=str_replace($tr,$en,$s);
    $s=strtolower($s);
    $s=preg_replace('&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/','',$s);
    $s=preg_replace('/\s+/','-',$s);
    
}

?>