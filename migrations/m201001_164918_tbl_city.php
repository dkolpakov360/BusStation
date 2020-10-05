<?php

use yii\db\Migration;

/**
 * Class m201001_164918_tbl_city
 */
class m201001_164918_tbl_city extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE `city` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `name` VARCHAR(50) NULL DEFAULT NULL,
                `location` INT(3) NULL DEFAULT NULL,
                PRIMARY KEY (`id`) USING BTREE
            )
            COLLATE='utf8_general_ci'
            ENGINE=InnoDB
            AUTO_INCREMENT=1
            ;
        ");

        $sqls = [ 
            "INSERT INTO `city` (`id`, `name`, `location`) VALUES (1, 'Moscow', 50)",
            "INSERT INTO `city` (`id`, `name`, `location`) VALUES (2, 'Kazan', 2000)",
            "INSERT INTO `city` (`id`, `name`, `location`) VALUES (3, 'Piter', 1500)",
        ];

        foreach ($sqls as $sql) $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('city');

        return true;
    }
}
