<?php
/** @var ActiveDataProvider $dataProvider */
/** @var $this View */
/** @var $model Contact */
/** @var $name string */
/** @var $showFilterBtn boolean */

use app\widgets\LinkPager;
use app\models\Contact;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\ActiveForm;
?>

<div class="contacts-section__header">
    <h1 class="contacts-section__headline"><?=$name; ?></h1>
    <?php if ($showFilterBtn): ?>
    <a class="button button--tiny button--gray contacts-section__btn js-filters-toggler" href="#">Фильтровать</a>
    <?php endif; ?>
    <a class="button button--tiny contacts-section__btn modal-open" href="#">Добавить</a>
    <div class="contacts-section__search">
        <div class="search-block">
            <?php

            $form = ActiveForm::begin([
                'method' => 'get',
                'options' => ['class' => 'search-block__form']
            ]); ?>
            <?=$form->field($model, 'search', [
                'template' => "{label}\n{input}",
                'options' => ['class' => 'search-block__field-wrapper'],
                'inputOptions' => ['class' => 'search-block__field', 'type' => 'search', 'placeholder' => 'Поиск']])
                ->label('<span class="visually-hidden">Поле поиска</span>', ['class' => 'search-block__label']); ?>
            <button class="visually-hidden" type="submit">Найти</button>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="contacts-section__pagination-block-wrapper">
        <div class="contacts-section__pagination-block">
            <?=LinkPager::widget([
                'options' => ['class' => 'pagination-block'],
                'linkContainerOptions' => ['tag' => 'span'],
                'disabledPageCssClass' => 'pagination-block__btn--disabled',
                'nextPageCssClass' => 'pagination-block__btn pagination-block__btn--next',
                'nextPageLabel' => '<svg width="7" height="12"><use xlink:href="/img/sprite.svg#next"></use></svg>',
                'prevPageCssClass' => 'pagination-block__btn pagination-block__btn--prev',
                'prevPageLabel' => '<svg width="7" height="12"><use xlink:href="/img/sprite.svg#next"></use></svg>',
                'pagination' => $dataProvider->getPagination()
            ]); ?>
        </div>
    </div>
</div>
