<?php

namespace A\B{
    function getNamespace(){
        echo __NAMESPACE__."<br/>";
    }
}

namespace A{    
    //appel de facon relatif
    B\getNamespace();
    //appel de facon absolue
    \A\B\getNamespace();
}