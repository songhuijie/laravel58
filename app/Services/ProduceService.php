<?php
namespace App\Services;
class ProduceService
{
    public static function produce()
    {
        $topic = env('KAFKA_TOPIC'); //配置在env中
        $url = env('KAFKA_URL'); //配置在env中
        $value =
            [
                'code' => 'test',
                'data_type' => 'personal',
                'action' => 'update',
                'data' =>
                    [
                        'id' => 1,
                        'name' => 'tom',
                        'gender' => 2
                    ],
                'redirect_url' => '',
                'operator' => 'system',
            ];
        $value = json_encode ($value, JSON_FORCE_OBJECT );
        $kafka = new KafkaService();
        $kafka->Producer($topic, $value , $url);
    }

}
