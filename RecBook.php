<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("RecBook.xml");
$x=$xmlDoc->getElementsByTagName('link');
$q=$_GET["q"];
if(strlen($q)>0){
	$hint="";
    for($i=0; $i<($x->length); $i++)
    {
        $y=$x->item($i)->getElementsByTagName('title');
        $z=$x->item($i)->getElementsByTagName('num');
        if ($y->item(0)->nodeType==1)
        {
            // 找到匹配搜索的链接
            if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q))
            {
                if ($hint=="")
                {
                    $hint= "序号为".$z->item(0)->childNodes->item(0)->nodeValue .
		    "******书籍名称******".
                    $y->item(0)->childNodes->item(0)->nodeValue;
                }
                else
                {
                    $hint=$hint . "<br />" ."序号为". 
                    $z->item(0)->childNodes->item(0)->nodeValue ."******书籍名称*****".  
                    $y->item(0)->childNodes->item(0)->nodeValue;
                }
            }
        }
    }
}
// 如果没找到则返回 "no suggestion"
if ($hint=="")
{
    $response="no suggestion";
}
else
{
    $response=$hint;
}

// 输出结果
echo $response;
?>