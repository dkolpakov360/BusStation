<?php

use yii\db\Migration;

/**
 * Class m201001_164926_tbl_driver
 */
class m201001_164926_tbl_driver extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE `driver` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `name` VARCHAR(255) NULL DEFAULT NULL,
                `birthday` DATE NULL DEFAULT NULL,
                PRIMARY KEY (`id`) USING BTREE
            )
            COLLATE='utf8_general_ci'
            ENGINE=InnoDB
            AUTO_INCREMENT=1
            ;
        ");

        $sqls = [ 
            "INSERT INTO `driver` (`id`, `name`, `birthday`) VALUES (1, 'Sergey', '1990-05-03')",
            "INSERT INTO `driver` (`id`, `name`, `birthday`) VALUES (2, 'Vasya', '1995-08-5')",
            "INSERT INTO `driver` (`id`, `name`, `birthday`) VALUES (3, 'Alex', '1999-10-03')",
        ];

        foreach ($sqls as $sql) $this->execute($sql);
    }

    

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('driver');

        return true;
    }
}
