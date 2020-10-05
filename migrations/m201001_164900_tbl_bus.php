<?php

use yii\db\Migration;

/**
 * Class m201001_164900_tbl_bus
 */
class m201001_164900_tbl_bus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE `bus` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `brand` VARCHAR(255) NULL DEFAULT NULL,
                `model` VARCHAR(50) NULL DEFAULT NULL,
                `year` INT(4) NULL DEFAULT NULL,
                `speed` INT(3) NULL DEFAULT NULL,
                PRIMARY KEY (`id`) USING BTREE
            )
            COLLATE='utf8_general_ci'
            ENGINE=InnoDB
            AUTO_INCREMENT=1
            ;
        ");

        $sqls = [ 
            "INSERT INTO `bus` (`id`, `brand`, `model`, `year`, `speed`) VALUES (1, 'BMW', 3, 2007, 150)",
            "INSERT INTO `bus` (`id`, `brand`, `model`, `year`, `speed`) VALUES (2, 'KIA', 2, 2015, 130)",
            "INSERT INTO `bus` (`id`, `brand`, `model`, `year`, `speed`) VALUES (3, 'MAZDA', 4, 2012, 110)",
            "INSERT INTO `bus` (`id`, `brand`, `model`, `year`, `speed`) VALUES (4, 'KIA', 7, 2009, 140)",
            "INSERT INTO `bus` (`id`, `brand`, `model`, `year`, `speed`) VALUES (5, 'MAZDA', 5, 2013, 180)",
            "INSERT INTO `bus` (`id`, `brand`, `model`, `year`, `speed`) VALUES (6, 'BMW', 6, 2014, 190)",
        ];

        foreach ($sqls as $sql) $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('bus');

        return true;
    }
}
