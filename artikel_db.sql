-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2025 at 02:57 PM
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
-- Database: `artikel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `content` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `date`, `title`, `status`, `content`, `picture`) VALUES
(1, '9 Maret 2025', 'Hawa Sejuk dan Spot Instagramable di Taman Selecta, Cocok Buat Healing!', 'setuju', '<p>Malang selalu punya cara buat bikin orang jatuh cinta. Salah satu tempat wisata yang wajib masuk dalam daftar kunjungan adalah <strong>Taman Rekreasi Selecta</strong>. Terletak di kawasan Batu, tempat ini terkenal dengan udaranya yang sejuk, pemandangan indah, dan pastinya banyak spot kece buat foto-foto. Kalau kamu lagi cari tempat buat santai, refreshing, atau sekadar melepas penat dari hiruk-pikuk kota, Selecta adalah pilihan yang tepat. Yuk, kita bahas lebih dalam tentang keindahan taman ini!</p>\r\n        \r\n        <h2>Sejarah dan Daya Tarik Taman Selecta</h2>\r\n        <p>Taman Rekreasi Selecta bukan tempat wisata baru. Dibangun sejak era kolonial Belanda pada tahun 1930-an, tempat ini awalnya digunakan sebagai tempat peristirahatan bagi pejabat dan orang-orang penting saat itu. Namun, seiring berjalannya waktu, Selecta berkembang menjadi taman rekreasi yang terbuka untuk umum dan menjadi salah satu destinasi wisata favorit di Malang Raya.</p>\r\n        <p>Begitu sampai di Taman Selecta, kamu langsung disambut udara segar khas pegunungan yang bikin tubuh dan pikiran jadi rileks. Lokasinya yang berada di ketinggian sekitar 1.100 meter di atas permukaan laut membuat tempat ini punya suhu yang adem, bahkan di siang hari sekalipun. Ditambah lagi, taman bunga yang luas dengan warna-warni menawan bikin suasana makin nyaman dan menyenangkan.</p>\r\n        \r\n        <h2>Spot Instagramable yang Wajib Dikunjungi</h2>\r\n        <p>Selain keindahan alamnya, Selecta juga menawarkan banyak spot instagramable yang cocok buat mempercantik feed media sosialmu. Ada taman bunga dengan latar belakang perbukitan hijau, jembatan kecil yang dikelilingi tanaman warna-warni, hingga kolam air jernih yang bisa jadi tempat foto estetik. Salah satu spot favorit pengunjung adalah <strong>sky bike</strong>, yaitu sepeda yang melayang di atas taman, memberikan sensasi unik dan pemandangan spektakuler dari atas.</p>\r\n        \r\n        <h2>Wahana Seru di Taman Selecta</h2>\r\n        <p>Kalau datang ke sini, jangan lupa juga buat menikmati wahana seru yang ada di dalam taman. Selain sky bike, ada juga wahana perahu ayun, water park, hingga kuda tunggang buat anak-anak maupun dewasa. Kolam renang di Selecta juga cukup menarik karena airnya yang jernih dan sejuk, langsung dari sumber alami di sekitar pegunungan.</p>\r\n        \r\n        <h2>Kulineran di Taman Selecta</h2>\r\n        <p>Setelah puas jalan-jalan dan bermain, kamu bisa mampir ke restoran atau area kuliner di dalam Selecta untuk menikmati makanan khas Malang, seperti bakso Malang yang terkenal lezat. Ada juga berbagai camilan seperti jagung bakar dan pisang goreng yang pas banget disantap sambil menikmati udara dingin di sini.</p>\r\n        \r\n        <h2>Tips Berkunjung ke Taman Selecta</h2>\r\n        <ul>\r\n            <li><strong>Datang di pagi atau sore hari</strong> - Suhu lebih segar dan suasana lebih nyaman.</li>\r\n            <li><strong>Gunakan pakaian yang nyaman</strong> - Udara cukup dingin, pakailah jaket atau pakaian hangat.</li>\r\n            <li><strong>Bawa kamera atau ponsel dengan baterai penuh</strong> - Banyak spot bagus yang sayang kalau nggak diabadikan.</li>\r\n            <li><strong>Siapkan uang tunai</strong> - Beberapa tempat menerima pembayaran digital, tetapi lebih baik membawa uang tunai.</li>\r\n        </ul>\r\n        \r\n        <h2>Kesimpulan</h2>\r\n        <p>Jadi, kalau kamu butuh tempat buat <strong>healing</strong> dari kesibukan sehari-hari, Taman Selecta adalah pilihan yang sempurna. Dengan udara sejuk, pemandangan indah, dan banyak spot foto keren, tempat ini cocok banget buat liburan santai bersama keluarga, teman, atau bahkan solo trip. Yuk, rencanakan perjalananmu ke Selecta dan rasakan sendiri keindahannya!</p>', 'selecta.jpg'),
(2, '10 Maret 2025', 'Jelajah Museum Angkut: Wisata Edukasi Seru untuk Pecinta Otomotif', 'setuju', '<p>Kalau kamu pecinta kendaraan atau suka dengan sejarah transportasi, Museum Angkut di Batu, Malang, wajib masuk dalam daftar tempat wisata yang harus dikunjungi!</p>\r\n    <p>Museum ini bukan sekadar tempat pajangan mobil dan motor lawas, tapi juga mengajak pengunjung menjelajahi perkembangan dunia otomotif dari masa ke masa dengan cara yang seru dan interaktif.</p>\r\n    <p>Mulai dari kendaraan klasik, pesawat, hingga suasana kota-kota terkenal dunia, semua bisa kamu temukan di sini. Yuk, kita jelajahi Museum Angkut lebih dalam!</p>\r\n\r\n    <p><strong>Sejarah dan Konsep Museum Angkut</strong></p>\r\n    <p>Museum Angkut pertama kali dibuka pada tahun 2014 oleh Jatim Park Group, pengelola beberapa destinasi wisata populer di Batu. Sebagai museum transportasi pertama dan terbesar di Asia Tenggara, tempat ini punya koleksi lebih dari 300 kendaraan dari berbagai era dan negara.</p>\r\n    <p>Bukan hanya mobil dan motor klasik, tapi juga pesawat, sepeda, becak, hingga kendaraan khas berbagai daerah di Indonesia dan dunia.</p>\r\n\r\n    <p>Yang bikin Museum Angkut makin menarik adalah konsepnya yang tematik. Jadi, saat menjelajahi museum ini, kamu seperti berpindah dari satu kota ke kota lain dengan atmosfer yang benar-benar berbeda. Setiap zona dibuat mirip dengan aslinya, lengkap dengan bangunan, lampu, bahkan musik khas yang membuat pengalamanmu semakin seru.</p>\r\n\r\n    <h4><strong>Zona-Zona Menarik di Museum Angkut</strong></h4>\r\n\r\n    <p><strong>1. Zona Hall Utama</strong></p>\r\n    <p>Begitu masuk, kamu langsung disambut dengan berbagai koleksi kendaraan antik yang elegan. Di sini, ada mobil-mobil klasik dari Amerika dan Eropa yang dulu digunakan oleh para pejabat dan orang-orang berpengaruh di dunia. Salah satu yang paling menarik perhatian adalah mobil kepresidenan yang pernah digunakan oleh Presiden Soekarno!</p>\r\n\r\n    <p><strong>2. Zona Edukasi</strong></p>\r\n    <p>Buat kamu yang penasaran dengan sejarah perkembangan transportasi dari zaman ke zaman, zona ini cocok banget untuk dikunjungi. Ada berbagai informasi menarik tentang bagaimana kendaraan berkembang, mulai dari kereta kuda, sepeda, hingga mobil listrik masa kini.</p>\r\n\r\n    <p><strong>3. Zona Sunda Kelapa & Batavia</strong></p>\r\n    <p>Zona ini menggambarkan suasana pelabuhan Sunda Kelapa pada masa kolonial Belanda. Kamu bisa melihat replika kapal besar, becak tempo dulu, dan berbagai kendaraan khas dari era tersebut. Ditambah dengan suasana khas pasar dan pelabuhan zaman dulu, tempat ini cocok buat yang suka berfoto dengan nuansa vintage.</p>\r\n\r\n    <p><strong>4. Zona Amerika</strong></p>\r\n    <p>Kalau kamu penggemar mobil klasik ala Hollywood, zona ini pasti jadi favoritmu! Ada banyak kendaraan khas Amerika seperti Cadillac, Chevrolet, hingga Ford Mustang. Zona ini juga dihiasi dengan suasana kota-kota di Amerika, lengkap dengan replika Hollywood dan Broadway yang ikonik.</p>\r\n\r\n    <p><strong>5. Zona Eropa</strong></p>\r\n    <p>Di sini, kamu bakal merasa seperti sedang berjalan di jalanan kota-kota klasik di Eropa. Mulai dari London dengan bus merah tingkatnya yang khas, Paris dengan suasana romantisnya, hingga Italia yang penuh dengan mobil-mobil sport mewah seperti Ferrari dan Lamborghini.</p>\r\n\r\n    <p><strong>6. Zona Gangster & Broadway</strong></p>\r\n    <p>Buat kamu yang suka suasana film mafia ala Amerika, zona ini menawarkan pengalaman unik. Dengan latar belakang kota gangster tahun 1920-an, lengkap dengan kendaraan klasik dan suasana gelap penuh lampu neon, tempat ini sering jadi spot favorit untuk foto-foto keren.</p>\r\n\r\n    <h4><strong>Wahana dan Atraksi Menarik</strong></h4>\r\n    <p>Selain koleksi kendaraan yang super keren, Museum Angkut juga menawarkan berbagai atraksi yang sayang untuk dilewatkan:</p>\r\n    <ul>\r\n        <li><strong>The Presidential Car</strong> - Koleksi mobil kepresidenan, termasuk replika mobil yang pernah digunakan oleh Presiden Soekarno.</li>\r\n        <li><strong>Zona Flight Simulator</strong> - Kamu bisa merasakan sensasi menerbangkan pesawat dalam simulator yang seru dan realistis.</li>\r\n        <li><strong>Atraksi Parade Kendaraan</strong> - Setiap sore, ada parade kendaraan klasik yang dikendarai oleh staf museum dengan kostum khas sesuai dengan era kendaraannya.</li>\r\n    </ul>\r\n\r\n    <h4><strong>Zona Pasar Apung: Tempat Makan & Belanja Unik</strong></h4>\r\n    <p>Setelah puas menjelajahi berbagai zona di Museum Angkut, jangan lupa mampir ke Pasar Apung Nusantara yang ada di area luar museum. Konsepnya mirip dengan pasar terapung di Kalimantan, di mana berbagai jajanan tradisional dijual dari perahu-perahu kecil.</p>\r\n    <p>Di sini, kamu bisa mencicipi makanan khas Jawa Timur seperti nasi pecel, tahu petis, rujak cingur, hingga es dawet. Selain makanan, Pasar Apung juga menjual berbagai suvenir khas Malang yang cocok buat oleh-oleh.</p>\r\n\r\n    <h4><strong>Tips Berkunjung ke Museum Angkut</strong></h4>\r\n    <ul>\r\n        <li><strong>Datang lebih awal</strong> - Museum ini cukup luas, jadi kalau ingin menjelajahi semua zona dengan puas, sebaiknya datang pagi atau siang hari.</li>\r\n        <li><strong>Gunakan pakaian dan sepatu yang nyaman</strong> - Karena kamu akan banyak berjalan, pakailah pakaian yang santai dan sepatu yang nyaman.</li>\r\n        <li><strong>Bawa kamera atau ponsel dengan baterai penuh</strong> - Ada banyak spot keren yang sayang banget kalau tidak diabadikan.</li>\r\n        <li><strong>Jangan lupa cek jadwal pertunjukan</strong> - Supaya tidak ketinggalan parade kendaraan atau atraksi seru lainnya.</li>\r\n    </ul>\r\n\r\n    <h4><strong>Kesimpulan</strong></h4>\r\n    <p>Museum Angkut bukan sekadar museum biasa, tapi tempat wisata edukasi yang menyenangkan untuk semua usia. Dengan koleksi kendaraan klasik, zona tematik yang keren, dan berbagai wahana interaktif, tempat ini cocok banget buat pecinta otomotif maupun yang sekadar ingin jalan-jalan dan hunting foto keren.</p>\r\n    <p>Jadi, kalau kamu ke Malang atau Batu, jangan lupa mampir ke Museum Angkut. Siapkan kamera, ajak teman atau keluarga, dan nikmati pengalaman menjelajahi dunia otomotif dalam suasana yang unik dan mengesankan!</p>', 'museumangkut.jpg'),
(7, '2025-05-18', 'Budi Arie Alleged to Get 50% Share of Online Gambling Bribery', 'setuju', '<p>Public prosecutors have indicted Zulkarnaen Apriliantony, Adhi Kismanto, Alwin Jabarti Kiemas, and Muhrijan alias Agus in a bribery case connected to the unblocking of online gambling sites by the then Ministry of Communication and Information or Kominfo (now the Ministry of Communication and Digital or Komdigi).</p>\r\n\r\n<p>\"The initial trial was held in room 05 on Wednesday, May 14, 2025,\" as published in the Information System of the South Jakarta District Court on Friday, May 16, 2025.</p>\r\n\r\n<p>Prosecutors allege that the four individuals, alongside Denden Imadudin Soleh, Fakhri Dzulfikar, Muhammad Abindra Putra Tayip, Syamsul Arifim, Muchlis Nasution, Deny Maryono, Budianto Salim, Bennihardi, Ferry Wiliam alias Acai, Bernard alias Otoy, and Helmi Fernando, intentionally and unlawfully distributed, transmitted, and/or facilitated access to electronic information and/or documents containing gambling content. They are suspected of collectively receiving a bribe of Rp15.3 billion in exchange for unblocking several online gambling sites that Kominfo should have blocked.</p>\r\n\r\n<p>The indictment letter with register number PDM-32/JKTSL/Eku.2/02/2025 reportedly reveals the role of the then Kominfo Minister Budi Arie Setiadi. Around October 2023, Zulkarnaen Apriliantony was allegedly asked by Budi Arie to find individuals capable of gathering data on online gambling sites. Apriliantony subsequently introduced Budi Arie to Adhi Kismanto.</p>\r\n\r\n<p>During that meeting, Adhi presented a data crawling tool capable of identifying online gambling sites. Budi Arie then offered Adhi an opportunity to participate in the selection process as an expert at the Ministry of Communication and Information.</p>\r\n\r\n<p>Despite being initially declared unfit for the position due to the lack of a bachelor\'s degree during the selection process, Adhi Kismanto was allegedly accepted to work at Kominfo due to \"attention\" from Budi Arie. Adhi was then tasked with identifying links to online gambling sites, which were then reported to the Head of the Take Down Team, Riko Rasota Rahmada, for blocking.</p>\r\n\r\n<p>In January 2024, many online gambling sites coordinated by Alwin Jabarti Kiemas with Denden were blocked. Denden informed Kiemas that a Kominfo team, specifically Adhi Kismanto, was conducting independent patrols. In response, Alwin Jabarti reportedly refused to provide protection money but instead offered \"coordination money\" of Rp280 million to Denden.</p>\r\n\r\n<p>Around early 2024, Muhrijan alias Agus, who claimed to be a representative of a Kominfo director, allegedly learned about the practice of protecting online gambling sites from being blocked through his brother, Muchlis Nasution, who coordinated by phone with Denden. Muhrijan then met with Denden, stating his awareness of the gambling site protection scheme and threatening to report it to the Minister of Communication and Information. Muhrijan demanded Rp1.5 billion.</p>\r\n\r\n<p>Around March 2024, Muhrijan again contacted Denden, requesting an introduction to Adhi Kismanto. During a meeting at Pergrams cafe in the Senopati area, South Jakarta, Muhrijan allegedly conveyed to Adhi the need to continue protecting online gambling sites, claiming there were individuals within Kominfo who desired it. He reportedly offered a 20% commission to Adhi. Muhrijan also allegedly provided a share of Rp3 million per guarded online gambling site to Apriliantony.</p>\r\n\r\n<p>Muhrijan and Apriliantony reportedly met again at Pergrams cafe to discuss the protection of online gambling sites at Kominfo and a rate of Rp8 million per site. They also allegedly discussed a distribution scheme for all unblocked gambling sites: Adhi Kismanto at 20%, Apriliantony at 30%, and Budi Arie Setiadi at 50%.</p>\r\n\r\n<p>Tempo contacted Budi Arie to confirm the indictment\'s details and the alleged 50% allocation for him from protecting online gambling sites. Budi Arie responded solely with two smile emojis.</p>\r\n\r\n<p>Subsequently, Budi Arie sent a 46-second video depicting him making a hand gesture signifying love, with an image of a bull below it. The video\'s narration asserted that Budi Arie never solicited money from online gambling businesses, nor did he ever instruct anyone, verbally or in writing, to protect gambling operations. The video also claimed that none of Budi Arie\'s staff or members of Projo, an organization he founded, were involved in the gambling case, and there was no flow of funds from online gambling businesses to him.</p>\r\n\r\n<p>According to the video, Budi Arie suggested a \"malicious framing\" by \"gambling partners.\" It further claimed that whenever online gambling cases are cracked down upon, \"party cadre partners of online gambling\" are always involved, and that the chairmen and elites of these \"online gambling partner parties\" never campaigned against online gambling.</p>\r\n\r\n<p>The Head of the Intelligence Section of the South Jakarta District Attorney\'s Office, Reza Prasetyo Handono, confirmed that prosecutors had read the indictment of Zulkarnaen Apriliantony at the South Jakarta District Court. \"Yes, the indictment hearing was held on May 14,\" Reza stated via phone.</p>', 'img_68295c0603082.png'),
(8, '2025-05-18', 'Prabowo to Meet Thai King Maha Vajiralongkorn and PM Paetongtarn', 'setuju', '<p>Indonesian President Prabowo Subianto is set to meet with Thailand\'s King Maha Vajiralongkorn and Thailand\'s Prime Minister Paetongtarn Shinawatra in Thailand on Sunday, May 18, 2025. Prabowo arrived in Bangkok, Thailand, on Saturday night, May 17, 2025.</p>\r\n\r\n<p>Quoted from the official statement by the President\'s Secretariat Press, Media, and Information Bureau, the plane carrying President Prabowo and limited entourage landed at the Don Mueang Royal Thai Air Force Base at around 22:00 local time.</p>\r\n\r\n<p>Upon arrival at the airport, President Prabowo was formally welcomed by the Thai government, including Deputy Prime Minister/Finance Minister Pichai Chunhavajira, Trade Minister Pichai Naripthaphan, Thai Ambassador to Indonesia Prapan Disyatat, and Indonesian representatives, namely Indonesian Ambassador to Bangkok Rachmat Budiman and Indonesian Defense Attach to Bangkok Colonel Cke. Faisal Rahmat Hutagalung.</p>\r\n\r\n<p>President Prabowo\'s presence was also greeted by an honor guard accompanying the President to the vehicle. After the welcoming ceremony, President Prabowo headed directly to the hotel where he would stay during the visit.</p>\r\n\r\n<p>During his stay in Bangkok, President Prabowo is scheduled to carry out a number of important agendas, ranging from an official audience with Thailand\'s King Maha Vajiralongkorn to an official welcome by Thai Prime Minister Paetongtarn Shinawatra, followed by a bilateral meeting between the two countries\' delegations.</p>\r\n\r\n<p>Accompanying President Prabowo on the flight to Thailand are Foreign Minister Sugiono and Cabinet Secretary Teddy Indra Wijaya.</p>\r\n\r\n<p>Prior to departing for Thailand on Saturday night, May 17, 2025, the Head of State and limited entourage departed from the Halim Perdanakusuma Air Base in Jakarta at around 18:50 WIB (Western Indonesian Time).</p>\r\n\r\n<p>While in the Land of the White Elephant, President Prabowo is scheduled to carry out a series of important agendas to strengthen bilateral relations between Indonesia and Thailand. Deputy for Protocol, Press, and Media Affairs of the President\'s Secretariat, Yusuf Permana, stated, \"President Prabowo is scheduled to have an official audience with Thailand\'s King, Maha Vajiralongkorn, and then there will be an official welcome by Thai Prime Minister Paetongtarn Shinawatra, followed by a bilateral meeting between the two countries\' delegations.\"</p>\r\n\r\n<p>He said that this official visit is a manifestation of President Prabowo\'s commitment to strengthen Indonesia\'s strategic partnership with friendly countries in the Southeast Asian region, including Thailand, which has been an important partner in various strategic fields.</p>', 'img_68299528c003b.png'),
(9, '2025-05-18', 'Dedi Mulyadi Siapkan Kebijakan Jam Malam bagi Pelajar', 'setuju', '<p>Dedi Mulyadi mengatakan kebijakan jam malam bagi pelajar untuk mendorong penegakan kedisiplinan</p>\r\n<p><strong>TEMPO.CO, Bandung</strong> - Gubernur Jawa Barat Dedi Mulyadi mengatakan, tengah menyiapkan kebijakan pembatasan jam malam bagi pelajar di hari sekolah. “Saya akan berlakukan kebijakan, misalnya anak sekolah tidak boleh nongkrong di luar rumah setelah pukul 20.00 pada hari belajar. Ini penting untuk menjauhkan mereka dari potensi bahaya di luar rumah,” kata dia dikutip dari rilis Humas Jabar, Sabtu, 17 Mei 2025.</p>\r\n<p>Baca juga: <a href=\"#\">Cara Dedi Mulyadi Membuat Kebijakan: Mengandalkan Intuisi</a></p>\r\n<p>Baca berita dengan sedikit iklan,<br>klik di sini</p>\r\n<p>Dedi mengatakan, kebijakan tersebut untuk mendorong penegakan kedisiplinan bagi pelajar termasuk kepatuhan berlalu-lintas, serta pengawasan ketat terhadap potensi penyalahgunaan narkoba dan minuman keras. Ia mengklaim, tren positifi sudah mulai terlihat di berbagai daerah di Jawa Barat.</p>\r\n<p><strong>BACA JUGA</strong></p>\r\n<p><a href=\"#\">Dedi Mulyadi Adukan Mahar Cagub Jawa Barat ke Aburizal Bakrie</a></p>\r\n<p>“Anak-anak sekarang mulai disiplin, berjalan kaki ke sekolah, dan kasus tawuran pun mulai menurun. Ini bukti bahwa sinergi bisa menghasilkan perubahan,” kata Dedi.</p>\r\n<p>Pernyataan tersebut disampaikan Dedi selepas penandatanganan MoU antara pemerintah provinsi, Polda Jabar, dan Polda Metro Jaya untuk sinergi pengamanan wilayah untuk menjaga ketenteraman dan ketertiban umum, serta mendorong iklim investasi yang sehat di Jawa Barat. MoU tersebut ditandatangani di Gedung Negara Pakuan, Bandung, pada Jumat, 16 Mei 2025.</p>\r\n<p><strong>BACA JUGA</strong></p>\r\n<p><a href=\"#\">Sisi Lain Hardiknas, Cerita Guru Terpaksa Mengamen karena Utang</a></p>\r\n<p>“Perjanjian ini menyangkut berbagai hal, mulai dari peningkatan keamanan dan ketertiban wilayah, ketentraman warga, hingga mendorong iklim investasi yang sehat di Jawa Barat,\" kata Dedi. </p>\r\n<p>Polda Jawa Barat membawahi pengamanan di seluruh Jawa Barat, kecuali wilayah Bogor, Depok, dan Bekasi yang berada di wilayah kewenangan Polda Metro Jaya, sehingga dua polda tersebut dilibatkan dalam kerja sama tersebut.</p>\r\n<p>Dedi mengatakan, kerja sama lintas instansi tersebut penting untuk menciptakan suasana kondusif di Jawa Barat. Langkah konkret akan dilakukan untuk memperkuat pengamanan di kawasan industri dan pusat-pusat ekonomi, serta melindungi pelaku UMKM dan aktivitas masyarakat di wilayah tradisional. “Kemudian menumbuhkan iklim ekonomi yang kondusif, melindungi UMKM, ada ketenteraman di Pasar dan di berbagai tempat lainnya,\" kata dia.</p>\r\n<p>Dikutip dari siaran pers tersebut, Kapolda Jawa Barat Irjen Rudi Setiawan mengatakan, dengan kerja sama tersebut diharapkan dapat mempercepat pembangunan daerah dan meningkatkan kesejahteraan masyarakat. Ia juga menyatakan komitmen kepolisian untuk memberantas premanisme dan menjamin keamanan bagi investor.</p>\r\n<p>“Kami bersama TNI dan Satpol PP akan membangun pos-pos keamanan di kawasan industri, dan melakukan patroli gabungan. Ini sebagai bukti nyata bahwa Jawa Barat adalah wilayah yang aman bagi investasi,” kata Rudi, dikutip dari siaran pers Humas Jabar, Sabtu, 17 Mei 2025.</p>\r\n<p>Rudi mengatakan, Polda Jabar telah menggelar Operasi Penyakit Masyarakat (Pekat) dalam 10 hari terakhir dan telah menangkap 177 tersangka. “Tidak ada tempat untuk premanisme di Jawa Barat,” kata dia.</p>', 'img_682998402584a.png'),
(14, '2025-05-18', 'testing', 'setuju', '<p>Tess Perubahan</p>', 'img_6829a0eea0c3e.png'),
(15, '2025-05-18', 'tes 2', 'rejected', 'dfakfadf', 'img_6829ce230d2b9.png'),
(18, '2025-05-18', 'testing 10', 'setuju', '<p>ANJAY <strong>BERUBAH</strong></p>', 'img_6829e7195a8cc.png'),
(20, '2025-05-21', 'Grab Indonesia Rejects Drivers\' Request to Lower Commission Cuts', 'pending', '<p><strong>BlogKu.co </strong>Jakarta -&nbsp;Hundreds of online motorcycle taxis or online ojek drivers, including those from Grab, gathered in the Horse Statue area of Jakarta on Tuesday afternoon, May 20, 2025. They held a protest demanding that application providers reduce their commission cuts, which they deem excessively high. The protest began at 1:00 PM local time, with drivers voicing their demands from three command vehicles.</p><p>The drivers urged application companies to decrease the commission cut from 20 percent to 10 percent. According to a speaker addressing the crowd via megaphone, the current fee structure negatively impacts drivers\' incomes nationwide.</p><p>Einstein Dialektika, Secretary General of the Indonesian Online Drivers Union (Sepoi), affirmed that the demand for a reduced application fee cut is necessary, as the current system is detrimental to drivers. He also called on the government to enact legal protections to safeguard motorcycle taxi workers from various vulnerabilities. \"Many regulations make it difficult for motorcycle taxi drivers,\" Einstein stated at the protest site.</p><p>Echoing this sentiment, Lily Pujiati, Chairperson of the Indonesian Public Transport Workers Union (SPAI), claimed that several application providers have violated government regulations by deducting commissions exceeding 20 percent. She even alleged that some drivers have experienced cuts as high as 70 percent.</p><p>Meanwhile, Grab Indonesia rejected the demand to reduce the application fee from 20 percent to 10 percent. Grab asserted that the current fee structure aligns with operational calculations and is crucial for the continuity of its services.</p><p>Tirza Munusamy, Chief of Public Affairs at Grab Indonesia, explained that the 20 percent cut funds various services, from developing technological features in the application to providing 24-hour customer service. \"When the cut is reduced to 10 percent, it will lead to the loss of several features that were previously available in the Grab application,\" Tirza said during a discussion in Pakubuwono on Monday night, May 19, 2025.</p><p>Tirza acknowledged that many parties are demanding a fee reduction. However, she urged all parties to consider these demands based on realistic calculations. She also refuted allegations that application providers are causing hardship for drivers due to cuts exceeding 20 percent.</p><p>\"There are many technological features that support the application and its system, as well as feature development and operational costs. We also have a toll-free phone service through the application that doesn\'t require credit. All of this is covered by that fee cut,\" she elaborated.</p><p>Tirza also revealed that Grab Indonesia insures both passengers and drivers during journeys, covering safety and security while driving. According to her, the application system is also equipped with trip-monitoring features. <i>\"For example, if the vehicle suddenly stops, a notification will automatically appear to confirm whether it has arrived or not,\"</i> she added.</p><p>According to Tirza, fulfilling the demand to reduce the cut to 10 percent is difficult because it could disrupt Grab\'s operational performance. \"If there is a change in the commission percentage, Grab can no longer be the application that you all recognize as it is now,\" Tirza concluded.</p><p>Editor’s Choice:&nbsp;East Java Online Taxi Drivers Protest with Five Demands \'Not to Be Negotiated\'</p><p>Click here&nbsp;to get the latest news updates from <strong>BlogKu</strong></p>', 'img_682deb10923f4.png'),
(22, '2025-05-21', 'testing 2', 'rejected', '<p>fdafkafalfjaldf</p>', 'img_682df17dd6a55.jpg'),
(23, '2025-05-21', 'testing admin', 'pending', '<p>admin <strong>gamtenkk</strong></p>', 'img_682e06aacf937.jpg'),
(24, '2025-05-21', 'helllnahhh', 'setuju', '<p>dfafafadf<i>dfafaf<strong>fadfadfaf</strong></i></p>', 'img_682e11443c21b.jpg'),
(25, '2025-05-22', 'Contoh Progres', 'pending', '<h2>Hello World</h2>', 'img_682ef930b5319.jpeg'),
(26, '2025-06-12', 'testing19', 'setuju', '<p>fafjadfkadlfkj<strong>fadsfadf</strong></p>', 'img_684a2d6133945.png');

-- --------------------------------------------------------

--
-- Table structure for table `article_author`
--

CREATE TABLE `article_author` (
  `article_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `article_author`
--

INSERT INTO `article_author` (`article_id`, `author_id`) VALUES
(1, 1),
(2, 3),
(7, 12),
(8, 12),
(9, 5),
(14, 5),
(15, 8),
(18, 12),
(20, 12),
(22, 12),
(23, 9),
(24, 12),
(25, 12),
(26, 12);

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `article_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`article_id`, `category_id`) VALUES
(1, 4),
(2, 5),
(7, 7),
(8, 8),
(9, 5),
(14, 4),
(15, 7),
(18, 9),
(20, 9),
(22, 7),
(23, 5),
(24, 8),
(25, 7),
(26, 7);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `level` varchar(150) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `nickname`, `email`, `level`, `password`) VALUES
(1, 'Budi', 'budi@example.com', 'user', '123'),
(2, 'Didik', 'didik@example.com', 'user', 'password123'),
(3, 'Iwan', 'iwan@example.com', 'user', 'password123'),
(5, 'tian', 'tian@gmail.com', 'user', '123'),
(8, 'Deny', 'rey@gmail.com', 'admin', '123'),
(9, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(11, 'gondol', 'jfdlafj@gmail.com', 'user', '123'),
(12, 'user', 'user@gmail.com', 'user', 'user'),
(13, 'admin anjayy', 'denji@gmail.com', 'user', 'admin'),
(14, 'tes', 'tes@gmail.com', 'user', '123'),
(17, 'tes', 'fjalflkadfjfjd@gmail.com', 'user', '123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(4, 'alam', 'Kategori yang mencakup tempat wisata alam seperti gunung, pantai, air terjun, dan hutan wisata.'),
(5, 'pendidikan', 'Kategori yang berisi tempat wisata edukasi seperti museum, pusat sains, kebun binatang, dan planetarium.'),
(6, 'Taman Wisata', 'Kategori yang mencakup tempat wisata taman rekreasi seperti taman kota, taman hiburan, dan taman bermain.'),
(7, 'Teknologi', 'Kategori yang mencakup berita tentang inovasi dan kemajuan teknologi'),
(8, 'Politik', 'Kategori yang mencakup berita pemerintahan dan golongan'),
(9, 'Ekonomi', 'tes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_author`
--
ALTER TABLE `article_author`
  ADD PRIMARY KEY (`article_id`,`author_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`article_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_author`
--
ALTER TABLE `article_author`
  ADD CONSTRAINT `article_author_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_author_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `article_category_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
