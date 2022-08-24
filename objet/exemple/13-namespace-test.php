<?php

namespace A{
    echo __NAMESPACE__."<br/>";
}

namespace B{
    echo __NAMESPACE__."<br/>";
}

//NAMESPACE GLOBAL
namespace {
    echo __NAMESPACE__."<br/>";
    echo strlen("test");
}
