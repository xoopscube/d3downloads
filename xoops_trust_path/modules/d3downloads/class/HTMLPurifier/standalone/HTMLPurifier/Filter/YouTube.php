<?php

class HTMLPurifier_Filter_YouTube extends HTMLPurifier_Filter
{

    public $name = 'YouTube';

    public function preFilter($html, $config, $context) {
        $pre_regex = '#<object[^>]+>.+?'.
            'https://www.youtube.com/v/([A-Za-z0-9\-_]+).+?</object>#s';
        $pre_replace = '<span class="youtube-embed">\1</span>';
        return preg_replace($pre_regex, $pre_replace, $html);
    }

    public function postFilter($html, $config, $context) {
        $post_regex = '#<span class="youtube-embed">([A-Za-z0-9\-_]+)</span>#';
        return preg_replace_callback($post_regex, array($this, 'postFilterCallback'), $html);
    }

    protected function armorUrl($url) {
        return str_replace('--', '-&#45;', $url);
    }

    protected function postFilterCallback($matches) {
        $url = $this->armorUrl($matches[1]);
        return '<object width="425" height="350" type="application/x-shockwave-flash" '.
            'data="https://www.youtube.com/v/'.$url.'">'.
            '<param name="movie" value="https://www.youtube.com/v/'.$url.'"></param>'.
            '<!--[if IE]>'.
            '<embed src="https://www.youtube.com/v/'.$url.'"'.
            'type="application/x-shockwave-flash"'.
            'wmode="transparent" width="425" height="350">'.
            '<![endif]-->'.
            '</object>';

    }
}

// vim: et sw=4 sts=4
