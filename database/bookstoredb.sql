-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 07:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Fantasy', 'fantasy'),
(2, 'Action', 'action'),
(3, 'Thriller', 'thriller'),
(4, 'Romance', 'romance'),
(9, 'Mystery', 'mystery');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(21, 11, 56, 1),
(22, 12, 49, 1),
(23, 12, 51, 1),
(24, 13, 35, 1),
(30, 17, 40, 1),
(31, 17, 44, 1),
(32, 18, 57, 2),
(33, 18, 40, 1),
(34, 18, 34, 4),
(35, 19, 57, 2),
(36, 19, 40, 1),
(37, 19, 34, 4),
(38, 20, 45, 1),
(39, 20, 39, 2),
(40, 21, 36, 1),
(41, 21, 46, 1),
(42, 22, 47, 3),
(43, 23, 53, 5),
(44, 24, 50, 1),
(45, 24, 44, 1),
(46, 25, 35, 2),
(47, 26, 38, 6),
(48, 26, 45, 3),
(49, 27, 55, 1),
(50, 27, 56, 2),
(51, 28, 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `author` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `author`, `description`, `slug`, `price`, `stock`, `photo`, `date_view`, `counter`) VALUES
(34, 4, 'Things We Never Got Over', 'Lucy Score', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Naomi wasn&rsquo;t just running away from her wedding.&nbsp;She was riding to the rescue of her estranged twin to Knockemout, Virginia, a rough-around-the-edges town where disputes are settled the old-fashioned way&hellip;with fists and beer.&nbsp;Usually in that order. Too bad for Naomi her evil twin hasn&rsquo;t changed at all. After helping herself to Naomi&rsquo;s car and cash, Tina leaves her with something unexpected.&nbsp;The niece Naomi didn&rsquo;t know she had.&nbsp;Now she&rsquo;s stuck in town with no car, no job, no plan, and no home with an 11-year-old going on thirty to take care of.</p>\r\n', 'things-we-never-got-over', 56, 61, 'things-we-never-got-over.jpg', '2022-11-19', 1),
(35, 4, 'Book Lovers', 'Emily Henry', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>One summer. Two rivals. A plot twist they didn&#39;t see coming.&nbsp;This is why she agrees to go to Sunshine Falls, North Carolina for the month of August when Libby begs her for a sisters&rsquo; trip away&mdash;with visions of a small town transformation for Nora, who she&rsquo;s convinced needs to become the heroine in her own story.&nbsp;But instead of picnics in meadows or run-ins with a handsome country doctor or bulging-forearmed bartender, Nora keeps bumping into Charlie Lastra, a bookish brooding editor from back in the city.&nbsp;It would be a meet-cute if not for the fact that they&rsquo;ve met many times and it&rsquo;s never been cute.</p>\r\n', 'book-lovers', 46.68, 23, 'book-lovers.jpg', '2022-11-19', 1),
(36, 4, 'Love on the Brain', 'Ali Hazelwood', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Now, her equipment is missing, the staff is ignoring her, and Bee finds her floundering career in somewhat of a pickle.&nbsp;<br />\r\nPerhaps it&rsquo;s her occipital cortex playing tricks on her, but Bee could swear she can see Levi softening into an ally, backing her plays, seconding her ideas&hellip;devouring her with those eyes.&nbsp;And the possibilities have all her neurons firing.&nbsp;But when it comes time to actually make a move and put her heart on the line, there&rsquo;s only one question that matters, What will Bee K&ouml;nigswasser do?</p>\r\n', 'love-brain', 55.14, 36, 'love-brain.jpg', '2022-11-19', 1),
(37, 4, 'It Happened One Summer', 'Tessa Bailey', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Piper Bellinger is fashionable, influential, and her reputation as a wild child means the paparazzi are constantly on her heels.&nbsp;So he cuts her off and sends Piper and her sister to learn some responsibility running their late father&rsquo;s dive bar in Washington. Except it&rsquo;s a small town and everywhere she turns, she bumps into Brendan.&nbsp;The fun-loving socialite and the gruff fisherman are polar opposites, but there&rsquo;s an undeniable attraction simmering between them.&nbsp;<br />\r\n&nbsp;</p>\r\n', 'it-happened-one-summer', 54.67, 27, 'it-happened-one-summer.jpg', '0000-00-00', 0),
(38, 4, 'One True Loves', 'Taylor Jenkins Reid', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>A breathtaking new love story about a woman unexpectedly forced to choose between the husband she has long thought dead and the fianc&eacute; who has finally brought her back to life. In her twenties, Emma Blair marries her high school sweetheart, Jesse.&nbsp;On their first wedding anniversary, Jesse is on a helicopter over the Pacific when it goes missing.&nbsp;Just like that, Jesse is gone forever. Who is her one true love? What does it mean to love truly?<br />\r\n&nbsp;</p>\r\n', 'one-true-loves', 58.37, 53, 'one-true-loves.jpg', '2022-11-19', 1),
(39, 1, 'The Water Dancer', 'Ta-Nehisi Coates', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Young Hiram Walker was born into bondage. When his mother was sold away, Hiram was robbed of all memory of her&mdash;but was gifted with a mysterious power. Years later, when Hiram almost drowns in a river, that same power saves his life. This brush with death births an urgency in Hiram and a daring scheme: to escape from the only home he&rsquo;s ever known.<br />\r\n<br />\r\nSo begins an unexpected journey that takes Hiram from the corrupt grandeur of Virginia&rsquo;s proud plantations to desperate guerrilla cells in the wilderness, from the coffin of the Deep South to dangerously idealistic movements in the North. Even as he&rsquo;s enlisted in the underground war between slavers and the enslaved, Hiram&rsquo;s resolve to rescue the family he left behind endures.<br />\r\n<br />\r\nThis is the dramatic story of an atrocity inflicted on generations of women, men, and children&mdash;the violent and capricious separation of families&mdash;and the war they waged to simply make lives with the people they loved. Written by one of today&rsquo;s most exciting thinkers and writers,&nbsp;The Water Dancer&nbsp;is a propulsive, transcendent work that restores the humanity of those from whom everything was stolen.</p>\r\n', 'water-dancer', 69, 10, 'water-dancer.jpg', '2022-11-19', 1),
(40, 1, 'Circe', 'Madeline Miller', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>In the house of Helios, god of the sun and mightiest of the Titans, a daughter is born. But Circe is a strange child -- not powerful, like her father, nor viciously alluring like her mother. Turning to the world of mortals for companionship, she discovers that she does possess power -- the power of witchcraft, which can transform rivals into monsters and menace the gods themselves.<br />\r\n<br />\r\nThreatened, Zeus banishes her to a deserted island, where she hones her occult craft, tames wild beasts and crosses paths with many of the most famous figures in all of mythology, including the Minotaur, Daedalus and his doomed son Icarus, the murderous Medea, and, of course, wily Odysseus.<br />\r\n<br />\r\nBut there is danger, too, for a woman who stands alone, and Circe unwittingly draws the wrath of both men and gods, ultimately finding herself pitted against one of the most terrifying and vengeful of the Olympians. To protect what she loves most, Circe must summon all her strength and choose, once and for all, whether she belongs with the gods she is born from, or the mortals she has come to love.<br />\r\n&nbsp;</p>\r\n', 'circe', 77, 86, 'circe.jpg', '2022-11-19', 1),
(41, 1, 'Ninth House', 'Leigh Bardugo', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Galaxy &ldquo;Alex&rdquo; Stern is the most unlikely member of Yale&rsquo;s freshman class. Raised in the Los Angeles hinterlands by a hippie mom, Alex dropped out of school early and into a world of shady drug-dealer boyfriends, dead-end jobs, and much, much worse. In fact, by age twenty, she is the sole survivor of a horrific, unsolved multiple homicides. Some might say she&rsquo;s thrown her life away. But at her hospital bed, Alex is offered a second chance: to attend one of the world&rsquo;s most prestigious universities on a full ride. What&rsquo;s the catch, and why her?<br />\r\n<br />\r\nStill searching for answers, Alex arrives in New Haven tasked by her mysterious benefactors with monitoring the activities of Yale&rsquo;s secret societies. Their eight windowless &ldquo;tombs&rdquo; are the well-known haunts of the rich and powerful, from high-ranking politicos to Wall Street&rsquo;s biggest players. But their occult activities are more sinister and more extraordinary than any paranoid imagination might conceive. They tamper with forbidden magic. They raise the dead. And, sometimes, they prey on the living.</p>\r\n', 'ninth-house', 47, 44, 'ninth-house.jpg', '2022-11-19', 1),
(42, 1, 'The Night Circus', 'Erin Morgenstern', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>The circus arrives without warning. No announcements precede it. It is simply there, when yesterday it was not. Within the black-and-white striped canvas, tents is an utterly unique experience full of breathtaking amazements. It is called&nbsp;Le Cirque des R&ecirc;ves, and it is only open at night.<br />\r\n<br />\r\nBut behind the scenes, a fierce competition is underway: a duel between two young magicians, Celia and Marco, who have been trained since childhood expressly for this purpose by their mercurial instructors. Unbeknownst to them both, this is a game in which only one can be left standing.&nbsp;Despite the high stakes,&nbsp;Celia and Marco soon tumble headfirst into love, setting off a domino effect of dangerous consequences, and leaving the lives of everyone, from the performers to the patrons, hanging in the balance.</p>\r\n', 'night-circus', 62, 43, 'night-circus.jpg', '2022-10-13', 2),
(43, 1, 'The Unfinished World', 'Amber Sparks', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>In the weird and wonderful tradition of Kelly Link and Karen Russell, Amber Sparks&rsquo;s dazzling new collection bursts forth with stories that render the apocalyptic and otherworldly hauntingly familiar. In &ldquo;The Cemetery for Lost Faces,&rdquo; two orphans translate their grief into taxidermy, artfully arresting the passage of time. The anchoring novella, &ldquo;The Unfinished World,&rdquo; unfurls a surprising love story between a free and adventurous young woman and a dashing filmmaker burdened by a mysterious family. Sparks&rsquo;s stories?populated with sculptors, librarians, astronauts, and warriors?form a veritable cabinet of curiosities. Mythical, bizarre, and deeply moving,&nbsp;The Unfinished World and Other Stories&nbsp;heralds the arrival of a major writer and illuminates the search for a brief encounter with the extraordinary.</p>\r\n', 'unfinished-world', 60, 29, 'unfinished-world.jpg', '2022-10-13', 1),
(44, 2, 'Great Circle', 'Maggie Shipstead', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>From her days as a wild child in prohibition America to the blitz and glitz of wartime London, from the rugged shores of New Zealand to a lonely ice shelf in Antarctica, Marian Graves is driven by a need for freedom and danger. Determined to live an independent life, she resists the pull of her childhood sweetheart and burns her way through a suite of glamorous lovers. But it is an obsession with a flight that consumes her most.</p>\r\n\r\n<p>Now, as she is about to fulfill her greatest ambition, to circumnavigate the globe from pole to pole, Marian crash lands in a perilous wilderness of ice. Over half a century later, troubled film star Hadley Baxter is drawn inexorably to play the enigmatic pilot on screen. It is a role that will lead her to an unexpected discovery, throwing fresh and spellbinding light on the story of the unknowable Marian Graves.</p>\r\n', 'great-circle', 28, 61, 'great-circle.jpg', '2022-11-19', 1),
(45, 2, 'Origin', 'Dan Brown', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Robert Langdon, Harvard professor of symbology and religious iconology, arrives at the Guggenheim Museum Bilbao to attend the unveiling of an astonishing scientific breakthrough. The evening&rsquo;s host is billionaire Edmond Kirsch, a futurist whose dazzling high-tech inventions and audacious predictions have made him a controversial figure around the world.<br />\r\n<br />\r\nBut Langdon and several hundred guests are left reeling when the meticulously orchestrated evening is suddenly blown apart. There is a real danger that Kirsch&rsquo;s precious discovery may be lost in the ensuing chaos. With his life under threat, Langdon is forced into a desperate bid to escape Bilbao, taking with him the museum&rsquo;s director, Ambra Vidal. Together they flee to Barcelona on a perilous quest to locate a cryptic password that will unlock Kirsch&rsquo;s secret.</p>\r\n', 'origin', 65, 27, 'origin.jpg', '2022-11-19', 3),
(46, 2, 'With a Mind to Kill', 'Anthony Horowitz', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Behind the Iron Curtain, a group of former Smersh agents wants to use the British spy in an operation that will change the balance of world power. Bond is smuggled into the lion&#39;s den - but whose orders is the following, and will he obey them when the moment of truth arrives?<br />\r\nIn a mission where treachery is all around and one false move means death, James Bond must grapple with the darkest questions about himself. But not even he knows what has happened to the man he used to be.</p>\r\n', 'mind-kill', 50, 49, 'mind-kill.jpg', '2022-11-19', 1),
(47, 2, 'The Da Vinci Code', 'Dan Brown', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Harvard professor Robert Langdon receives an urgent late-night phone call while on business in Paris: the elderly curator of the Louvre has been brutally murdered inside the museum. Alongside the body, police have found a series of baffling codes. As Langdon and a gifted French cryptologist, Sophie Neveu, begin to sort through the bizarre riddles, they are stunned to find a trail that leads to the works of Leonardo Da Vinci and suggests the answer to a mystery that stretches deep into the vault of history. Unless Langdon and Neveu can decipher the labyrinthine code and quickly assemble the pieces of the puzzle, a stunning historical truth will be lost forever...</p>\r\n', 'da-vinci-code', 88, 31, 'da-vinci-code.jpg', '2022-11-19', 2),
(48, 2, 'Black Hawk Down', 'Mark Bowden', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Already winning acclaim as one of the best accounts of combat ever written, Black Hawk Down is a minute-by-minute, heart-stopping account of the 1993 raid on Mogadishu, Somalia. Late in the afternoon of Sunday, October 3 1993, 140 elite US Soldiers abseiled from helicopters into a teeming market neighborhood in the heart of the city. Their mission was to abduct two top lieutenants of a Somali warlord and return to base. It was supposed to take them about an hour.<br />\r\n<br />\r\nInstead, they were pinned down through a long and terrible night in a hostile city, fighting for their lives against thousands of heavily armed Somalis. Two of their high-tech helicopters were shot out of the sky. When the unit was rescued the following morning, eighteen American soldiers were dead and more than seventy were badly injured. The Somali toll was far worse - more than five hundred killed and over a thousand injured.</p>\r\n', 'black-hawk-down', 41, 21, 'black-hawk-down.jpg', '2022-11-04', 2),
(49, 3, 'Gone Girl', 'Gillian Flynn', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>On a warm summer morning in North Carthage, Missouri, it is Nick and Amy Dunne&rsquo;s fifth wedding anniversary. Presents are being wrapped and reservations are being made when Nick&rsquo;s clever and beautiful wife disappears. Husband-of-the-Year Nick isn&rsquo;t doing himself any favors with cringe-worthy daydreams about the slope and shape of his wife&rsquo;s head, but passages from Amy&#39;s diary reveal the alpha-girl perfectionist could have put anyone dangerously on edge.&nbsp;Under mounting pressure from the police and the media&mdash;as well as Amy&rsquo;s fiercely doting parents&mdash;the town golden boy parades an endless series of lies, deceits, and inappropriate behavior. Nick is oddly evasive, and he&rsquo;s definitely bitter&mdash;but is he really a killer?&nbsp;</p>\r\n', 'gone-girl', 32, 100, 'gone-girl.jpg', '2022-10-15', 1),
(50, 3, 'The 19th Christmas', 'James Patterson', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>As the holidays approach, Detective Lindsay Boxer and her friends in the Women&#39;s Murder Club have much to celebrate. Crime is down. The medical examiner&#39;s office is quiet. Even the courts are showing some Christmas spirit. And the news cycle is so slow that journalist Cindy Thomas is on assignment to tell a story about the true meaning of the season for San Francisco.&nbsp;Then a fearsome criminal known only as &quot;Loman&quot; seizes control of the headlines. Solving crimes never happens on schedule, but as this criminal mastermind unleashes credible threats by the hour, the month of December is upended for the Women&#39;s Murder Club. Avoiding tragedy is the only holiday miracle they seek.&nbsp;</p>\r\n', '19th-christmas', 55, 3, '19th-christmas.jpg', '2022-11-19', 3),
(51, 3, 'The Guardians', 'John Grisham', '<h1><strong>SYNOPSIS</strong></h1>\r\n\r\n<p>In the small Florida town of Seabrook, a young lawyer named Keith Russo was shot dead at his desk as he worked late one night. The killer left no clues. There were no witnesses, no one with a motive. But the police soon came to suspect Quincy Miller, a young Black man who was once a client of Russo&rsquo;s.&nbsp;<br />\r\n<br />\r\nQuincy was tried, convicted, and sent to prison for life. For twenty-two years he languished in prison, maintaining his innocence. But no one was listening. He had no lawyer, no advocate on the outside. In desperation, he writes a letter to Guardian Ministries, a small nonprofit run by Cullen Post, a lawyer who is also an Episcopal minister.<br />\r\n<br />\r\nGuardian accepts only a few innocence cases at a time. Cullen Post travels the country fighting wrongful convictions and taking on clients forgotten by the system. With&nbsp;Quincy Miller, though, he gets far more than he bargained for. Powerful, ruthless people murdered Keith Russo, and they do not want Quincy Miller exonerated.</p>\r\n', 'guardians', 27.5, 55, 'guardians.jpg', '2022-10-15', 1),
(52, 3, 'The Witch in the Well', 'Camilla Bruce', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p><br />\r\nWhen two former friends reunite after decades apart, their grudges, flawed ambitions, and shared obsession swirl into an all-too-real echo of a terrible town legend. Centuries ago, beautiful young Ilsbeth Clark was accused of witchcraft after several children disappeared. Her acquittal did nothing to stop her fellow townsfolk from drowning her in the well where the missing children were last seen.<br />\r\n<br />\r\nWhen author and social media influencer Elena returns to the summer paradise of her youth to get her family&#39;s manor house ready to sell, the last thing she expected was connecting with&mdash;and feeling inspired to write about&mdash;Ilsbeth&rsquo;s infamous spirit. The very historical figure that her ex-childhood friend, Cathy, has been diligently researching and writing about for years.</p>\r\n\r\n<p>What begins as a fiercely competitive sense of ownership over Ilsbeth and her story soon turns both women&rsquo;s worlds into something more haunted and dangerous than they could ever imagine.&nbsp;</p>\r\n', 'witch-well', 68, 56, 'witch-well.jpg', '2022-10-15', 1),
(53, 3, 'Ghost Eaters', 'Clay McLeod Chapman', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Erin hasn&rsquo;t been able to set a single boundary with her charismatic but reckless college ex-boyfriend, Silas. When he asks her to bail him out of rehab again she knows she needs to cut him off. But days after he gets out, Silas turns up dead of an overdose in their hometown of Richmond, Virginia, and Erin&rsquo;s world falls apart.<br />\r\n<br />\r\nThen a friend tells her about Ghost, a new drug that allows users to see the dead. Wanna get haunted? he asks. Grieving and desperate for closure with Silas, Erin agrees to a pill-popping &ldquo;s&eacute;ance.&rdquo; But the drug has unfathomable side effects and once you take it, you can never go back.</p>\r\n', 'ghost-eaters', 39, 85, 'ghost-eaters.jpg', '2022-11-19', 2),
(54, 9, 'The Last Thing He Told Me', 'Laura Dave', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Before Owen Michaels disappears, he smuggles a note to his beloved wife of one year:&nbsp;Protect her. Despite her confusion and fear, Hannah Hall knows exactly to whom the note refers&mdash;Owen&rsquo;s sixteen-year-old daughter, Bailey. Bailey, who lost her mother tragically as a child. Bailey, who wants absolutely nothing to do with her new stepmother.<br />\r\n<br />\r\nAs Hannah&rsquo;s increasingly desperate calls to Owen go unanswered, as the FBI arrests Owen&rsquo;s boss, as a US marshal and federal agents arrive at her Sausalito home unannounced, Hannah quickly realizes her husband isn&rsquo;t who he said he was. And that Bailey just may hold the key to figuring out Owen&rsquo;s true identity&mdash;and why he really disappeared.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'last-thing-he-told-me', 44, 33, 'last-thing-he-told-me.jpg', '0000-00-00', 0),
(55, 9, 'The Silent Patient', 'Alex Michaelides', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Alicia Berenson&rsquo;s life is seemingly perfect. A famous painter married to an in-demand fashion photographer, she lives in a grand house with big windows overlooking a park in one of London&rsquo;s most desirable areas. One evening her husband Gabriel returns home late from a fashion shoot, and Alicia shoots him five times in the face, and then never speaks another word.<br />\r\n<br />\r\nAlicia&rsquo;s refusal to talk, or give any kind of explanation, turns a domestic tragedy into something far grander, a mystery that captures the public imagination and casts Alicia into notoriety. The price of her art skyrockets, and she, the silent patient, is hidden away from the tabloids and spotlight at the Grove, a secure forensic unit in North London.<br />\r\n<br />\r\nTheo Faber is a criminal psychotherapist who has waited a long time for the opportunity to work with Alicia. His determination to get her to talk and unravel the mystery of why she shot her husband takes him down a twisting path into his own motivations&mdash;a search for the truth that threatens to consume him....</p>\r\n', 'silent-patient', 52.79, 16, 'silent-patient.jpg', '2022-11-19', 1),
(56, 9, 'Verity', 'Colleen Hoover', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Lowen Ashleigh is a struggling writer on the brink of financial ruin when she accepts the job offer of a lifetime. Jeremy Crawford, husband of bestselling author Verity Crawford, has hired Lowen to complete the remaining books in a successful series his injured wife is unable to finish.<br />\r\n&nbsp;<br />\r\nLowen arrives at the Crawford home, ready to sort through years of Verity&rsquo;s notes and outlines, hoping to find enough material to get her started. What Lowen doesn&rsquo;t expect to uncover in the chaotic office is an unfinished autobiography Verity never intended for anyone to read. Page after page of bone-chilling admissions, including Verity&#39;s recollection of the night her family was forever altered.<br />\r\n&nbsp;<br />\r\nLowen decides to keep the manuscript hidden from Jeremy, knowing its contents could devastate the already grieving father. But as Lowen&rsquo;s feelings for Jeremy begin to intensify, she recognizes all the ways she could benefit if he were to read his wife&rsquo;s words. After all, no matter how devoted Jeremy is to his injured wife, a truth this horrifying would make it impossible for him to continue loving her.</p>\r\n', 'verity', 67.28, 20, 'verity.jpg', '2022-11-19', 2),
(57, 9, 'The 6:20 Man', 'David Baldacci', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>Every day without fail, Travis Devine puts on a cheap suit, grabs his faux-leather briefcase, and boards the 6:20 commuter train to Manhattan, where he works as an entry-level analyst at the city&rsquo;s most prestigious investment firm. In the mornings, he gazes out the train window at the lavish homes of the uberwealthy, dreaming about joining their ranks. In the evenings, he listens to the fiscal news on his phone, already preparing for the next grueling day in the cutthroat realm of finance. Then one morning Devine&rsquo;s tedious routine is shattered by an anonymous email: She is dead.&nbsp;<br />\r\n<br />\r\nSara Ewes, Devine&rsquo;s coworker and former girlfriend, has been found hanging in a storage room of his office building&mdash;presumably a suicide, at least for now&mdash;prompting the NYPD to come calling on him. If that wasn&rsquo;t enough, before the day is out, Devine receives another ominous visit, a confrontation that threatens to dredge up grim secrets from his past in the army unless he participates in a clandestine investigation into his firm. This treacherous role will take him from the impossibly glittering lives he once saw only through a train window, to the darkest corners of the country&rsquo;s economic halls of power . . . where something rotten lurks. And apart from this high-stakes conspiracy, there&rsquo;s a killer out there with their own agenda, and Devine is the bull&rsquo;s-eye.</p>\r\n', '6-20-man', 62, 44, '6-20-man.jpg', '2022-11-19', 3),
(58, 9, 'Good Rich People', 'Eliza Jane Brazier', '<h2><strong>SYNOPSIS</strong></h2>\r\n\r\n<p>A destitute woman deceives her way into the guesthouse of a Hollywood Hills mansion and inadvertently becomes a target in the twisted game of the wealthy family upstairs in the next intoxicating novel from Eliza Jane Brazier. Lyla has always believed that life is a game&nbsp;she is destined to win, but her husband, Graham, takes the game to dangerous levels. The wealthy couple&nbsp;invites self-made&nbsp;success stories to live in their guesthouse and then conspires to ruin their lives. After all, there is nothing worse than a bootstrapper.&nbsp;<br />\r\n&nbsp;<br />\r\nDemi has always felt like the odds were stacked against her. At the end of her rope, she seizes a risky opportunity to take over another person&rsquo;s life and unwittingly becomes the subject of the upstairs couple&rsquo;s wicked entertainment.&nbsp;But Demi has been struggling forever, and she&rsquo;s not about to go down without a fight.&nbsp;In a twist that neither woman sees coming, the game quickly devolves into chaos and rockets toward an explosive conclusion.Because every good rich person knows: in money and in life, it&rsquo;s winner takes all.&nbsp;Even if you have to leave a few bodies behind.</p>\r\n', 'good-rich-people', 88.88, 78, 'good-rich-people.jpg', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(11, 21, 'PAYID-MNQKSXI2PY412394L5266239', '2022-11-01'),
(12, 21, 'PAYID-MNR5SPI3S308884E04496944', '2022-11-03'),
(13, 21, 'PAYID-MNR6Q5Q7T221968FY768231D', '2022-11-03'),
(17, 21, 'PAYID-MNR6X2Y0TC250969M933140A', '2022-11-03'),
(19, 13, 'PAYID-MN4R3XQ7RV739503V969870J', '2022-10-13'),
(20, 13, 'PAYID-MN4R5ZQ6MB50192XH124293L', '2022-08-01'),
(21, 13, 'PAYID-MN4R6MI0LD806224A193801W', '2022-01-13'),
(22, 13, 'PAYID-MN4R7AI3GP177545C383180Y', '2022-03-24'),
(23, 21, 'PAYID-MN4R7XI87N89133781675846', '2022-07-07'),
(24, 24, 'PAYID-MN4SANA9DY79089K74813731', '2022-08-01'),
(25, 24, 'PAYID-MN4SBNA4JA028569E222381T', '2022-02-24'),
(26, 24, 'PAYID-MN4SB6A1LV352897L716751K', '2022-09-08'),
(27, 25, 'PAYID-MN4SCXQ6TE93316PS364352U', '2022-04-13'),
(28, 25, 'PAYID-MN4SDGA8FA128550T087553F', '2022-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `ship_date` date NOT NULL,
  `ship_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `sales_id`, `ship_date`, `ship_status`) VALUES
(1, 11, '2022-11-10', 1),
(2, 12, '2022-11-29', 3),
(3, 13, '2022-11-10', 2),
(4, 17, '2022-11-14', 0),
(6, 19, '2022-10-21', 2),
(7, 20, '2022-08-10', 2),
(8, 21, '2022-01-27', 2),
(9, 22, '2022-04-07', 2),
(10, 23, '2022-07-22', 2),
(11, 24, '2022-08-10', 1),
(12, 25, '2022-03-02', 2),
(13, 26, '2022-09-22', 3),
(14, 27, '2022-04-30', 1),
(15, 28, '2022-06-23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 1, 'Admin', 'Control Panel', '', '', 'favicon.png', 1, '', '', '2018-05-01'),
(13, 'darkseid@gmail.com', '$2y$10$2odopLFsPa29ffnKaKHgw.4hhUITa34hYf.x1xOXwQm97gpwiYFhW', 0, 'darkseid', 'newgods', 'NYC', '3261114555', 'staysafe.png', 1, '', '', '2022-09-02'),
(21, 'test@gmail.com', '$2y$10$8XcSVbLRT7SWZo828NSiOuKjZsoJ9phWpRga2Oyh5aWQ.yTftdRdW', 0, 'whatever ', 'name', '37, whatever residence, whatever taman, 19204 whatever states, whatever nation', '0123456789', '', 0, 'Yxysuf8wgGjQ', '', '2022-10-15'),
(24, 'hello@ymail.com', '$2y$10$hexdW4OJu9tmSwV5uj7M..FjrX9QlobdHP2VtyKfy4fes.LMUwEmG', 0, 'hello', 'bye', '23 Hymnn Block, Helloworld Road 12, Hello State', '0129305931', '', 0, '', '', '2022-11-01'),
(25, 'random1@mail.com', '$2y$10$VPiNrZne5qo5AJzX/NWK3eM.VzbgTUUT6XH/KRTC81tWfzQ4VW0dO', 0, 'Random', 'No1', '', '', '', 0, '', '', '2022-11-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_id` (`sales_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `sales_id` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
