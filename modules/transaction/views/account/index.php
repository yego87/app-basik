<?php

use yii\grid\GridView;
?>

                <?= GridView::widget([
                    'id' => 'a',
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        'username_to',
                        'username_from',
                        'amount'
                    ],
                ]);
?>