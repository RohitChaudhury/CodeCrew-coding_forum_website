-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 25, 2023 at 06:45 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_topic`
--

CREATE TABLE `answer_topic` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `answer` varchar(10000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer_topic`
--

INSERT INTO `answer_topic` (`id`, `user_id`, `category_id`, `topic_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 1, 'This is the answer submitted by the user himself', '2023-05-13 00:02:44', '2023-05-13 00:02:44'),
(3, 4, 7, 4, 'Try chat GPT', '2023-05-14 02:31:58', '2023-05-14 02:31:58'),
(5, 4, 7, 4, '@sajal thanks', '2023-05-14 04:38:37', '2023-05-14 04:38:37'),
(6, 4, 2, 1, 'My suggestion is to double-check the programme for errors.', '2023-05-17 00:31:59', '2023-05-16 19:02:10'),
(7, 1, 2, 9, 'Please help Anyone', '2023-05-18 13:09:38', '2023-05-18 13:09:38'),
(8, 4, 2, 9, 'Try a Youtube Tutorial by codewithharry\r\nlink: https://www.youtube.com/watch?v=gwWKnnCMQ5c&t=415s', '2023-05-18 13:11:35', '2023-05-18 07:42:29'),
(10, 1, 2, 9, '@rohit thanks for sugesting', '2023-05-18 13:13:25', '2023-05-18 13:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image_link` varchar(10000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `name`, `description`, `image_link`, `created_at`, `updated_at`) VALUES
(1, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation.', 'https://prepinsta.com/wp-content/uploads/2020/07/python-removebg-preview.webp', '2023-05-06 19:35:52', '2023-05-06 19:35:52'),
(2, 'C Language', 'C is a general-purpose computer programming language. It was created in the 1970s by Dennis Ritchie, and remains very widely used and influential.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/C_Programming_Language.svg/1200px-C_Programming_Language.svg.png', '2023-05-06 19:35:52', '2023-05-06 19:35:52'),
(3, 'C++ Language', 'C++ is an object-oriented programming (OOP) language that is viewed by many as the best language for creating large-scale applications.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/ISO_C%2B%2B_Logo.svg/300px-ISO_C%2B%2B_Logo.svg.png', '2023-05-06 19:42:47', '2023-05-06 19:42:47'),
(4, 'PHP', 'PHP is a general-purpose scripting language geared toward web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf.', 'https://avatars.githubusercontent.com/u/25158?s=280&v=4', '2023-05-06 19:42:47', '2023-05-06 19:42:47'),
(5, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', 'https://static.vecteezy.com/system/resources/previews/020/109/178/non_2x/java-editorial-logo-free-download-free-vector.jpg', '2023-05-06 19:45:13', '2023-05-06 19:45:13'),
(6, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web,with HTML+CSS.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/JavaScript-logo.png/800px-JavaScript-logo.png', '2023-05-06 19:45:13', '2023-05-06 19:45:13'),
(7, 'Ruby', 'Ruby is an interpreted, high-level, general-purpose programming language which supports multiple programming paradigms as well as OOPs.', 'https://www.thoughtco.com/thmb/PZhLV9sAIDN_jt4j6FjhLHrSyWI=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/2000px-Ruby-logo-R.svg-56a811b75f9b58b7d0f05e83.jpg', '2023-05-06 23:10:24', '2023-05-06 23:10:24'),
(8, 'Rust', 'Rust is a multi-paradigm, high-level, general-purpose programming language that emphasizes performance, type safety, and concurrency', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Rust_programming_language_black_logo.svg/800px-Rust_programming_language_black_logo.svg.png', '2023-05-06 23:10:24', '2023-05-06 23:10:24'),
(9, 'C# Language', 'C# is a general-purpose high-level programming language supporting multiple paradigms. C# encompasses static typing, and component-oriented programming disciplines.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKR5nMD7m6U4FyIsTzv1LrSmtpAaMRTc5W-A&usqp=CAU', '2023-05-06 23:43:24', '2023-05-06 23:43:24'),
(10, 'Swift', 'Swift is a high-level general-purpose, multi-paradigm, compiled programming language developed by Apple Inc. and the open-source community', 'https://e7.pngegg.com/pngimages/685/655/png-clipart-swift-essentials-programming-language-macos-c-apple-swift-programming-language-thumbnail.png', '2023-05-06 23:43:24', '2023-05-06 23:43:24'),
(11, 'Dart', 'Dart programming language is designed for client development such as for the web and mobile apps, and it can also be used to build server and desktop applications.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Dart-logo-icon.svg/2048px-Dart-logo-icon.svg.png', '2023-05-07 00:00:33', '2023-05-07 00:00:33'),
(12, 'GO', 'Golang is syntactically similar to C, but with memory safety, garbage collection, structural typing, and CSP-style concurrency.It is Statistically typed.', 'https://e7.pngegg.com/pngimages/762/389/png-clipart-go-computer-programming-programming-language-echo-exception-handling-others-computer-computer-program-thumbnail.png', '2023-05-07 00:00:33', '2023-05-07 00:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `intro_category`
--

CREATE TABLE `intro_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description_intro` varchar(1000) NOT NULL,
  `image_link` varchar(10000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `intro_category`
--

INSERT INTO `intro_category` (`id`, `name`, `description_intro`, `image_link`, `created_at`, `updated_at`) VALUES
(1, 'Python', 'Python is a high-level programming language known for its simplicity, readability, and versatility. It has become one of the most popular languages in the world, used in areas such as web development, data science, machine learning, and artificial intelligence. Whether you\'re a beginner or an experienced developer, this forum is the perfect place to share knowledge, ask questions, and connect with other Python enthusiasts.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Python-logo-notext.svg/300px-Python-logo-notext.svg.png', '2023-05-08 20:45:11', '2023-05-08 20:45:11'),
(2, 'C Language', 'C language is a powerful programming language that has been in use for several decades. In this space, we offer programmers of all levels to discuss, learn, and share their knowledge of C programming. Whether you\'re a beginner or an expert, we invite you to join us in exploring the vast and powerful world of C. ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/C_Programming_Language.svg/300px-C_Programming_Language.svg.png', '2023-05-08 20:50:12', '2023-05-08 20:50:12'),
(3, 'C++ Language', 'C++ is a powerful programming language that offers high performance, memory management, and object-oriented programming features. It has been used to create a wide range of applications, from operating systems and games to scientific simulations and finance software. Join our C++ language community forum to connect with other developers, share knowledge, and stay up-to-date with the latest trends and best practices.\r\n\r\n\r\n\r\n\r\n', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/ISO_C%2B%2B_Logo.svg/300px-ISO_C%2B%2B_Logo.svg.png', '2023-05-08 20:53:49', '2023-05-08 20:53:49'),
(4, 'PHP', 'PHP is a server-side scripting language widely used for web development. Its simplicity and powerful features have made it one of the most popular languages for creating dynamic web pages and applications. Whether you\'re a beginner or an expert, PHP has something for everyone. Join our community forum to learn and share your knowledge about PHP.', 'https://avatars.githubusercontent.com/u/25158?s=280&v=4', '2023-05-08 20:53:49', '2023-05-08 20:53:49'),
(5, 'Java', 'Java is a widely-used programming language that has stood the test of time. It is popular for its portability, scalability, and ability to create complex applications. From developing enterprise-level software to creating Android applications, Java has a vast range of applications. Join our community forum to learn, share your knowledge and collaborate with other Java enthusiasts.', 'https://png.pngtree.com/png-vector/20210228/ourmid/pngtree-java-programming-icon-png-image_2974729.jpg', '2023-05-08 20:57:36', '2023-05-08 20:57:36'),
(6, 'JavaScript', 'JavaScript is a high-level programming language that is widely used for building interactive web pages and web applications. It is a powerful tool that enables developers to add dynamic functionality to websites, enhance user experience, and create responsive and mobile-friendly designs. Join our JavaScript community forum to learn, share and explore the endless possibilities of this versatile language.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/JavaScript-logo.png/300px-JavaScript-logo.png', '2023-05-08 20:57:36', '2023-05-08 20:57:36'),
(7, 'Ruby', 'Ruby is a dynamic, interpreted language known for its simple syntax, productivity, and ease of use. It is often used for web development, as well as for building games and desktop applications. The Ruby community is passionate and collaborative, constantly creating new libraries and tools to improve the language. Join our community forum to learn and share your experiences with Ruby.', ' https://cdn.iconscout.com/icon/free/png-256/free-ruby-45-1175100.png', '2023-05-08 21:03:08', '2023-05-08 21:03:08'),
(8, 'Rust', 'Rust is a modern programming language that prioritizes safety, speed, and concurrency. It provides memory safety without garbage collection, making it ideal for systems programming. Rust has been gaining popularity for its unique features, such as zero-cost abstractions, pattern matching, and ownership model. The Rust community is dedicated to sharing knowledge, improving the language, and creating robust and reliable software.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Rust_programming_language_black_logo.svg/300px-Rust_programming_language_black_logo.svg.png', '2023-05-08 21:03:08', '2023-05-08 21:03:08'),
(9, 'C# Language', 'C# is a popular object-oriented programming language developed by Microsoft. It is widely used for building desktop applications, web applications, and games, and is especially popular for developing applications on the Windows platform. C# is known for its simplicity and ease of use, making it a great choice for both beginners and experienced developers. Join our C# community forum to learn more about this powerful language and connect with other developers.', 'https://www.freeiconspng.com/uploads/c-logo-icon-18.png', '2023-05-08 21:08:34', '2023-05-08 21:08:34'),
(10, 'Swift', 'Swift is a powerful and modern programming language developed by Apple for building iOS, macOS, watchOS, and tvOS applications. With a concise syntax and a focus on safety and performance, Swift has quickly gained popularity among developers. The Swift Community forum provides a platform for developers to share their knowledge, ask questions, and collaborate on projects using this exciting language.', 'https://e7.pngegg.com/pngimages/685/655/png-clipart-swift-essentials-programming-language-macos-c-apple-swift-programming-language-thumbnail.png', '2023-05-08 21:08:34', '2023-05-08 21:08:34'),
(11, 'Dart', 'Dart is a modern, client-optimized programming language created by Google that can be used for both front-end and back-end development. With its strong type system and performance optimizations, Dart offers developers a reliable and efficient platform for building robust web and mobile applications. Join our Dart community forum to connect with other developers, share ideas, and learn about the latest updates and features of this exciting language.', 'https://w7.pngwing.com/pngs/253/124/png-transparent-dart-programming-logo-dart-mobile-developer-programming-programming-language-interface-3d-icon-thumbnail.png', '2023-05-08 21:12:23', '2023-05-08 21:12:23'),
(12, 'GO', 'GO is a modern, open-source programming language developed by Google. It is designed for building fast, efficient, and scalable software systems. With built-in concurrency support, it is ideal for building networked and distributed systems. GO\'s simple syntax, garbage collection, and excellent tooling make it easy to learn and use. The GO community is rapidly growing, with many companies adopting it for their projects. Join the GO community forum to learn more about this powerful language and how it can help you build better software.', 'https://assets-global.website-files.com/62a8969da1ab56329dc8c41e/643cd60db8f6518c8d92d5c4_637c71d925cb8ba0aeffdb88_golang-1-300x300.png', '2023-05-08 21:12:23', '2023-05-08 21:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `topic_category`
--

CREATE TABLE `topic_category` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(10000) NOT NULL,
  `question` varchar(10000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topic_category`
--

INSERT INTO `topic_category` (`id`, `category_id`, `user_id`, `subject`, `question`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'Stuck on the segmentation fault', 'I was been coding a problem in C programming language and suddenly it shows segmentation fault. Can anyone please help me with this problem?', '2023-05-10 02:18:29', '2023-05-17 01:21:28'),
(2, 2, 4, 'Compiler not found', 'I have a problem and this is my problem?\r\n', '2023-05-10 03:26:52', '2023-05-16 18:45:56'),
(4, 7, 4, 'Compiler Problem', 'dsvsgvdsgvdrsw', '2023-05-10 05:48:51', '2023-05-10 05:48:51'),
(5, 7, 4, 'Compiler not found', 'bwifbwbfiewf', '2023-05-10 05:51:31', '2023-05-10 05:51:31'),
(8, 1, 4, 'Im learning python', 'Suggest Some good resources', '2023-05-13 03:57:50', '2023-05-13 03:57:50'),
(9, 2, 6, 'How to push a new C project on GitHub', 'Hello! Im have made a project on C language and i want to push it on Git, please help?', '2023-05-18 13:08:22', '2023-05-18 07:39:07'),
(10, 2, 1, 'I learning DSA using C and C++', 'Refer me few free resources', '2023-05-25 04:17:46', '2023-05-25 04:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `users_auth`
--

CREATE TABLE `users_auth` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bio` varchar(10000) DEFAULT NULL,
  `t_stamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_auth`
--

INSERT INTO `users_auth` (`id`, `email`, `user_name`, `password`, `bio`, `t_stamp`) VALUES
(1, 'sajal@gmail.com', 'sajal', '$2y$10$vMSdHp1Q2j2lNW2x5BOjW.O2x7Bw8KbGvgH0wK9BlvF/Zlo7qUXbe', 'Hello, this is my bio', '2023-04-25 12:52:15'),
(4, 'rohit@gmail.com', 'Rohit', '$2y$10$vMSdHp1Q2j2lNW2x5BOjW.O2x7Bw8KbGvgH0wK9BlvF/Zlo7qUXbe', 'im an ensuing software developer and engineer', '2023-04-25 12:56:57'),
(5, 'random@gmail.com', 'random', '$2y$10$qvWr01VP9ubPDsqTstLGYubftyMRqEp8i9EP2F0VTq.r.JROk2VQy', NULL, '2023-05-08 21:04:58'),
(6, 'abcd@gmail.com', 'abcd', '$2y$10$KsQueyaDBBNlOZYAIr5MEu5ztwdPf.MwuuiJcB8H9WjYK3M79xGKa', NULL, '2023-05-16 21:02:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_topic`
--
ALTER TABLE `answer_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intro_category`
--
ALTER TABLE `intro_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic_category`
--
ALTER TABLE `topic_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_auth`
--
ALTER TABLE `users_auth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_topic`
--
ALTER TABLE `answer_topic`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `intro_category`
--
ALTER TABLE `intro_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `topic_category`
--
ALTER TABLE `topic_category`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_auth`
--
ALTER TABLE `users_auth`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
