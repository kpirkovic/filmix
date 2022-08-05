-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2022 at 01:40 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

DROP TABLE IF EXISTS `directors`;
CREATE TABLE IF NOT EXISTS `directors` (
  `directorsID` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `Img` varchar(255) NOT NULL,
  PRIMARY KEY (`directorsID`),
  UNIQUE KEY `directorsID` (`directorsID`),
  KEY `directorsID_2` (`directorsID`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`directorsID`, `firstName`, `lastName`, `Img`) VALUES
(84, 'Roman ', 'White', '488138.png'),
(85, 'Pierre', ' Perifel', '243346.png'),
(86, 'Brenda', ' Chapman', '746076.png'),
(87, 'Angus ', 'MacLane', '528654.png'),
(89, 'Victor ', 'Curt ', '257856.png'),
(90, 'Akva', ' Schaffer', '737022.png'),
(91, 'Mel ', 'Gibson', '401850.png'),
(92, 'Colin ', 'Trevorrow', '652014.png');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `genreID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  PRIMARY KEY (`genreID`),
  UNIQUE KEY `genreID` (`genreID`),
  KEY `genreID_2` (`genreID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreID`, `title`) VALUES
(1, 'Drama'),
(5, 'Comedy'),
(6, 'Christian'),
(7, 'Action'),
(8, 'Horror'),
(9, 'Romance'),
(10, 'Thriller'),
(14, 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `moviesID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `boxOffice` int NOT NULL,
  `director` int NOT NULL,
  `genre` int NOT NULL,
  `released` date NOT NULL,
  `language` enum('English','Macedonian','Serbian','Spanish','German','Italian','French') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Macedonian',
  `storyline` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Img` varchar(255) NOT NULL,
  `ytURL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`moviesID`),
  UNIQUE KEY `moviesID` (`moviesID`),
  KEY `director` (`director`,`genre`),
  KEY `genre` (`genre`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`moviesID`, `title`, `boxOffice`, `director`, `genre`, `released`, `language`, `storyline`, `Img`, `ytURL`) VALUES
(16, 'A Week Away', 3100000, 84, 9, '2020-01-01', 'English', 'Troubled teen Will Hawkins (Kevin Quinn) has a run-in with the law that puts him at an important crossroad: go to juvenile detention or attend a Christian summer camp. At first a fish-out-of-water, Will opens his heart, discovers love with a camp regular (Bailee Madison), and a sense of belonging in the last place he expected to find it.\r\n<br><br><h3>The Story:</h3><br>\r\nAWeek Away, Netflix’s High School Musical-style play for the contemporary Christian teen market, feels strangely unrooted from our timeline. The musical about a week at a Christian summer camp, directed by Roman White, is ostensibly set in the present yet transparently derives its musical and choreography cues from mid-2000s Disney projects like the aforementioned series and Camp Rock, and lead Kevin Quinn looks eerily like Zac Efron circa 2009. It’s a coming-of-age (and faith) movie in which barely any phones can be found.\r\n<br><br>\r\nThe film opens with a premise too pat and aloof to suspend one’s disbelief: wayward orphan Will Hawkins (Quinn) has stolen a cop car, among a slew of petty crimes, and the consequence? After a polite arrest for running from an officer with a guitar case in hand, a polite admonishment from Children and Family Services about the threat of juvie (yes, this teen is white; no, this film does not seem at all cognizant of how this plays after last summer’s protests against anti-black police brutality, or of the race at all). \r\n<br><br>\r\nLuckily for Will, he’s swiftly fostered by a black mother, Kristin (Sherri Shepherd), and her son George (Jahbril Cook) on the condition that he spend a week at the Christian summer camp where Kristin works.\r\n', 'A_Week_Away.png', 'https://www.youtube.com/watch?v=dpLaoYw8xug'),
(18, 'The Prince of Egypt', 21859998, 86, 7, '1999-12-16', 'English', 'Two brothers named Moses and Rameses grow up to be the best of friends. However, when one of them becomes a ruler and the other chooses to live for the people, their friendship turns bitter.\r\n<br><br><h3>The Story</h3><br>\r\nThe story of Exodus has its parallels in many religions, always with the same result: God chooses one of his peoples over the others. We like these stories because in the one we subscribe to, we are the chosen people. I have always rather thought God could have spared the man a lot of trouble by casting his net more widely, emphasizing universality rather than tribalism, but there you have it.\r\n<br><br>\r\nMoses gives Rameses his chance (free our people and accept our God) and Rameses blows it, with dire results for the Egyptian side.\r\n<br><br>\r\n\"The Prince of Egypt\" is one of the best-looking animated films ever made. It employs computer-generated animation as an aid to traditional techniques, rather than as a substitute for them, and we sense the touch of human artists in the vision behind the Egyptian monuments, the lonely desert vistas, the thrill of the chariot race, the personalities of the characters. This is a film that shows animation growing up and embracing more complex themes, instead of chaining itself in the category of children\'s entertainment.\r\n<br><br>\r\nThat\'s established dramatically in the wonderful prologue scenes, which show the kingdom and Hebrew slaves building pyramids under the whips of the Pharaoh\'s taskmasters. The \"sets\" here are inspired by some of the great movie sets of the past, including those in de Mille\'s original film and D.W. Griffith\'s \"Intolerance.\" A vast Sphinx gazes out over the desert, and slaves bend to the weight of mighty blocks of stone. ', '307389.jpg', 'https://www.youtube.com/watch?v=N0Vh65UrBK4'),
(19, 'The Bad Guys', 229999997, 85, 5, '2022-03-31', 'English', 'After a lifetime of legendary heists, notorious criminals Mr. Wolf, Mr. Snake, Mr. Piranha, Mr. Shark, and Ms. Tarantula are finally caught. To avoid a prison sentence, the animal outlaws must pull off their most challenging con yet -- becoming model citizens. Under the tutelage of their mentor, Professor Marmalade, the dubious gang sets out to fool the world that they\'re turning good.\r\n<br><br><h3>The Story:</h3><br>\r\nA wolf named Wolf and a snake named Snake enjoys snappy banter at a retro L.A. diner, having the kind of conversation they’ve probably had countless times over their years of friendship. \r\n<br><br>\r\nThey push and pull, jostle and tug, all in a good-natured fashion. Then they get up, stroll casually across the street, and rob a bank. Pierre Perifel, making his feature directing debut, lays all of this out in one long, single take, instantly drawing us into these characters and this world. It\'s an extremely familiar set-up, a subgenre unto itself: hyper-verbal thieves charm us into coming along for the ride and rooting for them to pull off their biggest heist yet. This is a furry, scaly version of Quentin Tarantino or Elmore Leonard—or at least, that’s what it aspires to be. \r\n<br><br>\r\nBut it’s a clever change to see such a story told in animated form with a star-studded voice cast including Sam Rockwell, Marc Maron, Zazie Beetz, and Awkwafina.', 'the-bad-guys-movie-stills_m18HC2w.jpg', 'https://www.youtube.com/watch?v=m8Xt0yXaDPU'),
(25, 'Scooby-Doo! Mystery Incorporated', 10000000, 89, 5, '2015-01-10', 'English', 'This incarnation of the popular cartoon series finds Scooby and the gang living in Crystal Cove, a small town with a long history of ghost sightings, monster tales, and other mysteries ripe for the sleuths to solve once and for all. But the longstanding Crystal Cove residents, who bank on the town\'s reputation to attract tourists, are prepared to do what it takes to protect their turf.\r\n<br><h3>The Story:</h3><br>\r\nOver the years there have been countless incarnations and adaptations of the beloved Scooby-Doo characters we all know and love. Since the original Scooby-Doo, Where Are You? \r\n<br><br>\r\nfirst aired in 1969, the cowardly Great Dane and his pals have been solving mysteries on every screen imaginable. From animated series to live-action feature films (and everything in between), Scooby-Doo has become a powerful pop culture legend, with Scooby, Shaggy, Fred, Velma, and Daphne serving as recognizable icons (and popular Halloween costumes) for the better part of the past fifty years. But the gang\'s recognizable status aside, only one Scooby series has managed to transcend the others with its complex character arcs and intricate over-arching mystery. Yes, we\'re talking about none other than Scooby-Doo! Mystery Incorporated!\r\n<br><br>\r\nRegardless of the occasional change in tone, the real consistency comes from Mystery Incorporated\'s engaging combination of the classic Scooby-Doo formula and the long-game emotional arcs of Fred, Daphne, and the gang. Each member of Mystery Inc. gets their own upgrades through this show, rounding them out more as complex characters than the archetypes we\'ve grown accustomed to. Fred Jones (also voiced by Welker) for instance seems to go through the most change. Here, the classically confident leader of the gang expresses his insecurities via his relationship with Daphne Blake (Grey DeLisle), his love of traps, and his constant desire for the approval of his father, Mayor Fred Jones, Sr. (Gary Cole). \r\n', 'thumb-1920-1192305.jpg', 'https://www.youtube.com/watch?v=lcV4BuLD6xc'),
(31, 'Chip \'n Dale: Rescue Rangers', 12000000, 90, 5, '2022-03-16', 'English', 'Chip and Dale live amongst cartoons and humans in modern-day Los Angeles, but their lives are quite different now. When a former cast mate mysteriously disappears, Chip and Dale must repair their broken friendship and save their friend.\r\n<br><br>\r\nChip ’n Dale: Rescue Rangers, written by How I Met Your Mother scribes Dan Gregor and Doug Mand and directed by Akiva Schaffer of The Lonely Island fame, the two chipmunks are introduced as friends from elementary school, as The A.V. Club notes in its review.\r\n<br><br>\r\nAnd then the film fast-forwards to when Chip (voiced by John Mulaney) and Dale (voiced by Andy Samberg) are adults “living amongst cartoons and humans in modern-day Los Angeles,” as Disney says in a synopsis.\r\n<br><br>\r\n<h3>Fans — and even critics — are confused.</h3>\r\n<br>\r\nIf Chip ’n Dale: Rescue Rangers film established Chip and Dale as friends and not relatives, at least one film critic missed the memo. The Hollywood Reporter’s review of the film refers to the duo as brothers. (The Austin Chronicle, meanwhile, observes that the film “[throws] out the first 45 years of their animated history during which they were explicitly brothers.”)\r\n<br><br>\r\nAnd fans are confused, too. “Alright, question: Are Chip and Dale not brothers?” one tweeted recently. “Why are they meeting for the first time in third grade?”\r\n<br><br>\r\nAnother Twitter user wrote, “I’m sorry, are Chip and Dale not brothers?! I HAVE LIED TO MY ENTIRE LIFE.”\r\n<br><br>\r\nA third Twitter user found the silver lining in the switch-up, writing, “I used to think Chip and Dale were brothers, but I’m glad to find out they’re not. Now I can think about them kissing, and it won’t be weird.”', 'wallpapersden.com_hd-chip-n-dale-rescue-rangers_2560x1440-min.jpg', 'https://www.youtube.com/watch?v=F4Z0GHWHe60'),
(48, 'Brave', 210000000, 86, 14, '2012-07-12', 'English', 'Merida, an independent archer, disobeys an ancient custom that unleashes a dark force. After meeting an elderly witch, as she journeys to reverse the curse, she discovers the real meaning of bravery.\r\n<br><br><h3>The Story:</h3><br>\r\n\"Brave\" is the latest animated film from Pixar, and therefore becomes the film the parents of the world will be dragged to by their kids. The good news is that the kids will probably love it, and the bad news is that parents will be disappointed if they\'re hoping for another Pixar groundbreaker. \r\n<br><br>\r\nUnlike such brightly original films as \"Toy Story,\" \"Finding Nemo,\" \"WALL-E\" and \"Up,\" this one finds Pixar poaching on the traditional territory of Disney, its corporate partner. We get a spunky princess; her mum, the queen; her dad, the gruff king, an old witch who lives in the woods, and so on.\r\n<br><br>\r\nThe princess is Merida (voice of Kelly Macdonald), seen in an action-packed prologue as a flame-haired Scottish tomboy whose life is changed by an early birthday gift of a bow, which quickly inspires her to become the best archer in the kingdom. \r\n<br><br>\r\nThen we flash forward to Merida as a young lady of marriageable age, who is startled by request from Queen Elinor (Emma Thompson) to choose among three possible husbands chosen by her clan.\r\n<br><br>\r\nNothing doing, especially since all three candidates are doofuses. Merida leaps upon her trusty steed and flees into the forest, where her friends the will-o-the-wisps lead her to the cottage of a gnarled old witch (Julie Walters). She begs for a magic spell that will change Queen Elinor\'s mind, but it changes more than that: It turns Elinor into a bear. Witches never know how to stop when they\'re ahead.', '275988', 'https://www.youtube.com/watch?v=TEHWDA_6e3M'),
(49, 'Braveheart', 21320000, 91, 7, '1195-05-19', 'English', 'William Wallace, a Scottish rebel, along with his clan, sets out to battle King Edward I of England, who killed his bride a day after their marriage.\r\n<br><br><h3>The Storyl:</h3><br>\r\nMel Gibson\'s \"Braveheart\" is a full-throated, red-blooded battle epic about William Wallace, the legendary Scots warrior who led his nation into battle against the English in the years around 1300. It\'s an ambitious film, big on simple emotions like love, patriotism, and treachery, and avoids the travelogue style of so many historical swashbucklers: Its locations look green, wet, vast, muddy and rugged.\r\n<br><br>\r\nNot much is known about Wallace, known as Braveheart, except that according to an old epic poem, he unified the clans of Scotland and won famous battles against the English before being captured, tortured, and executed as a traitor.\r\n<br><br>\r\nWallace\'s dying cry, as his body was stretched on the rack, was \"freedom!\" That isn\'t exactly based on fact (the concept of personal freedom was a concept not much celebrated in 1300), but it doesn\'t stop Gibson from making it his dying cry. It fits in with the whole glorious sweep of \"Braveheart,\" which is an action epic with the spirit of the Hollywood swordplay classics and the grungy ferocity of \"The Road Warrior.\" \r\n<br><br>\r\nWhat people are going to remember from the film are the battle scenes, which are frequent, bloody, and violent. Just from a technical point of view, \"Braveheart\" does a brilliant job of massing men and horses for large-scale warfare on film. Gibson deploys what looks like thousands of men on horseback, as well as foot soldiers, archers, and dirty tricks specialists, and yet his battle sequences don\'t turn into confusing crowd scenes: We understand the strategy, and we enjoy the tactics even while we\'re doubting some of them (did 14th century Scots really set battlefields aflame?).', '461720', 'https://www.youtube.com/watch?v=nMft5QDOHek'),
(50, 'The Passion Of The Christ', 612000000, 91, 6, '2004-04-25', 'Spanish', 'Jesus Christ, the savior of humanity, is betrayed by one of his disciples and captured by the Romans. Even during a torturous death, Jesus redeems souls and defeats Satan\'s true purpose.\r\n<br><br><h3>The Story:</h3><br>\r\nStumbling into the light, having just endured Mel Gibson\'s two-hour pop-profound blitzkrieg on your senses, religious convictions (or lack of them), and prescribed interpretations of the events leading up to the crucifixion of Christ, first reactions race and ricochet like a pinball. \r\n<br><br>\r\nYou may feel anger, revulsion, even queasiness at the stinging stretch of bloody martyrdom; frustration at the film\'s obvious limitations or indelicate undertones; it may even leave a residue of religious contemplation, a return to questions and confusions that scarcely reach debate in our secular times. When was the last time a film managed any of that? There is no doubting the impact. A post-match lie-down in a darkened room comes highly recommended.\r\n<br><br>\r\nRipping away years of indoctrinated Sunday School niceties, this is a film born less of Christ\'s message of love than a torrent of unfettered rage. Gibson\'s Passion is a downward spiraling journey into darkness and despair on an unprecedented scale. So, be warned, it will test your mettle - not least in its determination to have Aramaic and Latin as the spoken languages, leaving English captions to feed the lines.\r\n<br><br>\r\nAnd amongst such vocal verisimilitude, there is only the thinnest veneer of the gospels\' eloquence, Christ\'s sanctified poetry to counter the cruelty into which he is delivered. Caviezel is almost mummified beneath layers of prosthetics, skin flayed red raw like an animal carcass, leaving him more symbol than a character. The film functions more as a visual experience than an intellectual or emotional one, the actors almost throttled by the significance of their characters.', '212887', 'https://www.youtube.com/watch?v=4Aif1qEB_JU'),
(53, 'Jurassic World Dominion', 600000000, 92, 10, '2022-07-10', 'English', 'Four years after the destruction of Isla Nublar, dinosaurs now live and hunt alongside humans all over the world. This fragile balance will reshape the future and determine, once and for all, whether human beings are to remain the apex predators on a planet they now share with history\'s most fearsome creatures.\r\n<br><br><h3>The Story:</h3><br>\r\nTwenty-nine years ago, when \"Jurassic Park\" was released, computer-generated and digitally composited effects were still relatively new, but director Steven Spielberg\'s team raised them to a new level of credibility by deploying them sparingly, often in nighttime and rainy scenes, and mixing them with old-fashioned practical FX work (mainly puppets and large-scale models). The result conjured primal wonder and terror in the minds of viewers. \r\n<br><br>\r\nThe T-Rex attack in particular was so brilliantly constructed and unrelentingly frightening that it put this writer sideways in his seat, one arm raised in front of his face as if to defend against a dinosaur attack. When there was a break in the mayhem, Spielberg cut to a very quiet scene, letting everyone hear how many people in the audience had been screaming in fright, which of course led to raucous laughter and a release of tension (a foolproof showman\'s trick). A small girl sitting near this writer regarded his still-terror-contorted body and asked, \"Mister, are you all right?\"\r\n<br><br>\r\nThere\'s nothing in \"Jurassic World: Dominion\" that comes close to that first \"Jurassic Park\" T-Rex attack, or any other scene in it. Or for that matter, any of the scenes in the Spielberg-directed sequel \"The Lost World,\" which made the best of an inevitable cash-grab scenario by treating the film as an excuse to stage a series of dazzling large-scale action sequences, and giving Jeff Goldblum\'s chaos theorist Dr. Ian Malcolm the action hero job.\r\n<br><br>\r\nGoldblum, who reprises his role in \"Dominion\" alongside fellow original cast members Sam Neill and Laura Dern, turned his \"Lost Wor', '84510.png', 'https://www.youtube.com/watch?v=fb5ELWi-ekk');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `pageID` int NOT NULL AUTO_INCREMENT,
  `pageTitle` varchar(255) NOT NULL,
  PRIMARY KEY (`pageID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageID`, `pageTitle`) VALUES
(11, 'Movies'),
(13, 'Directors'),
(14, 'Genres');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genre` (`genreID`) ON DELETE RESTRICT,
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`director`) REFERENCES `directors` (`directorsID`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
