<?php

use yii\grid\GridView;
?>

<?= GridView::widget([
    'id' => 'a',
    'dataProvider' => $dataProvider,
    'columns' => [
        'username_to',
        'username_from',
        'amount'
    ],
]);
?>