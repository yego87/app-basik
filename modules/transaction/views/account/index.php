<?php

use yii\widgets\DetailView;

?>

<?php
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'balance'
        ],
]) ?>