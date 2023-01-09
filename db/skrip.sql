create database sip_sanjaya14;

use sip_sanjaya14;

create table buku(
kode_buku varchar(100) not null primary key,
judul_buku varchar(200) not null,
pengarang_buku varchar(200),
penerbit_buku varchar(200),
thn_terbit_buku int,
klasifikasi_buku varchar(100),
bahasa_buku enum('indonesia','asing'),
sumber_asal_buku enum('beli','bantuan'),
harga_buku int,
jumlah_buku int,
jenis_buku enum('fiksi','agama','ppkn','bindo','bing','mtk','ekak','sej','sos','geo','senbud','tik','pkwu','pjok','bio','fis','jawa')
);

create table anggota(
id_anggota int not null primary key,
nama_anggota varchar(200) not null,
alamat_anggota varchar(200),
no_telp_anggota varchar(15),
foto_anggota varchar(200)
);

create table transaksi(
kode_transaksi varchar(200) not null primary key,
id_anggota int not null,
foreign key (id_anggota) references anggota(id_anggota)
);

create table detail(
kode_detail int not null primary key auto_increment,
kode_transaksi varchar(200) not null,
kode_buku varchar(100) not null,
tgl_pinjam date,
tgl_deadline date,
tgl_kembali date,
status enum('1', '0'),
foreign key (kode_transaksi) references transaksi(kode_transaksi),
foreign key (kode_buku) references buku(kode_buku)
);

create table user(
id_user int not null primary key auto_increment,
username varchar(100) not null,
password varchar(200) not null
);

INSERT INTO `user`(`id_user`, `username`, `password`) VALUES (null,'admin','admin');
