-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 01:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuisinatin`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `commenter_id` int(11) DEFAULT NULL,
  `comment` varchar(255) NOT NULL,
  `date_commented` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `cuisine_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `cuisine_name` varchar(100) NOT NULL,
  `cuisine_description` text NOT NULL,
  `recipes` text NOT NULL,
  `procedures` text NOT NULL,
  `cuisine_type` enum('Filipino Main Dishes','Filipino Soups and Stews','Filipino Desserts') NOT NULL,
  `cuisine_image` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `total_ratings` int(11) NOT NULL DEFAULT 0,
  `user_rate_count` int(11) NOT NULL DEFAULT 0,
  `date_posted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`cuisine_id`, `author_id`, `cuisine_name`, `cuisine_description`, `recipes`, `procedures`, `cuisine_type`, `cuisine_image`, `likes`, `total_ratings`, `user_rate_count`, `date_posted`) VALUES
(1, 1, 'Adobong Manok', 'Adobong manok, often called \"chicken adobo,\" is often considered the national dish of the Philippines. Although the origins of its name are are with the Spanish colonizers — adobo is the Spanish word for a marinade — Filipinos have been making tart, vinegar-based dishes since time immemorial.\r\n\r\nThe vinegar marinade makes a dish that stores very well in the Filipino heat. Endless varieties of adobo exist and each region has its own specialty. Besides chicken and pork, adobo can be made with fish, squid, green bean and even eggplant.', 'Chicken,White vinegar -- 3/4 cup,Soy sauce -- 1/4 cup,Onion thinly sliced -- 1/2,Garlic crushed -- 4 to 6 cloves,Bay leaf -- 1-2,Peppercorns -- 6 to 8,Salt -- 1 teaspoon,Water -- 1 cup,Oil -- 1/4 cup', 'Add the chicken pieces, vinegar, soy sauce, onion, garlic, bay leaf, peppercorns and salt to a large, non-reactive bowl and refrigerate for anywhere from one to four hours to marinate.,Place the chicken and its marinade in a large pot. Add the water and bring to a boil over medium-high heat. Reduce heat to low and simmer for 30 to 45 minutes, or until the chicken is cooked through and tender. Add water as necessary to keep the chicken from drying out.,Remove the chicken from its sauce, reserving the sauce, and pat dry. Heat the oil in a skillet over medium-high flame and saute the chicken pieces to brown them. Remove from heat and set aside.,Bring the remaining sauce to a boil over medium flame and cook until somewhat reduced and thickened,Toss the browned chicken pieces with the reduced sauce and serve with rice.', 'Filipino Main Dishes', 'images/cuisines/CUISINE_IMG_6576514B029C6.jpg', 0, 0, 0, '2023-12-11 08:01:15'),
(2, 1, 'Beef Sinigang', 'Sinigang na Tadyang ng Baka or Beef Ribs Sinigang is a tasty version of beef sinigang. There are many things to like about this dish. I like how the flavor of the beef marries the sourness or the soup. It is fantastic. The fresh veggies have great flavors . I also enjoy eating the tender beef ribs by grabbing it using my hands, just like the way I eat BBQ ribs. It is amazing!', 'Beef shoulder cubed -- 2 1/2 to 3 pounds,Tomatoes seeded and chopped -- 3 or 4,Onions chopped - 1 or 2,Garlic,Fish sauce (patis) -- 1 cup,Water ,Tamarind paste -- 1/2 cup,Boiling water -- 1 cup,Green chile peppers -- 3 or 4,Vegetables (see variations) -- about 4 cups,Salt and pepper -- to taste', 'Add the beef, tomatoes, onions, garlic and fish sauce to a large pot. Place the pot over medium-high flame and bring to a boil. Reduce heat to medium and cook for about 10 minutes to reduce the liquid a bit. (You may want to open a window. Fish sauce does have a smell.),Add the water and bring back to a boil over medium-high heat. Skim off any scum that rises to the surface, and then reduce heat to low, cover and simmer until the pork is tender, an hour to an hour and a half.,Place the tamarind paste into a heat-proof bowl and pour the boiling water over it. Let set for 5 to 10 minutes, then mash the pulp with clean fingers to mix the tamarind and water well. Strain through a sieve and discard the fibers and seeds.,Stir the tamarind water into the simmering pot, cover again and simmer for about 10 minutes.,Add your desired vegetables to the pot and press them down into the simmering liquid. Cover and simmer until the vegetables are cooked through but still firm, another 10 to 20 minutes.,Serve hot in bowls accompanied by steamed rice.', 'Filipino Soups and Stews', 'images/cuisines/CUISINE_IMG_6576524F3F45D.webp', 0, 0, 0, '2023-12-11 08:05:35'),
(3, 2, 'Leche Flan', 'Leche Flan is a dessert made-up of eggs and milk with a soft caramel on top. It resembles crème caramel and caramel custard. This delicious dessert is known throughout the world.It has been a regular item in the  menu of most restaurants because of its taste, ease in preparation and long shelf life. It can also be added as a component to build other great tasting dessert creations.', '10 pieces eggs,1 can condensed milk (14 oz),1 cup fresh milk or evaporated milk,1 cup granulated sugar,1 teaspoon vanilla extract', 'Using all the eggs and separate the yolk from the egg white (only egg yolks will be used).,Place the egg yolks in a big bowl then beat them using a fork or an egg beater,Add the condensed milk and mix thoroughly,Pour-in the fresh milk and Vanilla. Mix well,Put the mold (llanera) on top of the stove and heat using low fire,Put-in the granulated sugar on the mold and mix thoroughly until the solid sugar turns into liquid (caramel) having a light brown color. Note: Sometimes it is hard to find a Llanera (Traditional flan mold) depending on your location. I find it more convenient to use individual Round Pans in making leche flan.,Spread the caramel (liquid sugar) evenly on the flat side of the mold,Wait for 5 minutes then pour the egg yolk and milk mixture on the mold,Cover the top of the mold using an Aluminum foil,Steam the mold with egg and milk mixture for 30 to 35 minutes.,After steaming. let the temperature cool down then refrigerate,Serve for dessert. Share and Enjoy!', 'Filipino Desserts', 'images/cuisines/CUISINE_IMG_657652E3F2B09.jpg', 0, 0, 0, '2023-12-11 08:08:03'),
(4, 2, 'Pork Menudo', 'Pork Menudo is the number one on the list of my comfort foods and it’s hard for me to last a month without trying one – literally. Some would say that I am addicted to this food while others would use the term “obsession”, I just simply look at it as a necessity – a basic necessity that I cannot live without.', '2 lbs. pork,1/4 lb. pig liver,1 cup potatoes diced,1 piece carrot cubed,1/2 cup soy sauce,1/2 piece lemon,1 piece onion chopped,3 cloves garlic minced,1 teaspoon sugar,3/4 cup tomato sauce,1 cup water,4 pieces hotdogs sliced diagonally,2 tablespoons cooking oil,2 to 3 pieces dried bay leaves,Salt and pepper to taste', 'Combine pork soysauce and lemon in a bowl. Marinate for at least 1 hour.,Heat oil in a pan,Saute garlic and onion.,Add the marinated pork. Cook for 5 to 7 minutes.,Pour in tomato sauce and water and then add the bay leaves.Let boil and simmer for 30 minutes to an hour depending on the toughness of the pork. Note: Add water as necessary.,Add-in the liver and hot dogs.Cook for 5 minutes.,Put-in potatoes, carrots, sugar,salt, and pepper. Stir and cook for 8 to 12 minutes.,Serve. Share and enjoy!', 'Filipino Main Dishes', 'images/cuisines/CUISINE_IMG_6576535E5CB07.png', 0, 0, 0, '2023-12-11 08:10:06'),
(5, 2, 'Chicken Sopas', 'Feeling under the weather? Whether it’s due to a tiring day of work, catching a flu that’s going around, or even just having a bad day, there’s nothing a nice bowl of warm soup can’t fix. And there’s rarely any better soup than Pinoy Chicken Sopas: warm and comforting spoonfuls of macaroni in a creamy, comforting broth. With an assortment of ingredients from chunky rotisserie chicken to crisp veggies, every bite is not only incredibly filling but very calming. A bowl of Pinoy Chicken Sopas always leaves you with a good feeling—it isn’t chicken soup for the soul for no reason, after all! And the best part about this dish is how easy it is to make and enjoy it from the comfort of your own home. ', '1 lb. rotisserie chicken shredded,2 Knorr Chicken Cubes,¾ cup hotdog cubed,1 cup cabbage sliced,3 stalks celery diced,1 carrot minced,1 cup evaporated milk,8 ounces elbow macaroni,1 onion minced,3 cloves garlic minced,8 cups water,3 tablespoons cooking oil,Fish sauce and ground black pepper to taste', 'Heat cooking oil in a cooking pot. Sauté onion, garlic, and celery for 1 minute.,Add the shredded chicken, hot dogs, and 1 tablespoon of fish sauce. Cook for 1 minute.,Pour the water and let it boil.,Add Knorr chicken cube. Cover the cooking pot. Adjust the heat of your stove to the lowest setting. Cook for 10 minutes.,Add elbow macaroni. Continue cooking for 18 minutes.,Add cabbage and evaporated milk.,Season with ground black pepper and fish sauce if needed.,Serve hot. Share and enjoy!', 'Filipino Soups and Stews', 'images/cuisines/CUISINE_IMG_657653C427921.jpg', 0, 0, 0, '2023-12-11 08:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `post_id`, `user_id`, `amount`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `sq1` enum('What was your childhood nickname?',' What is the first name of your bestfriend in high school?','In what city were you born?','What is the name of your favorite pet?','What is the name of the street where you grew up?','What is your mother''s maiden name?','What high school did you attend?','What is your date of birth?','Who is your favorite superhero?','What year did you enter college?','Set a code of your choice') NOT NULL,
  `sq2` enum('What was your childhood nickname?',' What is the first name of your bestfriend in high school?','In what city were you born?','What is the name of your favorite pet?','What is the name of the street where you grew up?','What is your mother''s maiden name?','What high school did you attend?','What is your date of birth?','Who is your favorite superhero?','What year did you enter college?','Set a code of your choice') NOT NULL,
  `sq3` enum('What was your childhood nickname?',' What is the first name of your bestfriend in high school?','In what city were you born?','What is the name of your favorite pet?','What is the name of the street where you grew up?','What is your mother''s maiden name?','What high school did you attend?','What is your date of birth?','Who is your favorite superhero?','What year did you enter college?','Set a code of your choice') NOT NULL,
  `sa1` varchar(100) NOT NULL,
  `sa2` varchar(100) NOT NULL,
  `sa3` varchar(100) NOT NULL,
  `likes` int(11) DEFAULT 0,
  `date_joined` datetime DEFAULT current_timestamp(),
  `access` enum('admin','default') DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `birthdate`, `province`, `profile_pic`, `about`, `sq1`, `sq2`, `sq3`, `sa1`, `sa2`, `sa3`, `likes`, `date_joined`, `access`) VALUES
(1, 'Stefan', 'Cerri', 'steffancerri@gmail.com', '$2y$10$W.tpJjz.3OYeFnViMrV34egjWKQxwAJ58NEkNqNGEIYNiiNlWrOmy', NULL, NULL, NULL, 'images/author-profile/PF_IMG_LETTER_S.png', NULL, 'What is the name of the street where you grew up?', 'In what city were you born?', 'What high school did you attend?', 'steffancerri', 'steffancerri', 'steffancerri', 1, '2023-12-11 07:55:34', 'default'),
(2, 'LaBarawn ', 'Jemz', 'lebarawnjemz@gmail.com', '$2y$10$8DCTHGnqXieJ5wXYOCLN0O/HtQ3sS6pRFYyqhoGiOLU.tYb2Poti.', NULL, NULL, NULL, 'images/author-profile/PF_IMG_LETTER_L.png', NULL, 'What was your childhood nickname?', 'What is the name of your favorite pet?', 'What is your date of birth?', 'lebarawnjemz', 'lebarawnjemz', 'lebarawnjemz', 0, '2023-12-11 07:56:13', 'default'),
(3, 'Mikal', 'Jerden', 'mikaljerden1@gmail.com', '$2y$10$uD7Y3OeDhcNPjZzT4mjm.uAks3WZgH2EQmMbhqc5PunGlkvBGLYNe', NULL, NULL, NULL, 'images/author-profile/PF_IMG_LETTER_M.png', NULL, 'What was your childhood nickname?', 'What is the name of the street where you grew up?', 'Who is your favorite superhero?', 'mikaljerden1', 'mikaljerden1', 'mikaljerden1', 0, '2023-12-11 07:58:08', 'default'),
(4, 'RJ ', 'Comawas', 'rjcomawas@gmail.com', '$2y$10$BS/TifeQYJ5U0QDRIeY2CeJ3mRqI62FzzVQSUrx68SwcP2IXTdVmm', NULL, NULL, NULL, 'images/author-profile/PF_IMG_LETTER_R.png', NULL, 'What was your childhood nickname?', 'What is the name of your favorite pet?', 'What is your date of birth?', 'rjcomawas', 'rjcomawas', 'rjcomawas', 0, '2023-12-11 07:58:38', 'default');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`cuisine_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `cuisine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
