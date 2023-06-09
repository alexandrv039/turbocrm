<?php


namespace app\behaviors;

use app\models\Feed;
use yii\base\Behavior;
use yii\base\Event;
use yii\db\ActiveRecord;

class FeedBehavior extends Behavior
{

    public $eventType;
    public $attrName;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }


    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'addFeedItem'
        ];
    }

    public function addFeedItem()
    {
        $feedItem = new Feed();
        $feedItem->type = $this->eventType;
        $feedItem->value = $this->owner->id;
        $feedItem->deal_id = $this->owner->deal_id;

        $result = $feedItem->save();

        return $result;
    }



}
