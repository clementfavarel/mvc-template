CREATE TABLE `users`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `firstname` VARCHAR(50) NOT NULL,
    `lastname` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `pwd` VARCHAR(60) NOT NULL,
    `join_on` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP
);