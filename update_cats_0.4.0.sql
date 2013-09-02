--
-- Aplicar manualmente.
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE IF NOT EXISTS `blog_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
INSERT INTO `blog_cats` (`id`, `name`, `description`) VALUES
(0, 'Sin categoría', 'No category entries');
CREATE TABLE IF NOT EXISTS `blog_cats_and_entries` (
  `cat_id` int(11) NOT NULL,
  `entry_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
