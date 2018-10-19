-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2016 pada 07.23
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailcustomize`
--

CREATE TABLE IF NOT EXISTS `detailcustomize` (
  `transactionID` int(11) NOT NULL,
  `customizeID` int(11) NOT NULL AUTO_INCREMENT,
  `date_customize` varchar(50) NOT NULL,
  `status_customize` varchar(30) NOT NULL,
  `customname` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `bahan` varchar(30) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `quantity` int(11) NOT NULL,
  `S` int(11) NOT NULL,
  `M` int(11) NOT NULL,
  `L` int(11) NOT NULL,
  `XL` int(11) NOT NULL,
  `XXL` int(11) NOT NULL,
  `XXXL` int(11) NOT NULL,
  PRIMARY KEY (`customizeID`),
  UNIQUE KEY `transactionID` (`transactionID`),
  KEY `customizeID` (`customizeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `detailcustomize`
--

INSERT INTO `detailcustomize` (`transactionID`, `customizeID`, `date_customize`, `status_customize`, `customname`, `harga`, `bahan`, `warna`, `image`, `keterangan`, `quantity`, `S`, `M`, `L`, `XL`, `XXL`, `XXXL`) VALUES
(43, 1, '10-06-2016', 'approved', 'adfadsf', 30000, 'Kasar', 'Biru', 'adfadsf.png', '', 2, 2, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtransaction`
--

CREATE TABLE IF NOT EXISTS `detailtransaction` (
  `transactionID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `S` int(11) NOT NULL,
  `M` int(11) NOT NULL,
  `L` int(11) NOT NULL,
  `XL` int(11) NOT NULL,
  `XXL` int(11) NOT NULL,
  `XXXL` int(11) NOT NULL,
  KEY `transactionID` (`transactionID`),
  KEY `productID` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailtransaction`
--

INSERT INTO `detailtransaction` (`transactionID`, `productID`, `quantity`, `S`, `M`, `L`, `XL`, `XXL`, `XXXL`) VALUES
(45, 3, 3, 3, 0, 0, 0, 0, 0),
(46, 3, 3, 0, 3, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `msproduct`
--

CREATE TABLE IF NOT EXISTS `msproduct` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `productID` (`productID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `msproduct`
--

INSERT INTO `msproduct` (`productID`, `productname`, `price`, `brand`, `image`) VALUES
(3, 'baju2', 25000, 'brand2', 'baju2.jpg'),
(5, 'baju3', 35000, 'brand1', 'baju3.jpg'),
(6, 'baju4', 30000, 'brand1', 'baju4.jpg'),
(7, 'baju5', 32000, 'brand1', 'baju5.jpg'),
(8, 'baju luar biasa', 12000, 'apaajalah', 'baju luar biasa.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msuser`
--

CREATE TABLE IF NOT EXISTS `msuser` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`),
  KEY `userID` (`userID`),
  KEY `userID_2` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `msuser`
--

INSERT INTO `msuser` (`userID`, `role`, `username`, `password`, `email`, `gender`, `phone`, `address`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.admin', 'male', 1234, 'admin street'),
(2, 'member', 'louislouis', '3544b5c45fb641928f6d9d54708e4f20', 'louis@louis.com', 'male', 12341234, 'louis street'),
(3, 'member', 'apelapel', '86c32c415f75cdcbea1d86bba366f48a', 'apel@apel.apel', 'male', 13241243, 'apel street'),
(4, 'member', 'apaapa', '37bc463fc24c1e0b772a4588d5cbf609', 'apaapa@apa.apa', 'male', 2345345, 'apapapa street');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trclaim`
--

CREATE TABLE IF NOT EXISTS `trclaim` (
  `claimID` int(11) NOT NULL AUTO_INCREMENT,
  `transactionID` int(11) NOT NULL,
  `quantity_claim` int(11) NOT NULL,
  `ketclaim` varchar(300) NOT NULL,
  `image_claim` varchar(200) NOT NULL,
  `status_claim` varchar(30) NOT NULL,
  PRIMARY KEY (`claimID`),
  KEY `claimID` (`claimID`),
  KEY `transactionID` (`transactionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `trclaim`
--

INSERT INTO `trclaim` (`claimID`, `transactionID`, `quantity_claim`, `ketclaim`, `image_claim`, `status_claim`) VALUES
(16, 36, 0, '', '', ''),
(17, 37, 0, '', '', ''),
(18, 38, 0, '', '', ''),
(19, 39, 0, '', '', ''),
(20, 40, 0, '', '', ''),
(21, 41, 0, '', '', ''),
(22, 42, 0, '', '', ''),
(23, 43, 2, 'asdfasdf', '', 'pending'),
(25, 45, 2, 'baju robek', '', 'pending'),
(26, 46, 0, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trpayment`
--

CREATE TABLE IF NOT EXISTS `trpayment` (
  `paymentID` int(11) NOT NULL AUTO_INCREMENT,
  `transactionID` int(11) NOT NULL,
  `nama_payment` varchar(30) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `nilai_transfer` int(11) NOT NULL,
  `status_payment` varchar(30) NOT NULL,
  `norek` int(11) NOT NULL,
  PRIMARY KEY (`paymentID`),
  KEY `transactionID` (`transactionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `trpayment`
--

INSERT INTO `trpayment` (`paymentID`, `transactionID`, `nama_payment`, `nama_bank`, `nilai_transfer`, `status_payment`, `norek`) VALUES
(17, 36, '', '', 0, '', 0),
(18, 37, '', '', 0, '', 0),
(19, 38, '', '', 0, '', 0),
(20, 39, '', '', 0, '', 0),
(21, 40, '', '', 0, '', 0),
(22, 41, '', '', 0, '', 0),
(23, 42, '', '', 0, '', 0),
(24, 43, 'Louis Christopher Chen', 'BCA', 10000000, 'approved', 0),
(26, 45, 'Louis Christopher Chen', 'BCA', 3000000, 'approved', 0),
(27, 46, 'Louis Christopher Chen', 'BCA', 3000000, 'process', 999999999);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trshipping`
--

CREATE TABLE IF NOT EXISTS `trshipping` (
  `shippingID` int(11) NOT NULL AUTO_INCREMENT,
  `transactionID` int(11) NOT NULL,
  `nama_shipping` varchar(30) NOT NULL,
  `status_shipping` varchar(30) NOT NULL,
  PRIMARY KEY (`shippingID`),
  KEY `transactionID` (`transactionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `trshipping`
--

INSERT INTO `trshipping` (`shippingID`, `transactionID`, `nama_shipping`, `status_shipping`) VALUES
(16, 36, '', ''),
(17, 37, '', ''),
(18, 38, '', ''),
(19, 39, '', ''),
(20, 40, '', ''),
(21, 41, '', ''),
(22, 42, '', ''),
(23, 43, 'JNE', 'arrive'),
(25, 45, 'Tiki', 'arrive'),
(26, 46, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trtransaction`
--

CREATE TABLE IF NOT EXISTS `trtransaction` (
  `transactionID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status_transaction` varchar(30) NOT NULL,
  PRIMARY KEY (`transactionID`),
  KEY `userID` (`userID`),
  KEY `transactionID` (`transactionID`),
  KEY `transactionID_2` (`transactionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data untuk tabel `trtransaction`
--

INSERT INTO `trtransaction` (`transactionID`, `userID`, `date`, `status_transaction`) VALUES
(36, 3, '', 'pending'),
(37, 3, '', 'pending'),
(38, 3, '', 'pending'),
(39, 3, '', 'pending'),
(40, 3, '', 'pending'),
(41, 3, '', 'pending'),
(42, 3, '', 'pending'),
(43, 3, '10-06-2016', 'done'),
(44, 3, '', ''),
(45, 3, '10-06-2016', 'done'),
(46, 3, '12-06-2016', 'pending');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailcustomize`
--
ALTER TABLE `detailcustomize`
  ADD CONSTRAINT `detailcustomize_ibfk_1` FOREIGN KEY (`transactionID`) REFERENCES `trtransaction` (`transactionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detailtransaction`
--
ALTER TABLE `detailtransaction`
  ADD CONSTRAINT `detailtransaction_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `msproduct` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailtransaction_ibfk_3` FOREIGN KEY (`transactionID`) REFERENCES `trtransaction` (`transactionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trclaim`
--
ALTER TABLE `trclaim`
  ADD CONSTRAINT `trclaim_ibfk_1` FOREIGN KEY (`transactionID`) REFERENCES `trtransaction` (`transactionID`);

--
-- Ketidakleluasaan untuk tabel `trpayment`
--
ALTER TABLE `trpayment`
  ADD CONSTRAINT `trpayment_ibfk_1` FOREIGN KEY (`transactionID`) REFERENCES `trtransaction` (`transactionID`);

--
-- Ketidakleluasaan untuk tabel `trshipping`
--
ALTER TABLE `trshipping`
  ADD CONSTRAINT `trshipping_ibfk_1` FOREIGN KEY (`transactionID`) REFERENCES `trtransaction` (`transactionID`);

--
-- Ketidakleluasaan untuk tabel `trtransaction`
--
ALTER TABLE `trtransaction`
  ADD CONSTRAINT `trtransaction_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `msuser` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
