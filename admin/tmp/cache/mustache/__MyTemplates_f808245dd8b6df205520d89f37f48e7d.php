<?php
class __MyTemplates_f808245dd8b6df205520d89f37f48e7d extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $newContext = array();

        $buffer .= $indent . 'TESTING...
';
        $buffer .= $indent . 'here we are...';
        return $buffer;
    }
}
