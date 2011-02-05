-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny7
-- http://www.phpmyadmin.net
--
-- Host: mysql.ilinkadv.com
-- Generation Time: Feb 04, 2011 at 04:10 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6-1+lenny9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `safaristuff_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL auto_increment,
  `session_id` int(11) NOT NULL,
  `user_id` int(11) default NULL,
  `status` varchar(255) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `updated` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_opt_in` tinyint(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` char(5) NOT NULL,
  `int_address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `cc_name` varchar(255) NOT NULL,
  `cc_number` varchar(255) NOT NULL,
  `cc_type` varchar(255) NOT NULL,
  `cc_code` varchar(255) NOT NULL,
  `cc_expiration` varchar(255) NOT NULL,
  `cc_address` varchar(255) NOT NULL,
  `cc_address2` varchar(255) NOT NULL,
  `cc_city` varchar(255) NOT NULL,
  `cc_state` varchar(255) NOT NULL,
  `cc_zip_code` varchar(5) NOT NULL,
  `cc_int_address` text NOT NULL,
  `shipping_type` varchar(255) NOT NULL,
  `shipping` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `promotion` varchar(255) NOT NULL,
  `discount_code` varchar(255) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `user_id`, `status`, `tracking_number`, `created`, `updated`, `name`, `email`, `email_opt_in`, `address`, `address2`, `city`, `state`, `zip_code`, `int_address`, `phone`, `notes`, `cc_name`, `cc_number`, `cc_type`, `cc_code`, `cc_expiration`, `cc_address`, `cc_address2`, `cc_city`, `cc_state`, `cc_zip_code`, `cc_int_address`, `shipping_type`, `shipping`, `tax`, `promotion`, `discount_code`, `discount`, `total`) VALUES
(83, 0, NULL, '', '', '0000-00-00', '0000-00-00 00:00:00', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, '', '', 0.00, 0.00),
(84, 0, NULL, 'Shipped', '', '2010-11-29', '2010-12-03 15:34:32', 'Andy Canfield', 'Andrew@thepog.net', 1, '115 E Liberty', '', 'Spokane', 'Washington', '99209', '', '(509) 216-8740', '', 'Andy Canfield', '4111111111111111', 'visa', '123', '1 / 2011', '115 E Liberty', '', 'Spokane', 'Washington', '99209', '', 'Ground', 9.99, 6.96, '', '', -9.99, 79.96),
(85, 0, NULL, '', '', '0000-00-00', '0000-00-00 00:00:00', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, '', '', 0.00, 0.00),
(86, 0, NULL, 'Pending', '', '2010-12-03', '2010-12-03 15:31:02', 'Andrew Canfield', 'Andrew@thepog.net', 1, '123 ABC Avenue', '', 'Spokane', 'Washington', '99207', '', '(509) 216-8740', '', 'Andrew Canfield', '4111111111111111', 'visa', '123', '1 / 2011', '123 ABC Avenue', '', 'Spokane', 'Washington', '99207', '', 'Ground', 9.99, 1.74, '', '', 0.00, 31.72),
(87, 0, NULL, '', '', '0000-00-00', '0000-00-00 00:00:00', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, '', '', 0.00, 0.00),
(88, 0, NULL, '', '', '0000-00-00', '2010-12-13 10:44:30', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, '', '', 0.00, 99.99),
(89, 0, NULL, 'Pending', '', '2011-01-18', '2011-01-18 05:55:22', 'Judy Rivers', 'jlnala@hotmail.com', 0, '46875 Bachelor Flats Dr N', '', 'Creston', 'Washington', '99117', '', '5097863856', '', 'Judy Rivers', '4640182018176465', 'visa', '571', '8 / 2011', '46875 Bachelor Flats Dr N', '', 'Creston', 'Washington', '99117', '', 'Ground', 9.99, 0.61, '', '', 0.00, 17.59),
(90, 0, NULL, '', '', '0000-00-00', '0000-00-00 00:00:00', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, '', '', 0.00, 0.00),
(91, 0, NULL, '', '', '0000-00-00', '2011-01-18 23:14:39', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, '', '', 0.00, 6.99),
(92, 0, NULL, '', '', '0000-00-00', '2011-01-24 11:03:30', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, '', '', 0.00, 11.93),
(93, 0, NULL, '', '', '0000-00-00', '0000-00-00 00:00:00', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, '', '', 0.00, 0.00),
(94, 0, NULL, '', '', '0000-00-00', '0000-00-00 00:00:00', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0.00, 0.00, '', '', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE IF NOT EXISTS `cart_products` (
  `cart_id` int(11) default NULL,
  `product_id` int(11) default NULL,
  `quantity` int(11) default NULL,
  `options` varchar(255) default NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` (`cart_id`, `product_id`, `quantity`, `options`, `price`) VALUES
(84, 7025, 4, '1465', 19.99),
(86, 7025, 1, '1465', 19.99),
(88, 7029, 1, '', 99.99),
(89, 7033, 1, '', 6.99),
(91, 7033, 1, '', 6.99),
(92, 7110, 1, '', 3.99),
(92, 7108, 1, '', 3.95),
(92, 7109, 1, '', 3.99);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `image`, `filetype`, `description`) VALUES
(1, 'Home Page', '', '', 'SAFARISTUFF™ is your one stop shopping center for unique, one of a kind items that you&#39;ll find nowhere else on the internet! \r\n\r\nWe have the answer you&#39;re looking for especially when you&#39;re racking your brain trying to come up with something for that person who has everything. \r\n\r\nAs you look through our inventory you&#39;ll quickly see that our artists use such wonders of nature as Elk Antlers to create gifts that simply can&#39;t be duplicated. \r\n\r\nMake that person you&#39;re shopping for feel special with a gift from SAFARISTUFF™\r\n\r\nWe at SafariStuff also invite you to visit our sister site: www.secondgradesafari.org™ where you&#39;ll find fun online games, a way to benefit the students in your school and how you can get discounts on our merchandise. \r\n\r\n*A portion of every dollar from merchandise sold on SafariStuff goes to the Save the Giraffe Foundation and other Wildlife organizations'),
(2, 'About Us', '', '.jpg', 'The artists at SAFARISTUFF™ have the uncanny ability to look at the wonders of nature and envision the possibilities for creating unique, one of a kind gift items.\r\n\r\nFrom natural granite all the way to elk antlers, nature has a way of making sure no two look alike.  And our SAFARISTUFF™ artists take it one step further in using these unique natural wonders to create gifts that will make anyone feel special, because they know you can look to the ends of the earth and there will never be another gift like the one they have.\r\n\r\nIn addition we at SAFARISTUFF™ provide a way for you to take a moment and reflect on that special person in your life who you would like to remember with an engraved urn.  Or perhaps your pet that offered so much companionship and now can be memorialized with a custom granite headstone marker or a small elk antler display made just for your pet.  Send us your picture and words and we will engrave them on the item.\r\n\r\nWe invite you to spend some time with us, look through our unique gift items and see how you can make someone in your life feel special.'),
(3, 'Links', '', '.jpg', 'SAFARISTUFF™ is proud to be associated with the following businesses. We invite you to take a look at their interesting web sites.\r\n\r\nwww.secondgradesafari™.org™:  This site offers an adventure for your second graders.  They can play games in a safe atmosphere and challenge their parents to the games.  Parents and Educators can learn how to hold their own Second Grade Safari where kids meet special caregivers such as the police, firemen, water safety sheriff, park rangers, ambulance drivers and nurses.  They can climb on the firetruck, sit in a police car, investigate an ambulance and see the LifeFlight helicopter both outside and inside.  They then learn about animals and their care and how close human children and baby animals really are.  It is a great experience that has been well accepted by schools as a fun and exciting way to introduce the children to the caregivers that generally are viewed with much trepiditation by the young kids.\r\n\r\nwww.fireborngloves.com: We take common items such as leather gloves and brand them with our own special spin. Whether you&#39;re in the manufacturing, construction or cattle business, having a pair of branded gloves with your name, logo or hobby on them definitely sets you apart.\r\n\r\nwww.quickangle.com:   Made in America, this tool does many things.  It measures and bisects angles, scribes lines, finds the center of a circle, finds roof pitches, and marks notches and cut-outs and much more.\r\n\r\nwww.schreinerfarms.com:  If you want a close-us visit with exotic hoofed animals, come and visit our ranch.  You can learn interesting facts about animals such as giraffes, walleroos, camels, zebras, antelope and yaks.  Make an appointment to have a guided tour or just view these wonderful animals on-line.\r\n\r\nwww.anysoldier.com:  If you want to help support our troops, this is a great website. This is a volunteer group of people who have a list of what is needed by the soldiers and where to send your contribution.'),
(5, 'Policies', '', '.jpg', 'POLICIES\r\n\r\nTo contact customer service, please e-mail us at info@safaristuff.com or you can call directly at 509-630-2418, Monday through Saturday from 9:00am to 5:00pm.\r\n\r\nPRIVACY POLICY\r\nAt SafariStuff we are dedicated to ensuring your privacy.  At no time will we ever sell or exchange names, e-mail addresses, or any other information about our on-line customers.  The personally identifiable information we collect is securely stored within our database and we use standard, industry-wide procedures such a 128 bit encryption and SSL(Secure Sockets Layer) to protect your information.\r\n\r\nRETURN POLICY:\r\nBecause of the unique nature of our items which feature one of a kind pictures and words, SafariStuff is not able to offer a return policy after your final approval of that item.  Only in the event that we have made a mistake in the image or words and it is our fault can the item be returned.\r\n\r\nOtherwise, if you are unhappy with your purchase of one of our standard items, before use, for any reason, please contact us for approval of your return.  If given authorization, the item must be returned within 14 days of deliery for a full refund.  Please note that we cannot return the shipping charges to you unless the return is a result of our error.  The item(s) to be returned must be unused, be in the same condition as when sent and in the original packaging materials.  Returned merchandise must be shipped back to SafariStuff freight prepaid.  No freight-collect returns will be accepted.\r\n\r\nCANCELLATION POLICY:\r\nWith the exception of customized items as mentioned in our return policy, any standard item can be cancelled if SafariStuff is notified before the order has been shipped, via e-mail: info@safaristuff.com or by telephone 509-630-2418.'),
(6, 'Contact', '', '.jpg', 'We love to hear from current and potential customers! You can contact us directly by telephone or e-mail. Let us know what you would like and we will work with you to create it.   We never release your information to a third party.\r\n\r\n\r\nScott:   509.630.2418\r\n\r\ninfo@safaristuff.com\r\n\r\nMail: \r\n     SafariStuff LLC\r\n     36875 Bachelor Flats Drive N\r\n     Creston, WA  99117'),
(7, 'Stage Puppet Care', '', '', 'STAGE PUPPET CARE\r\n\r\nDid you ever feel somewhat droopy following a long car trip? After several days in a stuffy box, your puppets may appear a little travel-weary. To freshen them up, we recommend a shake-out and thorough grooming with a wire or coarse-bristled brush. By brushing with – rather than against – the fabric grain, you’ll quickly restore the quality and realism of the animal’s fur. BUT NOTE THIS WARNING: a strong brush is no friend to the eyes and ears of an animal. Both can be scratched and damaged if care is not taken to avoid these sensitive areas\r\n\r\n DO NOT PUT IN WASHER OR DRYER. This will destroy your puppet. Furry plush puppets are surface-washable only. Do not submerge the puppet in water. Use lukewarm water and sponge with Woolite® or other mild laundry detergent to wet and lather fur. Rinse surface with sponge. Be careful not to wring or twist the puppet, or you may end up with lumpy stuffing. Dry by gently squeezing between towels, or hanging from clothesline to drip-dry. After it’s dry, brush with wire dog brush to fluff the fur. When brushing face, be careful to avoid scratching the eyes or pulling out the threads in ears, nose, or mouth areas.'),
(8, 'Finger Puppets Care', '', '', 'FINGER PUPPET CARE:\r\n\r\nDid you ever feel somewhat droopy following a long car trip? After several days in a stuffy box, your puppets may appear a little travel-weary. To freshen them up, we recommend a shake-out and thorough grooming with a wire or coarse-bristled brush. By brushing with – rather than against – the fabric grain, you’ll quickly restore the quality and realism of the animal’s fur. BUT NOTE THIS WARNING: a strong brush is no friend to the eyes and ears of an animal. Both can be scratched and damaged if care is not taken to avoid these sensitive areas\r\n\r\n DO NOT PUT IN WASHER OR DRYER. This will destroy your puppet. Furry plush puppets are surface-washable only. Do not submerge the puppet in water. Use lukewarm water and sponge with Woolite® or other mild laundry detergent to wet and lather fur. Rinse surface with sponge. Be careful not to wring or twist the puppet, or you may end up with lumpy stuffing. Dry by gently squeezing between towels, or hanging from clothesline to drip-dry. After it’s dry, brush with wire dog brush to fluff the fur. When brushing face, be careful to avoid scratching the eyes or pulling out the threads in ears, nose, or mouth areas.');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `manufacturer` varchar(255) default NULL,
  `reference` varchar(255) default NULL,
  `upc` varchar(255) default NULL,
  `category` varchar(255) default NULL,
  `cost` decimal(6,2) NOT NULL,
  `price` decimal(6,2) default NULL,
  `weight` decimal(10,2) NOT NULL,
  `discontinued` tinyint(1) default NULL,
  `description` text,
  `allow_upload` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7143 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `manufacturer`, `reference`, `upc`, `category`, `cost`, `price`, `weight`, `discontinued`, `description`, `allow_upload`) VALUES
(7025, 'Product 01', 0, 'ABC Company', 'ABC123', '', 'Category 01', 0.00, 19.99, 0.00, 1, 'A simple, easy to use test product.', NULL),
(7026, 'Product 02', 0, 'ABC Company', 'ABC111', '', 'Category 01', 0.00, 29.99, 0.00, 1, 'Another simple product.', NULL),
(7027, 'Product 03', 5, 'ABC Company', 'ABC122', '', 'Category 02', 9.99, 29.99, 10.00, 1, 'A wonderfully simple product.', NULL),
(7028, 'Elk Picture', 0, 'Safari Stuff', 'SS-001', '', 'Pictures', 0.00, 99.99, 0.00, 1, 'A fantastic, almost life like picture of an elk or elk like creature.', NULL),
(7029, 'Product', 0, 'Safari Stuff', 'SS-002', '', 'Antlers', 9.99, 99.99, 0.00, 1, '', NULL),
(7030, 'Red Fox Finger Puppet', 5, 'Folkmanis', '201120', '201120', 'Finger Puppets', 0.00, 5.99, 0.00, 0, 'The Red Fox is about the size of a large cat.  In fact, although it is a member of the dog family, some of it’s habits are very cat like as well. Like a cat&#39;s, the fox&#39;s thick tail aids its balance.  The fox uses its tail as a warm cover in cold weather and as a signal flag to communicate with other foxes.\r\n The red fox is known for its exceptional cleverness, intelligence, cunning and adaptability. When there is an excess of food, the red fox will partially bury its food, covering it with soil, leaves, grass or the like and mark it with urine. He does this to preserve the food for future use.\r\nThe red fox&#39;s resourcefulness has earned it a legendary reputation for intelligence and cunning.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7031, 'Hedgehog Finger Puppet', 0, 'Folkmanis', '201121', '201121', 'Finger Puppets', 0.00, 3.99, 0.00, 0, 'Hedgehogs are nocturnal animals that will roll up into a ball for protection. This little ball of fun has soft plush "spines" so it is ok to cuddle.\r\n\r\nHedgehogs are especially valued by avid gardeners as a natural (and adorable) means of pest control.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7032, 'Panda Finger Puppet', 0, 'Folkmanis', '201122', '201122', 'Finger Puppets', 0.00, 6.99, 0.00, 0, 'The panda is one of the best recognized animals, but it is endangered.  There are only about 1000 pandas in the wild.\r\n\r\nPandas can be as dangerous as a mad bear, but people think they are these cute sweet animals.  Pandas usually live around 20 years in the wild and up to 30 years in captivity.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7033, 'Baby Harp Seal', 5, 'Folkmanis', '201123', '201123', 'Finger Puppets', 0.00, 6.99, 0.90, 0, 'The sweet-faced harp seal pup remains white only three weeks of its infancy. After the pups are weaned at about 2 weeks of age, they start to molt in patches, leaving a dense silver-grey fur with black spots.\r\nIn normal dives harp seals come up to breathe every five minutes. They can and will dive to a depth of 600ft. and stay down thirty minutes.\r\nHarp seals have a horseshoe-shaped band of black straddling the back when the become adults.  Mother Harp seals identify their own offspring from the multitudes by their smell.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7034, 'Penguin Finger Puppet', 5, 'Folkmanis', '201124', '201124', 'Finger Puppets', 0.00, 5.99, 0.00, 0, 'Penguins are torpedo shaped birds with black and white feathers and a funny waddle.  But unlike most birds, penguins are not able to fly.   Penguins average speed in the water is about 15 miles per hour.\r\nThe only time penguins are airborn is when they leap out of the water.  Penguins will often do this to get a gulp of air before diving back down for fish.  Penguins cannot breathe underwater, though they are able to hold their breath for a long time.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7035, 'Moose Finger Puppet', 5, 'Folkmanis', '201125', '201125', 'Finger Puppets', 0.00, 6.99, 0.80, 0, 'Moose are the largest of all the deer species and are more unpredictable than any other animal.  Moose have long faces and muzzles that dangle over their chins. A flap of skin known as a bell sways beneath each moose&#39;s throat. Moose are so tall that they prefer to browse higher grasses and shrubs.  Moose are good swimmers and can swim for several miles.  Moose’s antlers take three to five months to develop and are one of the fastest growing organs in the animal kingdom.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7036, 'Yak Finger Puppet', 5, 'Folkmanis', '201126', '201126', 'Finger Puppets', 0.00, 7.99, 0.10, 0, 'Yaks have dense, close, matted base coat as well as a shaggy outer layer.  They secrete a sticky, icky stuff in their sweat which keeps their under hair matted and extra warm.  Yaks are good followers, stepping in the front or lead yaks footprints. In wniter a wild yak can survive temperatures a low as -40 degrees.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7037, 'Giraffe Stage Puppet', 0, 'Folkmanis', '201127', '201127', 'Stage Puppets', 0.00, 17.99, 0.00, 0, 'The tongue of an adult giraffe measures 27 inches and he can lick his eyes.   His tongue is not the only big thing about him, his step is 15 feet in length.   Giraffes require very little sleep and sleep from 5 to 30 minutes in 24 hours.  Lucky for the giraffe, he has elastic blood vessels which makes it possible for him to drink without fainting.   The giraffe&#39;s spots can indicate a giraffes age as they become darker.  Each giraffe has a unique coat pattern.The Giraffe Stage Puppet features a soft movable mouth and beautiful patterning. Design details include suede-like nose and ears, ultra-soft sculpted plush, and its long signature eyelashes.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7038, 'Elephant Stage Puppet', 1, 'Folkmanis', '201128', '201128', 'Stage Puppets', 0.00, 18.99, 7.00, 0, 'The elephant is the largest animal that lives on land.  Elephants can weigh as much as a school bus.  The elephants trunk is used for breathing and smelling and also used as an appendage like an arm. They eat so much they can poop 80 pounds a day.\r\nWhen elephants travel, they walk very quietly in single file. Young elephants are led by the older elephants with their tails.\r\nThis ELEPHANT STAGE PUPPET is one armful of fun with unique fabrics and a fun, movable trunk.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7039, 'Zebra Stage Puppet', 0, 'Folkmanis', '201129', '201129', 'Stage Puppets', 0.00, 15.99, 0.00, 0, 'No animal has a more distinctive coat than the zebra. Each animal&#39;s stripes are as unique as fingerprints—no two are exactly alike—although each of the three species has its own general pattern.\r\nZebras have both day and night vision. It is believed that zebras also have color vision.  Zebras spend much time chewing, which wears their teeth down, so the teeth keep growing all their lives.  Zebras take dust or mud baths to get clean. They shake the dirt off to get rid of loose hair and flaky skin. What&#39;s left protects them from sun, wind, and insects.\r\nThe Zebra Stage Puppet features an easily animated mouth and lots of expression! Design details include a leatherette nose, soft vintage-look plush with beautiful striping and a distinctive black and white mane.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7040, 'Ostrich Stage Puppet', 1, 'Folkmanis', '201130', '201130', 'Stage Puppets', 0.00, 21.99, 4.70, 0, 'The flightless ostrich is the world&#39;s largest bird.  . They can sprint up to 43 miles an hour and run over distance at 31 miles an hour.  Contrary to popular belief, ostriches do not bury their heads in the sand but at the approach of trouble, ostriches will lie low and press their long necks to the ground in an attempt to become less visible.  Ostriches hold their wings out to help them balance when they run, especially if they suddenly change direction.  Ostrich feathers don’t hook together the way feathers of other birds do, giving ostriches that "shaggy" look.  Ostriches do not have the special gland that many birds have that waterproofs their feathers so the ostrich feathers get soaked. Ostriches lay the biggest egg in the world , the equivalent of two dozen chicken eggs.  Long eye lashes and a soft sueded beak make this Ostrich Stage Puppet proud to pull her head out of the sand and join in on some puppet fun.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile\r\n  .', NULL),
(7041, 'Camel Stage Puppet', 0, 'Folkmanis', '201131', '201131', 'Stage Puppets', 0.00, 21.99, 0.00, 0, 'Camels have lived in some of the most desolate corners of our planet, and not only do they live, they thrive, and their humps do not store water, as believed, they store fat.  They can eat almost anything be it vegetation, meat, or bone,-- salty or sweet, a camels stomach knows no limits.  They are docile and sweet under a caring hand, but stubborn and angry if ill treated.   Camels have a double row of very long eyelashes and a clear inner eyelid which protects the eye from sandstorms while still letting in enough light for camels to see.  They also have hairs in the opening of the ear to help stop blowing sand from filling up their ears, and they can shut their nostrils.  With sandy colored vintage-like crushed-plush, bushy-lashes and a workable mouth, this Camel Stage Puppet assures you&#39;ll neveYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhiler be thirsty for love!', NULL),
(7042, 'Panda Stage Puppet', 1, 'Folkmanis', '201132', '201132', 'Stage Puppets', 0.00, 21.99, 6.00, 0, 'The Panda is a full-bodied, cuddly Folkmanis puppet that sits 10 inches high. An adorable face and soft, padded paws give this panda an endearing personality. \r\n\r\n  Panda Fact:  Pandas have a huge head.  They are 4 years of age before it is known if they are a boy or a girl.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7043, 'Racoon Finger Puppet', 5, 'Folkmanis', '201134', '201134', 'Finger Puppets', 0.00, 6.99, 1.00, 0, 'This stripy-tailed, masked bandit and raider of garbage cans sits perched to steal your heart. From his clever paws to the end of his bushy tail, this Raccoon finger puppet has the classic look of the always-in-trouble, but too-cute-to-punish.\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile.', NULL),
(7044, 'Antler Art', 1, 'SafariStuff LLC', '201136', '201136', 'Antlers', 0.00, 99.99, 0.00, 1, 'Design your own antler art and include your pictures, logos or brands either on a center medallion or on wood.  Engrave your stone base with name or whatever you want.\r\n\r\nThis design has a spot for your business cards.  You can order one with the spot or without.  This design is for sale.', NULL),
(7045, 'Antler Arch', 0, 'SafariStuff LLC', '201137', '201137', 'Antlers', 0.00, 155.00, 0.00, 1, 'Intriguing antler arch.  Each piece is different.  Each medallion in the center has a different shape, color and smoothness.  The stone is unique in shape and color.  You choose your stone color and shape, either rough, broken effect or smooth edges.', NULL),
(7046, 'Antler Arch', 1, 'SafariStuff', '201138', '201138', 'Antlers', 0.00, 155.00, 5.30, 0, 'Intriguing antler arch.  Each piece is different.  Each medallion in the center has a different shape, color and smoothness.  The stone is unique in shape and color.  You choose your stone color and shape, either rough, broken effect or smooth edges from our Stone pictures.  If you do not see what you want, let us know and we will see what we have in our stock, that is not pictured.\r\n\r\nWe will email you stone choices and medallion choices.  You choose the words or pictures you want.  We have a stock of pictures if you want to use one of them.\r\n\r\nThese antler products are created especially for you.  This is a customized design and it is not for sale.', NULL),
(7047, 'Antler Arch', 1, 'SafariStuff LLC', '201139', '201139', 'Antlers', 0.00, 145.00, 4.20, 1, 'This design is showing a different arch.  Yours will be similiar in size, but not exactly like this one.  Each antler has different characteristics and looks different when mounted.\r\n\r\nThis design uses a wood medalion and is for sale.  You can choose an antler medallion if you prefer.', NULL),
(7048, 'Antler Arch', 1, 'SafariStuff LLC', '201140', '201140', 'Antlers', 0.00, 160.00, 3.00, 1, 'We designed an arch using longer antlers, to make it taller.  The medallion in the middle is an interesting shape and will engrave well.    This design is for sale.', NULL),
(7049, 'Antler Art', 0, 'SafariStuff LLC', '201141', '201141', 'Antlers', 0.00, 110.00, 0.00, 1, '', NULL),
(7050, 'Antler Desk Art', 1, 'SafariStuff', '201145', '201145', 'Antlers', 0.00, 99.00, 3.00, 1, 'These unique beautiful designs are made from shed antlers.  You can personalize the medallion in the center and the stone the antler rests on.  The stone can be either polished edges or rough edges for a more natural look.  The shapes of the medallions are different and will be chosen to fit the antler size and shape.  You can have a choice of having hair around the edges of the medallion or no hair.\r\n\r\nThis design is for sale', NULL),
(7051, 'Antler Designs', 1, 'SafariStuff LLC', '201146', '201146', 'Antler', 0.00, 110.00, 3.00, 1, 'These unique beautiful designs are made from shed antlers.  You can personalize the medallion and the stone.  We select the medallion that best fits the antler design.  You can choose either a medallion with hair around the edges or no hair.  Its your choice for words or pictures on the medallion.', NULL),
(7052, 'Antler Art', 1, 'SafariStuff  LLC', '201149', '201149', 'Antlers', 0.00, 120.00, 4.50, 1, 'This unique design would look great on the counter of your business.  Your business cards show off nicely in the card holder.   It would also be a conversation piece on a mantle.  The card slot can be left out.  This design is for sale.', NULL),
(7053, 'Antler Dest Art', 0, 'SafariStuff LLC', '201150', '201150', 'Antlers', 0.00, 99.99, 3.00, 1, 'Design your own antler art and include your pictures, logos or brands either on a center medallion or on wood.  Engrave your stone base with name or whatever you want. This design has a spot for your business cards.  You can order one with the spot or without.  This design is for sale.', NULL),
(7054, 'Antler Napkin Rings', 6, 'SafariStuff LLC', '201151', '201151', 'Antlers', 0.00, 39.95, 1.00, 1, 'Set your table with these unique napkin rings.  Add a toothpick holder to create an exciting table design.  Even choose an antler design that is not too tall for the centerpiece of your table.\r\nEach napkin ring is individual in shape.  We try to match each ring in a set, but some slight variation is expected.  That is what makes these so unique.\r\nChoose your picture, logo or initials for the items.  We will work with you to create a piece of art for your table.', NULL),
(7055, 'Antler Pencil Holder', 6, 'SafariStuff LLC', '201157', '201157', 'Antlers', 0.00, 17.95, 0.00, 1, 'Keep pencils and pens in one spot on your desk.  Some of the designs hold several pencils or pens and others just hold three in their own separate slot.  The ones that hold only three are shorter than the ones that have room for more.  Order your initials or picture or logo on your pencil holder.  We work with you to design what you want for your desk.', NULL),
(7056, 'Stuffed Pony', 0, '', '201160', '201160', 'Stuffed Animals', 0.00, 9.95, 0.00, 1, '', NULL),
(7057, 'Antler Desk Art', 0, 'SafariStuff LLC', '201170', '201170', 'Antlers', 0.00, 110.00, 0.00, 1, 'These unique beautiful designs are made from shed antlers.  You can personalize the medallion in the center and the stone the antler rests on.  The stone can be either polished edges or rough edges for a more natural look.  The shapes of the medallions are different and will be chosen to fit the antler size and shape.  You can have a choice of having hair around the edges of the medallion or no hair.', NULL),
(7058, 'Antler Art', 0, 'SafariStuff LLC', '201171', '201171', 'Antlers', 0.00, 110.00, 0.00, 1, 'These unique beautiful designs are made from shed antlers.  You can personalize the medallion in the center and the stone the antler rests on.  The stone can be either polished edges or rough edges for a more natural look.  The shapes of the medallions are different and will be chosen to fit the antler size and shape.  You can have a choice of having hair around the edges of the medallion or no hair.', NULL),
(7059, 'Antler Art', 0, '', '201172', '201172', 'Antlers', 0.00, 110.00, 0.00, 1, 'These unique beautiful designs are made from shed antlers.  You can personalize the medallion in the center and the stone the antler rests on.  The stone can be either polished edges or rough edges for a more natural look.  The shapes of the medallions are different and will be chosen to fit the antler size and shape.  You can have a choice of having hair around the edges of the medallion or no hair.', NULL),
(7060, 'Antler Art', 0, 'SafariStuff', '201173', '201173', 'Antlers', 0.00, 130.00, 0.00, 0, 'We designed an arch using longer antlers, to make it taller.  The medallion in the middle is an interesting shape and will engrave well.    This design is for sale', NULL),
(7061, 'Antler Art', 1, 'SafariStuff', '201175', '291175', 'Antlers', 0.00, 110.00, 3.00, 0, 'These unique beautiful designs are made from shed antlers.  You can personalize the medallion in the center and the stone the antler rests on.  The stone can be either polished edges or rough edges for a more natural look.  The shapes of the medallions are different and will be chosen to fit the antler size and shape.  You can have a choice of having hair around the edges of the medallion or no hair.', NULL),
(7062, 'Antler Art', 1, 'SafariStuff', '201176', '201176', 'Antlers', 0.00, 99.99, 3.50, 0, 'Design your own antler art and include your pictures, logos or brands either on a center medallion or on wood.  Engrave your stone base with name or whatever you want. This design has a spot for your business cards.  You can order one with the spot or without.  This design is for sale.', NULL),
(7063, 'Antler Arch', 1, 'SafariStuff', '201177', '201177', 'Antlers', 0.00, 99.00, 3.20, 0, 'This design is showing a different arch.  Yours will be similiar in size, but not exactly like this one.  Each antler has different characteristics and looks different when mounted.  This design uses a wood medalion and is for sale.  You can choose an antler medallion if you prefer.', NULL),
(7064, 'Antler Art', 0, 'SafariStuff', '201178', '201178', 'Antlers', 0.00, 120.00, 0.00, 0, 'This unique design would look great on the counter of your business.  Your business cards show off nicely in the card holder.   It would also be a conversation piece on a mantle.  The card slot can be left out.  This design is for sale.', NULL),
(7065, 'Antler Napkin Rings', 6, 'SafariStuff', '201179', '201179', 'Antlers', 0.00, 39.99, 1.00, 0, 'Set your table with these unique napkin rings.  Add a toothpick holder to create an exciting table design.  Even choose an antler design that is not too tall for the centerpiece of your table.\r\nEach napkin ring is individual in shape.  We try to match each ring in a set, but some slight variation is expected.  Some parts of an antler accept engraving better than other parts of the same antler.  That is what makes these so unique.\r\nChoose your picture, logo or initials for the items.  We will work with you to create a piece of art for your table.', NULL),
(7066, 'Antler Pencil Holder', 0, 'SafariStuff', '20110', '201180', 'Antlers', 0.00, 19.99, 0.00, 0, 'Keep pencils and pens in one spot on your desk.  Some of the designs hold several pencils or pens and others just hold three in their own separate slot.  The ones that hold only three are shorter than the ones that have room for more.  Order your initials or picture or logo on your pencil holder.  We work with you to design what you want for your desk.', NULL),
(7067, 'Barn Owl', 0, 'Folkmanis', '201181', '201181', 'Finger Puppets', 0.00, 6.99, 0.00, 0, 'The barn owl is a raptor, a nocturnal bird of prey that is found almost everywhere.  A barn owl&#39;s "satellite dish" face helps pick up the faintest leaf rustle or mouse peep from hundreds of feet away. His ears are positioned at about eye level, just behind the ridge of facial feathers. One ear is positioned higher than the other as part of a cool 3D hearing system.  His huge 42" wingspan accommodates slow silent flight - silent due to soft fringe-edged feathers that don&#39;t "swoosh" as they move.  With her pretty heart-shaped face and big black eyes, this miniaturized Barn Owl finger puppet seeks a perch atop your finger. Whooo could be cuter?\r\nYou can maintain your puppets&#39; appearance by brushing whenever they need a touch up. Animals with long plush also enjoy a nice fluffing once in awhile', NULL),
(7068, 'Barn Owl', 0, 'SafariStuff LLC', '201183', '201183', 'Finger Puppets', 0.00, 6.99, 0.00, 1, 'The barn owl is a raptor, a nocturnal bird of prey that is found almost everywhere.  A barn owl&#39;s "satellite dish" face helps pick up the faintest leaf rustle or mouse peep from hundreds of feet away. His ears are positioned at about eye level, just behind the ridge of facial feathers. One ear is positioned higher than the other as part of a cool 3D hearing system.  His huge 42" wingspan accommodates slow silent flight - silent due to soft fringe-edged feathers that don&#39;t "swoosh" as they move.  With her pretty heart-shaped face and big black eyes, this miniaturized Barn Owl finger puppet seeks a perch atop your finger. Whooo could be cuter?', NULL),
(7069, 'Medallions', 10, 'SafariStuff', '201189', '201189', 'Antlers', 0.00, 17.95, 0.80, 0, 'These medallions are cut from the butt end of the antler.  There are only a couple of these slices available from each antler.  The medallions engrave nicely and make beautiful coasters.  Shown are a few different sizes and shapes of these medallions', NULL),
(7104, 'Giraffe Plaque', 1, '', '2011216', '2011216', 'Wood Products', 0.00, 31.50, 0.00, 0, 'The plaque is fake wood, but i very realistic looking. The detail on this picture is quite intricate.  A beautiful plaque that is for sale.', NULL),
(7070, 'AntlerArt', 1, 'Safari Stuff', '201190', '201190', 'Antlers', 0.00, 119.00, 2.50, 0, 'We create interesting designs from some of the unique features of an antler.  Distinguish your home with one of our beautiful designs.  The antler in this piece of art, has an extra growth on one of the tines.  There will never be another antler shaped like this.', NULL),
(7071, 'Soft Plush Pony', 0, '', '201191', '201191', 'Plush Toys', 0.00, 12.95, 0.00, 0, 'I am a soft cuddly pony, needing some love and attention.  Please take me home and love me.', NULL),
(7072, 'Plush Girffe', 1, '', '201192', '201192', 'Plush Toys', 0.00, 16.95, 0.00, 0, 'I am very cuddly and love to be held.  My legs do not stand up, I am a lazy giraffe and have not worked at standing for a long while.  Please take me home.', NULL),
(7073, 'Plush Sitting Giraffe', 1, '', '201193', '201193', 'Plush Toys', 0.00, 13.95, 0.00, 0, 'This cute soft plush giraffe likes to sit.  He dosen&#39;t stand-up and looks awkward when he sleeps, so he sleeps sitting down.  He needs a permanent home filled with love and affection.', NULL),
(7074, 'Plush Standing Giraffe', 1, '', '201195', '201195', 'Plush Toys', 0.00, 12.95, 0.00, 0, 'This is a super soft toy.  He has a cute face and top-knot.  He is looking for a forever home with people to love and to love him.', NULL),
(7075, 'Soft Long Neck Giraffe', 1, '', '201196', '201196', 'Plush Toys', 0.00, 10.95, 0.00, 0, 'I am home-made and my stuffing is not as soft as other plush animals.  My neck is very long and sometimes I have trouble holding it up straight.  I really need a wonderful home where someone will love me, just because I am me.', NULL),
(7076, 'Elephant with a Long Trunk', 0, '', '201197', '201197', 'Plush Toys', 0.00, 12.95, 0.00, 0, 'I am home-made and not as soft as a plush toy, but still cuddly.  I sometimes have trouble with my trunk.  It gets in the way of things.  I am looking for a home where they will take care of me and my trunk.  I have been told that my trunk is a little large for my body, but I have learned to cope.', NULL),
(7077, 'Cute Lion', 1, '', '201198', '201198', 'Plush Toys', 0.00, 12.95, 0.00, 0, 'I am hand-made with love and care.  My mane is my favorite part of me.  I am not as soft as a plush toy, but I am still cuddly.  I wish for a forever home where they will help me learn lion behavior and love me.', NULL),
(7078, 'Screaming Monkey', 6, '', '201199', '201199', 'Plush Toys', 0.00, 8.95, 0.00, 0, 'Pull my arm and I fly across the room screaming and laughing.  A fun toy, but a little noisy.  This is a favorite toy of the kids.', NULL),
(7079, 'Finger Puppets', 2, '', '2011100', '2011100', 'Finger Puppets', 0.00, 6.99, 0.00, 0, 'These small finger puppets do not want to be separated, so we are selling them together.  They fit smaller fingers.', NULL),
(7080, 'Handful of Puppets', 0, '', '2011101', '2011101', 'Finger Puppets', 0.00, 2.95, 0.00, 0, 'Choose this handful of puppets for a fun time.  Put one on each finger and have them play together.', NULL),
(7081, '6 x 8 Logo', 0, 'SafariStuff', '2011102', '2011102', 'Wood Products', 0.00, 49.99, 0.00, 0, 'Send us your logo or brand and we can burn it into a piece of wood.  This is an excellent way to preserve your favorite picture.', NULL),
(7082, 'Engraved Wine Glass', 45, 'Libby', '2011104', '2011104', 'Glassware', 3.50, 7.95, 0.00, 0, 'Engrave your logo, initials, or name on a wine glass.  The pictures do not do justice to the engraving, but give an idea of what can be done.', NULL),
(7083, '8 x 10 Image', 0, 'SafariStuff', '2011105', '2011105', 'Wood Products', 0.00, 77.99, 0.00, 0, 'Send us your photo to be engraved on wood.  It is amazing how well they turn out.', NULL),
(7084, 'Logo Gloves', 0, 'SafariStuff', '2011106', '2011106', 'Gloves', 0.00, 19.95, 0.00, 0, 'Design your own gloves or a pair to give as a gift.  Let your imagination loose and create a masterpiece.', NULL),
(7085, 'Animal Picture Gloves', 0, 'SafariStuff', '2011107', '2011107', 'Gloves', 0.00, 19.95, 0.00, 0, 'We can burn an image on a pair of gloves.  They look very good.  These are some of the images from our stock.', NULL),
(7086, 'Fun Gloves', 0, 'SafariStuff', '2011109', '2011109', 'Gloves', 0.00, 19.95, 0.00, 0, 'Have some fun with your gloves.  Think of a good picture and a saying.  We will work with you to create just the right effect.', NULL),
(7087, 'Photo Gloves', 0, 'SafariStuff', '2011110', '2011110', 'Gloves', 0.00, 19.95, 0.00, 0, 'This photo is over 40 years old.  Photos come out amazingly well.', NULL),
(7088, 'Irregular Desk Name Plate', 0, 'SafariStuff LLC', '20111012', '20111012', 'Stone Products', 0.00, 27.95, 1.50, 0, 'Enhance your desk with one of our beautiful name plates.  This one is a random broken stone.', NULL),
(7089, 'Irregular Name Plate', 0, 'SafariStuff LLC', '2011113', '2011113', 'Stone Products', 0.00, 27.95, 0.00, 0, 'We use natural stone.  This is another broken shape and different color stone.', NULL),
(7090, 'Irregular Name Plate', 0, 'SafariStuff', '2011114', '2011114', 'Stone Products', 0.00, 27.95, 0.00, 0, 'This is a lower version of a broken stone name plate.   It also shows another stone color.', NULL),
(7091, 'Iregular Name Plate', 0, 'SafariStuff', '2011115', '2011115', 'Stone Products', 0.00, 27.95, 0.00, 0, 'An interesting color and shape.  This stone is for sale.', NULL),
(7092, 'Irregular Name Plate', 1, 'SafariStuff', '2011116', '2011116', 'Stone Products', 0.00, 27.95, 0.00, 0, 'A taller version and a beautiful stone.  This stone is for sale.', NULL),
(7093, 'Irregular Name Plate', 0, 'SafariStuff', '2011117', '2011117', 'Stone Products', 0.00, 27.95, 0.00, 0, 'A beautiful piece of stone.  This name plate is for sale.', NULL),
(7094, 'Rectangle Name Plates', 0, 'SafariStuff', '2011119', '2011119', 'Stone Products', 0.00, 34.50, 0.00, 0, 'The edges of these stones can be left rough or polished.  These stone name plates make an interesting addition to your desk.', NULL),
(7095, 'Rectangle Name Plate', 0, 'SafariStuff', '2011201', '2011201', 'Stone Products', 0.00, 34.50, 0.00, 0, 'The lettering needs to be colored on these white stones.  Choose your color.', NULL),
(7096, 'Rectangle Name Plate', 0, 'SafariStuff', '2011202', '2011202', 'Stone Products', 0.00, 34.50, 0.00, 0, 'The lettering shows up white on this stone, but can be colored.  Choose polished edges or leave them natural.', NULL),
(7097, 'Rectangle Name Plate', 0, 'SafariStuff', '2011203', '2011203', 'Stone Products', 0.00, 34.50, 0.00, 0, 'Interesting color and texture on this stone.  The picture does not do it justice.', NULL),
(7098, 'Stone Dish', 0, 'SafariStuff', '2011204', '2011204', 'Stone Products', 0.00, 65.50, 0.00, 0, 'A very shallow dish, this makes a beautiful reflecting pool when you add a little bit of water.  It is also handy to show off small items.', NULL),
(7099, 'Stone Dish', 0, 'SafariStuff', '2011205', '2011205', 'Stone Products', 0.00, 76.50, 0.00, 0, 'Natural stones come in lots of colors and no two are alike.  This bowl was carved out of just a piece of larger stone.  We chose the section of the stone we liked.  This is a beautiful stone that is very varied in its color.  Not all stones have this many colors.   Let us know what you would like and we will find a piece that may work for you and email you the picture.  This is a deeperdish than the reflecting pool and is wonderful as a tray for veggies and dip.', NULL),
(7100, 'Hearth Pad', 0, 'SafariStuff', '2011206', '2011206', 'Stone Products', 0.00, 475.00, 300.00, 0, 'Make your freestanding stove a beautiful addition to your living area.  Our hearth pads are all different and come in many colors.  This hearth stone has cut off corners.', NULL),
(7101, 'Hearth Pad', 0, 'SafariStuff', '2011207', '2011207', 'Stone Products', 0.00, 475.00, 0.00, 0, 'With rounded edges in the front, this hearth stone is a toe saver.  You can order a back stone to finish your look.', NULL),
(7102, 'Hearth Pad', 0, 'SafariStuff', '2011208', '2011208', 'Stone Products', 0.00, 475.00, 300.00, 0, 'Sometimes a light color really sets off your freestanding stove.  This is a beautiful stone that doesn&#39;t show up that well in this picture.', NULL),
(7103, 'Shot Glass', 0, 'SafariStuff', '2011209', '2011209', 'Glassware', 0.00, 10.95, 0.00, 0, 'If you collect shot glasses this is one of the heaviest we have found.  It is a and very nice glass and the designs come out well.  Add your name, initial or a picture to your shot glass.  This one is for sale.', NULL),
(7105, 'Giraffe Mask', 1, '', '2011217', '2011217', 'Wood Products', 0.00, 14.99, 0.00, 0, 'If you collect masks this is a nice addition to a collection.  Well made and interesting.  This mask is for sale.', NULL),
(7106, 'Giraffe Mask', 0, '', '2011218', '2011218', 'Toys and Games', 3.19, 5.95, 0.00, 0, 'Good masks are hard to find.  This one allows good eyesight and covers the wearer&#39;s face.  Wear a checked shirt and you are set. This mask is for sale.', NULL),
(7107, 'Bag of Animals', 1, '', '2011219', '2011219', 'Toys and Games', 7.95, 9.95, 0.00, 0, 'A whole collection of wild animals.  These are smaller items and not good for small children.', NULL),
(7108, 'Bingo Pongo', 0, '', '2011220', '2011220', 'Toys and Games', 0.00, 3.95, 0.00, 0, 'My first "I Play Games.  Warning: choking hazzard , small parts, Not for Children under 3 years.  This game is for 2 - 4 people ages 3+', NULL),
(7109, 'Magnetic Alphabet Bingo', 0, '', '2011225', '2011225', 'Toys and Games', 0.00, 3.99, 0.00, 0, '2 -4 Players ages 4+.    WARNING: Choking hazard, small parts, not for children under 3', NULL),
(7110, 'I Have Game', 1, '', '2011227', '2011227', 'Toys and Games', 5.00, 6.99, 0.00, 0, 'A game of quick reading and fast talking, this game is for children ages 5 and up.  Two or more players can play.', NULL),
(7111, 'Schleich Camel', 1, 'Schleich', '2011228', '2011228', 'Toys and Games', 0.00, 6.95, 0.00, 0, 'Bactrian camels two-humped bodies are perfect for desert travel. They have broad feet for walking on sand. Their long eyelashes shield their eyes from sand, and their nostrils close to keep sand out. The humps on their backs actually store energy for when they have a long journey ahead of them.  Camels can also drink salty water and have been known to drink one third of their body weight in ten minutes! The thick fur on their head and hump shed annually.  The camel can reach speeds of forty miles per hour when running', NULL),
(7112, 'Schleich Kangaroo', 1, 'Schleich', '2011229', '2011229', 'Toys and Games', 0.00, 5.49, 0.00, 0, 'Kangaroos&#39; babies stay in their mother&#39;s pouches for up to a year while she cares for them. They are herbivores; and only eat plants.  They&#39;re nocturnal and spend their days sleeping or resting. When male kangaroos fight, it looks like they&#39;re boxing. They stand on their hind legs and push, jab, and kick at each other. They live in groups called mobs. Kangaroos are able to attain speeds of forty miles per hour while hopping', NULL),
(7113, 'Schleich Giraffe Calf', 1, 'Schleich', '2011230', '2011230', 'Toys and Games', 0.00, 4.99, 0.00, 0, 'Giraffes are the tallest land mammals.-- their babies can reach six feet tall when they&#39;re born!  They spend most days just ambling around, but when they decide to run, they&#39;re fast and can reach up to thirty five miles per hour!  Giraffes sleep for only up to an hour at a time and can survive without sleep for an entire day.', NULL),
(7114, 'Schleich Female Giraffe', 0, 'Schleich', '2011231', '2011231', 'Toys and Games', 0.00, 6.99, 0.00, 0, 'Giraffes have several knobs, called ossicones, on their heads that are covered with fur.  A giraffe&#39;s heart can measure two feet long and weigh twenty-two pounds.  A giraffe has the same number of vertebrae in their neck as a human.', NULL),
(7115, 'Schleich Zebra', 1, 'Schleich', '2011233', '2011233', 'Toys and Games', 0.00, 5.99, 0.00, 0, 'Zebras spend most of the day grazing on grass, leaves, bark, roots, and stems.  Each zebra&#39;s pattern of stripes is unique.  Their excellent hearing and vision help them escape predators.  Once a year, hundreds of thousands of zebras gather to migrate in search of food and water. They never wander too far from a source of water and can live about thirty years in the wild.   Zebras have night vision which helps them to keep an eye on their predators.', NULL),
(7116, 'Playing Cards', 0, '', '2011235', '2011235', 'Toys and Games', 3.99, 4.99, 0.00, 0, 'Enjoy a game of cards and learn about animals too.  Talk to your children about the different animals on the 14 different cards and help them learn about wildlife.', NULL),
(7117, 'Blue Mosaic Giraffe', 1, '', '2011236', '2011236', 'Glassware', 0.00, 10.49, 0.00, 0, 'This is not a toy as it is made out of glass chips.  It is a beauiful piece.', NULL),
(7118, 'Mosaic Giraffe', 1, '', '2011237', '2011237', 'Glassware', 0.00, 10.95, 0.00, 0, 'This piece is made out of glass chips.  Not to be used as a toy.', NULL),
(7119, 'Finger Puppet Care', 0, '', '20112000', '20112000', 'Finger Puppets', 0.00, 0.05, 0.00, 0, 'Did you ever feel somewhat droopy following a long car trip? After several days in a stuffy box, your puppets may appear a little travel-weary. To freshen them up, we recommend a shake-out and thorough grooming with a wire or coarse-bristled brush. By brushing with – rather than against – the fabric grain, you’ll quickly restore the quality and realism of the animal’s fur. BUT NOTE THIS WARNING: a strong brush is no friend to the eyes and ears of an animal. Both can be scratched and damaged if care is not taken to avoid these sensitive areas\r\n DO NOT PUT IN WASHER OR DRYER. This will destroy your puppet. Furry plush puppets are surface-washable only. Do not submerge the puppet in water. Use lukewarm water and sponge with Woolite® or other mild laundry detergent to wet and lather fur. Rinse surface with sponge. Be careful not to wring or twist the puppet, or you may end up with lumpy stuffing. Dry by gently squeezing between towels, or hanging from clothesline to drip-dry. After it’s dry, brush with wire dog brush to fluff the fur. When brushing face, be careful to avoid scratching the eyes or pulling out the threads in ears, nose, or mouth areas.', NULL),
(7120, '50 Personalized Golf Tees', 0, '', '2011241', '2011241', 'Wood Products', 0.00, 5.50, 0.00, 0, 'Personalize your own golf tees or give them as an inexpensive thoughtful gift for your golfer friends and family.  The tees come in different lengths.  The 2 1/4 tees can hold about 25 letters or numbers, depending on the size of the print.\r\nThe engraving shows up very well, the picture does not show as good as they really are.', NULL),
(7121, 'Personalized Knife', 0, '', '2011242', '2011242', 'Others', 0.00, 10.00, 0.00, 0, 'The price is for engraving one blade on your knife.  If you want more than one blade engraved, please contact us for pricing.\r\nIf you want to purchase the whole knife from us, we will need to know what brand of knife you want and the price will change to include the cost of the knife.', NULL),
(7122, 'Animal Peg Puzzle', 1, 'Melissa & Doug', '2011321', '2011321', 'Toys and Games', 11.95, 14.95, 0.00, 0, 'This solid wood puzzle is good for ages 2+.  Melissa & Doug puzzles meet or exceed all U.S. testing standards.  They are hand crafted, using non-toxic coatings.', NULL),
(7123, 'Giraffes Can&#39;t Dance', 0, '', '2011342', '2011342', 'Books', 0.00, 15.95, 0.00, 0, 'Gerald the giraffe longs to dance but his legs are too skinny and his neck is too long.  This is a tale wth gentle inspiration for every child with dreams of greatness.\r\n\r\nThe book uses light hearted rhymes and wonderful illustrations to get the point across.', NULL),
(7124, 'Baby Giraffe', 0, '', '2011343', '2011343', 'Books', 0.00, 5.95, 0.00, 0, 'This book is produced by the San Diego Zoo to give children the opportunity to learn about giraffes.  These animals are usually only seen in zoos.  Giraffes are an endangered species and have lost 80% of their numbers in the last 10 years.  We need to work to save these animals from more decline.', NULL),
(7125, 'Encyclopedia of Animals', 0, 'University of California Press', '2011344', '2011344', 'Books', 0.00, 39.95, 0.00, 0, 'A complete visual guide with color photos and interesting facts.  If you want to teach your children about animals, this book is an excellent tool.', NULL),
(7126, 'Giraffes', 0, 'Wildlife Education Ltd', '2011345', '2011345', 'Books', 0.00, 4.95, 0.00, 0, 'Did you know that giraffe have feet the size of a dinner plate.  The babies fall 6 feet to the ground when they are born.  This is a first book with cute illustrations.', NULL),
(7127, 'New Baby Giraffe', 0, 'Soundprints', '2011346', '2011346', 'Books', 0.00, 5.95, 0.00, 0, 'Parents Choice Foundation has given their approval of this book.  The pictures are beautiful.  This is another children\\\\\\&#39;s first book.', NULL),
(7128, 'That&#39;s Not My Mom', 0, '', '2011347', '2011347', 'Books', 0.00, 12.99, 0.00, 0, 'A humorous story with fun fold-out flaps, and beautiful illustrations.', NULL),
(7129, 'Never, Ever Shout in a Zoo', 0, '', '2011348', '2011348', 'Books', 0.00, 15.95, 0.00, 0, 'In this hilarious cause and effect story one innocent little shout from a young girl snowballs and creates chaos among the zoo animals.  But does the girl learn her lesson and not shout anymore?', NULL),
(7130, 'Zoo Poo', 0, '', '2011349', '2011349', 'Books', 0.00, 5.95, 0.00, 0, 'Come visit the zoo and see how the animals poo in the funniest places!  Tis book also includes toilet training tips.', NULL),
(7131, 'The Gas We Pass', 0, '', '2011350', '2011350', 'Books', 0.00, 12.95, 0.00, 0, 'This is a funny, well written book that explains farts in a unique way.', NULL),
(7132, 'I am a Little Kangaroo', 0, '', '2011351', '2011351', 'Books', 0.00, 3.95, 0.00, 0, 'A little book with great illustrations, about the life of a young kangaroo.  Cute book.', NULL),
(7133, 'I am a Little Giraffe', 0, '', '2011353', '2011352', 'Books', 0.00, 3.95, 0.00, 0, 'Follow a baby giraffe as he travels around with his mother.', NULL),
(7134, 'Petuna Series', 0, '', '2011355', '2011355', 'Books', 0.00, 6.95, 0.00, 0, '', NULL),
(7135, 'Petuna Series', 0, '', '2011356', '2011356', 'Books', 0.00, 6.95, 0.00, 0, '', NULL),
(7136, 'Pet Memorial', 0, 'SafariStuff', '2011357', '2011357', 'Antlers', 0.00, 49.95, 0.00, 0, 'Remember your pet with an attractive, unique piece of art.  Inscribe your words or picture on the medallion in the center.  There is also room for a small inscription on the stone.', NULL),
(7137, 'Pet Memorial', 1, 'SafariStuff', '2011358', '2011358', 'Antlers', 0.00, 55.00, 0.00, 0, 'A little larger design.  We can hang a wood medallion or an antler medallion in the center.  You decide what you want on the medallion and on the stone.', NULL),
(7138, 'Antler Art', 0, 'SafariStuff', '2011359', '2011359', 'Antlers', 0.00, 85.00, 0.00, 0, 'This antler allows for two places to inscribe.  A name will fit on the antler and more words or a small picture can go on the unique piece of an antler across the top.', NULL),
(7139, 'Cork Screw', 0, '', '2011360', '2011360', 'Others', 0.00, 55.95, 0.00, 0, 'Caribou antler handles make this corkscrew a masterpiece.  It is beautiful.', NULL),
(7140, 'Corkscrew', 0, '', '2011561', '2011561', 'Others', 0.00, 75.95, 0.00, 0, 'Caribou antler with a twist.', NULL),
(7141, 'Corkscrew', 0, '', '20113563', '2011363', 'Others', 0.00, 45.95, 0.00, 0, 'Lilac wood corkscrew.  You choose what you want to engrave on the handle.', NULL),
(7142, 'Picture Frame', 0, 'SafariStuff', '2011364', '2011364', 'Antlers', 0.00, 35.95, 0.00, 0, 'Choose a picture frame and we can add antlers to it.  You are the designer, we just make it like you want.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE IF NOT EXISTS `product_options` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `price_impact` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1471 ;

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`id`, `product_id`, `option_name`, `options`, `price_impact`) VALUES
(1465, 7025, 'Size', 'S', 0.00),
(1466, 7025, 'Size', 'M', 0.00),
(1467, 7028, 'Size', '24x36', 0.00),
(1468, 7028, 'Size', '48x72', 20.00),
(1469, 7028, 'Material', 'Posterboard', 0.00),
(1470, 7028, 'Material', 'Laminated', 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `discount_percent` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `min_amount` decimal(10,2) NOT NULL,
  `storewide` tinyint(4) NOT NULL,
  `sales` decimal(10,2) NOT NULL,
  `savings` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `message`, `start`, `end`, `promo_code`, `discount_percent`, `discount_amount`, `min_amount`, `storewide`, `sales`, `savings`) VALUES
(11, 'New Site', 'New site, so everything is on sale.', '2010-12-02', '2010-12-04', '1202', 10.00, 0.00, 0.00, 1, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `promo_category`
--

CREATE TABLE IF NOT EXISTS `promo_category` (
  `id` int(11) NOT NULL auto_increment,
  `promotion_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `promo_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `promo_manufacturer`
--

CREATE TABLE IF NOT EXISTS `promo_manufacturer` (
  `id` int(11) NOT NULL auto_increment,
  `promotion_id` int(11) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `promo_manufacturer`
--


-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `id` int(11) NOT NULL auto_increment,
  `tier` int(11) NOT NULL,
  `max_amt` decimal(10,2) NOT NULL,
  `ground` decimal(10,2) NOT NULL,
  `third_day` decimal(10,2) NOT NULL,
  `second_day` decimal(10,2) NOT NULL,
  `next_day` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shipping`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `first_name` varchar(255) default NULL,
  `last_name` varchar(255) default NULL,
  `zip_code` int(11) default NULL,
  `email` varchar(255) default NULL,
  `password_hash` varchar(255) default NULL,
  `role` varchar(255) default 'User',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `zip_code`, `email`, `password_hash`, `role`) VALUES
(24, 'Judy', 'Rivers', 99117, 'Admin', 'fc53b6b32174263ae16dcb515ece919e2ef1e648', 'admin'),
(25, 'Andy', 'Canfield', 99209, 'Andrew@thepog.net', '80d54a973c2816ad086cf34ae23d6a9351a5afda', 'user'),
(26, 'Vicki', 'Rivers', 98837, 'suezb@hotmail.com', '63f76f8486ea6dd4109bae04f8d43912477084fb', 'user'),
(27, 'charity', 'riggs', 47885, 'bayjaandchris@yahoo.com', 'c6a8e1342872c257f8aa082748b7e525126bae7a', 'user'),
(28, 'Larry', 'Utzinger', 98855, 'geviutz@yahoo.com', 'fe9c03baba73e4c78df0038d479014c7cae7875b', 'user');
