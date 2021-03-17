<?php
/**
 * @link http://www.forecho.com/
 * @copyright Copyright (c) 2017 ForEcho
 * @license http://www.forecho.com/
 */

namespace yiier\editor;

use yii\bootstrap\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;

class EditorMdWidget extends InputWidget
{
    /**
     * editor options
     * @var array
     */
    public $clientOptions = [];

    /**
     * Renders the widget.
     */
    public function run()
    {
        $rows = '';
        $id = 'editormd_' . $this->options['id'] ?: $this->id;
        $rows .= Html::beginTag('div', ['id' => $id]);
        $rows .= $this->hasModel() ? Html::activeTextarea($this->model, $this->attribute,
            $this->options) : Html::textarea($this->name, $this->value, $this->options);
        $rows .= Html::endTag('div');

        $this->registerClientScript($id);
        return $rows;
    }

    protected function registerClientScript($id)
    {
        $view = $this->getView();
        $this->initClientOptions();
        $editor = EditorMdAsset::register($view);
        $this->clientOptions['path'] = $editor->baseUrl . '/lib/';
        $jsOptions = Json::encode($this->clientOptions);

        if ($this->clientOptions['emoji']) {
            $emoji = 'editormd.emoji = ' . Json::encode([
                    'path' => 'http://www.webfx.com/tools/emoji-cheat-sheet/graphics/emojis/',
                    'ext' => ".png"
                ]);
            $view->registerJs($emoji);
        }
        $js = 'var editor = editormd("' . $id . '", ' . $jsOptions . ');';
        $view->registerJs($js);
    }

    public function initClientOptions()
    {

        $options = [];
        $options['height'] = '600';
        $options['watch'] = false;
        $options['emoji'] = true;
        $options['toolbarIcons'] = [
            "h1",
            "h2",
            "bold",
            "del",
            "italic",
            "quote",
            "link",
            "image",
            "code-block",
            "table",
            "emoji",
            "|",
            "list-ul",
            "list-ol",
            "hr",
            "|",
            "preview",
            "watch",
            "fullscreen",
        ];

        $this->clientOptions = array_merge($options, $this->clientOptions);
    }
}