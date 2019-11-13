create table gudang(
    kode_gudang int(11) primary key not null,
    nama_gudang varchar(50) not null,
    lokasi varchar(50) not null
);

create table barang(
    kode_barang int(11) primary key not null,
    nama_barang varchar(50) not null,
    kode_gudang int(11) not null,
    foreign key(kode_gudang) references gudang(kode_gudang) on delete cascade on update cascade
);