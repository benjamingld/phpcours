<?php

namespace A;
    function info(){
    echo "Bonjour à tous<br/>";
    }


namespace B;
    function info(){
    echo "Bonsoir<br/>";
    }



\A\info();

\B\info();


