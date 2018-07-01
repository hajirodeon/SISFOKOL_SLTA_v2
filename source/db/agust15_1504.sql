# MySQL-Front Dump 2.5
#
# Host: localhost   Database: sisfokol_slta_v2
# --------------------------------------------------------
# Server version 4.0.18-max-debug


#
# Table structure for table 'admin_ks'
#

CREATE TABLE admin_ks (
  kd varchar(50) NOT NULL default '',
  usernamex varchar(15) NOT NULL default '',
  passwordx varchar(50) NOT NULL default '',
  nip varchar(10) NOT NULL default '',
  nama varchar(30) NOT NULL default '',
  postdate datetime NOT NULL default '0000-00-00 00:00:00'
) TYPE=MyISAM;



#
# Dumping data for table 'admin_ks'
#

INSERT INTO admin_ks (kd, usernamex, passwordx, nip, nama, postdate) VALUES("4fcf418adddd67383212bc1d22c61e98", "12035464", "4ef1c8f1fc12085fed835269c349b4e7", "12035464", "Dr. Gatot Kaca", "2008-07-03 13:30:59");


#
# Table structure for table 'admin_tu'
#

CREATE TABLE admin_tu (
  kd varchar(50) NOT NULL default '',
  usernamex varchar(15) NOT NULL default '',
  passwordx varchar(50) NOT NULL default '',
  nip varchar(10) NOT NULL default '',
  nama varchar(30) NOT NULL default '',
  postdate datetime NOT NULL default '0000-00-00 00:00:00'
) TYPE=MyISAM;



#
# Dumping data for table 'admin_tu'
#

INSERT INTO admin_tu (kd, usernamex, passwordx, nip, nama, postdate) VALUES("4fcf418adddd67383212bc1d22c61e98", "120386458", "89c071cf259dd2e34f106b5da002b387", "120386458", "M. Sulaiman", "2008-07-01 06:53:24");


#
# Table structure for table 'adminx'
#

CREATE TABLE adminx (
  kd varchar(50) NOT NULL default '',
  usernamex varchar(15) NOT NULL default '',
  passwordx varchar(50) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'adminx'
#

INSERT INTO adminx (kd, usernamex, passwordx) VALUES("e4ea2f7dfb2e5c51e38998599e90afc2", "admin", "21232f297a57a5a743894a0e4a801fc3");


#
# Table structure for table 'inv_alat_peraga'
#

CREATE TABLE inv_alat_peraga (
  kd varchar(50) NOT NULL default '',
  alat_peraga varchar(255) NOT NULL default '',
  jumlah varchar(5) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'inv_alat_peraga'
#

INSERT INTO inv_alat_peraga (kd, alat_peraga, jumlah) VALUES("96f54e4e18a2fc7e667053fba987d68b", "Gelas Ukur", "15");
INSERT INTO inv_alat_peraga (kd, alat_peraga, jumlah) VALUES("0973ddebfca6c421a4e1ce28a4d29ea9", "Gunting", "10");
INSERT INTO inv_alat_peraga (kd, alat_peraga, jumlah) VALUES("761328c3fd8f3bec20fd885d28ca22d2", "Penggaris", "100");
INSERT INTO inv_alat_peraga (kd, alat_peraga, jumlah) VALUES("6559947fff885531b30026889126976b", "Bejana", "20");


#
# Table structure for table 'inv_lab'
#

CREATE TABLE inv_lab (
  kd varchar(50) NOT NULL default '',
  lab varchar(255) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'inv_lab'
#

INSERT INTO inv_lab (kd, lab) VALUES("c9d80946867450cc7b91a09061b4bb7b", "Komputer");
INSERT INTO inv_lab (kd, lab) VALUES("658bd3c4f4991b833046c2d34865c38b", "Kimia");
INSERT INTO inv_lab (kd, lab) VALUES("76fe41ffbdc7d350d79933d29b964237", "Bahasa");
INSERT INTO inv_lab (kd, lab) VALUES("00ed678a5f8c877227611637f45d7236", "Biologi");


#
# Table structure for table 'inv_peng_lab'
#

CREATE TABLE inv_peng_lab (
  kd varchar(50) NOT NULL default '',
  kd_lab varchar(50) NOT NULL default '',
  tgl date NOT NULL default '0000-00-00',
  kd_jam varchar(50) NOT NULL default '',
  kd_program varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  kd_ruang varchar(50) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'inv_peng_lab'
#

INSERT INTO inv_peng_lab (kd, kd_lab, tgl, kd_jam, kd_program, kd_kelas, kd_ruang) VALUES("6856dbf9d08b8b4c91a84e044c459cb9", "00ed678a5f8c877227611637f45d7236", "2009-03-03", "f341e7faba39e62971b3d538c92e82df", "1ca1210fab344eccd77b4f5f1e2cc569", "3be17d09596cd245484fed3a4f5576eb", "af2e94e92ff53b8592d7c1fdaf0c9edc");
INSERT INTO inv_peng_lab (kd, kd_lab, tgl, kd_jam, kd_program, kd_kelas, kd_ruang) VALUES("16ef06105c105528ed6b06fc1491bd6b", "76fe41ffbdc7d350d79933d29b964237", "2007-01-01", "b049b4d3490463a7c3db3cea5fc1fa10", "4fcf418adddd67383212bc1d22c61e98", "27de8f38a90dd1755acd801abefcbb42", "b9f286b3403b958369e0ec3423f1a733");
INSERT INTO inv_peng_lab (kd, kd_lab, tgl, kd_jam, kd_program, kd_kelas, kd_ruang) VALUES("f13bdca2c63c2b14c7554daa3ef1da97", "76fe41ffbdc7d350d79933d29b964237", "2007-01-05", "b049b4d3490463a7c3db3cea5fc1fa10", "4fcf418adddd67383212bc1d22c61e98", "27de8f38a90dd1755acd801abefcbb42", "b9f286b3403b958369e0ec3423f1a733");


#
# Table structure for table 'inv_peng_peraga'
#

CREATE TABLE inv_peng_peraga (
  kd varchar(50) NOT NULL default '',
  tgl_pinjam date NOT NULL default '0000-00-00',
  kd_guru varchar(50) NOT NULL default '',
  tgl_kembali date NOT NULL default '0000-00-00'
) TYPE=MyISAM;



#
# Dumping data for table 'inv_peng_peraga'
#

INSERT INTO inv_peng_peraga (kd, tgl_pinjam, kd_guru, tgl_kembali) VALUES("6df085460ec0cfecb00d1b6d9e34c8db", "2008-02-02", "8d804e81dcaa079c870be3138edf8006", "2008-03-03");
INSERT INTO inv_peng_peraga (kd, tgl_pinjam, kd_guru, tgl_kembali) VALUES("55f991127ed74eaf4271d11aade02580", "2008-03-06", "2df89d4a12f44a5cc897d6814760687d", "2008-04-06");
INSERT INTO inv_peng_peraga (kd, tgl_pinjam, kd_guru, tgl_kembali) VALUES("1386ea86e691ce3280d9027a82648f0c", "2007-01-01", "fd81e50177b43431264d5a9c8499b2a9", "2007-01-01");
INSERT INTO inv_peng_peraga (kd, tgl_pinjam, kd_guru, tgl_kembali) VALUES("4b5baa0d68f99e64dbc64f77f4ff0876", "2007-01-01", "8d804e81dcaa079c870be3138edf8006", "2007-01-01");
INSERT INTO inv_peng_peraga (kd, tgl_pinjam, kd_guru, tgl_kembali) VALUES("406e261d5a5c10beeae90203a2c32211", "0000-00-00", "", "0000-00-00");
INSERT INTO inv_peng_peraga (kd, tgl_pinjam, kd_guru, tgl_kembali) VALUES("8abfa66d2d102a95d37b35b6ef11c29c", "2007-01-01", "8d804e81dcaa079c870be3138edf8006", "2007-01-01");


#
# Table structure for table 'inv_peng_peraga_item'
#

CREATE TABLE inv_peng_peraga_item (
  kd varchar(50) NOT NULL default '',
  kd_peng_peraga varchar(50) NOT NULL default '',
  kd_alat varchar(50) NOT NULL default '',
  jumlah varchar(5) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'inv_peng_peraga_item'
#

INSERT INTO inv_peng_peraga_item (kd, kd_peng_peraga, kd_alat, jumlah) VALUES("5387e81c7229111f40248eafa2f7ef26", "55f991127ed74eaf4271d11aade02580", "96f54e4e18a2fc7e667053fba987d68b", "2");
INSERT INTO inv_peng_peraga_item (kd, kd_peng_peraga, kd_alat, jumlah) VALUES("77e05b93d53c382ba876d46f95bccaaa", "55f991127ed74eaf4271d11aade02580", "761328c3fd8f3bec20fd885d28ca22d2", "1");
INSERT INTO inv_peng_peraga_item (kd, kd_peng_peraga, kd_alat, jumlah) VALUES("98cd05e2232c392dd9c0d0aca97bec4d", "6df085460ec0cfecb00d1b6d9e34c8db", "96f54e4e18a2fc7e667053fba987d68b", "1");
INSERT INTO inv_peng_peraga_item (kd, kd_peng_peraga, kd_alat, jumlah) VALUES("679936e2a5be7f1171e2603801357849", "6df085460ec0cfecb00d1b6d9e34c8db", "761328c3fd8f3bec20fd885d28ca22d2", "2");
INSERT INTO inv_peng_peraga_item (kd, kd_peng_peraga, kd_alat, jumlah) VALUES("e2f36175c1de2d914130f48f5a1dbadd", "8abfa66d2d102a95d37b35b6ef11c29c", "96f54e4e18a2fc7e667053fba987d68b", "1");
INSERT INTO inv_peng_peraga_item (kd, kd_peng_peraga, kd_alat, jumlah) VALUES("e649746e050ed87fb5e20d9268df3507", "4b5baa0d68f99e64dbc64f77f4ff0876", "761328c3fd8f3bec20fd885d28ca22d2", "2");
INSERT INTO inv_peng_peraga_item (kd, kd_peng_peraga, kd_alat, jumlah) VALUES("31cd38e4b5245797e9b5d3c2d62e1611", "1386ea86e691ce3280d9027a82648f0c", "96f54e4e18a2fc7e667053fba987d68b", "2");
INSERT INTO inv_peng_peraga_item (kd, kd_peng_peraga, kd_alat, jumlah) VALUES("e90a9ce09ab15e81915a2f4c2a214902", "8abfa66d2d102a95d37b35b6ef11c29c", "0973ddebfca6c421a4e1ce28a4d29ea9", "1");


#
# Table structure for table 'inv_pengadaan'
#

CREATE TABLE inv_pengadaan (
  kd varchar(50) NOT NULL default '',
  tgl_terima date NOT NULL default '0000-00-00',
  tgl_beli date NOT NULL default '0000-00-00',
  dari varchar(255) NOT NULL default '',
  tgl_pakai date NOT NULL default '0000-00-00',
  untuk varchar(255) NOT NULL default '',
  ket varchar(255) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'inv_pengadaan'
#

INSERT INTO inv_pengadaan (kd, tgl_terima, tgl_beli, dari, tgl_pakai, untuk, ket) VALUES("2e7dfd563a65e6e68f79f279fa53d1e4", "2002-03-02", "2003-03-03", "111", "2004-04-04", "111", "111");
INSERT INTO inv_pengadaan (kd, tgl_terima, tgl_beli, dari, tgl_pakai, untuk, ket) VALUES("a95bc6d1cb21807eb64599b001e90f0c", "2000-01-01", "2000-01-01", "x", "2000-01-01", "x", "x");


#
# Table structure for table 'inv_pengadaan_item'
#

CREATE TABLE inv_pengadaan_item (
  kd varchar(50) NOT NULL default '',
  kd_pengadaan varchar(50) NOT NULL default '',
  nm_barang varchar(255) NOT NULL default '',
  jumlah varchar(255) NOT NULL default '',
  harga varchar(10) NOT NULL default '',
  total varchar(20) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'inv_pengadaan_item'
#

INSERT INTO inv_pengadaan_item (kd, kd_pengadaan, nm_barang, jumlah, harga, total) VALUES("494ed6ed1c70db2bd9c8222bd8c31e79", "2e7dfd563a65e6e68f79f279fa53d1e4", "u", "2", "21000", "42000");
INSERT INTO inv_pengadaan_item (kd, kd_pengadaan, nm_barang, jumlah, harga, total) VALUES("0104a723d72546738fffc8afcc863e5e", "a95bc6d1cb21807eb64599b001e90f0c", "ttt", "5", "66666", "333330");
INSERT INTO inv_pengadaan_item (kd, kd_pengadaan, nm_barang, jumlah, harga, total) VALUES("e61937feb8072a77ce2806c1015dfe9f", "a95bc6d1cb21807eb64599b001e90f0c", "ww", "17", "21888", "372096");


#
# Table structure for table 'jadwal'
#

CREATE TABLE jadwal (
  kd varchar(50) NOT NULL default '',
  kd_tapel varchar(50) NOT NULL default '',
  kd_smt varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  kd_program varchar(50) NOT NULL default '',
  kd_ruang varchar(50) NOT NULL default '',
  kd_hari varchar(50) NOT NULL default '',
  kd_jam varchar(50) NOT NULL default '',
  kd_guru_mapel varchar(50) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'jadwal'
#

INSERT INTO jadwal (kd, kd_tapel, kd_smt, kd_kelas, kd_program, kd_ruang, kd_hari, kd_jam, kd_guru_mapel) VALUES("36dba06c77aaf002485b418a1c68bbaa", "2a771e8ba89dd288743d4839d61185bc", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "b9f286b3403b958369e0ec3423f1a733", "3bd672f690029e9b72e83b8ad1b2f8ae", "b049b4d3490463a7c3db3cea5fc1fa10", "8d7887e708e9022e535545ef7e8cdbda");
INSERT INTO jadwal (kd, kd_tapel, kd_smt, kd_kelas, kd_program, kd_ruang, kd_hari, kd_jam, kd_guru_mapel) VALUES("48b69b81e01c53f988e0e301da5c9c60", "2a771e8ba89dd288743d4839d61185bc", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "b9f286b3403b958369e0ec3423f1a733", "3bd672f690029e9b72e83b8ad1b2f8ae", "3be17d09596cd245484fed3a4f5576eb", "01c4a367629fce625230d83ea8d0a4ec");
INSERT INTO jadwal (kd, kd_tapel, kd_smt, kd_kelas, kd_program, kd_ruang, kd_hari, kd_jam, kd_guru_mapel) VALUES("9461cdb921e17b8874ce16f05e8db2a1", "2a771e8ba89dd288743d4839d61185bc", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "b9f286b3403b958369e0ec3423f1a733", "3bd672f690029e9b72e83b8ad1b2f8ae", "f341e7faba39e62971b3d538c92e82df", "01c4a367629fce625230d83ea8d0a4ec");
INSERT INTO jadwal (kd, kd_tapel, kd_smt, kd_kelas, kd_program, kd_ruang, kd_hari, kd_jam, kd_guru_mapel) VALUES("100ccd6954262e9d8b2858f9400866f3", "2a771e8ba89dd288743d4839d61185bc", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "b9f286b3403b958369e0ec3423f1a733", "d7c1803d15c88bd82eb4a702b57647f4", "1bb73a74f58b3ba76720a0f3ab332e59", "af51c232b6591c3734ba21e8a16ed3ed");
INSERT INTO jadwal (kd, kd_tapel, kd_smt, kd_kelas, kd_program, kd_ruang, kd_hari, kd_jam, kd_guru_mapel) VALUES("1b27f9b6e6abf459a6d62597c4dc2015", "2a771e8ba89dd288743d4839d61185bc", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "b9f286b3403b958369e0ec3423f1a733", "7d73752ca4d67f433696f6848afbb107", "21ddd50a146dfd554ddac33c19a21be5", "b68e8711ad0c22383bf1434de795602d");
INSERT INTO jadwal (kd, kd_tapel, kd_smt, kd_kelas, kd_program, kd_ruang, kd_hari, kd_jam, kd_guru_mapel) VALUES("cc4c77a70479e6823fcbead1384021f4", "2a771e8ba89dd288743d4839d61185bc", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "b9f286b3403b958369e0ec3423f1a733", "f88bd7a685a66f4f73219524c1f9e417", "f341e7faba39e62971b3d538c92e82df", "b68e8711ad0c22383bf1434de795602d");
INSERT INTO jadwal (kd, kd_tapel, kd_smt, kd_kelas, kd_program, kd_ruang, kd_hari, kd_jam, kd_guru_mapel) VALUES("4aee91edad47f67126505223bdce845f", "2a771e8ba89dd288743d4839d61185bc", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "b9f286b3403b958369e0ec3423f1a733", "b0f139e46f9efe22e22dba86f523d0fa", "3be17d09596cd245484fed3a4f5576eb", "8d7887e708e9022e535545ef7e8cdbda");


#
# Table structure for table 'm_absensi'
#

CREATE TABLE m_absensi (
  kd varchar(50) NOT NULL default '',
  absensi varchar(100) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_absensi'
#

INSERT INTO m_absensi (kd, absensi) VALUES("d1e7c66e6fb18e8e8478c286ac485b44", "Sakit");
INSERT INTO m_absensi (kd, absensi) VALUES("1bb73a74f58b3ba76720a0f3ab332e59", "Ijin");
INSERT INTO m_absensi (kd, absensi) VALUES("4fcf418adddd67383212bc1d22c61e98", "Tanpa Keterangan");


#
# Table structure for table 'm_aspek'
#

CREATE TABLE m_aspek (
  kd varchar(50) NOT NULL default '',
  aspek varchar(100) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_aspek'
#

INSERT INTO m_aspek (kd, aspek) VALUES("66d09c638cc3d0064f75273fcd980c37", "Penguasaan Konsep dan NilaixstrixNilai");
INSERT INTO m_aspek (kd, aspek) VALUES("d1c6bb83c5df33bc1ace0ef2ee26a6cb", "Mendengarkan");
INSERT INTO m_aspek (kd, aspek) VALUES("81d540c32ddfdc137137902fdd5743fa", "Berbicara");
INSERT INTO m_aspek (kd, aspek) VALUES("049909dcd1b125aa8f31e7828a81082b", "Membaca");
INSERT INTO m_aspek (kd, aspek) VALUES("bed7538e97a44c993e0d96ad58291ca0", "Menulis");
INSERT INTO m_aspek (kd, aspek) VALUES("b9f6210dd170ef59367e75bc517a6b6d", "Apresiasi Sastra");
INSERT INTO m_aspek (kd, aspek) VALUES("b049b4d3490463a7c3db3cea5fc1fa10", "Pemahaman Konsep");
INSERT INTO m_aspek (kd, aspek) VALUES("018a837ada187ec6946959d935771197", "Penalaran dan Komunikasi");
INSERT INTO m_aspek (kd, aspek) VALUES("d221fd2b58013904da10fad8d232571f", "Pemecahan Masalah");
INSERT INTO m_aspek (kd, aspek) VALUES("be65211a111e6f018e1c0d44e39a886b", "Kinerja Ilmiah");
INSERT INTO m_aspek (kd, aspek) VALUES("4e622121412e713cb86b17aefa04bb3c", "Penerapan");
INSERT INTO m_aspek (kd, aspek) VALUES("4ca9dc826b48c794175b27fad223ff9e", "Pengusaan Konsep");
INSERT INTO m_aspek (kd, aspek) VALUES("4e076263d64a22d6d210ae4787e7a104", "Etika Pemanfaatan");
INSERT INTO m_aspek (kd, aspek) VALUES("54e17b0ce8f7fa8c75399919594153c0", "Kreasi");
INSERT INTO m_aspek (kd, aspek) VALUES("93187a974b835b350a697b75988f0153", "Permainan dan Olah Raga");
INSERT INTO m_aspek (kd, aspek) VALUES("7660f396c3caa5447be21c31926826eb", "Aktivitas Pengembangan");
INSERT INTO m_aspek (kd, aspek) VALUES("df04869486572be09bc54db00aba6f7c", "Uji Diri xgmringx Senam");
INSERT INTO m_aspek (kd, aspek) VALUES("27e8fb300d2e15439dfa1dd33490f077", "Aktivitas Ritmik");
INSERT INTO m_aspek (kd, aspek) VALUES("bde10f1a1c67d455e5fccc6cd6ff454c", "Apresiasi");
INSERT INTO m_aspek (kd, aspek) VALUES("8c9f757755e694a60e60941b26a65842", "Pengolahan dan Pemanfaatan");
INSERT INTO m_aspek (kd, aspek) VALUES("d4b91e74ffad93c6d42ba32bd19964ab", "Penugasan Proyek");
INSERT INTO m_aspek (kd, aspek) VALUES("975810d067c0ef3c0eeb0e816618b1c7", "Pemahaman dan Penerapan");
INSERT INTO m_aspek (kd, aspek) VALUES("6ddd55960cc835d94d98bdc4330c006e", "Pilihan...");


#
# Table structure for table 'm_aspek_mapel'
#

CREATE TABLE m_aspek_mapel (
  kd varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  kd_program varchar(50) NOT NULL default '',
  kd_mapel varchar(50) NOT NULL default '',
  kd_aspek varchar(50) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_aspek_mapel'
#

INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("150192d356ef8ebccdd6c53b0ceaf76c", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "81d540c32ddfdc137137902fdd5743fa");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("4a43ac0d7cadd382d0afe14e5a1b9106", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "049909dcd1b125aa8f31e7828a81082b");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("54984dc9958243dbf3f9e4f1dea6ca3a", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "bed7538e97a44c993e0d96ad58291ca0");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("4f726eab34e55d462afe989e1ebadfed", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "d1c6bb83c5df33bc1ace0ef2ee26a6cb");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("f88bd7a685a66f4f73219524c1f9e417", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("b0f130e861d16f36e9c84337cbed10f6", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "049909dcd1b125aa8f31e7828a81082b");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("3ac7514c143167292c76088deb22ce8f", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "d1c6bb83c5df33bc1ace0ef2ee26a6cb");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("3d36491633613a7501e63ed0e70b88bb", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "bed7538e97a44c993e0d96ad58291ca0");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("86525d126f38bd1b4a42fe16e53559c1", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "50bae4d47d12fa0cf23403a12f34be0d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("1e79026a68bf7f540abed396139ce8ad", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "50bae4d47d12fa0cf23403a12f34be0d", "7660f396c3caa5447be21c31926826eb");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("40313ed714a805431c1b0cfdaa9a8f32", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "50bae4d47d12fa0cf23403a12f34be0d", "b9f6210dd170ef59367e75bc517a6b6d");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("bc034124ab5cab897a6166198ed03fb5", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "1c867c0c756b35bc24301b0403fa556a", "bed7538e97a44c993e0d96ad58291ca0");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("5214e0738398c0a6c02ac3b1256bedf2", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "1c867c0c756b35bc24301b0403fa556a", "27e8fb300d2e15439dfa1dd33490f077");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("5ac269da9cb000d44719b677ccd7593b", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "1c867c0c756b35bc24301b0403fa556a", "4e076263d64a22d6d210ae4787e7a104");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("0d418006f581366cf23a1f5f6129e155", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "d8022de243b4ce12b64f03a48158d39f", "d4b91e74ffad93c6d42ba32bd19964ab");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("26243de451631e606ca78fae2faf969a", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("c865fcedb86771fd70c3831422791e05", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("1d2534d299f104fd42c845750870da14", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "558dc5761abfa074e9b9f6ef52499a4d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("82ec6865931d9574dadc89714390d6c8", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "558dc5761abfa074e9b9f6ef52499a4d", "b9f6210dd170ef59367e75bc517a6b6d");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("0981a0c4e2cbbd4e54efcd497c6e1300", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("3ac98a2e2e4a475efbbb761f04afdc32", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "bde10f1a1c67d455e5fccc6cd6ff454c");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("b7a5f0f151c409aab775e7a4b24260bd", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "d1c6bb83c5df33bc1ace0ef2ee26a6cb");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("2b790f753e70db27a4a865c2a373a0ed", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "54e17b0ce8f7fa8c75399919594153c0");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("f5696d0603f98e5ad03ac18d39dcf3ac", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "66d09c638cc3d0064f75273fcd980c37");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("7dfea639fb93221c98fcdae7bd4effbc", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "be65211a111e6f018e1c0d44e39a886b");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("274f25065dd3dc41696d7555f273a5e2", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "d4b91e74ffad93c6d42ba32bd19964ab");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("9854c947c576d85a69cf3be7508f4aec", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "27e8fb300d2e15439dfa1dd33490f077");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("c31aafdc70f34276414e35e7a64a77f4", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "975810d067c0ef3c0eeb0e816618b1c7");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("7f354cbd1e83f361ef78658105a6fc45", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "4e076263d64a22d6d210ae4787e7a104");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("7c4cf73e37bf86bee814ca2175b0e95c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "b9f6210dd170ef59367e75bc517a6b6d");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("f341e7faba39e62971b3d538c92e82df", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "1c867c0c756b35bc24301b0403fa556a", "b9f6210dd170ef59367e75bc517a6b6d");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("1fe50b6c0a26716137bd3639947aeda5", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "1c867c0c756b35bc24301b0403fa556a", "049909dcd1b125aa8f31e7828a81082b");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("21aa09d4832f9ca643f042b42938c828", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "ec5a224ccc0e8c42b34814d6fa12ab2d", "bed7538e97a44c993e0d96ad58291ca0");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("d7c1803d15c88bd82eb4a702b57647f4", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "ec5a224ccc0e8c42b34814d6fa12ab2d", "018a837ada187ec6946959d935771197");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("fb789ddaa9d3d665e4582654149ea317", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "ec5a224ccc0e8c42b34814d6fa12ab2d", "8c9f757755e694a60e60941b26a65842");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("cbc1467cf103c02b636ff1ecddc8de09", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "xstrixTAMBAH ASPEKxstrix");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("675baa9299c97b8fd3e07f0ecfd93488", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "xstrixTAMBAH ASPEKxstrix");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("6b7af560efdadc1e3946ddd421d92fe0", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "c89e31c6134d92194320f6661e446dfb", "bde10f1a1c67d455e5fccc6cd6ff454c");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("f36fa02b1224b3a618ae69669539e6bd", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "c89e31c6134d92194320f6661e446dfb", "049909dcd1b125aa8f31e7828a81082b");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("b7e1029e9fc1e7e6bd3a347be67692c8", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "c89e31c6134d92194320f6661e446dfb", "d221fd2b58013904da10fad8d232571f");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("c3a1d9d0e3c881a71b396cfbd4e3a074", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "4598dd5b9ac644eaec4af76c548743be", "7660f396c3caa5447be21c31926826eb");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("edfbfe769f94b22761b58b2e8c0e22e6", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "4598dd5b9ac644eaec4af76c548743be", "d1c6bb83c5df33bc1ace0ef2ee26a6cb");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("37bbc5d5b07039b91e4e6b29b0f06313", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "4598dd5b9ac644eaec4af76c548743be", "975810d067c0ef3c0eeb0e816618b1c7");
INSERT INTO m_aspek_mapel (kd, kd_kelas, kd_program, kd_mapel, kd_aspek) VALUES("e65d1be07760ddf5287206618b45d314", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "4598dd5b9ac644eaec4af76c548743be", "018a837ada187ec6946959d935771197");


#
# Table structure for table 'm_guru'
#

CREATE TABLE m_guru (
  kd varchar(50) NOT NULL default '',
  kd_tapel varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  kd_program varchar(50) NOT NULL default '',
  kd_pegawai varchar(50) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_guru'
#

INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("c77f69ccdc6aad0910f23fd656c19261", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "fd81e50177b43431264d5a9c8499b2a9");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("7d73752ca4d67f433696f6848afbb107", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "8d804e81dcaa079c870be3138edf8006");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("0d4073aca49c4cbe0d441ba7b947a031", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("57aa3b059247cb6ded92fb69c723e8d6", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "3be17d09596cd245484fed3a4f5576eb");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("199922eadd17be1b1188ef5edaa021f9", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "2df89d4a12f44a5cc897d6814760687d");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("e0533a3c7e0d813195f095fc7217dc03", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "8581148fda4cba20aa220b5bea5585d5");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("bbe6493adb0d15342c6b496cabd9e21c", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "8d804e81dcaa079c870be3138edf8006");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("fb80bfef3775adb38538ecee6b93be0f", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "4fcf418adddd67383212bc1d22c61e98", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("f135cb913492af5b099a6e09cb57b3ab", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "4fcf418adddd67383212bc1d22c61e98", "edc5b859d5d26ed9c06a34ac72c2aed5");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("5437ac49120428e5b464ff492b030a2c", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "4fcf418adddd67383212bc1d22c61e98", "2df89d4a12f44a5cc897d6814760687d");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("8cbd5a2353c0813626de8960326748f7", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "4fcf418adddd67383212bc1d22c61e98", "fd81e50177b43431264d5a9c8499b2a9");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("0820c1faa803ad3a30fc3f74b5e1b6e8", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1ca1210fab344eccd77b4f5f1e2cc569", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("7c168ef905655ae7b5f3deb056a005c7", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1ca1210fab344eccd77b4f5f1e2cc569", "3be17d09596cd245484fed3a4f5576eb");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("4a8637c1ee34155315115fa4c8ffe609", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1ca1210fab344eccd77b4f5f1e2cc569", "8d804e81dcaa079c870be3138edf8006");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("9ed20655d47a1ccbb89893d029002ab3", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1c217606333ac983b8760baf64cd8b8a", "8d804e81dcaa079c870be3138edf8006");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("d7bd92b5dbdabcb8c45772b98f1509fd", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1c217606333ac983b8760baf64cd8b8a", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("4f9b10765aa44810f098333aa3f1fbce", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1c217606333ac983b8760baf64cd8b8a", "edc5b859d5d26ed9c06a34ac72c2aed5");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("0513aa22c98841121f05d3952febea98", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "4fcf418adddd67383212bc1d22c61e98", "8581148fda4cba20aa220b5bea5585d5");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("50691f531e155f82474ae005461127cd", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "4fcf418adddd67383212bc1d22c61e98", "2df89d4a12f44a5cc897d6814760687d");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("97aacd5fe0789b7c859d79c99af133d9", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "4fcf418adddd67383212bc1d22c61e98", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("478ff021b9e3263bd768ad74565e04b1", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1ca1210fab344eccd77b4f5f1e2cc569", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("bf56f18f247f049f1c21e7c614ebb15c", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1ca1210fab344eccd77b4f5f1e2cc569", "2df89d4a12f44a5cc897d6814760687d");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("d830f37d05607ac9747ec4254a81c490", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1ca1210fab344eccd77b4f5f1e2cc569", "8581148fda4cba20aa220b5bea5585d5");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("452446d904e8370fc0d6d911686a0ce0", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1ca1210fab344eccd77b4f5f1e2cc569", "8d804e81dcaa079c870be3138edf8006");
INSERT INTO m_guru (kd, kd_tapel, kd_kelas, kd_program, kd_pegawai) VALUES("463525d6ec375887e546d4ee250f4c2b", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "3be17d09596cd245484fed3a4f5576eb");


#
# Table structure for table 'm_guru_mapel'
#

CREATE TABLE m_guru_mapel (
  kd varchar(50) NOT NULL default '',
  kd_guru varchar(50) NOT NULL default '',
  kd_ruang varchar(50) NOT NULL default '',
  kd_mapel varchar(50) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_guru_mapel'
#

INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("298e289af25f55d318abdfc191198530", "3d0ecba6af6b76496a9bad0fff80af43", "b9f286b3403b958369e0ec3423f1a733", "39dbbf4078f620cd28d241706729e457");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("f0fdd8df809f4a55f84f2d2d6363e7a1", "5c5b76553d21e1aa2bcbbd55aec09b41", "b9f286b3403b958369e0ec3423f1a733", "39dbbf4078f620cd28d241706729e457");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("21ddd50a146dfd554ddac33c19a21be5", "3d0ecba6af6b76496a9bad0fff80af43", "b9f286b3403b958369e0ec3423f1a733", "fc76ca9f6ebcf0f34ab21b55cefdb912");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("59a44dc24088badd73202367003e7064", "5c5b76553d21e1aa2bcbbd55aec09b41", "b9f286b3403b958369e0ec3423f1a733", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("07e77cfcac013c4a011b50d521611b3e", "1bb73a74f58b3ba76720a0f3ab332e59", "75b107399d4a2d26ccdc4817f8c7c8ed", "ec5a224ccc0e8c42b34814d6fa12ab2d");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("3bd672f690029e9b72e83b8ad1b2f8ae", "29dfb4f490cf1855897561d5d6fdf59d", "b9f286b3403b958369e0ec3423f1a733", "1c867c0c756b35bc24301b0403fa556a");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("33a7d0150879ab43089e531039c2d60c", "2ac3f4b47d993636357ab698e36a167f", "b9f286b3403b958369e0ec3423f1a733", "6e09ea4152ea4e26c83f7d60c3c37be6");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("38a80108a0594a2cb9bbe34b036538a6", "2ac3f4b47d993636357ab698e36a167f", "b9f286b3403b958369e0ec3423f1a733", "1c867c0c756b35bc24301b0403fa556a");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("e3153e17980b9a118145948cdd2d884a", "aa947a10c3177f11379ce9fd1f5976f6", "b9f286b3403b958369e0ec3423f1a733", "ec5a224ccc0e8c42b34814d6fa12ab2d");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("98c1a7a2e6013a128168cb9be449ca8c", "dc40e589d2b506ed0b86c47346fe68ce", "b9f286b3403b958369e0ec3423f1a733", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("52355c293be55acda94f62f81631e755", "306deafc4624b7016706b0484964c99d", "b9f286b3403b958369e0ec3423f1a733", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("0ea6f9fa1b303efcefcec9d2a9deb351", "dc40e589d2b506ed0b86c47346fe68ce", "b9f286b3403b958369e0ec3423f1a733", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("4d6f161735e1081c3c00c8d3666896ba", "29dfb4f490cf1855897561d5d6fdf59d", "75b107399d4a2d26ccdc4817f8c7c8ed", "1c867c0c756b35bc24301b0403fa556a");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("0e1ece3d552f2a2093df270b7ab30caf", "29dfb4f490cf1855897561d5d6fdf59d", "4b011fa0d4299e61fc27b1fa1432a1b4", "50bae4d47d12fa0cf23403a12f34be0d");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("7274d1cb7966b62fa48beca3d67e5d99", "e94ce13d82a4cecc43d04854029cf048", "b9f286b3403b958369e0ec3423f1a733", "ec5a224ccc0e8c42b34814d6fa12ab2d");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("7e42d9ac3ac4577368ab725d161e2672", "e94ce13d82a4cecc43d04854029cf048", "b9f286b3403b958369e0ec3423f1a733", "6e09ea4152ea4e26c83f7d60c3c37be6");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("1e452ea94e0e03e368859a95f3da6ab3", "e94ce13d82a4cecc43d04854029cf048", "af2e94e92ff53b8592d7c1fdaf0c9edc", "558dc5761abfa074e9b9f6ef52499a4d");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("d5541046a0181da6c4c4142893f9db63", "2b80ca30c19541c6299cb39435fcff32", "75b107399d4a2d26ccdc4817f8c7c8ed", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("5853fa7283cfd3999e6a0969dd13431e", "e94ce13d82a4cecc43d04854029cf048", "b9f286b3403b958369e0ec3423f1a733", "558dc5761abfa074e9b9f6ef52499a4d");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("b0f139e46f9efe22e22dba86f523d0fa", "aa947a10c3177f11379ce9fd1f5976f6", "b9f286b3403b958369e0ec3423f1a733", "1c867c0c756b35bc24301b0403fa556a");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("5e3e35497db28a58d7b8fb92baed035f", "aa947a10c3177f11379ce9fd1f5976f6", "b9f286b3403b958369e0ec3423f1a733", "50bae4d47d12fa0cf23403a12f34be0d");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("b68e8711ad0c22383bf1434de795602d", "c77f69ccdc6aad0910f23fd656c19261", "b9f286b3403b958369e0ec3423f1a733", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("01c4a367629fce625230d83ea8d0a4ec", "0d4073aca49c4cbe0d441ba7b947a031", "b9f286b3403b958369e0ec3423f1a733", "50bae4d47d12fa0cf23403a12f34be0d");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("8d7887e708e9022e535545ef7e8cdbda", "7d73752ca4d67f433696f6848afbb107", "b9f286b3403b958369e0ec3423f1a733", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("af07d1bd4b01753703b238d620b85899", "0d4073aca49c4cbe0d441ba7b947a031", "b9f286b3403b958369e0ec3423f1a733", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("af51c232b6591c3734ba21e8a16ed3ed", "7d73752ca4d67f433696f6848afbb107", "b9f286b3403b958369e0ec3423f1a733", "c89e31c6134d92194320f6661e446dfb");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("eb5b43f50d4d178d78beba3acba6c890", "7d73752ca4d67f433696f6848afbb107", "75b107399d4a2d26ccdc4817f8c7c8ed", "c89e31c6134d92194320f6661e446dfb");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("ac5a3b8d248cd5dd1ac8ed45b122aec8", "7d73752ca4d67f433696f6848afbb107", "b9f286b3403b958369e0ec3423f1a733", "1c867c0c756b35bc24301b0403fa556a");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("73c1850e7a9a229b5303af4c5b484181", "463525d6ec375887e546d4ee250f4c2b", "b9f286b3403b958369e0ec3423f1a733", "c89e31c6134d92194320f6661e446dfb");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("494b1d74c6eecf755128fa531cb83892", "c77f69ccdc6aad0910f23fd656c19261", "b9f286b3403b958369e0ec3423f1a733", "1c867c0c756b35bc24301b0403fa556a");
INSERT INTO m_guru_mapel (kd, kd_guru, kd_ruang, kd_mapel) VALUES("15c729ca83a74e52d0960d2a434f1daf", "c77f69ccdc6aad0910f23fd656c19261", "b9f286b3403b958369e0ec3423f1a733", "c89e31c6134d92194320f6661e446dfb");


#
# Table structure for table 'm_hari'
#

CREATE TABLE m_hari (
  kd varchar(50) NOT NULL default '',
  no char(1) NOT NULL default '',
  hari varchar(10) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_hari'
#

INSERT INTO m_hari (kd, no, hari) VALUES("3bd672f690029e9b72e83b8ad1b2f8ae", "1", "Senin");
INSERT INTO m_hari (kd, no, hari) VALUES("d7c1803d15c88bd82eb4a702b57647f4", "2", "Selasa");
INSERT INTO m_hari (kd, no, hari) VALUES("7d73752ca4d67f433696f6848afbb107", "3", "Rabu");
INSERT INTO m_hari (kd, no, hari) VALUES("f88bd7a685a66f4f73219524c1f9e417", "4", "Kamis");
INSERT INTO m_hari (kd, no, hari) VALUES("4fcf418adddd67383212bc1d22c61e98", "5", "Jum\'at");
INSERT INTO m_hari (kd, no, hari) VALUES("b0f139e46f9efe22e22dba86f523d0fa", "6", "Sabtu");


#
# Table structure for table 'm_jam'
#

CREATE TABLE m_jam (
  kd varchar(50) NOT NULL default '',
  jam char(2) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_jam'
#

INSERT INTO m_jam (kd, jam) VALUES("b049b4d3490463a7c3db3cea5fc1fa10", "1");
INSERT INTO m_jam (kd, jam) VALUES("3be17d09596cd245484fed3a4f5576eb", "2");
INSERT INTO m_jam (kd, jam) VALUES("f341e7faba39e62971b3d538c92e82df", "3");
INSERT INTO m_jam (kd, jam) VALUES("02c979304d20859b2fe5c9135c0c269b", "4");
INSERT INTO m_jam (kd, jam) VALUES("21ddd50a146dfd554ddac33c19a21be5", "5");
INSERT INTO m_jam (kd, jam) VALUES("4fcf418adddd67383212bc1d22c61e98", "6");
INSERT INTO m_jam (kd, jam) VALUES("9b0001d3a5a4c413f0bb8e697b0e513f", "7");
INSERT INTO m_jam (kd, jam) VALUES("f78e58e3d8d18775f418762e9426b43d", "8");
INSERT INTO m_jam (kd, jam) VALUES("1bb73a74f58b3ba76720a0f3ab332e59", "9");
INSERT INTO m_jam (kd, jam) VALUES("0973ddebfca6c421a4e1ce28a4d29ea9", "10");


#
# Table structure for table 'm_kelas'
#

CREATE TABLE m_kelas (
  kd varchar(50) NOT NULL default '',
  no char(1) NOT NULL default '',
  kelas varchar(5) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_kelas'
#

INSERT INTO m_kelas (kd, no, kelas) VALUES("27de8f38a90dd1755acd801abefcbb42", "1", "X");
INSERT INTO m_kelas (kd, no, kelas) VALUES("2df89d4a12f44a5cc897d6814760687d", "2", "XI");
INSERT INTO m_kelas (kd, no, kelas) VALUES("3be17d09596cd245484fed3a4f5576eb", "3", "XII");


#
# Table structure for table 'm_mapel'
#

CREATE TABLE m_mapel (
  kd varchar(50) NOT NULL default '',
  no char(3) NOT NULL default '0',
  no_sub char(3) NOT NULL default '0',
  pel varchar(100) NOT NULL default '',
  xpel varchar(100) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_mapel'
#

INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("4598dd5b9ac644eaec4af76c548743be", "03", "0", "Bahasa dan Sastra Indonesia", "Bhs. Indonesia");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("d8022de243b4ce12b64f03a48158d39f", "04", "0", "Bahasa Inggris", "Bhs. Inggris");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("20f1b5c9f861b328fcd14dd92d82f8c6", "05", "0", "Matematika", "Matematika");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("fc76ca9f6ebcf0f34ab21b55cefdb912", "06", "1", "Biologi", "Biologi");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("39dbbf4078f620cd28d241706729e457", "01", "0", "Pendidikan Agama", "Agama");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("777d350703dbd13d393a90457c6e9201", "02", "0", "Pendidikan Kewarganegaraan", "PPkn");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("1c867c0c756b35bc24301b0403fa556a", "06", "2", "Fisika", "Fisika");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("ec5a224ccc0e8c42b34814d6fa12ab2d", "06", "3", "Kimia", "Kimia");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("c89e31c6134d92194320f6661e446dfb", "07", "1", "Sejarah", "Sejarah");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("1dfd318eedf35421b15fa6ba62943d1b", "07", "2", "Geografi", "Geografi");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("0d1df429750588af821f6010d4fbd517", "07", "3", "Ekonomi", "Ekonomi");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("ddd64f6ea96d9dbb668a15e2dbd3c8ad", "08", "1", "Seni Musik", "Seni Musik");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("6e09ea4152ea4e26c83f7d60c3c37be6", "08", "2", "Seni Lukis", "Seni Lukis");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("d94a6e5799011e19a614e6a915f4ece4", "08", "3", "Seni Kerawitan", "Seni Kerawitan");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("50bae4d47d12fa0cf23403a12f34be0d", "09", "0", "Pendidikan Jasmani", "Penjaskes");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("8afc44d568dbc8e74709b598628e8330", "10", "0", "Komputer", "Komputer");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("8c5d87f3695190b00ffc7ab43e8aed24", "12", "1", "Elektronika", "Elektronika");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("41c9a05798d429b2579aacc27e80a33c", "12", "2", "Otomotif", "Otomotif");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("177b3163ea9bb8bf687516bb3be4e53e", "12", "3", "Tata Boga", "Tata Boga");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("01b2dc906085b14bc0dc367427903448", "12", "4", "Tata Busana", "Tata Boga");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("558dc5761abfa074e9b9f6ef52499a4d", "11", "0", "Bahasa Daerah", "Bhs. Daerah");
INSERT INTO m_mapel (kd, no, no_sub, pel, xpel) VALUES("2cf403a3a59ce18ecbf70048a4de2547", "08", "4", "Seni Tari", "Seni Tari");


#
# Table structure for table 'm_mapel_kelas'
#

CREATE TABLE m_mapel_kelas (
  kd varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  kd_program varchar(50) NOT NULL default '',
  kd_mapel varchar(50) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_mapel_kelas'
#

INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("cf1736f3d6f2651e96aa66b1a52d75d1", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "39dbbf4078f620cd28d241706729e457");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("cc5e3dd64e5cdf193c927836190c4c14", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "777d350703dbd13d393a90457c6e9201");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("3ff20d904ceff2ceed403bba9dbcf683", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("56f790d9d0e06e5313b40b686a09f672", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("5fa51b64c30a81ffdbd9cd18a9dca254", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("e56ea9bb5f4a31873f8cd7d0fe06a209", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "1c867c0c756b35bc24301b0403fa556a");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("be7d78ba9d105a2d81dd0857c8550e50", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "ec5a224ccc0e8c42b34814d6fa12ab2d");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("ab2d682ab6c68e4ca7472e878e785d36", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "8afc44d568dbc8e74709b598628e8330");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("a4c327b9cf14c6287de9459c21a127cb", "27de8f38a90dd1755acd801abefcbb42", "1ca1210fab344eccd77b4f5f1e2cc569", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("66d8318a42b39e2f93b0671a0d1ea7f9", "27de8f38a90dd1755acd801abefcbb42", "1ca1210fab344eccd77b4f5f1e2cc569", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("02c979304d20859b2fe5c9135c0c269b", "27de8f38a90dd1755acd801abefcbb42", "1ca1210fab344eccd77b4f5f1e2cc569", "0d1df429750588af821f6010d4fbd517");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("90a1566c6f55fe0f4dfe21d486d138a0", "27de8f38a90dd1755acd801abefcbb42", "1ca1210fab344eccd77b4f5f1e2cc569", "1dfd318eedf35421b15fa6ba62943d1b");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("fcbe52a571c5f76a968129cc6824f67b", "27de8f38a90dd1755acd801abefcbb42", "1ca1210fab344eccd77b4f5f1e2cc569", "39dbbf4078f620cd28d241706729e457");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("7161fcdcade8fa99d4f49db1d31d67ee", "27de8f38a90dd1755acd801abefcbb42", "1ca1210fab344eccd77b4f5f1e2cc569", "777d350703dbd13d393a90457c6e9201");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("bd67cc0b7a8ed03a046b106cb7335b41", "27de8f38a90dd1755acd801abefcbb42", "4fcf418adddd67383212bc1d22c61e98", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("a39f1c0ad1d1acccd528ee926610d62c", "27de8f38a90dd1755acd801abefcbb42", "4fcf418adddd67383212bc1d22c61e98", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("89921b0374d92b6a8fb5e2874185329e", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("2ad05dff86453904845d36bfcd77b1bf", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("b27af523b1e748ff53790d51aad24e67", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("648662471c96024573f80d1aa99ea2fd", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "1c867c0c756b35bc24301b0403fa556a");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("f8f6db6882b912e8bae247b8563b8c7a", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "ec5a224ccc0e8c42b34814d6fa12ab2d");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("877bb7083430ecab0feca6d12f8ed171", "2df89d4a12f44a5cc897d6814760687d", "1ca1210fab344eccd77b4f5f1e2cc569", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("e2932ec89877cebc7e6a73af5ff6044d", "2df89d4a12f44a5cc897d6814760687d", "1ca1210fab344eccd77b4f5f1e2cc569", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("24d3a87fe4ab39b9729466d15d0c8fa0", "2df89d4a12f44a5cc897d6814760687d", "1ca1210fab344eccd77b4f5f1e2cc569", "0d1df429750588af821f6010d4fbd517");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("2c7fcf42bc49b99aba63ebcd445688c4", "2df89d4a12f44a5cc897d6814760687d", "1ca1210fab344eccd77b4f5f1e2cc569", "1dfd318eedf35421b15fa6ba62943d1b");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("340fac9c0dc0155f0257ca4cc16e9df9", "2df89d4a12f44a5cc897d6814760687d", "4fcf418adddd67383212bc1d22c61e98", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("4cb83e82085d431d78cdfbacd58fa194", "2df89d4a12f44a5cc897d6814760687d", "4fcf418adddd67383212bc1d22c61e98", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("aa14f1b150d404c761fed442c0a6ff24", "2df89d4a12f44a5cc897d6814760687d", "4fcf418adddd67383212bc1d22c61e98", "39dbbf4078f620cd28d241706729e457");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("a519b2de96158827087563fe888af6fb", "2df89d4a12f44a5cc897d6814760687d", "4fcf418adddd67383212bc1d22c61e98", "777d350703dbd13d393a90457c6e9201");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("1b4e5343912b3ec9b57018b16b652b2c", "3be17d09596cd245484fed3a4f5576eb", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("a5e6082fdcab9972842f9996abdc351c", "3be17d09596cd245484fed3a4f5576eb", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("b3f04b45d59386526435df88dadd02b2", "3be17d09596cd245484fed3a4f5576eb", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("ae2274c8cf94275b59a6ab6b36dc1ce2", "3be17d09596cd245484fed3a4f5576eb", "1c217606333ac983b8760baf64cd8b8a", "1c867c0c756b35bc24301b0403fa556a");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("ddffa2366bbaacefe3a25069575bc367", "3be17d09596cd245484fed3a4f5576eb", "1ca1210fab344eccd77b4f5f1e2cc569", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("bb53242a5f7463012b7626f14fd28d0e", "3be17d09596cd245484fed3a4f5576eb", "1ca1210fab344eccd77b4f5f1e2cc569", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("482b87b474eed982bd3ff701f87d5d0e", "3be17d09596cd245484fed3a4f5576eb", "1ca1210fab344eccd77b4f5f1e2cc569", "0d1df429750588af821f6010d4fbd517");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("0827fa93178a4621c830080403d00523", "3be17d09596cd245484fed3a4f5576eb", "1ca1210fab344eccd77b4f5f1e2cc569", "1dfd318eedf35421b15fa6ba62943d1b");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("7c365651de5c18cafd88e460469df8ec", "3be17d09596cd245484fed3a4f5576eb", "4fcf418adddd67383212bc1d22c61e98", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("945885e2584cc9d3ce9896f1a3093e2a", "3be17d09596cd245484fed3a4f5576eb", "4fcf418adddd67383212bc1d22c61e98", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("4bf137c34770372e11da1e22054a5a20", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "558dc5761abfa074e9b9f6ef52499a4d");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("dca0c7e0372586de72a3291f4f397445", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "4598dd5b9ac644eaec4af76c548743be");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("84c49e800594a8a398b1fa0459210274", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "d8022de243b4ce12b64f03a48158d39f");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("fde50bcb8e9727e4acff1095c2b13c39", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "1c867c0c756b35bc24301b0403fa556a");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("e21298b6dfee549351dea46e190cc004", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "50bae4d47d12fa0cf23403a12f34be0d");
INSERT INTO m_mapel_kelas (kd, kd_kelas, kd_program, kd_mapel) VALUES("23080b35aab6f109a7879bb98282316b", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "c89e31c6134d92194320f6661e446dfb");


#
# Table structure for table 'm_pegawai'
#

CREATE TABLE m_pegawai (
  kd varchar(50) NOT NULL default '',
  usernamex varchar(15) NOT NULL default '',
  passwordx varchar(50) NOT NULL default '',
  nip varchar(10) NOT NULL default '',
  nama varchar(30) NOT NULL default '',
  postdate datetime NOT NULL default '0000-00-00 00:00:00'
) TYPE=MyISAM;



#
# Dumping data for table 'm_pegawai'
#

INSERT INTO m_pegawai (kd, usernamex, passwordx, nip, nama, postdate) VALUES("8581148fda4cba20aa220b5bea5585d5", "120002", "fd6fc02a52712fdfb2d5de7f99caf722", "120002", "Indra L. Brugman", "2008-08-14 13:00:19");
INSERT INTO m_pegawai (kd, usernamex, passwordx, nip, nama, postdate) VALUES("fd81e50177b43431264d5a9c8499b2a9", "120003", "665a3abd55c0eb9242ae61187b48cd7b", "120003", "Virgie Baker", "0000-00-00 00:00:00");
INSERT INTO m_pegawai (kd, usernamex, passwordx, nip, nama, postdate) VALUES("8d804e81dcaa079c870be3138edf8006", "120001", "f9e97e49134dbffb8aec05ce8c71bf2e", "120001", "Rahma Sarita", "2008-07-04 14:47:31");
INSERT INTO m_pegawai (kd, usernamex, passwordx, nip, nama, postdate) VALUES("8ce91ca2473b2f64575ef9284bf36640", "120004", "0458e762e0d90c04be2d190baae9dc7d", "120004", "Dian Sastro", "2008-07-04 09:10:28");
INSERT INTO m_pegawai (kd, usernamex, passwordx, nip, nama, postdate) VALUES("2df89d4a12f44a5cc897d6814760687d", "120005", "3203c2cc45642fd235ba5d1fc3d98a08", "120005", "Luqman Sardi", "0000-00-00 00:00:00");
INSERT INTO m_pegawai (kd, usernamex, passwordx, nip, nama, postdate) VALUES("3be17d09596cd245484fed3a4f5576eb", "120006", "fa5aebbdd1022d06a0bb514d6bbd0288", "120006", "Mariana Renata", "2008-08-14 13:00:34");
INSERT INTO m_pegawai (kd, usernamex, passwordx, nip, nama, postdate) VALUES("edc5b859d5d26ed9c06a34ac72c2aed5", "120007", "c65b599562d7276e90f5a8c04a04dda1", "120007", "Luna Maya", "2008-06-29 11:59:30");
INSERT INTO m_pegawai (kd, usernamex, passwordx, nip, nama, postdate) VALUES("45e13fe0fba53e8ad0642c139bf0f7c9", "120008", "55bb5123744ed940aed9f0896f41bcc1", "120008", "Nicolas Saputra", "0000-00-00 00:00:00");


#
# Table structure for table 'm_program'
#

CREATE TABLE m_program (
  kd varchar(50) NOT NULL default '',
  program varchar(255) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_program'
#

INSERT INTO m_program (kd, program) VALUES("1c217606333ac983b8760baf64cd8b8a", "IPA");
INSERT INTO m_program (kd, program) VALUES("1ca1210fab344eccd77b4f5f1e2cc569", "IPS");
INSERT INTO m_program (kd, program) VALUES("4fcf418adddd67383212bc1d22c61e98", "Bahasa");
INSERT INTO m_program (kd, program) VALUES("9d768710c2d056869f252b7a59a84c8c", "xstrix");


#
# Table structure for table 'm_ruang'
#

CREATE TABLE m_ruang (
  kd varchar(50) NOT NULL default '',
  ruang varchar(5) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_ruang'
#

INSERT INTO m_ruang (kd, ruang) VALUES("b9f286b3403b958369e0ec3423f1a733", "A");
INSERT INTO m_ruang (kd, ruang) VALUES("af2e94e92ff53b8592d7c1fdaf0c9edc", "B");
INSERT INTO m_ruang (kd, ruang) VALUES("75b107399d4a2d26ccdc4817f8c7c8ed", "C");
INSERT INTO m_ruang (kd, ruang) VALUES("f1d8793368955b20185eebc6cc532a3d", "D");
INSERT INTO m_ruang (kd, ruang) VALUES("4b011fa0d4299e61fc27b1fa1432a1b4", "E");
INSERT INTO m_ruang (kd, ruang) VALUES("93bc41195da04813f69b7de11d91e905", "F");
INSERT INTO m_ruang (kd, ruang) VALUES("094a3243e824a39f51d1f90069ec4626", "G");
INSERT INTO m_ruang (kd, ruang) VALUES("8d67b61afe73f0f481e5ee826cd6406a", "H");


#
# Table structure for table 'm_siswa'
#

CREATE TABLE m_siswa (
  kd varchar(50) NOT NULL default '',
  usernamex varchar(15) NOT NULL default '',
  passwordx varchar(50) NOT NULL default '',
  nis varchar(10) NOT NULL default '',
  nama varchar(30) NOT NULL default '',
  postdate datetime NOT NULL default '0000-00-00 00:00:00'
) TYPE=MyISAM;



#
# Dumping data for table 'm_siswa'
#

INSERT INTO m_siswa (kd, usernamex, passwordx, nis, nama, postdate) VALUES("20a672f750d99eedfc25358f6ad823e9", "1935435563", "4799486f8670f30db3640b79f86cb0d6", "1935435563", "Van Damme", "2008-08-14 12:59:37");
INSERT INTO m_siswa (kd, usernamex, passwordx, nis, nama, postdate) VALUES("9b0001d3a5a4c413f0bb8e697b0e513f", "193592444", "9015b912f37a420ce38247714c7b0155", "193592444", "Silverstone Stallone", "0000-00-00 00:00:00");
INSERT INTO m_siswa (kd, usernamex, passwordx, nis, nama, postdate) VALUES("d1bb4677907c3066abba8f8f7b0d3434", "1935436456", "41718b4c011d5d51eaa2feab99d3d02a", "1935436456", "Jackie Chan", "0000-00-00 00:00:00");
INSERT INTO m_siswa (kd, usernamex, passwordx, nis, nama, postdate) VALUES("5656ff51c3172fc75985e4b5c9acead8", "8100231", "a5812761de782dea12f7626ec9d9302c", "8100231", "Christopher Lambert", "0000-00-00 00:00:00");
INSERT INTO m_siswa (kd, usernamex, passwordx, nis, nama, postdate) VALUES("1239a2153fdca93a77792920147fefde", "8100232", "e99d151a03e7d31987b167dc5ed51850", "8100232", "Mark Dacascos", "0000-00-00 00:00:00");
INSERT INTO m_siswa (kd, usernamex, passwordx, nis, nama, postdate) VALUES("f78e58e3d8d18775f418762e9426b43d", "8100233", "2a02582d5bd9512257b9bf696234dc75", "81000235", "Jet Li", "0000-00-00 00:00:00");
INSERT INTO m_siswa (kd, usernamex, passwordx, nis, nama, postdate) VALUES("e0ddb27a1258a4cd5fe31f5f0f3413ad", "81000234", "5f7a8f509cd850f880cc29b81bab5710", "81000234", "Bruce Lee", "2008-07-10 21:41:43");


#
# Table structure for table 'm_smt'
#

CREATE TABLE m_smt (
  kd varchar(50) NOT NULL default '',
  smt varchar(5) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_smt'
#

INSERT INTO m_smt (kd, smt) VALUES("b060de380c57384744177849d22fb584", "1");
INSERT INTO m_smt (kd, smt) VALUES("900e28393edf271632735d0bb6e9b31c", "2");


#
# Table structure for table 'm_tapel'
#

CREATE TABLE m_tapel (
  kd varchar(50) NOT NULL default '',
  tahun1 varchar(4) NOT NULL default '',
  tahun2 varchar(4) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_tapel'
#

INSERT INTO m_tapel (kd, tahun1, tahun2) VALUES("2a771e8ba89dd288743d4839d61185bc", "2008", "2009");
INSERT INTO m_tapel (kd, tahun1, tahun2) VALUES("d13e816e1bd8d00e0e5824fc430faf25", "2009", "2010");
INSERT INTO m_tapel (kd, tahun1, tahun2) VALUES("dc69250cdecc762faba7452f38a49192", "2010", "2011");


#
# Table structure for table 'm_uang_gedung'
#

CREATE TABLE m_uang_gedung (
  kd varchar(50) NOT NULL default '',
  kd_tapel varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  nilai varchar(10) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_uang_gedung'
#

INSERT INTO m_uang_gedung (kd, kd_tapel, kd_kelas, nilai) VALUES("cefc9a3a9dcc568bcad726dde2b71e7c", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "500000");
INSERT INTO m_uang_gedung (kd, kd_tapel, kd_kelas, nilai) VALUES("d1e7c66e6fb18e8e8478c286ac485b44", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "500000");


#
# Table structure for table 'm_uang_lain'
#

CREATE TABLE m_uang_lain (
  kd varchar(50) NOT NULL default '',
  kd_tapel varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  nilai varchar(10) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_uang_lain'
#

INSERT INTO m_uang_lain (kd, kd_tapel, kd_kelas, nilai) VALUES("d726cf836b61df5cc2897df1e42be505", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "10000");
INSERT INTO m_uang_lain (kd, kd_tapel, kd_kelas, nilai) VALUES("d1e7c66e6fb18e8e8478c286ac485b44", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "10000");


#
# Table structure for table 'm_uang_spp'
#

CREATE TABLE m_uang_spp (
  kd varchar(50) NOT NULL default '',
  kd_tapel varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  nilai varchar(10) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_uang_spp'
#

INSERT INTO m_uang_spp (kd, kd_tapel, kd_kelas, nilai) VALUES("d726cf836b61df5cc2897df1e42be505", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "30000");
INSERT INTO m_uang_spp (kd, kd_tapel, kd_kelas, nilai) VALUES("d1e7c66e6fb18e8e8478c286ac485b44", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "20000");


#
# Table structure for table 'm_uang_ujian'
#

CREATE TABLE m_uang_ujian (
  kd varchar(50) NOT NULL default '',
  kd_tapel varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  nilai varchar(10) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_uang_ujian'
#

INSERT INTO m_uang_ujian (kd, kd_tapel, kd_kelas, nilai) VALUES("d726cf836b61df5cc2897df1e42be505", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "50000");
INSERT INTO m_uang_ujian (kd, kd_tapel, kd_kelas, nilai) VALUES("d1e7c66e6fb18e8e8478c286ac485b44", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "10000");


#
# Table structure for table 'm_walikelas'
#

CREATE TABLE m_walikelas (
  kd varchar(50) NOT NULL default '',
  kd_tapel varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  kd_program varchar(50) NOT NULL default '',
  kd_ruang varchar(50) NOT NULL default '',
  kd_pegawai varchar(50) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'm_walikelas'
#

INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("adfddd86cedd4d6cd8c8999d01b84aa0", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "af2e94e92ff53b8592d7c1fdaf0c9edc", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("db14dd8a83b7e5c7a2a46b0abefde128", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "75b107399d4a2d26ccdc4817f8c7c8ed", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("4286bb32a71b7e464437cde375687427", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "f1d8793368955b20185eebc6cc532a3d", "8d804e81dcaa079c870be3138edf8006");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("33acdc5ccd69c53c5d3813b8c242da90", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "1ca1210fab344eccd77b4f5f1e2cc569", "af2e94e92ff53b8592d7c1fdaf0c9edc", "fd81e50177b43431264d5a9c8499b2a9");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("d5f9cc3b51560be4aa9d9e1b013a3be6", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "1ca1210fab344eccd77b4f5f1e2cc569", "75b107399d4a2d26ccdc4817f8c7c8ed", "edc5b859d5d26ed9c06a34ac72c2aed5");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("5a39b6476c4d59de1fc076e89e4dd785", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "4fcf418adddd67383212bc1d22c61e98", "b9f286b3403b958369e0ec3423f1a733", "2df89d4a12f44a5cc897d6814760687d");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("e30abed2bfd51c66ceeb769692f7d020", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "4fcf418adddd67383212bc1d22c61e98", "af2e94e92ff53b8592d7c1fdaf0c9edc", "3be17d09596cd245484fed3a4f5576eb");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("f671d439f9976b3c46fbaa1a0c48dc9d", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "4fcf418adddd67383212bc1d22c61e98", "75b107399d4a2d26ccdc4817f8c7c8ed", "2df89d4a12f44a5cc897d6814760687d");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("9f32176678defa22002146e0f75c17dd", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "b9f286b3403b958369e0ec3423f1a733", "fd81e50177b43431264d5a9c8499b2a9");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("5e676cdbcd2d981d17eb01e2f140424a", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "af2e94e92ff53b8592d7c1fdaf0c9edc", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("ba0bc09ec1d7d96339e39ea4244b659f", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "75b107399d4a2d26ccdc4817f8c7c8ed", "3be17d09596cd245484fed3a4f5576eb");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("c09c7d1329d1ae89722f06a9524cb444", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1ca1210fab344eccd77b4f5f1e2cc569", "af2e94e92ff53b8592d7c1fdaf0c9edc", "fd81e50177b43431264d5a9c8499b2a9");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("9482e4649af0e69ab35240c58cacf7ad", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "1ca1210fab344eccd77b4f5f1e2cc569", "75b107399d4a2d26ccdc4817f8c7c8ed", "3be17d09596cd245484fed3a4f5576eb");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("9ebe300f1ef8e07e058e3d4d0aa4083c", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "4fcf418adddd67383212bc1d22c61e98", "b9f286b3403b958369e0ec3423f1a733", "3be17d09596cd245484fed3a4f5576eb");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("b061448d27b5c440ccfe525dca6c7c92", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "4fcf418adddd67383212bc1d22c61e98", "af2e94e92ff53b8592d7c1fdaf0c9edc", "8581148fda4cba20aa220b5bea5585d5");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("a777c6ee5d2c44554f0602ea16d36f5b", "2a771e8ba89dd288743d4839d61185bc", "2df89d4a12f44a5cc897d6814760687d", "4fcf418adddd67383212bc1d22c61e98", "75b107399d4a2d26ccdc4817f8c7c8ed", "3be17d09596cd245484fed3a4f5576eb");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("f55a27d92d61680b7e58c283a68d25de", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1c217606333ac983b8760baf64cd8b8a", "af2e94e92ff53b8592d7c1fdaf0c9edc", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("a9097c06d10b68acdb4bc02751f6baec", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1c217606333ac983b8760baf64cd8b8a", "75b107399d4a2d26ccdc4817f8c7c8ed", "3be17d09596cd245484fed3a4f5576eb");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("f49effb1045721f38350d9f62cb8b516", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1ca1210fab344eccd77b4f5f1e2cc569", "75b107399d4a2d26ccdc4817f8c7c8ed", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("c962b5a2ce1861370106ac7b8044c90f", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1ca1210fab344eccd77b4f5f1e2cc569", "af2e94e92ff53b8592d7c1fdaf0c9edc", "3be17d09596cd245484fed3a4f5576eb");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("2792aae3c6e5f0257bd7d3f35d3dd611", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "1ca1210fab344eccd77b4f5f1e2cc569", "b9f286b3403b958369e0ec3423f1a733", "edc5b859d5d26ed9c06a34ac72c2aed5");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("d375f5066fc0c1134adbe78a1991e66c", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "75b107399d4a2d26ccdc4817f8c7c8ed", "3be17d09596cd245484fed3a4f5576eb");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("4be7cfe2847aec1ef63d92aff999460c", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "4fcf418adddd67383212bc1d22c61e98", "af2e94e92ff53b8592d7c1fdaf0c9edc", "3be17d09596cd245484fed3a4f5576eb");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("b7df5b29f1db96c95b7dcbc8fe555f50", "2a771e8ba89dd288743d4839d61185bc", "3be17d09596cd245484fed3a4f5576eb", "4fcf418adddd67383212bc1d22c61e98", "75b107399d4a2d26ccdc4817f8c7c8ed", "8ce91ca2473b2f64575ef9284bf36640");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("3cdda0bc5b2c1fddbaa26fdfdb4008b4", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "b9f286b3403b958369e0ec3423f1a733", "8d804e81dcaa079c870be3138edf8006");
INSERT INTO m_walikelas (kd, kd_tapel, kd_kelas, kd_program, kd_ruang, kd_pegawai) VALUES("59be48b39fe7b9f4d2bec6f32b6c0487", "2a771e8ba89dd288743d4839d61185bc", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "af2e94e92ff53b8592d7c1fdaf0c9edc", "8ce91ca2473b2f64575ef9284bf36640");


#
# Table structure for table 'siswa_absensi'
#

CREATE TABLE siswa_absensi (
  kd varchar(50) NOT NULL default '',
  kd_siswa_kelas varchar(50) NOT NULL default '',
  kd_absensi varchar(50) NOT NULL default '',
  tgl date NOT NULL default '0000-00-00',
  jam time NOT NULL default '00:00:00',
  keperluan varchar(100) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'siswa_absensi'
#

INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("0f8f1acec82db9374eb535741603828a", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-01", "00:00:00", "o");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("715d57bd7401dd74447f5faa87423c54", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-02", "00:00:00", "u");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("4c690dc70a9ad646c9d1666c05db77ba", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-03", "00:00:00", "y");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("424c91ec6d41baca6388a694f71c73c5", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-04", "00:00:00", "n");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("fc316836574cf4203bebdea6b078c08f", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-05", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("a4d9cab25b9808fa86d64a087c5f4ffc", "7c3a68f7ad86846a2f9764361d3566dd", "d1e7c66e6fb18e8e8478c286ac485b44", "2008-01-06", "17:45:00", "r");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("e61fffb5e51c695b9461ab21469718af", "7c3a68f7ad86846a2f9764361d3566dd", "d1e7c66e6fb18e8e8478c286ac485b44", "2008-01-07", "00:00:00", "y");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("87c5f2e7ae8cd94198d35a0316f5cb79", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-08", "00:00:00", "e");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("3b8ffcfa14bfe48e9a4261f33500e858", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-09", "00:00:00", "wagu");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("7129b399ba41aa13a57f05f8836776bb", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-10", "00:00:00", "h");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("5ef65cdca6802cd3b890899a12973f62", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-11", "00:00:00", "fd");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("7f4c216ce01c12f3b65bf4de191fe771", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-12", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("322e1eddff629cb76aeaa382e4453527", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-13", "00:00:00", "f");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("6a6d930a4fe9736d2d5c5043b79c593b", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-14", "00:00:00", "f");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("5e5b037da28c02d558d30b100d07e37b", "7c3a68f7ad86846a2f9764361d3566dd", "1bb73a74f58b3ba76720a0f3ab332e59", "2008-01-15", "00:00:00", "trrr");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("ae90c057a27c8b37b3a2f63171fd30f2", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-16", "00:00:00", "tyyyyu");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("761f1c9068eba981c46978edeb6f4599", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-17", "00:00:00", "sd");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("6a595f8953ed5f907a13915f61306d48", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-18", "00:00:00", "fuuuu");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("75923bfce281e73256a6d19e982d875a", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-19", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("12f88a75793bc57eed5fa88904c6e462", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-20", "00:00:00", "gsd");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("0b2a8e50004c7639a1f6252f6e9ebc61", "7c3a68f7ad86846a2f9764361d3566dd", "1bb73a74f58b3ba76720a0f3ab332e59", "2008-01-21", "09:57:00", "gh");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("64ee4bc0b699bfa57084c09e7b217aee", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-22", "00:00:00", "wagu tenan lah....");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("a52d1c9d8f31a9390086307b18afeb28", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-23", "00:00:00", "df");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("31f55e8805fac480264002174d851ed2", "7c3a68f7ad86846a2f9764361d3566dd", "d1e7c66e6fb18e8e8478c286ac485b44", "2008-01-24", "11:00:00", "siti");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("9418f61669b36ee9fa42151f1dcccb8b", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-25", "00:00:00", "wagu");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("98f70a14d48d69ab4a4b6bbe74e4f519", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-26", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("56bf702ac53adfe89087e361cc5e7cd8", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-27", "00:00:00", "wagu");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("8dba3b3e7e44f56638fac2f50b39f924", "7c3a68f7ad86846a2f9764361d3566dd", "4fcf418adddd67383212bc1d22c61e98", "2008-01-28", "00:00:00", "wagu");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("2c0ffc4b2bc60e7fdc59a9bba80d2a1a", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-29", "00:00:00", "wagu");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("9000ce4af908698bc823f4fbaa0ae3a9", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-30", "00:00:00", "wagu");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("00f1983ba5a9579289480a0b735dcb62", "7c3a68f7ad86846a2f9764361d3566dd", "", "2008-01-31", "00:00:00", "wagu");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("24efb439207bb032373ee04242c3ea58", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-01", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("36327eaefa4a690bc0ac6e39462e60b8", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-02", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("157756e9672b380102431d4e303dbb7e", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-03", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("5f608d8a5a1e4045300b5ddb664259e4", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-04", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("c6556b80ecdc1e14cc906e3064b4596c", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-05", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("421f70c85f445a7eab64e64fd0d292b6", "4996201dc16847071cbbc69cfdd44260", "d1e7c66e6fb18e8e8478c286ac485b44", "2008-01-06", "10:30:00", "xstrix");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("f46388cb434e4c4ae4b0ef5d7284e37c", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-07", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("f6d84d465d6344657e9f02c171411477", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-08", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("9f2aa8660c4d251bff8ef57c75f3024b", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-09", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("cea608f0790dd6cb6271053f3ac0ea49", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-10", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("a8c47b04c999816f0a29ab88f51a22ea", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-11", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("361a3a6f72f5a49a5ea3c96b84c44f45", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-12", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("c0e6a8363d4111c32d5d6d2a33667c9c", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-13", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("25ff5dc21b07df2563b5e32c9b9673c7", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-14", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("fe37084c1f6bd123e22866791b46167c", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-15", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("cd28bb9ed9aee9d02ac06b2e911018b2", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-16", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("2e07fa40a927cf1c9cfb1a2e789dd215", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-17", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("4c1a109613bf2f74b2cc30bbf16a01c6", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-18", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("3cd009dd1c2328b68ff2744b2fb37ec6", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-19", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("16aa853a0837f847c82734dfb56d6bde", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-20", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("78c4d8ddc48cae2be65191510917350f", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-21", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("b8865eb6a6bd093bf189fffe207d744e", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-22", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("7cb929c0cc9d63bde4c126f57cdc4414", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-23", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("1d9abd7b2e02b33b7f090e4d8b1ad5dc", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-24", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("b3f4400f61cec5df25f17b50281ccadf", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-25", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("a0d0ce22d74b6f8ef2992c83d6706295", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-26", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("cbd373e27e6252200a7a6b75ffcd005c", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-27", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("c7ab3b0afb453ceb86f1d9ad9b5b7dd9", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-28", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("e85929c39321b0505b9cd4488f7e8726", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-29", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("c6591fc6a2ecd1a59b5f87f175988a4f", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-30", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("31ed0e59d62055f006cd69efb2f12bc9", "4996201dc16847071cbbc69cfdd44260", "", "2008-01-31", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("2bd8bec538a7d6903e98390f134b5bf5", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "1bb73a74f58b3ba76720a0f3ab332e59", "2008-01-01", "01:01:00", "x");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("f6f0d365bd270be1ef6016b70e8b5a33", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d1e7c66e6fb18e8e8478c286ac485b44", "2008-01-02", "03:04:00", "x");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("556ffd367d052bc94038cb92d8419266", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-03", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("64286464c9615e953ab16515478225d0", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-04", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("f06187f9b0f81bbc4a3b6a72c12054bd", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-05", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("db4fedbd16bdbc7540b313b892379b94", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-06", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("e3d960fc4d61f9287d2bdd9abfb40a8a", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-07", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("50e0c019c548a9fd3832feb1fdcfaff0", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-08", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("71ec9962b4fc827547a976aefd9f6c25", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-09", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("0a93910f52cf0fdbde86efdab233ac6c", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-10", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("1f3676891959d83ed7d124fe3f7d3fce", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-11", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("28de7752a3450a23dc4937aadddb5481", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-12", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("e697b828c1d17e39d11b569014d1c96e", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-13", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("98f2d53764fe5bb799885c838cdd3b53", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-14", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("e41d6265e71e10711640102623a6fcc3", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-15", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("4a795608eda5a9d460fc80dae9ad34c6", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-16", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("779b61de8564e15f60bf002ae5374a3b", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-17", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("350b687a81ea3d57694443dc57906759", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-18", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("67d030bc0b544b980a289d8a5a9b98ca", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-19", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("e346160829cd4ed99bde73aba472ae02", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-20", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("fde7f275ab5d9b076e9cb9c5a83adcf7", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-21", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("e85d2f8d0f89e5529a5e04cc37849662", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-22", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("e7a34a27954de837cc838a346defc8f4", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-23", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("6bc9fcabed7a5beb0b5c1edf3ca7e1b0", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-24", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("5adacaa2851d7ffcebb7ba50057f4d2a", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-25", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("afa96b70264f653a4b08fc609d8d4658", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-26", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("e3d2056ac1960f5041c791f64bb31a95", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-27", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("ffdd0870d39cc585fb282d6883420dc7", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-28", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("06ae1cafcf6351903e57da6ad43a1b9b", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-29", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("2b20decace0a17390689f84a77013870", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-30", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("11a85519ebf98f2047a765145a4ac714", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "", "2008-01-31", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("7c5aa7b0f8cdd05db95713131b950603", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-01", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("1aae7ff3ced611f84bc9d88571e8425f", "d1bb4677907c3066abba8f8f7b0d3434", "1bb73a74f58b3ba76720a0f3ab332e59", "2008-01-02", "07:06:00", "x");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("5658b0c44704b932dda2a10471a51382", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-03", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("8412b73210033c314b76a7dfbdded544", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-04", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("9f55cfbb7f0e86b2942103a6f58b120e", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-05", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("e72de6f1a5bfce4070a3ffdf615b5fd8", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-06", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("3dfdb9feddee97e7928d77227e47c646", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-07", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("1ef531ca72a59f182b7e231af668701d", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-08", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("63468f630dab563161a7be38e1c7f972", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-09", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("f203ce910160446d5141e6ab39ccd413", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-10", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("cf8f0d8aefc47beddab7969be6c97866", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-11", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("9adb589f5c709aa32ee5824447f4fa3e", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-12", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("58886197f020afdde7adbb75189eeab7", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-13", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("e8d31b2755e00e03a72d79d13a9b15fc", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-14", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("ffb151c81f3240fded97c3a785ab9d35", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-15", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("0938015ada596c3c3ad656f58707fe1a", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-16", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("4f42de3453c6de32ab76082fd50ebe96", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-17", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("ea9e1697eafd9f19bba57fa63817c191", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-18", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("5a9f9af01b72d7aa32e4bbfbbdaed97a", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-19", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("2bc0bfe2476245e3764cf48cea5875f6", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-20", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("bbad715775e69f989e6bd8c1ad53e4f2", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-21", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("05b2788caf4fbf2ec4c15c68e8ba63b5", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-22", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("857f3317baae0469c2e158bab09aa2d1", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-23", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("bfa164e5c5fbb588727e649584eb501d", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-24", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("693d5de96a840103c8c31bf0de2ac75b", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-25", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("dcf45e3cc4473831b54a986221ca6393", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-26", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("38539c845422c55bb490dfc36950199b", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-27", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("12a5428937476421bb1ba560d224de12", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-28", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("30ed5d03ae7f0297c2ccfb02002e2463", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-29", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("c27f99dd15e1934e0d24d0e63b7e4f8a", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-30", "00:00:00", "");
INSERT INTO siswa_absensi (kd, kd_siswa_kelas, kd_absensi, tgl, jam, keperluan) VALUES("9af8a0b051313fc5dc07cd1f77d6dd3d", "d1bb4677907c3066abba8f8f7b0d3434", "", "2008-01-31", "00:00:00", "");


#
# Table structure for table 'siswa_kelas'
#

CREATE TABLE siswa_kelas (
  kd varchar(50) NOT NULL default '',
  kd_tapel varchar(50) NOT NULL default '',
  kd_program varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  kd_ruang varchar(50) NOT NULL default '',
  kd_siswa varchar(50) NOT NULL default '',
  no_absen char(2) NOT NULL default '',
  status enum('true','false') NOT NULL default 'false'
) TYPE=MyISAM;



#
# Dumping data for table 'siswa_kelas'
#

INSERT INTO siswa_kelas (kd, kd_tapel, kd_program, kd_kelas, kd_ruang, kd_siswa, no_absen, status) VALUES("5656ff51c3172fc75985e4b5c9acead8", "2a771e8ba89dd288743d4839d61185bc", "1c217606333ac983b8760baf64cd8b8a", "3be17d09596cd245484fed3a4f5576eb", "b9f286b3403b958369e0ec3423f1a733", "5656ff51c3172fc75985e4b5c9acead8", "01", "false");
INSERT INTO siswa_kelas (kd, kd_tapel, kd_program, kd_kelas, kd_ruang, kd_siswa, no_absen, status) VALUES("20a672f750d99eedfc25358f6ad823e9", "2a771e8ba89dd288743d4839d61185bc", "1c217606333ac983b8760baf64cd8b8a", "2df89d4a12f44a5cc897d6814760687d", "b9f286b3403b958369e0ec3423f1a733", "20a672f750d99eedfc25358f6ad823e9", "02", "false");
INSERT INTO siswa_kelas (kd, kd_tapel, kd_program, kd_kelas, kd_ruang, kd_siswa, no_absen, status) VALUES("9b0001d3a5a4c413f0bb8e697b0e513f", "2a771e8ba89dd288743d4839d61185bc", "1c217606333ac983b8760baf64cd8b8a", "2df89d4a12f44a5cc897d6814760687d", "b9f286b3403b958369e0ec3423f1a733", "9b0001d3a5a4c413f0bb8e697b0e513f", "01", "false");
INSERT INTO siswa_kelas (kd, kd_tapel, kd_program, kd_kelas, kd_ruang, kd_siswa, no_absen, status) VALUES("d1bb4677907c3066abba8f8f7b0d3434", "2a771e8ba89dd288743d4839d61185bc", "9d768710c2d056869f252b7a59a84c8c", "27de8f38a90dd1755acd801abefcbb42", "b9f286b3403b958369e0ec3423f1a733", "d1bb4677907c3066abba8f8f7b0d3434", "03", "false");
INSERT INTO siswa_kelas (kd, kd_tapel, kd_program, kd_kelas, kd_ruang, kd_siswa, no_absen, status) VALUES("1239a2153fdca93a77792920147fefde", "2a771e8ba89dd288743d4839d61185bc", "1c217606333ac983b8760baf64cd8b8a", "3be17d09596cd245484fed3a4f5576eb", "b9f286b3403b958369e0ec3423f1a733", "1239a2153fdca93a77792920147fefde", "02", "false");
INSERT INTO siswa_kelas (kd, kd_tapel, kd_program, kd_kelas, kd_ruang, kd_siswa, no_absen, status) VALUES("f78e58e3d8d18775f418762e9426b43d", "2a771e8ba89dd288743d4839d61185bc", "9d768710c2d056869f252b7a59a84c8c", "27de8f38a90dd1755acd801abefcbb42", "b9f286b3403b958369e0ec3423f1a733", "f78e58e3d8d18775f418762e9426b43d", "01", "false");
INSERT INTO siswa_kelas (kd, kd_tapel, kd_program, kd_kelas, kd_ruang, kd_siswa, no_absen, status) VALUES("e0ddb27a1258a4cd5fe31f5f0f3413ad", "2a771e8ba89dd288743d4839d61185bc", "9d768710c2d056869f252b7a59a84c8c", "27de8f38a90dd1755acd801abefcbb42", "b9f286b3403b958369e0ec3423f1a733", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "02", "false");


#
# Table structure for table 'siswa_uang_gedung'
#

CREATE TABLE siswa_uang_gedung (
  kd varchar(50) NOT NULL default '',
  kd_siswa_kelas varchar(50) NOT NULL default '',
  kd_uang_gedung varchar(50) NOT NULL default '',
  tgl_bayar date NOT NULL default '0000-00-00',
  ket varchar(100) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'siswa_uang_gedung'
#

INSERT INTO siswa_uang_gedung (kd, kd_siswa_kelas, kd_uang_gedung, tgl_bayar, ket) VALUES("6af20a984d2929e8f9f0fe1b42a87c32", "7c3a68f7ad86846a2f9764361d3566dd", "cefc9a3a9dcc568bcad726dde2b71e7c", "2008-02-03", "xxxx");
INSERT INTO siswa_uang_gedung (kd, kd_siswa_kelas, kd_uang_gedung, tgl_bayar, ket) VALUES("95fa2f75ddcb8fd38d6196cc8055a12a", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "cefc9a3a9dcc568bcad726dde2b71e7c", "2008-03-02", "xstrix");
INSERT INTO siswa_uang_gedung (kd, kd_siswa_kelas, kd_uang_gedung, tgl_bayar, ket) VALUES("91df26fa3ed32371d5cdb3ef090ee2de", "f78e58e3d8d18775f418762e9426b43d", "cefc9a3a9dcc568bcad726dde2b71e7c", "2007-01-01", "x");
INSERT INTO siswa_uang_gedung (kd, kd_siswa_kelas, kd_uang_gedung, tgl_bayar, ket) VALUES("3d4aaeed32dfb08d83202478a2a330a6", "d1bb4677907c3066abba8f8f7b0d3434", "cefc9a3a9dcc568bcad726dde2b71e7c", "2009-04-03", "x");


#
# Table structure for table 'siswa_uang_lain'
#

CREATE TABLE siswa_uang_lain (
  kd varchar(50) NOT NULL default '',
  kd_siswa_kelas varchar(50) NOT NULL default '',
  kd_uang_lain varchar(50) NOT NULL default '',
  tgl_bayar date NOT NULL default '0000-00-00',
  ket varchar(100) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'siswa_uang_lain'
#

INSERT INTO siswa_uang_lain (kd, kd_siswa_kelas, kd_uang_lain, tgl_bayar, ket) VALUES("21a97fafb926a723f1799b906974bed4", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "2008-04-13", "yyyyy");
INSERT INTO siswa_uang_lain (kd, kd_siswa_kelas, kd_uang_lain, tgl_bayar, ket) VALUES("7eeb0972d9404b61ba1d20afe340cfcd", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "0000-00-00", "");
INSERT INTO siswa_uang_lain (kd, kd_siswa_kelas, kd_uang_lain, tgl_bayar, ket) VALUES("f233db7a946f6b6994f8a687f3c8732f", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "2008-03-10", "x");
INSERT INTO siswa_uang_lain (kd, kd_siswa_kelas, kd_uang_lain, tgl_bayar, ket) VALUES("82c166f57ef14d234a37186b5cea9562", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "2008-09-04", "x");


#
# Table structure for table 'siswa_uang_spp'
#

CREATE TABLE siswa_uang_spp (
  kd varchar(50) NOT NULL default '',
  kd_siswa_kelas varchar(50) NOT NULL default '',
  kd_uang_spp varchar(50) NOT NULL default '',
  bln char(2) NOT NULL default '',
  thn varchar(4) NOT NULL default '',
  tgl_bayar date NOT NULL default '0000-00-00',
  ket varchar(100) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'siswa_uang_spp'
#

INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("0ca1c95f1a4408341e03bfd1dd62b48e", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "7", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("11d1f2aa4f59484d127b891b6dc09e0f", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "8", "2008", "0000-00-00", "yyy");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("506358d9b05578b173c4c1e1384b5e8b", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "9", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("23eb33218ec22c8d1a4b522423738bf0", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "10", "2008", "2008-09-19", "tt");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("6bbcfdf667842027242edc70172415d2", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "11", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("ad5c33b70d9228979635506b9a0f8cad", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "12", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("7e94bdb5004bd3369b3c36857f1e7056", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "1", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("9392e170d716da4a4eca364d6d69cb0c", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "2", "2009", "2007-07-16", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("d06de7566ade25d4202d086dc78c44ec", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "3", "2009", "0000-00-00", "rrr");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("962a1b70a68885c97ecc6501fdd9f561", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "4", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("2e5fb56d036214bb6defcf0420868c7f", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "5", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("0136894393158e45a1857e97593cf98a", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "6", "2009", "0000-00-00", "dd");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("f3456c7313e4fa6a8931ff47a503056c", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "7", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("95475c37ac5864bfd10a7ee816a0d5d1", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "8", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("144a26e1ad960ecb976339043b80669d", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "9", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("31152f0cbe47b11bbdcc93673a2884ba", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "10", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("d191fc5e943ec8795f30f55f198a372e", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "11", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("d0b82dc41f1b7d79b7ccee8cd6c3ad6f", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "12", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("9c6347f267242f0a3e77b98381506b9c", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "1", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("24e588aa8c8d32543553cc1fdfb11e3a", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "2", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("8ce9f70bf887195fdc1a701f7076eec9", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "3", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("5a4f85df851049d7e0384103b95aca1b", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "4", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("c75eb86f5f4ed90e95444aa4685a5beb", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "5", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("394ee9845fdc13ddb4b510e3c93bf95e", "20a672f750d99eedfc25358f6ad823e9", "d1e7c66e6fb18e8e8478c286ac485b44", "6", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("a8e57752e36aad6fc82626421a7e7471", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "7", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("c96f176649c1e3b1b8766ca8cb280d0c", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "8", "2008", "2008-06-05", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("bd4a2bcf5067756334beacbec0396746", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "9", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("2f9188dfa5c8e42c98f206870173a207", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "10", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("bfcd189a369eb06f7a2756683911333a", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "11", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("ee4ec900c20666b1405c6fa5054e0244", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "12", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("a519f25edcbe998c6e4d7f21b32a7f5d", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "1", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("09102dc9b68ac3b6705e162945cd62c3", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "2", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("ba330fb22929bf38d2d1cc3316a3c28b", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "3", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("ac7b52d723ffeb92e8833b38a0c3c92e", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "4", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("92dc13547303cee3c62624a6fa21dd26", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "5", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("a09f7448f40e94fea81704f8466d47a0", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "6", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("03c26ff1bcf7e4aac5a316dc6c11b7bd", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "7", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("53b55af36f6e3f64c3c5dc961af31dfd", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "8", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("055ef34059424cec07104f68b2b9b2b2", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "9", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("b39005c100a8c47ce21fb7bb8527b4d6", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "10", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("c9807338eb670d4105e7014c53f19c58", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "11", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("ad6c3ad1e95ac8b5d986beca11e9ff96", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "12", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("17cbc5ada65f5449447b3f36cdec2bfd", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "1", "2009", "2009-04-17", "x");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("dd9743ee247f282f2fbdd51d90601302", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "2", "2009", "2008-10-09", "x");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("3a034304a8463c8dfa71fc6393bba88b", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "3", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("edd1c8d014196eabc94298068c549b75", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "4", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("894ed5d2f7f549c2d6a6d46da72e6dcd", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "5", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("d888c9b94d00a8f51e595251f8879844", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "6", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("5f4ea953dc6dd125ab921eeefb3287ad", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "7", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("f67a9ec0f00a7f4bbffe3c4c6a2988a8", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "8", "2008", "2008-09-04", "x");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("28f22689790de7c114b462a00510c50a", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "9", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("03012a69da645328bac3688cc80a7745", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "10", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("099efee402fecb7cf67518a3bd8616eb", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "11", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("36fec45736402bd927f4b56ec45ecf7b", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "12", "2008", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("47fe78077964cf0fa61e450486dcdc28", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "1", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("b184f8ad1bb795d79387063832ff01dc", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "2", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("71127e129ab16a4a949f783e497001f2", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "3", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("243bcc6b1ae48c0c0594390b40e39012", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "4", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("2e1b888af1c90a6176ce0e0b4d799ec5", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "5", "2009", "0000-00-00", "");
INSERT INTO siswa_uang_spp (kd, kd_siswa_kelas, kd_uang_spp, bln, thn, tgl_bayar, ket) VALUES("24a042021fc999f37bcc524d2f4c7603", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "6", "2009", "0000-00-00", "");


#
# Table structure for table 'siswa_uang_ujian'
#

CREATE TABLE siswa_uang_ujian (
  kd varchar(50) NOT NULL default '',
  kd_siswa_kelas varchar(50) NOT NULL default '',
  kd_uang_ujian varchar(50) NOT NULL default '',
  tgl_bayar date NOT NULL default '0000-00-00',
  ket varchar(100) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'siswa_uang_ujian'
#

INSERT INTO siswa_uang_ujian (kd, kd_siswa_kelas, kd_uang_ujian, tgl_bayar, ket) VALUES("14707861ef5f5a79225f185c3a722ef5", "7c3a68f7ad86846a2f9764361d3566dd", "d726cf836b61df5cc2897df1e42be505", "2008-03-05", "hhhh");
INSERT INTO siswa_uang_ujian (kd, kd_siswa_kelas, kd_uang_ujian, tgl_bayar, ket) VALUES("40393c2a37bdf6ab3f5ffbd9074d3ba8", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "d726cf836b61df5cc2897df1e42be505", "2007-01-02", "");
INSERT INTO siswa_uang_ujian (kd, kd_siswa_kelas, kd_uang_ujian, tgl_bayar, ket) VALUES("bc69d35762b79fc42ba8cc76cc853c6e", "f78e58e3d8d18775f418762e9426b43d", "d726cf836b61df5cc2897df1e42be505", "2007-04-06", "x");
INSERT INTO siswa_uang_ujian (kd, kd_siswa_kelas, kd_uang_ujian, tgl_bayar, ket) VALUES("b96b99b5b6369c15268a4b0fb023fc4f", "d1bb4677907c3066abba8f8f7b0d3434", "d726cf836b61df5cc2897df1e42be505", "2008-03-02", "x");


#
# Table structure for table 'ulangan_harian'
#

CREATE TABLE ulangan_harian (
  kd varchar(50) NOT NULL default '',
  kd_siswa_kelas varchar(50) NOT NULL default '',
  kd_smt varchar(50) NOT NULL default '',
  kd_mapel varchar(50) NOT NULL default '',
  kd_aspek varchar(50) NOT NULL default '',
  nilkd varchar(15) NOT NULL default '',
  nilai char(3) NOT NULL default '0'
) TYPE=MyISAM;



#
# Dumping data for table 'ulangan_harian'
#

INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("a3e0469445d0dce1cad1629081893dac", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "NH11", "17");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("751847e7fdda9dbd4336b2726c3098be", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "1NR11", "25");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("843bcfaeecc6d26c2dbbc92e1ff9044a", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "UL1", "28");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("31eee0c001652d8c678add42c15762f0", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "1NR21", "26");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("1d49ac3ed14ba26735a6bf7efe7e2274", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "NH12", "66");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("30a301aece7163ce6c159884a4105b6b", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "1NR12", "23");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("bd6a8cb530252553a51b2c212c85c928", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "UL2", "11");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("438a2f0ef59867fc928adf7a42943cdf", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "1NR22", "26");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("a13505d176c70fd265a2dff4fef7cb81", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "1c867c0c756b35bc24301b0403fa556a", "bde10f1a1c67d455e5fccc6cd6ff454c", "NH11", "23");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("3938d029388c3cb8b973d1faa29c2eb5", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "1c867c0c756b35bc24301b0403fa556a", "bde10f1a1c67d455e5fccc6cd6ff454c", "1NR11", "34");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("f6d3089bc67d2289294d5bbbfe5952ce", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "1c867c0c756b35bc24301b0403fa556a", "bde10f1a1c67d455e5fccc6cd6ff454c", "UL1", "67");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("053d6939a2099518d511d82a9a2ac9bc", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "1c867c0c756b35bc24301b0403fa556a", "bde10f1a1c67d455e5fccc6cd6ff454c", "1NR21", "45");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("30d87bb47c9ff068fecf76b65ecb8a55", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "1c867c0c756b35bc24301b0403fa556a", "bde10f1a1c67d455e5fccc6cd6ff454c", "NH12", "12");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("57bf0f783873ce87d92ee775cbc0afd3", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "1c867c0c756b35bc24301b0403fa556a", "bde10f1a1c67d455e5fccc6cd6ff454c", "1NR12", "23");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("046427c8fd65c14edb790f1fa93a9695", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "1c867c0c756b35bc24301b0403fa556a", "bde10f1a1c67d455e5fccc6cd6ff454c", "UL2", "45");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("ad8a59a159219c6f346050b4780c4fc7", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "1c867c0c756b35bc24301b0403fa556a", "bde10f1a1c67d455e5fccc6cd6ff454c", "1NR22", "34");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("5db68ee7470f466d835e7a62c7cc6a8a", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "NH21", "13");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("9852e4987f1d55e63fd8d38ab61bc7d1", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "2NR11", "12");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("7a128498676c90befdef4a4ebaa7e3a5", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "2NR21", "11");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("b5b8527bd5f92c02107e21594bb78271", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "NH22", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("4c687be4c0bf997d733371f38a79ec00", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "2NR12", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("af85a02dce31b53ccb23659b7b02b748", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "2NR22", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("383ffe2f81eeeb21beb29f4eb6b4b703", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH11", "01");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("56594ac817b864d48d8a86ffefa37155", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "1NR11", "02");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("bba9903a8dfe97309a751001df42e6a0", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "UL1", "10");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("14c1b3fd0fa33569c80d2914148a5c3f", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "1NR21", "03");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("f8b1eef3fcdf18dec9b5f65831f9263e", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH21", "04");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("fe286e28f71a128bea4e67cb13516a87", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "2NR11", "05");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("dffa42ae7a8c6cf2309c80bb25393b3f", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "2NR21", "06");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("1fab76cec6137d36b7c7b1e27e7f1351", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH31", "07");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("785217bf1a068c7879ace73d2d030c13", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "3NR11", "08");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("bfc4222e7af2000ae284fb8bcc748e98", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "3NR21", "09");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("af41756464bd88fa995d1b55a96d2aa0", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH12", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("ae4a4469386ddd3942a1b926accb1e58", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "1NR12", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("a9ecaf3a64c3ffe35396fe7ae3f70794", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "UL2", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("d92e4b3972b5d8778804495d56fae7d8", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "1NR22", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("c1bed177f6085ad855a11e8d68148b59", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH22", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("2f762801e3bbb26be14bc182b49d702a", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "2NR12", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("b9b0ee96b0498231ae9493adb500deda", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "2NR22", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("aab3672f41e45491fdb23196dfb8f804", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH32", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("17fa366a8a87390f7c182c28b940eccb", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "3NR12", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("c8ec2c4a6ad13875eaad6a4d8355cf84", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "3NR22", "");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("cc7ca6c0ad0e632023a197930df836ab", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH11", "01");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("4d269c423d8a7d94f463d93cf1c208a9", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "1NR11", "02");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("425331a157fd0e68b24a7ebb9f6f909a", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "UL1", "07");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("c4f3171e670249c3c5551c4d364dadf7", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "1NR21", "03");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("ca950c09a1ede72652a58ca978772b0b", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH21", "04");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("c1964b84e53feaf03216d57dddffd5ab", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "2NR11", "05");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("cb15715fa35aa829351e8d361295c2d3", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "2NR21", "06");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("5e07de6cd4e4f84639e21b82621a4fdd", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH12", "08");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("916d6c2e2be7e155332a4381b8efcb75", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "1NR12", "09");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("81a5801cf94a516e1fb22b1aa702b21a", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "UL2", "78");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("733b4b96ed98ec944608828c0935f183", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "1NR22", "04");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("74ec30036d5b67b576d711e1f794761f", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH22", "06");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("734e6c989f3786bddcecec78e9f10560", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "2NR12", "03");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("b885d691e2ee959e33c14401afca7c4b", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "2NR22", "05");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("cb3af47801b78db9eca0e68cd578becb", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "NH11", "02");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("98181115b1679564dc41ddcde0cd4708", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "1NR11", "03");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("0fc0b6c271e41da049e924d4468bb187", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "UL1", "05");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("ec843f2cd6fe23c2f07c5a03d2edddb3", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "1NR21", "04");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("c1ce3fcbf2ed4175b9a9e0e4364f3667", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "NH12", "04");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("f4f000871342e496b0aea512a7271755", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "1NR12", "07");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("277be1eecd6afb0e66ac4364dc1508c2", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "UL2", "06");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("fa3a1a0a89c59da66e9dab6981e319ca", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "1NR22", "09");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("aa04fed0f2e0e777ee4ba1d72813c58e", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "NH11", "09");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("3aa986b57da3061f965f37c04e77e564", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "1NR11", "02");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("21086813a0701394502cb64dd5e59b73", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "UL1", "04");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("2e357255d6a00bfc90a7d1083624cf2a", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "1NR21", "03");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("183bd54ff4bfcd06bfa51fdcb8b0063b", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "NH12", "06");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("5183132027b704052c14708e9160d254", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "1NR12", "03");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("ad0680cca68a7614eb33e640b4f317ec", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "UL2", "08");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("53c919535981f48d4df41cec625a3fa1", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "1NR22", "04");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("9abb3e7a0c50af35a9d19d4a6816a7e9", "d1bb4677907c3066abba8f8f7b0d3434", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH13", "07");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("3b67571b9f165fd89f02a51a8d699f3b", "d1bb4677907c3066abba8f8f7b0d3434", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "1NR13", "06");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("915279024e942dee0916b51a6c77267b", "d1bb4677907c3066abba8f8f7b0d3434", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "UL3", "05");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("978a88d1f9c35adf2ef43128d62c407a", "d1bb4677907c3066abba8f8f7b0d3434", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "1NR23", "04");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("801e031b870a253d9b968fca92fe13b9", "d1bb4677907c3066abba8f8f7b0d3434", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH23", "05");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("69d9ce1ef61f7a53dd783392aaaa3ba8", "d1bb4677907c3066abba8f8f7b0d3434", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "2NR13", "07");
INSERT INTO ulangan_harian (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("dd1f4fb1184bee52ee6a67898265d994", "d1bb4677907c3066abba8f8f7b0d3434", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "2NR23", "89");


#
# Table structure for table 'ulangan_jml'
#

CREATE TABLE ulangan_jml (
  kd varchar(50) NOT NULL default '',
  kd_smt varchar(50) NOT NULL default '',
  kd_kelas varchar(50) NOT NULL default '',
  kd_program varchar(50) NOT NULL default '',
  kd_mapel varchar(50) NOT NULL default '',
  kd_aspek varchar(50) NOT NULL default '',
  jml_hr char(1) NOT NULL default '0',
  jml_akhir char(1) NOT NULL default '0'
) TYPE=MyISAM;



#
# Dumping data for table 'ulangan_jml'
#

INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("c12012ac2c8308a74992f7b57664a1a1", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "c89e31c6134d92194320f6661e446dfb", "d221fd2b58013904da10fad8d232571f", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("be7f10edf2ceaa926bda209c69c61682", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "c89e31c6134d92194320f6661e446dfb", "049909dcd1b125aa8f31e7828a81082b", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("021990f7d4b481dfdcded813b0170577", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "c89e31c6134d92194320f6661e446dfb", "049909dcd1b125aa8f31e7828a81082b", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("147acba90ddf05ce88a6807e8713136a", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "81d540c32ddfdc137137902fdd5743fa", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("bccd80c6d93f425ccc683000eed2cc7b", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "81d540c32ddfdc137137902fdd5743fa", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("efe08b8b36e3f6e4729e1f1608cc7f2b", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "049909dcd1b125aa8f31e7828a81082b", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("0f2031d288e41fccefbc9c8118887bc2", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "049909dcd1b125aa8f31e7828a81082b", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("958c9b905c0c0b436021a64c7efd71e3", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "bed7538e97a44c993e0d96ad58291ca0", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("4dac5171dcd52e888dec970cf24723c2", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "bed7538e97a44c993e0d96ad58291ca0", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("103305bf775fc3bbbb20e52a9c808c0f", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("3e8bd20396fd53e63bb702b0692d2014", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("58f4145a5977748088c6056271c3108c", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "50bae4d47d12fa0cf23403a12f34be0d", "7660f396c3caa5447be21c31926826eb", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("68aae2d90325cad7fff58de9bc9db0b3", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "50bae4d47d12fa0cf23403a12f34be0d", "7660f396c3caa5447be21c31926826eb", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("f49040e5b7a2b67c30040a3bd08a2fd3", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "50bae4d47d12fa0cf23403a12f34be0d", "b9f6210dd170ef59367e75bc517a6b6d", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("001691bbbcc42700ee0a2057ef4d19e3", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "50bae4d47d12fa0cf23403a12f34be0d", "b9f6210dd170ef59367e75bc517a6b6d", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("6d39b53e31c8f1668ee3ec27f81024f6", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "50bae4d47d12fa0cf23403a12f34be0d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("17bf6ab27bf53d1c6dd5d18412b3eab6", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "50bae4d47d12fa0cf23403a12f34be0d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("93370f38deca5844b689021cc0b197dc", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "1c867c0c756b35bc24301b0403fa556a", "27e8fb300d2e15439dfa1dd33490f077", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("fc40e5d740575c5f94650a45a5a175a8", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "1c867c0c756b35bc24301b0403fa556a", "27e8fb300d2e15439dfa1dd33490f077", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("4ecd541c168d318b3dc528ca962301b8", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "1c867c0c756b35bc24301b0403fa556a", "4e076263d64a22d6d210ae4787e7a104", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("cb2eb5f3510ac7b4225976a022e0c7c0", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "1c867c0c756b35bc24301b0403fa556a", "4e076263d64a22d6d210ae4787e7a104", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("95a5aaba2bd49ed674ccf9bf1cca2f7c", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "1c867c0c756b35bc24301b0403fa556a", "bed7538e97a44c993e0d96ad58291ca0", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("689f50b1dad1f0bda52967b3202a5358", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "1c867c0c756b35bc24301b0403fa556a", "bed7538e97a44c993e0d96ad58291ca0", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("3ff70142a978b5cfcccefee6e83765eb", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "d8022de243b4ce12b64f03a48158d39f", "d4b91e74ffad93c6d42ba32bd19964ab", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("eb2bb980823c12f17be688c1783913a3", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "d8022de243b4ce12b64f03a48158d39f", "d4b91e74ffad93c6d42ba32bd19964ab", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("8771c20ff102a467202b37d5b54d7fb7", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("df9c04352250b546cd720efe71ac9684", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("3421a84f67c1d200781cd9084a40acb4", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("9ecf9c250c5ab43c67e3cdd003710241", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("11b7e9850d5d7f37c6b861bfbfd545f0", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("909af902b46def50f98be51d610dec99", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("14b783e790b862705fe323a33b045709", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "558dc5761abfa074e9b9f6ef52499a4d", "b9f6210dd170ef59367e75bc517a6b6d", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("c2107da5604d28ff0d555c37668c72fb", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "558dc5761abfa074e9b9f6ef52499a4d", "b9f6210dd170ef59367e75bc517a6b6d", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("758dc6a636c99a557ae117ba4eda4d00", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "558dc5761abfa074e9b9f6ef52499a4d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("f80e83d068643fbab181e18f84b302c6", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "558dc5761abfa074e9b9f6ef52499a4d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "2", "2");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("75711a49e9b65a1cf60804d3d9c64c2c", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "bde10f1a1c67d455e5fccc6cd6ff454c", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("61881bf37b448f239f61ad4d039b92f1", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "bde10f1a1c67d455e5fccc6cd6ff454c", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("7e7dac7ff87ab8d60a2ea1a807163418", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("49b749f318f3691bced09172c8bed4d5", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("7704f7c0328b6e00f66bb0441dc902d4", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "54e17b0ce8f7fa8c75399919594153c0", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("3219714c680f30de52884f04c34c964b", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "4598dd5b9ac644eaec4af76c548743be", "54e17b0ce8f7fa8c75399919594153c0", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("7e4319ab067e61a76db65fdf52b7ddfc", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "66d09c638cc3d0064f75273fcd980c37", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("8f84706a7ac51f983889112267cf97c6", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "66d09c638cc3d0064f75273fcd980c37", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("ef00532b04f6a82584179cda9788dd75", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "be65211a111e6f018e1c0d44e39a886b", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("c0b13391efeb66ee6edf7dfa1a0ba9ba", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "be65211a111e6f018e1c0d44e39a886b", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("f24d6cadd8150a4c69b350892d2dff60", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "d4b91e74ffad93c6d42ba32bd19964ab", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("c8380844c7d817a01837f66912f40d21", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "d8022de243b4ce12b64f03a48158d39f", "d4b91e74ffad93c6d42ba32bd19964ab", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("17f6ef6fdf58594a975896dfe322ffe8", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "27e8fb300d2e15439dfa1dd33490f077", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("2303b558f7431f8acb79d4cf53bd2453", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "27e8fb300d2e15439dfa1dd33490f077", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("d40e83c5855f748ca12f2607dd8836ca", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "975810d067c0ef3c0eeb0e816618b1c7", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("f59f71a6229e782df650c5b764618b66", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "975810d067c0ef3c0eeb0e816618b1c7", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("2b6a59e8117ed2020a18b1751cbec9ae", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "4e076263d64a22d6d210ae4787e7a104", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("6b36781c239ba9a0539fac57acc682de", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "4e076263d64a22d6d210ae4787e7a104", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("e868ae66578cc15c72c1fb14597c652b", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "b9f6210dd170ef59367e75bc517a6b6d", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("d0beab5b0b8c962fe46770eb5ab10ad3", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "fc76ca9f6ebcf0f34ab21b55cefdb912", "b9f6210dd170ef59367e75bc517a6b6d", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("0d9b5146549eb7f8f19d5d9c4fea9220", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "1c867c0c756b35bc24301b0403fa556a", "b9f6210dd170ef59367e75bc517a6b6d", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("525be48238056295c427d260066a6c79", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "1c867c0c756b35bc24301b0403fa556a", "b9f6210dd170ef59367e75bc517a6b6d", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("50408f91ac7559877ec6c372e0720848", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "1c867c0c756b35bc24301b0403fa556a", "049909dcd1b125aa8f31e7828a81082b", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("f26cc6d91846fa4a4cd122e2a158c3cd", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "1c867c0c756b35bc24301b0403fa556a", "049909dcd1b125aa8f31e7828a81082b", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("535251b583a4f09af6c78a54388e876e", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "ec5a224ccc0e8c42b34814d6fa12ab2d", "bed7538e97a44c993e0d96ad58291ca0", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("7b3eb1ae24bb4bbfa2e6ff759a69d5ad", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "ec5a224ccc0e8c42b34814d6fa12ab2d", "bed7538e97a44c993e0d96ad58291ca0", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("a45736ef10e70f085d10eb28ed6cbb72", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "ec5a224ccc0e8c42b34814d6fa12ab2d", "018a837ada187ec6946959d935771197", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("4698e0668d56406e051341291073ad61", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "ec5a224ccc0e8c42b34814d6fa12ab2d", "018a837ada187ec6946959d935771197", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("ca89ff10e915c437a97bdd6f63543da7", "b060de380c57384744177849d22fb584", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "ec5a224ccc0e8c42b34814d6fa12ab2d", "8c9f757755e694a60e60941b26a65842", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("052ec59315e0b32e01e0895d15bc9c6d", "900e28393edf271632735d0bb6e9b31c", "2df89d4a12f44a5cc897d6814760687d", "1c217606333ac983b8760baf64cd8b8a", "ec5a224ccc0e8c42b34814d6fa12ab2d", "8c9f757755e694a60e60941b26a65842", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("97b66cfc11b8b5e3ef586c542ef536fe", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "c89e31c6134d92194320f6661e446dfb", "d221fd2b58013904da10fad8d232571f", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("018bc8a5abb0e9e02e27d4c05b65a643", "b060de380c57384744177849d22fb584", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "c89e31c6134d92194320f6661e446dfb", "bde10f1a1c67d455e5fccc6cd6ff454c", "1", "1");
INSERT INTO ulangan_jml (kd, kd_smt, kd_kelas, kd_program, kd_mapel, kd_aspek, jml_hr, jml_akhir) VALUES("849bef67ba0ed255afcbfdf6c7991df3", "900e28393edf271632735d0bb6e9b31c", "27de8f38a90dd1755acd801abefcbb42", "9d768710c2d056869f252b7a59a84c8c", "c89e31c6134d92194320f6661e446dfb", "bde10f1a1c67d455e5fccc6cd6ff454c", "1", "1");


#
# Table structure for table 'ulangan_rata'
#

CREATE TABLE ulangan_rata (
  kd varchar(50) NOT NULL default '',
  kd_siswa_kelas varchar(50) NOT NULL default '',
  kd_smt varchar(50) NOT NULL default '',
  kd_mapel varchar(50) NOT NULL default '',
  kd_aspek varchar(50) NOT NULL default '',
  nilkd char(3) NOT NULL default '',
  nilai char(3) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'ulangan_rata'
#

INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("02fe178d8ef408aa29331b5749664c2f", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "NH1", "26");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("5d43943ef8b3cbb63d45fcc48bce10a6", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "NH1", "66");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("54fcdc621cfb6455f5f219796567e5aa", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH1", "03");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("c95a92ca46099bf8e98cea89d720213b", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("2b64ab6e9c6b9f45f72c3a5e2e290072", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "ec5a224ccc0e8c42b34814d6fa12ab2d", "bde10f1a1c67d455e5fccc6cd6ff454c", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("f6756247f932d6b8323b31f24122995b", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "ec5a224ccc0e8c42b34814d6fa12ab2d", "bde10f1a1c67d455e5fccc6cd6ff454c", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("9608df4974fb974f989609a15f362956", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("ffecd50f2f5b85a498e56ee279a31200", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("d18a3d00925bb2e85aa293ddad3c9468", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH1", "03");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("3f10608aa0b588a9efd58f7e4bd967c6", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "1c867c0c756b35bc24301b0403fa556a", "bde10f1a1c67d455e5fccc6cd6ff454c", "NH1", "45");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("899722a4ef54c8b3f554da7670ad3e9b", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "1c867c0c756b35bc24301b0403fa556a", "bde10f1a1c67d455e5fccc6cd6ff454c", "NH1", "34");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("5e3b0463eebd1ea8e5f48a4baaa781ca", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "6e09ea4152ea4e26c83f7d60c3c37be6", "7660f396c3caa5447be21c31926826eb", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("08dcf8839190dd962a3cd252390b7be2", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "6e09ea4152ea4e26c83f7d60c3c37be6", "7660f396c3caa5447be21c31926826eb", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("0dd35e7f2b9d64401092fbf0bdf7d325", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "NH2", "13");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("69bf52bf8dc98b4a343db2b76d98a2ed", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "NH3", "28");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("0dd35e7f2b9d64401092fbf0bdf7d325", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH2", "06");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("69bf52bf8dc98b4a343db2b76d98a2ed", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH3", "09");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("0dd35e7f2b9d64401092fbf0bdf7d325", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "NH2", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("69bf52bf8dc98b4a343db2b76d98a2ed", "4996201dc16847071cbbc69cfdd44260", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "NH3", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("5d75d12a8827fd94e4fd630fa1b46180", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "NH2", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("10c92e05e53e1a5158cbb5018144c32e", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "81d540c32ddfdc137137902fdd5743fa", "NH3", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("5d75d12a8827fd94e4fd630fa1b46180", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH2", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("10c92e05e53e1a5158cbb5018144c32e", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "049909dcd1b125aa8f31e7828a81082b", "NH3", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("5d75d12a8827fd94e4fd630fa1b46180", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "NH2", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("10c92e05e53e1a5158cbb5018144c32e", "7c3a68f7ad86846a2f9764361d3566dd", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "d1c6bb83c5df33bc1ace0ef2ee26a6cb", "NH3", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("447a3599b11739af3501cdbf238ed08d", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH2", "06");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("85c3930f8f7f0116feefb2b379c54fc0", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH1", "09");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("487dadd1cc6e90b257ef44f8d7a73de8", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH2", "06");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("6efd1c479fcc295d5f0bf3c5a06e0aa1", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "NH1", "04");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("8429af5e748c3bc66ca9f96e4532ec0d", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "81d540c32ddfdc137137902fdd5743fa", "NH1", "09");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("bd7bdfc7532ceca36c15a46a20e7b50b", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "NH1", "09");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("c5937629e691bfc85794100180502b3a", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d221fd2b58013904da10fad8d232571f", "NH1", "06");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("787ce4d02c3769b79d9381ff2e10fe20", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "50bae4d47d12fa0cf23403a12f34be0d", "7660f396c3caa5447be21c31926826eb", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("f255c302ae3baba03f0388a99cacf0d8", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "50bae4d47d12fa0cf23403a12f34be0d", "7660f396c3caa5447be21c31926826eb", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("0842cfca19ce233b1098d1c7f6a076d9", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d4b91e74ffad93c6d42ba32bd19964ab", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("a7e09b36cbf49757851e536f29fade38", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "d8022de243b4ce12b64f03a48158d39f", "d4b91e74ffad93c6d42ba32bd19964ab", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("5055acd488cfc5958bf5da7872eba32e", "f78e58e3d8d18775f418762e9426b43d", "b060de380c57384744177849d22fb584", "50bae4d47d12fa0cf23403a12f34be0d", "b9f6210dd170ef59367e75bc517a6b6d", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("9140aeb3e955b68cee075c6f41a405cf", "e0ddb27a1258a4cd5fe31f5f0f3413ad", "b060de380c57384744177849d22fb584", "50bae4d47d12fa0cf23403a12f34be0d", "b9f6210dd170ef59367e75bc517a6b6d", "NH1", "00");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("5b8b650e1d27d89c0154f2fd1db7f75f", "d1bb4677907c3066abba8f8f7b0d3434", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH1", "07");
INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, kd_mapel, kd_aspek, nilkd, nilai) VALUES("e96c7745de491365224f022c5df694a7", "d1bb4677907c3066abba8f8f7b0d3434", "b060de380c57384744177849d22fb584", "558dc5761abfa074e9b9f6ef52499a4d", "7660f396c3caa5447be21c31926826eb", "NH2", "89");
