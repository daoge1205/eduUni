<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("links.xml");

$x=$xmlDoc->getElementsByTagName('link');

// 从 URL 中获取参数 q 的值
$q=$_GET["q"];

// 如果 q 参数存在则从 xml 文件中查找数据
if (strlen($q)>0)
{
    $hint="";
    for($i=0; $i<($x->length); $i++)
    {
        $y=$x->item($i)->getElementsByTagName('title');
        $z=$x->item($i)->getElementsByTagName('url');
        if ($y->item(0)->nodeType==1)
        {
            // 找到匹配搜索的链接
            if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q))
            {
                if ($hint=="")
                {
                    $hint="信息：&nbsp &nbsp &nbsp" . "书名".'<br>'.
                    $z->item(0)->childNodes->item(0)->nodeValue ."&nbsp&nbsp". 
                    $y->item(0)->childNodes->item(0)->nodeValue ;
                }
                else
                {
                    $hint=$hint . "<br />" . 
                    $z->item(0)->childNodes->item(0)->nodeValue . "&nbsp&nbsp". 
                    $y->item(0)->childNodes->item(0)->nodeValue ;
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
