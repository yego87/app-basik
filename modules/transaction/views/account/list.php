<?php

use yii\grid\GridView;

?>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'username',
        'balance'
    ],
]);
?>