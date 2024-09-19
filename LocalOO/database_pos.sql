

CREATE TABLE `categories` ( 
    `id` INT AUTO_INCREMENT PRIMARY KEY, 
    `category_name` VARCHAR(255) NOT NULL, 
    `image_path` VARCHAR(255) );

INSERT INTO `categories` (`id`, `category_name`, `image_path`) VALUES
(21, 'Ice Coffee'),
(22, 'Milktea');


CREATE TABLE `items` ( id INT AUTO_INCREMENT PRIMARY KEY, 
`name` VARCHAR(255) NOT NULL, 
`description` TEXT NOT NULL, 
`quantity` INT NOT NULL, 
`price` DECIMAL(10, 2) NOT NULL, 
`image_path` VARCHAR(255) );

INSERT INTO `items` (`id`, `name`, `description`, `quantity`, `price`, `image_path`) VALUES 
(`3`, `koykoy`, `koy`, `43`, `35`);
