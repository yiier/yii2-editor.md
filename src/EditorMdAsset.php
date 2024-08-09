<?php

namespace yiier\editor;

use yii\web\AssetBundle;

class EditorMdAsset extends AssetBundle
{
    public $sourcePath = '@npm/editor.md';

    public function init()
    {
        $this->css = ['css/editormd.css', 'css/editormd.logo.css', 'css/editormd.preview.css'];
        $this->js = ['editormd.min.js'];
    }
}
