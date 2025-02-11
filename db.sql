CREATE TABLE `login_system`.`users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT ,
    `username` VARCHAR(100) NOT NULL ,
    `pwd` VARCHAR(255) NOT NULL ,
    `firstname` VARCHAR(100) NOT NULL ,
    `surname` VARCHAR(100) NOT NULL ,
    `gender` VARCHAR(100) NOT NULL ,
    `DOBday` INT(3) NOT NULL ,
    `DOBmonth` INT(3) NOT NULL ,
    `DOByear` INT(5) NOT NULL ,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;