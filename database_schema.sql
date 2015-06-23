
--[ISBN], [Title], [Author], [Category], [Summary]
--CREATE DATABASE mydb;
-- USE mydb;
-- CREATE DATABASE mydb;
-- USE mydb;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  PRIMARY KEY (`id`),
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `f_name` VARCHAR(16),
  `l_name` VARCHAR(16),
  `email` VARCHAR(64) NOT NULL,
  `password` CHAR(128) NOT NULL,
  `signup_date` DATETIME,
  `is_moderator` TINYINT(1));

CREATE TABLE IF NOT EXISTS `books` ( 
  PRIMARY KEY (`isbn`),
  `isbn` VARCHAR(15) NOT NULL,
  `title` VARCHAR(30) NOT NULL,
  `author` VARCHAR(30) NOT NULL,
  `category` VARCHAR(20) NOT NULL,
  `summary` LONGTEXT NOT NULL);

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  PRIMARY KEY (`id`),
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `user_id` INT(2) NOT NULL,
  `isbn` VARCHAR(15) NOT NULL);

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` ( 
  PRIMARY KEY (`id`),
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `user_id` INT(2) NOT NULL,
  `isbn` VARCHAR(15) NOT NULL,
  `rating` INT,
  `review` LONGTEXT NOT NULL);

-- Sample queries
INSERT INTO `users` (`email`, `f_name`, `l_name`,`password`) VALUES('test@test.com','landon','gray','123');

-- Books queries
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('0618574948', 'The Fellowship of the Ring', 'J.R.R. Tolkien', 'Fiction', 'In ancient times the Rings of Power were crafted by the Elvensmiths and Sauron who forged the One Ring and filled it with his own power so that he could rule all others.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('0618574956', 'The Two Towers', 'J.R.R. Tolkien', 'Fiction', 'With Gandalf dead the journey of the One Ring is in peril as the Fellowship splits up with Frodo and Sam getting closer to Mordor while Aragorn slowly realizes his own destiny.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('0618574972', 'The Return of the King', 'J.R.R. Tolkien', 'Fiction', 'The amazing story reaches its climax as Frodo and Sam go deeper into Mordor while Aragorn and Gandalf defend the last bastion of mankind from the dark forces of Sauron.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('0441013597', 'Dune', 'Frank Herbert', 'Fiction', 'A vast empire hangs on the precious and unique commodity know as the "spice" which is only found on the remote planet of Dune.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('0441104029', 'Children of Dune', 'Frank Herbert', 'Fiction', 'The twin son and daughter of Paul Atreides come of age as they realize their power and their father\'s true nature.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('1470184788', 'Dark Night of the Soul', 'St. John of the Cross', 'Christian Living', 'Faith and doubt collide in this classic work by one of Christianity\'s most celebrated mystics.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('0687650194', 'Prayers for a Privileged People', 'Walter Brueggemann', 'Christian Living', 'A beautiful collection of poetic and prophetic prayers to be prayed and pondered and savored and be challenged by.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('0464832557', 'The Hunger Games', 'Suzanne Collins', 'Fiction', 'Two heroes battle their way through the brutal and nationally televised hunger games in order to win their freedom and stay alive.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('0451458737', 'The Peshawar Lancers', 'S.M. Sterling', 'Fiction', 'The British Empire still lives on in an alternate reality where the northern hemisphere was obliterated by a comet and the center of the world becomes the former crown colony of India.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('1453606122', 'Autobiography of Benjamin Franklin', 'Benjamin Franklin', 'Autobiography', 'The life and times of one of the most important early American patriots.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('0465067107', 'The Design of Everyday Things', 'Donald A. Norman', 'Engineering', 'This book could forever change how you experience and interact with your physical surroundings.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('1414334907', 'Left Behind', 'Tim LaHaye', 'Fiction', 'A laughable book with a popularized and poorly informed reading of Revelation - oops...I mean it\'s a riveting book about the "end times"!');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('1613821743', 'The Art of War', 'Sun Tzu', 'Military Strategy', 'The Art of War is the Swiss army knife of military theory--pop out a different tool for any situation.');
INSERT INTO `books`(`isbn`, `title`, `author`, `category`, `summary`) VALUES ('1595550789', 'The Total Money Makeover', 'Dave Ramsey', 'Personal Finance', 'This award-winning author teaches you everything you need to know about handling your money wisely and living a debt-free life.');
