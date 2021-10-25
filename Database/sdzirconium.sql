-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2021 at 06:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdzirconium`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-03-31 07:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` bigint(20) NOT NULL,
  `User_id` int(20) NOT NULL,
  `item_id` int(20) DEFAULT NULL,
  `userEmail` varchar(120) DEFAULT NULL,
  `quantity` int(20) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `Total` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactusquery`
--

CREATE TABLE `contactusquery` (
  `id` bigint(20) NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `About` varchar(120) NOT NULL,
  `ContactNumber` varchar(120) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `Vimage1` varchar(120) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `id` bigint(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `parcel` int(11) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`id`, `name`, `parcel`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Poslaju', 0, '2021-10-09 05:36:56', NULL),
(2, 'GDex', 0, '2021-10-09 05:37:06', NULL),
(3, 'ABX Express', 0, '2021-10-09 05:37:16', NULL),
(4, 'J&T Express', 0, '2021-10-09 05:37:23', NULL),
(5, 'Skynet Express', 0, '2021-10-09 05:37:31', NULL),
(6, 'Citylink', 0, '2021-10-09 05:37:38', NULL),
(7, 'DHL Express', 0, '2021-10-09 05:37:46', NULL),
(8, 'FedEx', 0, '2021-10-09 05:37:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` bigint(20) NOT NULL,
  `MembershipName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `MembershipName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Premium', '2021-09-27 08:28:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `ptype` varchar(120) NOT NULL,
  `title` varchar(120) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `perm` varchar(120) NOT NULL,
  `stock` int(120) NOT NULL,
  `brand` varchar(120) NOT NULL,
  `description` varchar(999) NOT NULL,
  `ribbon` varchar(120) NOT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `delivery` varchar(120) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ptype`, `title`, `price`, `perm`, `stock`, `brand`, `description`, `ribbon`, `Vimage1`, `Vimage2`, `Vimage3`, `delivery`, `date`, `pid`) VALUES
(1, '2', 'All Purpose Flour', '2.60', 'Kg', 0, 'Cap Sauh', 'This also known as All Purpose Flour. A high quality flour specially blended and enriched with iron & vitamins to enhance its nutritional values. You can use it to make cakes, cookies, and bread. It also works as a thickening agent and other cooking required flour.\r\n\r\n-protein content : 9.5-10.5%\r\n\r\n-milled from a combination of soft and hard wheat.\r\n\r\n-to make crumbly , textured  tarts and biscuits , short crust pastry and for making sauces.\r\n- suitable for cake and biscuit .', 'New', 'cap sauh1.png', 'cap sauh2.png', 'cap sauh3.png', '', '2021-10-09 06:26:07', 0),
(2, '2', 'Cooking Oil', '35.19', 'Bottle', 0, 'Naturel Blend', 'Made from pure and natural ingredients, Naturel Blend cooking oil is an original blend of Canola and Sunflower oils. It contains Omega 3 & 6 that are essential to the well-being of our body. It also has monounsaturates, naturally rich in Vitamin E and is cholesterol free. Importance of Omega 3 & 6: Essential for normal growth in children, and in aiding regular cardiovascular and neurological functions. Importance of Monounsaturates: Help reduce bad cholesterol in the body.', 'New', 'oil1.png', 'oil2.png', 'oil3.png', '', '2021-10-09 06:37:11', 0),
(3, '2', 'Omega-3 Eggs', '7.35', 'Box', 0, 'Nutri Plus', 'NutriPlus With Omega-3 Is The Result Of Feeding Our Chickens An All-Natural Based Quality Feed Mix Of Soybean Meal, Corn, Palm Oil, Vitamin Mixes And Flaxseed, One Of Nature’s Richest Source Of Omega-3. This Also Results In Eggs With Much Lower Cholesterol Compared To Regular Eggs.\r\n\r\nNutriPlus With Omega-3 Contains 5 Times More Omega-3 (200-400mg Per Egg) And 4 Times More Vitamin E (2.5-3.0mg Per Egg), Along With Vitamins A, B12 And D.\r\n\r\nApart From Helping Maintain A Healthy Heart, Omega-3 Is \'Brain Food\' Which Aids In The Development And Function Of The Neurological System And Of Retina Tissues.\r\n\r\nOmega-3 Is Also Believed To Reduce The Risk Of Heart Disease, Hypertension, Stroke, Rheumatoid Arthritis And Some Forms Of Cancer, As Well As Lowering LDL (Bad Cholesterol) Levels.', 'New', 'egg1.png', 'egg2.png', 'egg3.png', '', '2021-10-09 06:44:56', 0),
(4, '1', 'Crunchy Tempura Chicken Nuggets', '16.00', 'Item', 0, 'Nutri Plus', 'Made from fresh 100% skinless and lean air-chilled chicken meat, Wise Choice is the healthier snack for you and your family. And, each Wise Choice nugget is generously breaded, delicately flavoured, and meatier so good health never tasted so great.', 'New', 'nugget1.png', 'nugget2.png', 'nugget3.png', '', '2021-10-09 06:51:06', 0),
(5, '1', 'French Fries', '12.35', 'Kg', 0, 'Simplot', 'Crisp, crunchy, classic potato taste!, Cholesterol free, No artificial flavours or colours, No added preservatives, Halal Control, Everything in the Simplot range is not just tasty, it\'s wholesome food too. It\'s packed with goodness because we never use artificial colours or flavours and what\'s more, we\'re working all the time to make our products better and better. The good things are always Simply Good\r\n\r\nFrench Fries Straight Cut\r\n\r\nServings per package: 10, Serving size: 100g', 'New', 'fries1.png', 'fries2.png', 'fries3.png', '', '2021-10-09 06:54:55', 0),
(6, '1', 'Ice Cream', '34.50', 'ml', 0, 'Haagen Dazs', 'Haagen-Dazs ice cream tubs. Real indulgence with just four ingredients: real cream, milk, eggs and sugar. Haagen-Dazs is blended with carefully selected ingredients, to create a luxury ice cream with a unique velvety texture and unforgettable taste.', 'Popular', 'ic1.png', 'ic2.png', 'ic3.png', '', '2021-10-09 07:00:38', 0),
(7, '4', 'Raw Chicken', '13.80', 'Kg', 0, 'Zirconium Fresh Grocer', 'Whole Chicken (Standard) With An Estimated Weight Of 1.5KG.', 'New', 'chicken1.png', 'chicken2.png', 'chicken3.png', '', '2021-10-09 07:08:50', 0),
(8, '4', 'Salmon Fillet', '69.38', 'Kg', 0, 'Zirconium Fresh Grocer', 'Salmon Fillet with estimated weight of 1Kg. Please contact Zirconium Customer Service for selecting your fillet part (optional). Don\'t forget to give your order \"id\" for confirmation.', 'Popular', 'salmon2.png', 'salmon1.png', 'salmon3.png', '', '2021-10-09 07:14:04', 0),
(9, '4', 'A5 Wagyu Beef Cut', '654.69', 'Kg', 0, 'Kobe Wagyu Beef', 'Wagyu beef—you know, the transcendently tender, fatty, umami-rich steak—has become as synonymous with luxury as caviar or black truffles. But no matter how many Michelin-starred menus this delicacy graces, all of the facts about Wagyu steak still tend to elude even the most seasoned diners. The best wagyu beef that you can buy is right here!', 'Popular', 'wagyu1.png', 'wagyu2.png', 'wagyu3.png', '', '2021-10-09 07:19:31', 0),
(10, '5', 'Eumenthol Candy', '9.19', 'Item', 0, 'HUDSON\'S', ' Hudson’s Eumenthol jujubes is a pure gum jujube, a gum base derived from the Acacia tree, with the combination of two main ingredients Eucalyptus and menthol. The product dissolves slowly in the mouth, providing a gradual release of the active ingredients for the relief of cough, sore throats and smokers’ throats, leaving a pleasant, refreshing sensation and fresh breath. It is also useful to singers and public speakers for clearing and strengthening the voice. Fast delivery within 2- 5 w/days. Flavors: Honey Lemon, Mint & Classic.', 'New', 'Jubjubs1.png', 'jubjubs2.png', 'jubjubs3.png', '', '2021-10-24 20:08:55', 0),
(11, '5', 'Swiss Chocolate', '7.31', 'Item', 0, 'Toblerone', 'Toblerone is a Swiss chocolate bar made with honey and almond nougat. Created in 1908 by Theodor Tobler, Toblerone is now available around the world and is instantly recognized thanks to its unique chocolate peak shape and unmistakable packs. Made in Switzerland. Flavors: Classic Milk Chocolate, Dark Chocolate, White Chocolate & Milk Chocolate with Crunchy Almonds.', 'Popular', 'toblerone.png', 'toblerone2.png', 'toblerone3.jpg', '', '2021-10-24 20:17:57', 0),
(12, '5', 'Chocolate bar', '4.39', 'Unit', 0, 'Kinder Bueno', 'Kinder Bueno is a chocolate bar made by Italian confectionery maker Ferrero. Kinder Bueno, part of the Kinder Chocolate brand line, is a hazelnut cream filled chocolate bar, that contains small amounts of wafer. It has been up for some debate whether a Kinder Bueno is a chocolate bar or a wafer. Bueno is a delicate chocolate bar with an indulgent taste. Each melt-in-the-mouth piece promises creamy hazelnut, smooth chocolate and crispy wafer for you to enjoy. It comes in single portions, individually wrapped.', 'New', 'bueno2.jpg', 'bueno1.jpg', 'bueno3.jpg', '', '2021-10-24 20:21:52', 0),
(13, '6', 'Proactive Guard Overnight Wing', '11.90', 'Unit', 0, 'KOTEX', 'Embrace all-round protection against heavy flow and sudden gushes. With revolutionary rise-up guard features that provides you with up to 100% no back leaks during period nights. Sizes : 28cm, 32cm, 35cm, 41cm.', 'New', 'kotex.png', 'kotex2.jpg', 'kotex3.jpg', '', '2021-10-24 20:26:58', 0),
(14, '6', 'Aloe Vera Gel', '25.66', 'Item', 0, 'Nature Republic', 'Enriched with natural aloe vera! This soothing gel with California aloe vera can be used to mildly moisturize various parts of the body such as the face, arms, legs, and hair. Suggested use: Apply an appropriate amount to dry, sensitive parts of the face and body often for the best results. Ingredients: Aloe barbadensis leaf extract (92%), alcohol, glyceryl polyacrylate, dipropylene glycol, butylene glycol, glycerin, propylene glycol, 1,2-hexanediol, polyglutamic acid, betaine, sodium hyaluronate, calendula officinalis flower extract, mentha viridis (spearmint) extract, melissa officinalis extract, carbomer, peg-60 hydrogenated castor oil, triethanolamine, phenoxyethanol, water, parfum, disodium edta, linalool, butylphenyl methylpropional. Warnings: For external use only. Avoid contact with eyes. Discontinue use if signs of irritation or rashes appear. Keep out of reach of children. Replace the cap after use. Disclaimer: While iHerb strives to ensure the accuracy of its product images', 'Popular', 'aloe1.jpg', 'aloe2.jpg', 'aloe3.jpg', '', '2021-10-24 20:32:23', 0),
(15, '6', 'Gentle Skin Cleanser for Face & Body', '62.66', 'Bottle', 0, 'Cetaphil', 'Cetaphil Gentle Skin Cleanser gently cleans and moisturises without stripping skin’s natural oils. This soap- and fragrance-free formulation has won numerous awards from beauty industry insiders and the healthcare community. It is formulated to work for all skin types, even for babies and very sensitive skin. It’s the dermatologist-trusted cleanser for healthy and beautiful skin.\r\n\r\nBENEFITS\r\n• 99% women agree that Cetaphil Gentle Skin Cleanser gently cleans and moisturises¹\r\n• No. 1 dermatological skincare brand in Malaysia²\r\n* Soap- and fragrance-free\r\n• Ideal for both face and body\r\n• Works without causing skin irritation\r\n• pH-balanced and non-irritating formulation\r\n• Can be used with or without water', 'New', 'ceta1.jpg', 'ceta2.jpg', 'ceta3.jpg', '', '2021-10-24 20:35:34', 0),
(16, '7', 'Iphone 13 Pro Max', '5299.99', 'Unit', 0, 'Apple', 'A dramatically more powerful camera system. A display so responsive, every interaction feels new again. The world’s fastest smartphone chip. Exceptional durability. And a huge leap in battery life. Our Pro camera system gets its biggest upgrade ever. With next-level hardware that captures so much more detail. Super-intelligent software for new photo and filmmaking techniques. And a mind-blowingly fast chip that makes it all possible. It’ll change the way you shoot.Macro photography comes to iPhone.With its redesigned lens and powerful autofocus system, the new Ultra Wide camera can focus at just 2 centimetres — making even the smallest details seem epic. Transform a leaf into abstract art. Capture a caterpillar’s fuzz. Magnify a dewdrop. The beauty of tiny awaits. Macro stills are just the beginning. You can also shoot macro videos — including slow motion and time-lapse. Prepare to be mesmerised. iPhone 13 Pro was made for low light. The Wide camera adds a wider aperture and our large', 'Popular', 'iphone-13-pro-max3.jpg', 'iphone-13-pro-max1.jpg', 'iphone-13-pro2.png', '', '2021-10-24 20:39:38', 0),
(17, '7', 'Samsung S21 Ultra', '5299.00', 'Unit', 0, 'Samsung', 'Introducing Galaxy S21 Ultra 5G. Designed with a unique contour-cut camera to create a revolution in photography — letting you capture cinematic 8K video and snap epic stills, all in one go. And with Galaxy\'s fastest chipset, strongest glass, 5G and an all-day battery, Ultra easily lives up to its name. Introducing a bold new camera design in a category of its own. It\'s ultra-sized with a contour-cut camera that seamlessly houses cutting-edge lenses. Its slim bezels and subtle camera cut-out offer a massive space for you to view and enjoy. Designed to scratch less and protect both front and back, this is the toughest Gorilla Glass in a Galaxy smartphone.', 'New', 'samsung1.jpg', 'samsung2.jpg', 'sasmung3.jpg', '', '2021-10-25 03:02:15', 0),
(18, '8', 'Astrox Pro Badminton Racket', '669.00', 'Item', 0, 'Yonex', 'Astrox 99 Pro Badminton Racket: More Power, More Aggression. Yonex recently launched Astrox 99 Pro badminton racket in September of 2021. In collaboration with men\'s singles world no. 1 Kento Momota, Yonex has transformed its Astrox 99 racket to become more powerful. The AX99-P badminton racket has the heaviest swing weight of the Astrox series that makes smashes stronger and faster than ever. It has the innovative Power Assist Bumper to add more weight than conventional grommets, enhance the Rotational Generator System, and deliver quicker weight transfer to the shuttle.', 'New', 'racket1.png', 'racket2.png', 'racket3.jpg', '', '2021-10-25 03:05:47', 0),
(19, '8', 'Nike Mecurial Vapor 14 Elite', '1199.99', 'Unit', 0, 'Nike', 'Every layer of the Nike Mercurial Vapor 14 Elite By You was built to enhance your game, bringing together the essential components for speed, optimal touch and dependable traction. Highlight the technological mastery of your boots and your moves with a new design console that gives you even more control over your look on the pitch.', 'New', 'nike1.jpg', 'nike2.jpg', 'nike3.jpg', '', '2021-10-25 03:08:00', 0),
(20, '8', 'Los Angeles Lakers Diamond Icon Edition', '389.00', 'Pcs', 0, 'Nike', 'Every team has an iconic identity, the true colours that have resonated with fans for generations.The Los Angeles Lakers Diamond Icon Edition Swingman Jersey commemorates the league\'s milestone 75th anniversary season with faceted diamond-inspired logos and an updated jock tag.The jersey has a new drop-tail hem with side vents to let you move freely.This product is made from at least 75% recycled polyester fibres.', 'New', 'lakers1.jpg', 'lakers2.jpg', 'lakers3.jpg', '', '2021-10-25 03:15:53', 0),
(21, '9', 'Baby Jumpscape', '599.00', 'Unit', 0, 'Skip Hop', 'Designed in collaboration with a pediatrician, our baby activity center supports a \"whole body\" approach to play and learning. Easy to assemble, with toys that can be positioned anywhere for baby, it features a 360-degree rotating seat that turns and stretches for bouncing. Our unique Discovery Window lets baby see their feet while they play to learn cause and effect. As baby grows, our activity center converts for easy cruising-ultimately becoming a clean, sturdy table for coloring, playing and more.', 'New', 'baby1.jpg', 'baby2.jpg', 'baby3.jpg', '', '2021-10-25 03:18:50', 0),
(22, '9', 'Baby Camping Cubs Gym', '395.90', 'Unit', 0, 'Skip Hop', 'With a woodgrain-patterned structure, this baby gym has a whimsical outdoor feel. The printed mesh backdrop sets the ultimate campground scene, while the plush, sleeping bear tummy time pillow encourages developmental milestones. A light-up firefly, musical raccoon and other nature friends help to develop baby\'s sensory skills. ', 'New', 'camping1.jpg', 'camping2.jpg', 'camping3.jpg', '', '2021-10-25 03:20:27', 0),
(23, '10', 'Harry Potter Box Set: The Complete Edition', '436.63', 'Box', 0, 'J.K Rowling', 'Escape to Hogwarts with the unmissable series that has sparked a lifelong reading journey for children and families all over the world!\r\n\r\nHarry Potter has never even heard of Hogwarts when letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harry\'s eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news - Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry. The magic starts here ...\r\n\r\nThese irresistible editions, presented in a gorgeous slipcase featuring Hogwarts, are the essential Harry Potter. A must have for every child at the start of the most magical reading adventure. These books are to be treasured and read time and time again, as readers lose themselves in the greatest children\'s story of all time.', 'New', 'potter1.jpg', 'potter2.jpg', 'potter3.jpg', '', '2021-10-25 04:34:34', 0),
(24, '10', 'The alchemist', '34.41', 'Item', 0, 'Paolo Coelho', 'The 25th Anniversary Edition of the beloved novel!\r\nSantiago, a young shepherd living in the hills of Andalucia, feels that there is more to life than his humble home and his flock. One day he finds the courage to follow his dreams into distant lands, each step galvanised by the knowledge that he is following the right path: his own. The people he meets along the way, the things he sees and the wisdom he learns are life-changing.', 'New', 'paolo1.jpg', 'paolo2.jpg', 'paolo3.jpg', '', '2021-10-25 04:36:29', 0),
(25, '11', 'Artisan Stand Mixer', '3159.00', 'Unit', 0, 'Kitchen Aid', 'Choose from over 18 different colors of the Artisan Series Tilt-Head Stand Mixer for the one that perfectly matches your kitchen design or personality. Easily make your favorite cakes and multiple batches of cookie dough with the 4.8 L stainless steel mixing bowl with comfortable handle. With 10 speeds, the stand mixer will quickly become your kitchen\'s culinary center as you mix, knead and whip ingredients with ease. And for even more versatility, the power hub fits optional attachments from food grinders to pasta makers and more.', 'New', 'aid1.jpg', 'aid2.jpg', 'aid3.jpg', '', '2021-10-25 04:38:46', 0),
(26, '11', 'Built In Oven R312', '3299.00', 'Unit', 0, 'ROBAM', ' ● Independent top & bottom temperature control\r\n● 1℃ Precise control\r\n● 3D Roasting tube\r\n● Roasting  rotisserie\r\n● Fully LCD display & sensor touch control\r\n● 8 Cooking function\r\n● 3-Layer glass door with 2 layers of low-E-glass\r\n● High-temperature protection\r\n● Durable enamel cavity and trays\r\n● Removable racks\r\n● Easy cleaning roasting tubes', 'New', 'oven1.jpg', 'oven2.jpg', 'oven3.jpg', '', '2021-10-25 04:40:46', 0),
(27, '11', '660L Side-by-side smart refrigerator', '9199.00', 'Unit', 0, 'Samsung', '-Family Hub : Food Management, Family Communication, Entertainment, Connected Living\r\n-SpaceMax Technology: Large capacity to store more food\r\n-All-around Cooling Technology: Evenly cooling from corner to corner, keeps food fresher and longer', 'New', 'fridge1.png', 'fridge2.png', 'fridge3.jpg', '', '2021-10-25 04:43:39', 0),
(28, '12', '959 Ducati Panigale Superbike', '78218.08', 'Unit', 0, 'Ducati', 'The Ducati 959 Panigale is a 955 cc sport bike manufactured by Ducati as the successor to the 898 cc 899. The motorcycle is named after the small manufacturing town of Borgo Panigale. It was announced in 2015 for the 2016 model year.', 'New', 'ducati1.jpg', 'ducati2.jpg', 'ducati3.jpg', '', '2021-10-25 04:46:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` bigint(20) NOT NULL,
  `dop` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `User` varchar(120) NOT NULL,
  `house` varchar(120) NOT NULL,
  `street` varchar(120) NOT NULL,
  `city` varchar(120) NOT NULL,
  `postalCode` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL,
  `country` varchar(120) NOT NULL,
  `courier` varchar(120) NOT NULL,
  `payment` varchar(120) NOT NULL,
  `quantity` int(120) NOT NULL,
  `item` int(20) NOT NULL,
  `Total` decimal(20,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(20) NOT NULL,
  `typename` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `typename`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Frozen', '2021-09-24 09:18:20', NULL),
(2, 'Groceries', '2021-09-24 09:27:07', NULL),
(3, 'Fresh Groceries', '2021-09-24 09:27:27', NULL),
(4, 'Fresh Products', '2021-09-24 09:27:40', NULL),
(5, 'Confectioneries', '2021-09-24 09:27:48', NULL),
(6, 'Health & Beauty', '2021-09-24 09:29:56', NULL),
(7, 'Electronics', '2021-09-24 09:30:11', NULL),
(8, 'Sports & Lifestyle', '2021-09-24 09:30:19', NULL),
(9, 'Babies & Toys', '2021-09-24 09:30:28', NULL),
(10, 'Books', '2021-09-24 09:30:32', NULL),
(11, 'Appliances', '2021-09-24 09:30:38', NULL),
(12, 'Automotive & Motorcycles', '2021-09-24 09:30:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `full_name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `userEmail` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `contactusquery`
--
ALTER TABLE `contactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `last_name` (`email`),
  ADD KEY `first_name` (`full_name`),
  ADD KEY `country` (`country`),
  ADD KEY `city` (`city`),
  ADD KEY `gender` (`gender`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactusquery`
--
ALTER TABLE `contactusquery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
