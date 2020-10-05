<?php

use yii\db\Migration;

/**
 * Class m201003_154900_tbl_relation_bus_driver
 */
class m201003_154900_tbl_relation_bus_driver extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
           CREATE TABLE `relation_bus_driver`  (
          `bus_id` int(4) NOT NULL,
          `driver_id` int(4) NOT NULL,
          INDEX `fk_bus_id`(`bus_id`) USING BTREE,
          INDEX `fk_driver_id`(`driver_id`) USING BTREE,
          CONSTRAINT `fk_bus_id` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
          CONSTRAINT `fk_driver_id` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
        ) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;
        ");

        $sqls = [ 
            "INSERT INTO `relation_bus_driver` (`bus_id`, `driver_id`) VALUES (1, 1)",
            "INSERT INTO `relation_bus_driver` (`bus_id`, `driver_id`) VALUES (2, 1)",
            "INSERT INTO `relation_bus_driver` (`bus_id`, `driver_id`) VALUES (3, 2)",
            "INSERT INTO `relation_bus_driver` (`bus_id`, `driver_id`) VALUES (4, 2)",
            "INSERT INTO `relation_bus_driver` (`bus_id`, `driver_id`) VALUES (5, 3)",
            "INSERT INTO `relation_bus_driver` (`bus_id`, `driver_id`) VALUES (6, 3)",
        ];

        foreach ($sqls as $sql) $this->execute($sql);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('relation_bus_driver');

        return true;
    }
}
