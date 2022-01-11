-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Haz 2021, 11:42:57
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `library`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bookname` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `cover` varchar(250) NOT NULL,
  `isbn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `books`
--

INSERT INTO `books` (`id`, `bookname`, `author`, `cover`, `isbn`) VALUES
(10, 'Mecburiyet', 'Stefan Zweig', '5ad5b7af8db64ddde6a32c09b83e17c7.jpeg', '9876053326168'),
(11, 'Gömülü Şamdan ', 'Stefan Zweig', '209d317d1d8fb8ecc70cbc8ea8848ffd.jpg', '9876052951606'),
(12, 'Bilinmeyen Adanın Öyküsü', 'Jose Sarmago', '05fa47ec20376560bc527fee6bb7da01.jpg', '9876054927579'),
(13, 'Görünmez Adam', 'H.G. Wells', 'd83d03130c75a3be479f2c5aa1201521.jpg', '9876053564851'),
(16, 'Matematik Sembollerinin Kısa Tarihi', 'Joseph Mazur', 'ad205fb64afdc926e4a1e81a4409f362.jpg', '9876053547820');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `password`, `name`, `email`) VALUES
(10, 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', 'Emin Mengi', 'eminmengi@gmail.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
