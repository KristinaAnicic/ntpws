-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 12:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ntpws_projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` varchar(2) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subheading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `subheading`, `description`, `content`, `date`, `user_id`, `archive`) VALUES
(1, 'The Evolution of RPGs: From Classic Adventures to Open Worlds', 'Tracing the Journey of Role-Playing Games from Text-Based Origins to Immersive Worlds', 'RPGs have evolved from simple text-based adventures to sprawling, immersive worlds. Let’s explore the journey and see where this beloved genre is headed.', 'Early RPGs were simple text-based adventures that allowed players to explore worlds through the power of their imagination Titles like Zork and Colossal Cave Adventure offered minimal graphics but stood out for their rich stories and challenging puzzles, giving players a strong sense of immersion.\r\n            \r\nOver time, RPGs evolved into graphically sophisticated games like Ultima and Wizardry, introducing 2D graphics and more complex combat systems. During the \'80s and \'90s, console RPGs like Final Fantasy and Chrono Trigger won players’ hearts worldwide, further raising expectations within the RPG genre.\r\n            \r\nThe introduction of 3D graphics and open worlds in titles like The Elder Scrolls and Baldur’s Gate allowed players freer exploration and nonlinear storytelling, along with more character customization options. RPGs became deeper and more varied, allowing players to shape their adventures.\r\n            \r\nMMORPGs like World of Warcraft opened doors for shared adventures and team missions with millions of players globally, bringing a new social aspect to RPGs and widening possibilities for cooperative exploration.\r\n\r\nToday, advancements in virtual reality and artificial intelligence bring new possibilities to the RPG genre. Games now use technology to offer personalized stories and ever-evolving worlds. The future of RPGs promises even deeper storytelling and more innovative ways to craft personal adventures.', '2024-11-01', NULL, 0),
(2, 'Top Indie Games of 2024: Hidden Gems Worth Playing', 'Celebrating Creative Freedom and Unique Experiences in Indie Gaming', 'Indie games are thriving, offering unique stories and gameplay experiences. Check out some of the best indie titles of the year that you may have missed.', 'Indie games often bring unique creativity and freedom that AAA titles lack. Independent developers can experiment and explore stories, styles, and gameplay without the constraints of major publishers, making the indie scene a source of diversity and originality.\r\n            \r\nIn 2024, the indie scene offers a wide array of innovative titles. Games like Celeste and Hollow Knight have set the standard for quality and creativity in indie gaming, while new titles bring fresh ideas and approaches.            \r\n\r\nIndie games often attract players with retro styles and pixel-art graphics that evoke nostalgia, while also bringing modern depth and challenge. With minimalist aesthetics, these games often offer complex stories and challenging gameplay that appeal to a broad audience.\r\n\r\nBig hits like Hades and Undertale show how indie games can exceed expectations and become global phenomena. Many indie developers work alone or in small teams, creating personal, auteur-driven games that frequently tackle important themes and social issues.\r\n\r\nIndie games will continue to be a vital part of the gaming industry, bringing authenticity and innovation. 2024 promises even more unforgettable indie titles that will continue to inspire players and set new standards in the world of video games.', '2024-10-15', NULL, 0),
(3, 'Esports in 2024: The Rise of New Contenders', 'Exploring the Rapid Expansion and New Talent in Competitive Gaming', 'Esports continues to grow, with new games, tournaments, and talent emerging each year. Here’s what’s changing in the world of competitive gaming.', 'The esports industry has grown immensely, evolving from small competitions in the early 2000s to a global industry that includes millions of viewers and professional players. Tournaments like the League of Legends World Championship and The International have become massive events, with prize pools that surpass many traditional sports.\r\n            \r\nThe year 2024 brings fresh faces and new titles to the esports scene, from innovative games like Valorant and Apex Legends to mobile games popular in Asia, such as PUBG Mobile and Free Fire. This variety of games broadens the pool of players and teams competing at a high level.\r\n\r\nThe rise of mobile esports has opened doors for young talent from countries where mobile platforms are more popular than consoles. In many parts of the world, mobile esports has become a serious platform, attracting teams, sponsors, and growing viewership.\r\n\r\nSupport from major brands and sponsors has helped esports reach new heights. Companies like Red Bull, Coca-Cola, and tech giants are investing in esports, increasing the industry’s visibility and allowing new events and leagues to emerge.\r\n            \r\nIn the future, esports could become part of the Olympic program, further expanding the reach and legitimacy of this industry. With new technologies like virtual and augmented reality, the esports scene is becoming richer, offering more opportunities for professional players and viewers worldwide.', '2024-10-28', NULL, 0),
(4, 'The Future of Gaming Graphics: Ray Tracing and Beyond', 'How Emerging Graphics Technology is Transforming Visual Realism in Games', 'With the advancement of graphics technology, modern games look more realistic than ever. Here’s how ray tracing and other technologies are shaping the future of gaming visuals.', 'Ray tracing brings a new level of realism to games by simulating natural light, shadows, and reflections in a way that was previously possible only in movies. Games like Cyberpunk 2077 and Control use this technology to create stunning worlds, setting new expectations for visuals in gaming.\r\n            \r\nRay tracing allows for incredible visual depth, especially in scenes with reflective surfaces or complex light sources. With faster GPUs and better development tools, ray tracing is now accessible even in mainstream titles.\r\n\r\nBesides ray tracing, new technologies like DLSS (Deep Learning Super Sampling) enable games to maintain high resolution and performance using artificial intelligence. DLSS allows for smoother graphics with fewer resources, making it a crucial tool for game development.\r\n\r\nVirtual reality (VR) introduces new possibilities in graphics. With VR technology, players can step into fully realistic 3D worlds, which requires impressive graphics that can keep up with all player movements and reactions in real-time.\r\n\r\nThe future of graphics technology in gaming promises stunning visuals that will create a deeper gaming experience. As hardware continues to improve, games are expected to look increasingly realistic, allowing players to immerse themselves in worlds that feel almost lifelike.', '2024-11-03', NULL, 0),
(5, 'Mobile Gaming Revolution: How Smartphones Became Gaming Consoles', 'The Rise of Mobile Gaming as a Serious Platform for Immersive Experiences', 'Mobile gaming has come a long way from casual games to full-fledged experiences. Here’s how smartphones are reshaping the gaming landscape.', 'Mobile gaming has come a long way from simple titles like Snake and Tetris to graphically advanced games that rival console titles today. With advancements in hardware and software, mobile gaming has become a significant part of the gaming industry.\r\n\r\nTitles like Genshin Impact and Call of Duty: Mobile have redefined mobile gaming, offering players fully immersive experiences even on smartphones. These games use advanced graphics and complex combat systems that were once impossible on mobile platforms.\r\n\r\nIn many parts of the world, especially in Asia, mobile games have become the dominant platform for gamers. Many games are designed specifically for mobile devices, using customized controls and optimized performance for on-the-go gaming.\r\n\r\nSmartphone manufacturers now actively optimize devices for gamers, adding faster processors, enhanced displays, and features like cooling systems to allow for uninterrupted gameplay. These devices are increasingly similar to portable consoles. \r\n\r\nMobile gaming will continue to transform the gaming industry, and smartphones will keep evolving to support ever more demanding games. The future of mobile gaming promises even richer and more engaging experiences as technology advances.', '2024-10-22', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE `news_images` (
  `id` int(11) NOT NULL,
  `news_id` int(11) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `main` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_images`
--

INSERT INTO `news_images` (`id`, `news_id`, `title`, `image_url`, `caption`, `main`) VALUES
(1, 1, 'Elden ring', 'img/news/news-article-1.jpg', 'Award winning action-RPG ELDEN RING sold 20 million units worldwide.', 1),
(2, 1, 'Baldur\'s Gate 3', 'img/news/news-article-1-2.jpg', 'Baldur\'s Gate 3 is a story-driven, party RPG set in the Dungeons & Dragons universe, where your choices influence a tale of fellowship and betrayal.', 0),
(3, 1, 'Cyberpunk', 'img/news/news-article-1-3.jpg', 'Cyberpunk is a tabletop role-playing game in the dystopian science fiction genre, written by Mike Pondsmith', 0),
(4, 2, 'Tunic', 'img/news/news-article-3.jpg', 'Tunic is a 2022 action-adventure game developed by Isometricorp Games and published by Finji.', 1),
(5, 2, 'Sea of Stars', 'img/news/news-article-3-2.jpg', 'Sea of Stars has won Best Indie Game at the Golden Joystick Awards 2023 powered by Intel.', 0),
(7, 2, 'Death’s Door', 'img/news/news-article-3-3.jpg', 'Death’s Door is a charming boss battle dungeon crawler with challenging rather than brutal combat.', 0),
(8, 3, 'Players competing', 'img/news/news-article-2.jpg', 'Players competing in a League of Legends tournament', 1),
(9, 3, 'G2 Esports victory', 'img/news/news-article-2-3.jpg', 'G2 Esports won the 2023 LEC Season Finals with a 3–1 victory over Fnatic', 0),
(10, 4, 'Deathloop - ray tracing', 'img/news/news-article-4.jpg', 'Deathloop supports Ray Tracing Sun Shadows and Ray Tracing Ambient Occlusion.', 1),
(11, 4, 'Cyberpunk 2077 - ray tracing', 'img/news/news-article-4-2.png', 'In these screenshots from Cyberpunk 2077, you can clearly see the difference when ray tracing is turned on and off.', 0),
(12, 4, 'Minecraft - ray tracing', 'img/news/news-article-4-3.jpg', 'Microsoft’s Mojang and Nvidia are adding a rendering technique called ray tracing to “Minecraft.”', 0),
(14, 5, 'Mobile gaming', 'img/news/news-article-5.jpg', 'Mobile gaming is the most popular form of gaming in the world, overtaking both console and PC gaming.', 1),
(15, 5, 'Genshin Impact', 'img/news/news-article-5-2.jpg', 'At the gamescom award 2024, Genshin Impact has won the \"Best Mobile Game\" award', 0),
(17, 5, 'Arm\'s Open-Source Upscaler', 'img/news/news-article-5-3.jpg', 'Arm\'s Open-Source Upscaler Brings PC-Quality Graphics to Smartphones', 0),
(37, NULL, 'Astrobot', 'img/games/astrobot.jpg', 'Astro Bot\'s story is a simple one. A UFO crashes into a PS5 carrying more than 300 bots, and our protagonist Astro Bot is the only one left unscathed.', NULL),
(38, NULL, 'Black Myth: Wukong', 'img/games/black-myth-wukong.png', 'Black Myth: Wukong is an action RPG rooted in Chinese mythology. You shall set out as the Destined One to venture into the challenges and marvels ahead, to uncover the obscured truth beneath the veil of a glorious legend from the past.', NULL),
(39, NULL, 'Destiny 2', 'img/games/destiny-2.jpg', 'Destiny 2 is an action MMO with a single evolving world that you and your friends can join anytime, anywhere.', NULL),
(40, NULL, 'The Legend of Zelda: Tears of the Kingdom', 'img/games/Tears-of-the-Kingdom.jpg', 'Explore the vast land—and skies—of Hyrule. An epic adventure awaits in the Legend of Zelda: Tears of the Kingdom game, only on the Nintendo Switch system.', NULL),
(41, NULL, 'Minecraft', 'img/games/minecraft.jpg', 'Dive into an open world of building, crafting, and survival. Gather resources, survive the night, and build whatever you can imagine one block at a time.', NULL),
(42, NULL, 'Party Animals', 'img/games/party-animals.jpg', 'Fight your friends as puppies, kittens, and other fuzzy creatures in PARTY ANIMALS! Paw it out with your friends remotely, or huddle together for chaotic fun on the same screen.', NULL),
(43, NULL, 'Valorant', 'img/games/valorant.jpg', 'Riot Games presents VALORANT: a 5v5 character-based tactical FPS where precise gunplay meets unique agent abilities.', NULL),
(44, NULL, 'Marvel\'s Spider-Man 2', 'img/games/spider-man-2.jpg', 'Be Greater. Together. The incredible power of the symbiote forces Peter Parker and Miles Morales into a desperate fight as they balance their lives, friendships, and their duty to protect.', NULL),
(45, NULL, 'Neva', 'img/games/neva.jpg', 'Neva is an emotionally-charged action adventure from the visionary team behind the critically acclaimed GRIS.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'editor'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `country_id`, `city`, `address`, `date_of_birth`, `role_id`, `active`) VALUES
(1, 'John', 'Doe', 'jdoe', 'john.doe@gmail.com', '$2y$10$BItNFpPaB2Zi0u4Cc1DYaO0EsVv6L6Zy0IlCF5WJuTpcS9aTcETQK', 12, 'Oranjestad', 'L.G. Smith Blvd 82', '2024-11-08', 2, 1),
(20, 'Laura', 'Williams', 'lwilliams', 'laura.williams@example.com', '$2y$10$FU2aeXaSMOd8G5jCUY3I0utaO8z4RJ7wxJ.vJF8kRiqM8cZSRam4S', 36, 'Phnom Penh', '123 Norodom Blvd', '2024-11-08', 3, 0),
(22, 'admin', 'admin', 'aadmin', 'admin@example.com', '$2y$10$..uBc.un1.4dWUCnd/3nDebVaXQ3IxwwMlGrG5qMUcvcfqF2lLy12', 52, 'Zagreb', 'Kustošijski Venec 65, 10000', '1993-06-23', 1, 1),
(23, 'Emma', 'Johnson', 'ejohnson', 'emma.johnson@example.com', '$2y$10$K8Ek.M259aMCk6ayjCtD6uFFn3qTxaVLm5NtnYifY2EFXSR6BWbOa', 38, 'Toronto', '123 Maple Street, Apartment 4B', '1992-05-14', 2, 1),
(25, 'User', 'User', 'uuser', 'user@example.com', '$2y$10$M1ygVrsajgsr0k4qA9zU5uVOC.SOyupwikJpc77SDMJ9QnrclWzuS', 52, 'Zagreb', '/', '2024-11-12', 3, 1),
(26, 'Editor', 'Editor', 'eeditor', 'editor@example.com', '$2y$10$o7bL6aB364twxXAHh6ShU.L4rZoW1TnlwaUUtFjP27jNrobmk59hm', 52, 'Zagreb', '/', '2002-04-13', 2, 1),
(45, 'Sofia', 'García', 'sgarcía', 'sofia.garcia@example.com', '$2y$10$TiJ2HLWm4uujOt8E05TOZ.681wsvTPR5yLusFSpgHq9H6yDBGhTBW', 202, 'Madrid', 'Calle de Alcalá 45', '2000-08-16', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_user` (`user_id`);

--
-- Indexes for table `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_country_id` (`country_id`),
  ADD KEY `fk_users_roles_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `news_images`
--
ALTER TABLE `news_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `news_images`
--
ALTER TABLE `news_images`
  ADD CONSTRAINT `fk_news_images_id` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
