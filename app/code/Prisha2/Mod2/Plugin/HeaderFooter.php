<?php
namespace Prisha2\Mod2\Plugin;
class HeaderFooter
{
    public function afterGetCopyright()
    {
        return "Copyright 2023 Prisha";
    }
    public function afterGetWelcome()
    {
        return "Welcome to PRISHA site";
    }
}
?>