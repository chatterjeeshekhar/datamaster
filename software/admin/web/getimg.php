<?php
$imgpath1="files/pp/".$_SESSION['login_user'].".png";
$imgpath2="files/pp/".$_SESSION['login_user'].".jpg";
$imgpath3="files/pp/".$_SESSION['login_user'].".gif";
if(@getimagesize($imgpath1) || @getimagesize($imgpath2) || @getimagesize($imgpath3))
{
  if(@getimagesize($imgpath1)) {
  echo $imgpath1;
}
else
if(@getimagesize($imgpath2)) {
   echo $imgpath2;
    }
    else
if(@getimagesize($imgpat3)) {
  echo $imgpath3;
}
}
else 
if(!@getimagesize($imgpath1) && !@getimagesize($imgpath2) && !@getimagesize($imgpath3))
{
  $imgpathn="files/pp/system.jpg";     echo $imgpathn;    //if image not found this will display 
}

?>