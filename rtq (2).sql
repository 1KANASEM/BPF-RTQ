-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 02:17 PM
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
-- Database: `rtq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`, `nama`) VALUES
(1, '1KANASEM', '11111111', 1, 'zahran'),
(3, 'ayedienal', '1', 2, 'ayub');

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `bagian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `bagian`) VALUES
(1, 'yayasan'),
(2, 'akademik'),
(3, 'pembinaan'),
(7, 'keamanan');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tgl_berita` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `gambar`, `tgl_berita`) VALUES
(6, '19 Oktober 2023, Pasangan Anis-Muhaimin Daftar ke KPU', 'Bakal Pasangan Calon Presiden – Wakil Presiden usungan Koalisi Perubahan untuk Persatuan (KPP) Anies Baswedan dan Abdul Muhaimin Iskandar (Amin) dipastikan mendaftar ke KPU pada 19 Oktober 2023 mendatang.\r\n\r\nHal ini dibeberkan Ketua Umum PKB sekaligus Bacawapres KPP, Muhaimin Iskandar usai membuka Rapat Koordinasi Wilayah (Rakorwil) PKB Kalimantan Timur (Kaltim) di Balikpapan, Sabtu (30/9/2023) siang.\r\n\r\n“Direncanakan pagi, moga-moga bisa lancar. Mohon doa restunya seluruh masyarakat Indonesia,” ujar Muhaimin.\r\n\r\nIa melanjutkan, Amin saat ini tengah mempersiapkan segala dokumen dan kebutuhan pendaftaran yang dipersyaratkan oleh KPU. Seluruhnya ditargetkan rampung dalam waktu dekat. Tak terkecuali mempersiapkan tim pemenangan pasangan calon (Paslon).\r\n\r\n“Itu juga masih dalam penggodokan kita,” sambung politisi yang akrab disapa Gus Imin.\r\n\r\nMengenai sederet nama tokoh yang kabarnya digadang sebagai bakal ketua tim pemenangan Amin, Muhaimin Iskandar memastikan, bahwa sampai saat ini seluruhnya sama-sama berpeluang.\r\n\r\n“Kita lagi menggodok, siapa yang layak untuk posisi itu. Nanti kita lihat semua,” tukasnya.\r\n\r\nSebelumnya, beberapa tokoh mulai dari Mahfud MD, Khofifah Indarparawansa hingga Habib Rizik Shihab disorong sebagai calon ketua tim pemenangan. Sejumlah analisis menyebutkan, nama-nama tersebut dianggap mampu mendongkrak angka elektoral pasangan Amin, terutama dari kelompok pemilih kalangan muslim.\r\n\r\nMeski demikian, Ia menekankan, bahwa tim pemenangan yang akan dibentuk termasuk relawan dan barisan pendukung, harus benar-benar bergerak merebut hati rakyat. Kemudian, memiliki semangat dalam menghimpun simpatik demi kemenangan Amin.\r\n\r\n“Utamanya punya semangat perbaikan dan perubahan,” singkatnya.\r\n\r\nDalam orasi politik di hadapan ratusan kader dan simpatisannya, Muhaimin menyinggung visi dan misi Amin. Pertama, mengenai perubahan nasib bangsa menjadi lebih baik.\r\n\r\nKedua, kemandirian pangan dan terakhir kemandirian pengelolaan anggaran oleh masing-masing daerah demi mendorong percepatan pemerataan pembangunan.\r\n\r\n“Anggaran harus lebih banyak dilaksanakan dan digunakan di daerah. Karena sekarang hampir sepertiganya dikelola daerah. Ini juga sebagai stimulus percepatan pembangunan,” tegas Muhaimin.  ', 'imin.jpg', '2023-12-15'),
(7, 'اقتصادي / مؤتمر سوق العمل يطلق نموذج ', 'الرياض 01 جمادى الآخرة 1445 هـ الموافق 14 ديسمبر 2023 م واس\r\n واصل المؤتمر الدولي لسوق العمل، الذي تنظمه وزارة الموارد البشرية والتنمية الاجتماعية، بالشراكة مع منظمة العمل الدولية والبنك الدولي، فعاليات اليوم الثاني بمركز الملك عبد العزيز للمؤتمرات في الرياض، حيث يناقش المؤتمر قضايا سوق العمل العالمي، ويسعى إلى إيجاد حلول مبتكرة لمواجهة التحديات التي تفرضها التغيرات التقنية والديموغرافية التي يواجهها السوق حاليا ومستقبليا، وذلك تجسيدا لدور المملكة القيادي على المستوى الدولي.\r\n واستعرض معالي نائب وزير الموارد البشرية والتنمية الاجتماعية للعمل الدكتور عبدالله بن ناصر أبوثنين، خلال الكلمة الافتتاحية لفعاليات اليوم الثاني، جهود المملكة في تنمية المهارات والتعامل مع أنماط العمل الجديدة، مؤكدا أن المملكة تولي أولوية كبيرة لتنمية المهارات، كونها أحد الركائز الأساسية التي تعتمد عليها في تنويع الاقتصاد، سعيا لبناء اقتصاد أكثر إنتاجية وقائم على المعرفة.\r\n وأشار إلى أن وزارة الموارد البشرية والتنمية الاجتماعية أطلقت عدة مبادرات استراتيجية مثل برنامج تنمية رأس المال البشري واستراتيجية سوق العمل لتعزيز تنمية المهارات، التي اعتمدت فيها على الشراكة بين القطاعين العام والخاص، مما أسفر عن إطلاق 12 مجلسا قطاعيا للمهارات يضم 150 عضوا.\r\n وأوضح أن من بين أبرز تلك المبادرات، برنامج الحملة الوطنية للتدريب \"وعد\"، الذي أطلق بهدف تحفيز القطاع الخاص على التدريب، حيث وصلت وعود الالتزام بالتدريب إلى 1,155,000 مليون فرصة تدريبية حتى نهاية عام 2025، معلنا أنه خلال العام الأول لإطلاق الحملة، تحقق 50% من المستهدف حتى الآن، حيث تغطي الحملة الموظفين الحاليين والطلاب والباحثين عن عمل على حد سواء.\r\n ولفت معاليه النظر إلى أن جهود وزارة الموارد البشرية والتنمية الاجتماعية، أسفرت مجتمعة حتى الآن عن نتائج مهمة وإيجابية في سوق العمل السعودي، حيث نما إجمالي القوى العاملة من الوافدين بنسبة 11% في الفترة من 2011 - 2022، كما زاد حجم القوى العاملة السعودية بنسبة 18% في الفترة ذاتها، وتضاعف حجم مشاركة المرأة السعودية في سوق العمل من 17% إلى 36%.\r\n من جانبه، قال معالي المدير العام لمنظمة العمل الدولية جلبرت هونجبو، في كلمة له، إن الرقمنة والذكاء الاصطناعي يساهمان في زيادة خطر البطالة بالنسبة لبعض العمال، إلا أن هؤلاء العمال لديهم فرصة للانخراط في أسواق العمل ذات الأنماط غير التقليدية، داعيا إلى عدم النظر إلى الذكاء الاصطناعي باعتباره تهديدا، بل باعتباره حافزا للتغيير الإيجابي\r\n وأضاف أن محو الأمية الرقمية أمر بالغ الأهمية بالنسبة للأجيال الجديدة، بنفس أهمية القراءة والكتابة للأجيال السابقة، لافتا إلى أن 3 من بين كل 4 شباب على مستوى العالم يعملون في الاقتصاد غير الرسمي، وأن غالبيتهم يعملون اليوم في وظائف مؤقتة أو بلا عقود، داعيا دول العالم إلى التكاتف وتوحيد الجهود لضمان ازدهار أسواق العمل المستقبلية، وتنشئة أجيال منتجة من العمال، كونهم القوة الدافعة للمستقبل.\r\n وشهدت فعاليات اليوم الثاني إطلاق المؤتمر الدولي لسوق العمل نموذج محادثة مدعوم بالذكاء الاصطناعي باسم (ريان) متخصص في أسواق العمل، حيث يعمل بواسطة نموذج لغوي يحتوي على عشرة مليارات (باراميتر) وتم تدريبه على تريليون نقطة بيانات من جميع أنحاء العالم.\r\n وصمم نموذج (ريان) خصيصا لتوفير أحدث المعلومات عن أسواق العمل العالمية، وتحقيق أعلى استفادة ممكنة من المعلومات الضخمة المتاحة على الإنترنت وفي مختلف الكتب والمؤلفات المتعلقة بأسواق العمل، والمساهمة في حل المشكلات المستجدة وخلق تجاوب سريع لما تواجهه الأسواق.\r\n وقامت الرئيسة التنفيذية للمؤتمر والرئيسة التنفيذية للتسويق بشركة \"تكامل القابضة\" عهود بنت عبد العزيز الشامخ، بإطلاق النموذج وتجربته أمام المشاركين، حيث وجهت سؤال إلى (ريان) قائلة: \"في ظل انخفاض عدد السكان في جميع أنحاء العالم، كيف يمكن استخدام الذكاء الاصطناعي في سوق العمل للمساعدة على التكيف مع هذا الواقع الجديد؟\"، حيث قدم لها (ريان) إجابة تفصيلية، تشرح كيف يمكن العمل على حل هذا الوضع ومواجهته.\r\n // انتهى //\r\n15:48 ت مـ \r\n0106   ', 'utan.jpg', '2023-12-15'),
(9, 'Perjalanan Evos Legends Jadi Juara Dunia Mobile Legends M1  ', 'KOMPAS.com - Kejuaraan dunia Mobile Legends M1 Bang Bang World Championship 2019 yang diselenggarakan di Axiata Arena, Kuala Lumpur, Malaysia, berhasil dimenangi oleh tim asal Indonesia, Evos Legends. Keberhasilan tersebut dicapai seusai Evos Legends mengalahkan sesama tim esports Indonesia lainnya, yakni Req Requm Qeon (RRQ), dengan skor tipis 4-3 pada partai grand final best of seven.\r\n\r\nHal ini membuktikan bahwa Indonesia menguasai turnamen Mobile Legends Bang Bang. Perjalanan tim esports Evos Legends untuk meraih juara dunia di Mobile Legends M1 Bang Bang World Championship ini dimulai ketika mereka berhasil menguasai puncak klasemen fase grup. Setelah lolos dari fase grup, tim esports Evo Legends menghadapi tim asal Myanmar, Burmese Ghouls, dengan meraih kemenangan dengan skor 2-0. Pada pertandingan selanjutnya tim esports, Evos Legends bertemu dengan sesama perwakilan Indonesia lainnya dalam babak semifinal, Req Requm Qeon (RRQ). Evos Legends meraih kemenangan skor 3-0 pada Sabtu (16/11/2019)\r\n\r\nPada partai grand final yang dihelat di Axiata Arena itu, Evos Legends bertemu kembali dengan Req Requm Qeon (RRQ). RRQ ke partai puncak karena berhasil mengalahkan tim esports asal Malaysia, Todak, di final lower bracket dengan skor 3-1. Evos Legends dan Req Requm Qeon (RRQ) merupakan dua perwakilan Indonesia yang berhasil melaju sampai grand final M1 World Championship. Hal ini pun membuktikan kekuatan Merah Putih dalam sebuah turnamen Mobile Legends Bang Bang.\r\n ', 'epos1.jpg', '2023-12-15'),
(10, 'Kata dan Fakta: Simak Sejumlah Pernyataan Prabowo di Debat Pertama dan Cek Faktanya di lapangan  ', 'KOMPAS.com - Calon presiden (capres) nomor urut 2, Prabowo Subianto memaparkan sejumlah gagasannya dalam debat pertama Pemilihan Presiden (Pilpres) 2024 di kantor Komisi Pemilihan Umum (KPU), Jakarta, Selasa (12/12/2023). Adapun debat pertama Pilpres 2024 membahas mengenai pemerintahan, hukum, hak asasi manusia (HAM), pemberantasan korupsi, penguatan demokrasi, peningkatan layanan publik, serta kerukunan warga. Tim Cek Fakta Kompas.com menelusuri beberapa pernyataan Prabowo dalam debat tersebut. Berikut hasil rangkuman cek fakta pernyataan Prabowo dalam debat pertama Pilpres 2024: Harga-harga terkendali Prabowo Subianto menyebut harga kebutuhan di Indonesia masih terkendali. Hal ini menyebabkan Indonesia relatif aman dan damai. \"Perang di mana-mana. Di mana negara-negara begitu banyak yang terjadi perang saudara, Indonesia masih aman, Indonesia masih damai. Indonesia masih terkendali, harga-harga masih terkendali,\" kata Prabowo. Faktanya: Harga kebutuhan pokok di Indonesia trennya terus mengalami kenaikan. Sampai November 2023, komoditas pangan tetap menjadi penyumbang inflasi terbesar secara bulanan maupun tahunan. Direktur Eksekutif Institute for Development of Economics and Finance (Indef) Tauhid Ahmad, memperkirakan kenaikan harga pangan akan terus berlanjut sampai tahun depan, setidaknya sampai Februari 2024. Sementara itu, Sistem Pemantauan Pasar dan Kebutuhan Pokok (SP2KP) Kementerian Perdagangan (Kemendag) mencatat, harga sejumlah bahan pangan sudah melonjak lebih 10 persen sejak awal tahun 2023. Selengkapnya baca di sini. Indonesia negara yang aman dan damai Prabowo menyatakan, Indonesia merupakan negara yang aman dan damai. \"Kita paham, kita mengerti, masih banyak kekurangan, tetapi kita harus bersyukur di tengah dunia yang penuh tantangan dan ketidakpastian, di mana terjadi perang di mana-mana. Di mana negara-negara begitu banyak yang terjadi perang saudara dan kerusuhan. Indonesia masih aman, Indonesia masih damai, Indonesia masih terkendali,\" kata Prabowo. Faktanya: Indonesia kini tidak masuk ke dalam lima besar negara yang paling damai di Asia Tenggara. Saat ini, Indonesia menempati peringkat enam atau peringkat 53 dunia dengan skor 1,829. Kerusuhan di Papua Barat menjadi salah satu penyebab merosotnya peringkat Indonesia.  Padahal, pada tahun 2018, Indonesia pernah menduduki peringkat empat Asia Tenggara.  Selengkapnya baca di sini Petani di Jateng kesulitan dapat pupuk Prabowo mengatakan, petani di Jawa Tengah kesulitan mendapat pupuk. “Menurut pandangan saya juga kelompok rentan itu juga termasuk para petani dan nelayan. Dan yang saya dapat, setelah saya keliling khususnya di Jawa Tengah, Pak Ganjar, petani-petani di situ sulit mendapatkan pupuk,\" kata Prabowo. Faktanya: Sejumlah petani di Jawa Tengah mengeluhkan sulitnya mendapatkan pupuk bersubsidi.  Asmawi, Ketua Kelompok Tani (Gapoktan) Akur Tani Jaya Kota Tegal mengatakan, anggotanya sulit mendapatkan pupuk bersubsidi karena tidak mempunyai kartu tani. Mereka pun terpaksa membeli pupuk bersubsidi dengan cara menumpang di kartu tani milik petani lain.\r\n\r\n    ', 'joget.jpg', '2023-12-15'),
(16, 'Humanitarian crisis worsens in Gaza as Israel-Hamas war intensifies palestine', 'US national security adviser Jake Sullivan said Friday that there will be a transition to another phase of the war that is focused on “more precise ways” of targeting Hamas leadership. Sullivan also said at a news conference in Tel Aviv that the US wants to see results on Israel’s intent to avoid civilian casualties in Gaza. He made his comments prior to a planned trip to the West Bank on Friday as part of his push to demonstrate continued US support for Israel in its fight. Sullivan added that the Palestinian Authority needs to be “revamped and revitalized,\" signaling the US vision for post-war Gaza. Elsewhere, Israeli forces have recovered the bodies of two soldiers who were abducted to Gaza during Hamas\' attack on October 7, the military said in a statement Friday. The total number of IDF soldiers killed in the Gaza ground offensive now sits at 118. Here are the other key developments: 132 hostages: Israel believes 132 hostages are in Gaza – 112 of whom are thought to be alive and 20 are thought to be dead, Prime Minister Benjamin Netanyahu’s office told CNN Friday. Israel considers those declared dead to still be hostages, the prime minister’s office said. Body recovered: Israeli special forces have recovered the body of a hostage in Gaza, the military said Friday. Elia Toledano had been taken hostage by Hamas during its October 7 attacks on Israel, the Israel Defense Forces (IDF) said in a statement. He was 28. West Bank visit: President Joe Biden’s national security adviser, Jake Sullivan, will travel to the occupied West Bank on Friday in his push to demonstrate continued US support for Israel in its fight against Hamas, while also urging the Israeli government to take meaningful steps to reduce civilian casualties in Gaza. Field hospital in crisis: A field hospital in Rafah, southern Gaza, is seeing the consequences of the local health systems falling apart and the poor, crowded conditions that are leading to infectious diseases and other problems sweeping through communities. It was constructed rapidly in a soccer stadium, but its staff and state-of the-art equipment make its 150 beds highly sought after. EU calls for restraint in Gaza: European Union leaders will ask Israel to show \"maximum restraint\" in Gaza in a bid to pare back its assault on the enclave, according to Belgian Prime Minister Alexander de Croo. Earlier this week Belgium alongside Ireland, Spain and Malta sent a letter to the European Council chief Charles Michel calling for a discussion on the necessity of a ceasefire in Gaza.', 'gaza.jpg', '2023-12-17'),
(17, 'Liga Inggris: MU Terlempar dari 20 Besar Ranking Klub Terbaik Dunia, Kalah Jauh dari Duo Red Bull we', 'Bola.com, Jakarta Sebuah rilis yang dikeluarkan FiveThirtyEight, sebuah laman penyedia statistik, menempatkan Manchester United (MU) di luar 20 besar dalam daftar klub sepak bola terbaik dunia. MU bahkan tertinggal jauh dari \'duo red bull\', RB Leipzig dan RB Salzburg yang masing-masing ada di posisi 11 dan 14. Sementara posisi pertama ditempati oleh Man City.Bayern Munchen naik satu peringkat ke posisi kedua, menggeser Liverpool yang turun ke peringkat tiga. PSG dan Real Madrid menggenapi lima besar ranking tersebut. Inter Milan jadi satu-satunya tim Liga Italia yang nangkring di posisi 10 besar, tepatnya posisi sembilan. Sementara MU ada di tangga ke-22 berdasarkan Soccer Power Index. ', 'onana.jpg', '2023-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(255) NOT NULL,
  `id_gallery` int(255) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `id_gallery`, `keterangan`, `foto`) VALUES
(3, 5, 'ronaldo', 'dodo.jpg'),
(5, 5, 'imin', 'imin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_fasilitas`
--

CREATE TABLE `gallery_fasilitas` (
  `id_gallery` int(255) NOT NULL,
  `nama` text NOT NULL,
  `sampul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_fasilitas`
--

INSERT INTO `gallery_fasilitas` (`id_gallery`, `nama`, `sampul`) VALUES
(4, 'awokawok', 'dodo.jpg'),
(5, 'dsadasd', 'bawah.jpg'),
(6, 'ayub busuk', 'dodo1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_kegiatan`
--

CREATE TABLE `gallery_kegiatan` (
  `id_gallery` int(255) NOT NULL,
  `nama` text NOT NULL,
  `sampul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_kegiatan`
--

INSERT INTO `gallery_kegiatan` (`id_gallery`, `nama`, `sampul`) VALUES
(7, 'zahran agyul', 'lantai.jpg'),
(8, 'ayu', 'RTQ.png'),
(9, 'mancing mania', 'candi1.jpg'),
(10, 'ngamen', 'candi2.jpg'),
(11, 'kemah hutang set', 'gallery_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_bagian` int(12) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `id_bagian`, `pendidikan`, `gender`, `foto`) VALUES
(2, 'apip sy', 'pekanbaru', '2003-11-18', 3, 'D4', 'pria', 'onana.jpg'),
(3, 'zahran', 'pekanbaru', '2023-12-16', 2, 'SMA', 'wanita', 'candi.jpg'),
(4, 'zahran agyul abdul', 'pekanbaru', '2023-12-20', 3, 'SMP', 'pria', 'joget.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(255) NOT NULL,
  `id_gallery` int(255) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_gallery`, `keterangan`, `foto`) VALUES
(20, 8, 'ikan puyuh', 'lantai3.jpg'),
(21, 8, 'ikanasdxem', 'dodo.jpg'),
(22, 9, 'ayam', 'ganjar.jpg'),
(23, 9, 'bowo', 'joget.jpg'),
(24, 9, 'ngantuk', 'imin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(1) NOT NULL,
  `nama_rtq` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pimpinan` varchar(255) NOT NULL,
  `foto_pimpinan` varchar(255) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `sejarah` text NOT NULL,
  `motto` varchar(255) NOT NULL,
  `program` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tujuan` text NOT NULL,
  `muasofat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama_rtq`, `alamat`, `pimpinan`, `foto_pimpinan`, `visi`, `misi`, `sejarah`, `motto`, `program`, `no_hp`, `tujuan`, `muasofat`) VALUES
(1, 'RTQ Al-Yusra ', 'Jl. Wijaya Gg.Wijaya III RT.02/ RW.02, Kel.Kedungsari Kec. Sukajadi Pekanbaru – Riau ', 'Jul Prima Mutia  ', 'onana.jpg', 'MENJADI LEMBAGA QUR\'AN YANG BERLANDASKAN TAUHID UNTUK MELAHIRKAN GENERASI QUR\'AN YANG BERKARAKTER TARBIYAH ISLAMIYAH.', '<ol>\r\n	<li>Menyelenggarakan metode menghafal yang menyenangkan.</li>\r\n	<li>Membiasakan tilawah 5 Juz perhari.</li>\r\n	<li>Menghafal Hadist arba&#39;in.</li>\r\n	<li>Mengamalkan Tholibul &#39;Ilmi.</li>\r\n	<li>Membekali Santri dengan konsep wanita muslimah.</li>\r\n</ol>\r\n', '<p><em>Liputan6.com, Jakarta Pondok tahfidz, sebagai lembaga pendidikan Islam di Indonesia, telah menjadi bagian integral dari budaya pendidikan dan agama di Indonesia. Dalam perjalanan sejarahnya, pondok tahfidz telah berkembang dari lembaga tradisional yang mengajarkan penghafalan Al-Quran menjadi lembaga yang semakin memadukan penghafalan Al-Quran dengan pendidikan agama Islam yang lebih luas dan pendidikan formal. Salah satu fitur yang paling menonjol dalam sistem pengajaran pondok tahfidz adalah fokus pada penghafalan Al-Quran. Namun demikian, kini Pondok tahfidz juga telah mengikuti perubahan zaman dengan mengintegrasikan kurikulum tambahan, seperti pendidikan formal, sehingga siswa dapat memiliki pengetahuan yang lebih luas dan keterampilan yang dapat mereka manfaatkan dalam kehidupan sehari-hari.&nbsp;</em></p>\r\n', 'APAPUN CITA-CITANYA SEMUA HAFAL AL QUR\'AN', '<ol>\r\n	<li>Jakarta (Kemenag) &mdash; Direktorat Pendidikan Diniyah dan Pondok Pesantren Dirjen Pendidikan Islam Kementerian Agama kembali menggulirkan program Kemandirian Pesantren. Untuk tahun 2023, program ini juga akan diarahkan pada pembantukan pesantren sebagai Community Economy Hub. Konsep ini dibahas bersama dalam</li>\r\n	<li>Rakor Program Kemandirian Pesantren tahun 2023 di Jakarta. Giat yang dibuka Direktur Jenderal Pendidikan Islam Muhammad Ali Ramdhani berlangsung tiga hari 2- 4 Februari 2023. Ali Ramdhani mengingatkan bahwa Kemandirian Pesantren menjadi salah satu program prioritas Menteri Agama Yaqut Cholil Qoumas. Digulirkan kali pertama pada medio 2020, program ini bertujuan mewujudkan pesantren yang mandiri secara ekonomi dalam menjalankan fungsi utamanya sebagai lembaga</li>\r\n	<li>pendidikan, dakwah, dan pemberdayaan masyarakat.&nbsp;</li>\r\n</ol>\r\n', '+6285218669128 ', '<ol>\r\n	<li>Terciptanya sistem pendidikan terpadu dan menjadi model bagi dunia pendidikan dalam upaya mencerdaskan kehidupan berbangsa dan bernegara.</li>\r\n	<li>Mempersiapkan generasi muda sebagai basis masyarakat yang mampu mengaktualisasikan Islam dalam berbagai aspek kehidupan.</li>\r\n	<li>Tercapainya tujuan khusus pendidikan yang terukur, yang diwujudkan dalam sepuluh (10) karakter siswa IBS.&nbsp;</li>\r\n</ol>\r\n', '<ol>\r\n	<li>\r\n	<p><em>Berakidah yang bersih (salimul aqidah).</em></p>\r\n	</li>\r\n	<li>\r\n	<p><em>Ibadah yang benar (shohihul ibadah).</em></p>\r\n	</li>\r\n	<li>\r\n	<p><em>Pribadia yang matang (matinul khuluq).</em></p>\r\n	</li>\r\n	<li>\r\n	<p><em>Mandiri (qodirun alal kasbi).</em></p>\r\n	</li>\r\n	<li>\r\n	<p><em>Cerdas dan berpengetahuan (mutsaqqoful Fikri).</em></p>\r\n	</li>\r\n	<li>\r\n	<p><em>Sehat dan kuat (Qowiyyul Jismi).</em></p>\r\n	</li>\r\n	<li>\r\n	<p><em>Bersungguh-sungguh dan disiplin (mujahidun linafsihi).</em></p>\r\n	</li>\r\n	<li>\r\n	<p><em>Tertib dan cermat (munazhomun fi su&rsquo;unihi).</em></p>\r\n	</li>\r\n	<li>\r\n	<p><em>Efisien (harisun ala waqtihi)..</em></p>\r\n	</li>\r\n	<li>\r\n	<p><em>Bermanfa&rsquo;at (nafi&rsquo;un lighairihi).</em></p>\r\n	</li>\r\n</ol>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `gallery_fasilitas`
--
ALTER TABLE `gallery_fasilitas`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `gallery_kegiatan`
--
ALTER TABLE `gallery_kegiatan`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bagian` (`id_bagian`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery_fasilitas`
--
ALTER TABLE `gallery_fasilitas`
  MODIFY `id_gallery` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery_kegiatan`
--
ALTER TABLE `gallery_kegiatan`
  MODIFY `id_gallery` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
