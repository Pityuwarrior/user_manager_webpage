<?php
function validpw($pw1)
{
    if(strlen($pw1) >= 8)
    {
        if(!ctype_upper($pw1) & !ctype_upper($pw1))
        {
            return TRUE;
        }
    }
}
function telepetesIsDone()
{

    if(isNotEmpty() != null)
    {
        $ine = isNotEmpty();
        if($ine["COUNT(id)"] > 0)
        {
            return true;
        }
    }
 
    return false;
}