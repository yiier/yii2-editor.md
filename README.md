editor.md for Yii2
==================

[![Latest Stable Version](https://poser.pugx.org/yiier/editor.md/v/stable)](https://packagist.org/packages/yiier/editor.md) 
[![Total Downloads](https://poser.pugx.org/yiier/editor.md/downloads)](https://packagist.org/packages/yiier/editor.md) 
[![Latest Unstable Version](https://poser.pugx.org/yiier/editor.md/v/unstable)](https://packagist.org/packages/yiier/editor.md) 
[![License](https://poser.pugx.org/yiier/editor.md/license)](https://packagist.org/packages/yiier/editor.md)

editor.md for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yiier/yii2-editor.md "*"
```

or add

```
"yiier/yii2-editor.md": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yiier\editor\EditorMdWidget;

?>
<?= $form->field($model, 'content')->widget(EditorMdWidget::className(), [
        'options'=>[// html attributes
            'id'=>'content'
        ],
        'clientOptions' => [
            'height' => '640',
            // 'previewTheme' => 'dark',
            // 'editorTheme' => 'pastel-on-dark',
            'markdown' => '',
            'codeFold' => true,
            'syncScrolling' => false,
            'saveHTMLToTextarea' => true,    // 保存 HTML 到 Textarea
            'searchReplace' => true,
            // 'watch' => false, // 关闭实时预览
            'htmlDecode' => 'style,script,iframe|on*',            // 开启 HTML 标签解析，为了安全性，默认不开启
            'toolbar ' => false,             //关闭工具栏
            'previewCodeHighlight' => false, // 关闭预览 HTML 的代码块高亮，默认开启
            'emoji' => true,
            'taskList' => true,
            'tocm           ' => true,         // Using [TOCM]
            'tex' => true,    // 开启科学公式TeX语言支持，默认关闭
            'flowChart' => true,             // 开启流程图支持，默认关闭
            'sequenceDiagram' => true,       // 开启时序/序列图支持，默认关闭,
            // 'dialogLockScreen' => false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
            // 'dialogShowMask' => false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
            // 'dialogDraggable' => false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
            // 'dialogMaskOpacity' => 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
            // 'dialogMaskBgColor' => '#000', // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
            'imageUpload' => true,
            'imageFormats' => ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'webp'],
            'imageUploadURL' => '/file/blog-upload?type=default&filekey=editormd-image-file',
        ]
    ]
) ?>

```