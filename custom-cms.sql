-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2018 at 06:52 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `custom-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(125) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'πολιτικά'),
(2, 'νέα');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(30) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) NOT NULL,
  `post_content` text NOT NULL,
  `category_id` int(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `category_id`, `created_date`) VALUES
(1, 'Εκτίμηση Ψήφου', 'Λορεμ ιπσθμ δολορ σιτ αμετ, αδ vερεαρ vιδερερ ομιτταμ ηασ, vιδισσε βονορθμ εα vιμ, cθμ θτ διcιτ ειρμοδ. Μοδθσ μολεστιαε εοσ cθ. Πρι ατqθι δολορθμ φαcιλισ εα, vερο ιμπεδιτ φθισσετ vισ αδ. Περ αδ τριτανι δελενιτι, διcτασ δοcενδι εθμ τε. Qθασ cοντεντιονεσ δθο ετ, vιξ νατθμ cονσθλατθ ατ.', 1, '2018-05-07 05:48:50'),
(2, 'Πρωτάθλημα Ελλάδος', 'Ιθσ αν ορνατθσ νεγλεγεντθρ, δενιqθε ρατιονιβθσ προ νε, μοδο μαιεστατισ σιγνιφερθμqθε προ εθ. Vελ qθοδ τεμπορ vολθτπατ εα. Vερεαρ οπορτεατ ιν περ, ηασ ετ ταμqθαμ δισσεντιασ. Θτ περπετθα περιcθλισ σιτ, εα cιβο ταντασ ιραcθνδια θσθ, εθ ιθσ αλιqθιπ φαβθλασ.', 2, '2018-05-07 05:48:50'),
(3, 'Επίδομα Εργασίας', 'Εθ qθο ελιτ cηορο cονvενιρε, μελ νοβισ ιντελλεγατ αδ. Ετ vελ ελιτρ σολεατ, μεα ειθσ cηορο ει, περ ελιτ σαλε ηαρθμ εθ. Εθ ετιαμ φαcιλισ εστ. Εοσ νο αμετ αλιqθιπ νεcεσσιτατιβθσ.', 2, '2018-05-07 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
CREATE TABLE IF NOT EXISTS `post_tags` (
  `post_id` int(30) NOT NULL,
  `tag_id` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`post_id`, `tag_id`) VALUES
(1, 1),
(1, 4),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(30) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(200) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1, 'εκλογές'),
(2, 'ποδόσφαιρο'),
(3, 'μπάσκετ'),
(4, 'περιφέρεια Αθηνών');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
