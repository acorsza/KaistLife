-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2015 at 09:53 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs350`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idcategory`, `title`) VALUES
(1, 'Daejeon Life'),
(2, 'Academic Life'),
(3, 'Campus Life');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `idquestion` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `fk_category` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `replies` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idquestion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`idquestion`, `title`, `description`, `created_at`, `fk_category`, `fk_user`, `replies`) VALUES
(36, 'How Can I apply dormitory for summer semester?', 'I want to stay in KAIST during summer semester?\nHow can I use dormitory?\nThanks.', '2014-06-11 00:31:45', 3, 67, '1'),
(37, 'Where can I buy protein shake in Daejeon?', 'I would like to buy supplements in Daejeon or some online store, does anybody know a good option?', '2014-06-11 00:33:08', 1, 68, '5'),
(38, 'Where is the best Kebab in Daejeon?', 'I heard that in Daejeon there is the best Kebab in the world. Where can I find it?', '2014-06-11 00:33:49', 1, 68, '2'),
(39, 'What do you think about CS350 course, introduction to software engineering?', 'Hi. I''m a computer science guy.\nI''m planning to take CS350 course.\nI''d like to know how difficult this course is and if there is prerequisite course.', '2014-06-11 00:34:20', 2, 69, '3'),
(40, 'How do I check my grades?', 'I heard that I can check my grades at the portal.kaist.ac.kr, but I could not find the right place, does anyone know where is it?', '2014-06-11 00:34:35', 2, 68, '1'),
(41, 'Is there a club in Daejeon which holds a kind of party?', '', '2014-06-11 00:36:49', 1, 69, '1'),
(42, 'Where is the Golf simulator in KAIST?', 'I heard that there is a golf simulator inside campus, where is it?', '2014-06-11 00:38:12', 3, 68, '0'),
(43, 'How do you distinguish tongue twisters and normal sentences?', 'I''m working on a project which tells whether given sentence is a tongue twister or not.\nI found that the repetition of similar sounds and the actual distance between those sounds are very important to factor that makes the sentence tongue twister. Is there any other factor we can imagine?', '2014-06-11 01:15:04', 2, 67, '1'),
(44, 'Is there an international Basketball team at KAIST?', 'I was looking for an international team to practice and train a bit, is there any? Thanks', '2014-06-11 01:15:57', 3, 74, '1'),
(45, 'Who made this awesome site?', 'Hi. I really wonder who made this awesome site.\nThis is really what I wanted.\nI appreciate it and respect them.\nThank you', '2014-06-11 01:24:56', 3, 69, '1'),
(46, 'Where can I buy a cheap bike in KAIST?', 'Is there any website for second-hand things in english?', '2014-06-11 05:42:15', 3, 74, '1'),
(47, 'Is there any Brazilian restaurant in Daejeon?', '', '2014-06-11 05:42:36', 1, 74, '1'),
(48, 'script', 'how can we get the script for our course? ', '2014-06-11 08:44:57', 2, 71, '0'),
(49, 'carpool system', 'is there any carpool system which is for kaist staff and written in english?', '2014-06-11 08:45:46', 1, 71, '0'),
(50, 'souvenirs', 'i want to buy some souvenirs for my friend. Is there any suggestion for me?', '2014-06-11 08:54:41', 1, 71, '0'),
(51, 'watching together at KAIST', 'Where can I enjoy a fun time watching a live "volleyball match" with my friends at KAIST? ', '2014-06-11 13:29:21', 3, 79, '2'),
(52, 'Is CS350 a good course?', 'I''m thinking in take it in the next semester', '2014-06-11 14:54:32', 2, 68, '0'),
(53, 'Volleyball club', 'Is there any volleyball club in the town?', '2014-06-11 21:06:19', 1, 73, '1');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `idreply` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `point` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `fk_user` int(11) NOT NULL,
  `fk_question` int(11) NOT NULL,
  PRIMARY KEY (`idreply`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`idreply`, `description`, `point`, `created_at`, `fk_user`, `fk_question`) VALUES
(65, 'As the title of this course says, it is about software engineering.\nBriefly saying, software engineering is about how a software is developed in a effective and efficient way.\nDuring a semester, you are going to do a term project with you team members.\nIf you want more information, you can just refer to the syllabus.\nHere is the link: http://spiral.kaist.ac.kr/wp/2014springcs350/schedule/', 3, '2014-06-11 00:39:46', 70, 39),
(66, 'You can go to https://kds.kaist.ac.kr/ or if you are an Exchange student maybe you need to go directly to Welfare center in E11.', 2, '2014-06-11 01:00:47', 68, 36),
(67, 'There is a good website called Health Korea (www.healthkorea.com). It is cheap and fast delivery, the only drawback is that the website is only available in Korean.', 12, '2014-06-11 01:14:17', 74, 37),
(68, 'Definitely at Alibaba!', 1, '2014-06-11 01:14:47', 74, 38),
(69, 'You can just use academic system from portal system. First enter and log in to KAIST portal system: http://portal.kaist.ac.kr . Then you can find "Academic system" at the right side of that page.', 1, '2014-06-11 01:17:26', 67, 40),
(70, 'Yes, there is an international club, you can check at this Facebook group: https://www.facebook.com/groups/359713414049028/', 1, '2014-06-11 01:18:36', 68, 44),
(71, 'I think the length of those sounds can affect.', 0, '2014-06-11 01:20:24', 69, 43),
(72, 'As I know, this forum was made as a project for software engineering course. But I don''t know who made this.', 0, '2014-06-11 01:27:14', 75, 45),
(73, 'At Home Plus there are some products like this.', 8, '2014-06-11 04:28:51', 68, 37),
(74, 'Chillwave YOLO commodo, food truck odio deep v keffiyeh consectetur readymade gentrify delectus farm-to-table. Synth tempor mumblecore blog, jean shorts Helvetica Pitchfork hella raw denim asymmetrical nostrud yr. Kickstarter direct trade esse labore sriracha Carles. Nihil vero craft beer pork belly Thundercats Shoreditch food truck labore, crucifix assumenda chia. Pop-up fixie veniam deserunt Cosby sweater, et 3 wolf moon cray scenester plaid. Ennui nihil nostrud cray elit, normcore Shoreditch roof party kogi enim chia. Culpa 3 wolf moon id sartorial cliche Austin.\n\nGastropub officia keytar do. 3 wolf moon wolf quinoa exercitation, ad meh beard you probably haven''t heard of them dolor farm-to-table church-key. 8-bit letterpress exercitation, XOXO direct trade Etsy hella Cosby sweater synth. Trust fund semiotics fingerstache duis, fap hella lo-fi synth seitan. Odd Future Kickstarter anim irony Brooklyn. Asymmetrical iPhone retro, meh deep v art party raw denim exercitation est PBR&B beard. Veniam flannel adipisicing +1 ullamco.\n\nSwag do chambray master cleanse, Carles kogi Godard bicycle rights elit DIY accusamus quis incididunt 8-bit. Cred normcore fanny pack cray Intelligentsia, placeat Vice Portland. Anim gastropub freegan craft beer, twee delectus pariatur distillery ethical. In delectus +1, meh umami ethical occupy vinyl beard Austin letterpress four loko aliqua drinking vinegar. Bushwick non officia, magna nisi Austin cupidatat consequat banjo tofu. Thundercats aesthetic lomo nisi disrupt, pickled enim brunch Wes Anderson pug. Four loko iPhone cray XOXO stumptown DIY lo-fi fingerstache.\n\nDolore meh sapiente occupy pork belly eu raw denim. Helvetica accusamus cupidatat mumblecore, nisi iPhone keffiyeh. Odd Future excepteur viral sed pariatur veniam. Enim literally Williamsburg, deserunt retro pop-up tote bag kogi +1 mlkshk Banksy. Nulla typewriter keffiyeh, Williamsburg proident raw denim gastropub mustache vegan Pitchfork actually Kickstarter literally. Seitan lo-fi occaecat banjo. Cupidatat Austin cillum dreamcatcher, paleo sustainable irure chambray est.', 9, '2014-06-11 06:41:51', 68, 37),
(75, '\n\nChillwave YOLO commodo, food truck odio deep v keffiyeh consectetur readymade gentrify delectus farm-to-table. Synth tempor mumblecore blog, jean shorts Helvetica Pitchfork hella raw denim asymmetrical nostrud yr. Kickstarter direct trade esse labore sriracha Carles. Nihil vero craft beer pork belly Thundercats Shoreditch food truck labore, crucifix assumenda chia. Pop-up fixie veniam deserunt Cosby sweater, et 3 wolf moon cray scenester plaid. Ennui nihil nostrud cray elit, normcore Shoreditch roof party kogi enim chia. Culpa 3 wolf moon id sartorial cliche Austin. Gastropub officia keytar do. 3 wolf moon wolf quinoa exercitation, ad meh beard you probably haven''t heard of them dolor farm-to-table church-key. 8-bit letterpress exercitation, XOXO direct trade Etsy hella Cosby sweater synth. Trust fund semiotics fingerstache duis, fap hella lo-fi synth seitan. Odd Future Kickstarter anim irony Brooklyn. Asymmetrical iPhone retro, meh deep v art party raw denim exercitation est PBR&B beard. Veniam flannel adipisicing +1 ullamco. Swag do chambray master cleanse, Carles kogi Godard bicycle rights elit DIY accusamus quis incididunt 8-bit. Cred normcore fanny pack cray Intelligentsia, placeat Vice Portland. Anim gastropub freegan craft beer, twee delectus pariatur distillery ethical. In delectus +1, meh umami ethical occupy vinyl beard Austin letterpress four loko aliqua drinking vinegar. Bushwick non officia, magna nisi Austin cupidatat consequat banjo tofu. Thundercats aesthetic lomo nisi disrupt, pickled enim brunch Wes Anderson pug. Four loko iPhone cray XOXO stumptown DIY lo-fi fingerstache. Dolore meh sapiente occupy pork belly eu raw denim. Helvetica accusamus cupidatat mumblecore, nisi iPhone keffiyeh. Odd Future excepteur viral sed pariatur veniam. Enim literally Williamsburg, deserunt retro pop-up tote bag kogi +1 mlkshk Banksy. Nulla typewriter keffiyeh, Williamsburg proident raw denim gastropub mustache vegan Pitchfork actually Kickstarter literally. Seitan lo-fi occaecat banjo. Cupidatat Austin cillum dreamcatcher, paleo sustainable irure chambray est.\n', 0, '2014-06-11 06:58:26', 68, 37),
(76, 'Yes, there is a really good one near CJB Building, it''s called Rio de Janeiro! Enjoy it!', 0, '2014-06-11 10:38:52', 68, 47),
(77, 'the best kebab in the world is MILES away from you! :-p', 2, '2014-06-11 13:11:04', 79, 38),
(78, 'sometimes you don''t need to buy bikes at kaist! every semester they collect the unused bikes around campus and you can take one for free... but you do need to fix it yourself in case its borken', 0, '2014-06-11 13:13:33', 79, 46),
(79, 'I''m using on mobile', 2, '2014-06-11 14:18:05', 74, 39),
(80, 'This course is good', 4, '2014-06-11 14:57:46', 68, 39),
(81, 'Hdhdnd', 1, '2014-06-11 15:25:08', 68, 41),
(82, 'O gustavo chegou!', 2, '2014-06-11 16:07:02', 68, 37),
(83, 'Let''s watch at W2!!!!', 1, '2014-06-12 01:13:44', 68, 51),
(84, 'Good question bud! I have no Idea!', 0, '2014-06-12 01:14:46', 68, 53),
(85, 'or KI building? :-p ', 0, '2014-06-12 03:11:01', 79, 51);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `email`, `created_at`, `password`) VALUES
(67, 'Lee Byeoksan', 'lbs6170@kaist.ac.kr', '2014-06-11 00:30:42', '81dc9bdb52d04dc20036dbd8313ed055'),
(68, 'Aderlei Filho', 'aderleifilho@kaist.ac.kr', '2014-06-11 00:31:26', '202cb962ac59075b964b07152d234b70'),
(69, 'Bryan', 'bryan@kaist.ac.kr', '2014-06-11 00:32:03', '81dc9bdb52d04dc20036dbd8313ed055'),
(70, 'jack', 'jack@kaist.ac.kr', '2014-06-11 00:37:01', '81dc9bdb52d04dc20036dbd8313ed055'),
(71, 'sam', 'sam@kaist.ac.kr', '2014-06-11 00:38:00', '332532dcfaa1cbf61e2a266bd723612c'),
(73, 'Hamid', 'hamid.souri@kaist.ac.kr', '2014-06-11 01:06:18', '37fff357c237d67f2365eab6706bc898'),
(74, 'Marc', 'marc@kaist.ac.kr', '2014-06-11 01:09:15', '202cb962ac59075b964b07152d234b70'),
(75, 'muhammad', 'muham@kaist.ac.kr', '2014-06-11 01:25:38', '81dc9bdb52d04dc20036dbd8313ed055'),
(76, 'Andre', 'andre@kaist.ac.kr', '2014-06-11 01:59:37', 'e10adc3949ba59abbe56e057f20f883e'),
(77, 'Ruan Porto Marques', 'ruanpm@kaist.ac.kr', '2014-06-11 02:47:01', '698dc19d489c4e4db73e28a713eab07b'),
(78, 'Gabriel', 'gabriel@kaist.ac.kr', '2014-06-11 10:46:56', '4b13a21c1aa9aa675db0d52dc9420ce3'),
(79, 'mary', 'maryamgh@kaist.ac.kr', '2014-06-11 13:07:44', 'a4a4c11709d20432aeaa16ce3a7acb33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
