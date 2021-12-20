<?php


namespace soft\helpers\language;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class LanguageSwitcher extends Widget
{


    /**
     * @var array HTML attributes for widget container
     * @see Html::renderTagAttributes()
     */
    public $options=[];

    /**
     * @var array HTML attributes for link container
     * @see Html::renderTagAttributes()
     */
    public $listOptions=[];

    /**
     * @var array HTML attributes for link tag
     * @see Html::renderTagAttributes()
     */
    public $linkOptions=[];

    /**
     * @var array languages list
     */
    public $languages = [];

    /**
     * @var string language parametr
     */
    public $languageParam;

    /**
     * @var string active list class
     */
    public $activeListClass = 'active';

    /**
     * @var string active link class
     */
    public $activeLinkClass;

    public function init()
    {
        parent::init();

        if (empty($this->languages)){

            $this->languages = LanguageHelper::LANGUAGES;

        }

        if ($this->languageParam == null){

            $this->languageParam = LanguageHelper::LANGUAGE_PARAM;
        }
    }

    public function run()
    {
        $list = '';
        $listTag = ArrayHelper::remove($this->listOptions, 'tag', 'li');
        foreach ($this->languages as $key => $label)
        {
            if (Yii::$app->language == $key){
                Html::addCssClass($this->linkOptions, $this->activeLinkClass);
                Html::addCssClass($this->listOptions, $this->activeListClass);
                $url = Url::to( "#");
            }
            else{
                Html::removeCssClass($this->linkOptions, $this->activeLinkClass);
                Html::removeCssClass($this->listOptions, $this->activeListClass);
                $url = Url::current([$this->languageParam => $key]);
            }
            $link = Html::a($label, $url, $this->linkOptions);
            $list .= Html::tag($listTag, $link, $this->listOptions);
        }

        $containerTag = ArrayHelper::remove($this->options, 'tag', 'ul');
        ArrayHelper::setValue($this->options, 'id', $this->getId());
        echo Html::tag($containerTag, $list, $this->options);
    }

}