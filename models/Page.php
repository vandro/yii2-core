<?php

namespace core\models;

use Yii;
use yii\helpers\ArrayHelper;
use core\components\ObjectsBehavior;
use core\components\SeoBehavior;
use core\components\ActiveRecord;


/**
 * This is the model class for table "Page".
 *
 * @property integer $id
 * @property string $name
 * @property integer $PageTemplate_id 
 * @property string $h1
 * @property string $url
 * @property string $template
 * @property string $sitemap
 * @property string $content
 * @property string $status
 * @property string $update_time
 * @property integer $update_by
 * @property string $create_time
 * @property integer $create_by
 * 
 * @property PageTemplate $pageTemplate 
 */
class Page extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PageTemplate_id', 'name'], 'required'],
            [['h1', 'content', 'status', 'sitemap'], 'string'],
            [['update_time', 'create_time'], 'safe'],
            [['PageTemplate_id', 'update_by', 'create_by'], 'integer'],
            [['name', 'url', 'template'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'PageTemplate_id' => 'Template',
            'url' => 'Url',
            'template' => 'Layout',
            'content' => 'Content',
            'sitemap' => 'Show in sitemap',
            'status' => 'Status',
            'update_time' => 'Update Time',
            'update_by' => 'Update By',
            'create_time' => 'Create Time',
            'create_by' => 'Create By',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(
            [
                'objects' => [
                    'class' => ObjectsBehavior::className(),
                ],
                'seo' => [
                    'class' => SeoBehavior::className(),
                ],
            ],
            parent::behaviors()
        );
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageTemplate()
    {
        return $this->hasOne(PageTemplate::className(), ['id' => 'PageTemplate_id']);
    }
}