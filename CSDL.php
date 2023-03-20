<?php
    include 'Connect.php' ;
    $conn=MoKetNoi();
    if($conn->connect_error)
    {
        echo "không kết nối được MySQL";
    }
   
    $sql="CREATE DATABASE IF NOT EXISTS  DE AN";
    if(!mysqli_query($conn,$sql))
    {
            echo "không tạo được database De an  ".mysqli_error($conn);
    }
    mysqli_select_db($conn,"BAI12");
    $NGUOIDUNG = "CREATE TABLE IF NOT EXISTS user(
        username varchar(200) NOT NULL,
        password varchar(200) NOT NULL,
        name varchar(200) NOT NULL,
        address varchar(200) NOT NULL,
        phone int default 0,
        email varchar(200) NOT NULL,
        PRIMARY KEY (username,phone))";
    $results = mysqli_query($conn, $NGUOIDUNG) or die(mysqli_error($conn));
    
    $LOAI = "CREATE TABLE IF NOT EXISTS loai (
        maloai varchar(20) primary key,
        tentheloai nvarchar(200) not null)";
    $results = mysqli_query($conn,$LOAI)or die (mysqli_error($conn));

    $TACGIA = "CREATE TABLE IF NOT EXISTS nhasanxuat (
        mansx varchar(20) primary key,
        tennsx nvarchar(200) not null)";
    $results = mysqli_query($conn,$TACGIA)or die (mysqli_error($conn));


    $SACH = "CREATE TABLE IF NOT EXISTS products (
        product_code varchar(20) primary key,
        product_name nvarchar(200) not null,
        product_year int default 0,
        image varchar(200) not null,
        tentheloai varchar(20) not null,
        mansx varchar(20) not null)";
    $results = mysqli_query($conn,$SACH)or die (mysqli_error($conn));

    $DataLOAI="INSERT INTO LOAI (MATL,TENTL)". 
                "VALUES ('VH','Văn học'),".
                "('KT','Kinh tế')";
    $results = mysqli_query($conn,$DataLOAI) or die (mysqli_error($conn));

    $DataNHAXUATBAN="INSERT INTO NHAXUATBAN (MANXB,TENNXB)". 
                "VALUES ('XB01','Nhà xuât bản văn học'),".
                "('XB02','Nhà xuât bản trẻ'),".
                "('XB03','Nhà xuất bản kinh tế'),".
                "('XB04','Nhà xuất bản giáo dục Việt Nam')";
    $results = mysqli_query($conn,$DataNHAXUATBAN) or die (mysqli_error($conn));

    $DataTACGIA="INSERT INTO TACGIA (MATG,TENTG)". 
                "VALUES ('TG01','Ernest Hemingway'),".
                "('TG02','Hector Malot'),".
                "('TG03','Antoine de Saint'),".
                "('TG04','Trần Thị Ngân Tuyến'),".
                "('TG05','Nguyễn Trọng Hoài'),".
                "('TG06','Nhiều tác giả')";
    $results = mysqli_query($conn,$DataTACGIA) or die (mysqli_error($conn));

    $DataSACH="INSERT INTO SACH (MASACH, TUASACH, NAMPHATHANH, HINH, MANXB, MATL,MATG)". 
    "VALUES ('VH01','Ông già và biển cả',1952,'Hinh_Bai12/s1.png','XB01','VH','TG01'),".
    "('VH02','Không gia đình',1878,'Hinh_Bai12/s2.jpg','XB01','VH','TG02'),".
    "('VH03','Hoàng tử bé',1943,'Hinh_Bai12/s3.jpg','XB01','VH','TG03'),".
    "('VH04','Ông già và biển cả',1952,'Hinh_Bai12/s1.png','XB01','VH','TG01'),".
    "('VH05','Không gia đình',1878,'Hinh_Bai12/s2.jpg','XB01','VH','TG02'),".
    "('VH06','Hoàng tử bé',1943,'Hinh_Bai12/s3.jpg','XB01','VH','TG03'),".
    "('VH07','Ông già và biển cả',1952,'Hinh_Bai12/s1.png','XB01','VH','TG01'),".
    "('VH08','Không gia đình',1878,'Hinh_Bai12/s2.jpg','XB01','VH','TG02'),".
    "('VH09','Hoàng tử bé',1943,'Hinh_Bai12/s3.jpg','XB01','VH','TG03'),".
    "('KT01','Từ tốt đến vĩ dại',2023,'Hinh_Bai12/s4.jpg','XB02','KT','TG04'),".
    "('KT02','Kinh tế phát triển',2023,'Hinh_Bai12/s5.jpg','XB03','KT','TG05'),".
    "('KT03','Kinh tế vĩ mô',2009,'Hinh_Bai12/s6.jpg','XB04','KT','TG06'),".
    "('KT04','Từ tốt đến vĩ dại',2023,'Hinh_Bai12/s4.jpg','XB02','KT','TG04'),".
    "('KT05','Kinh tế phát triển',2023,'Hinh_Bai12/s5.jpg','XB03','KT','TG05'),".
    "('KT06','Kinh tế vĩ mô',2009,'Hinh_Bai12/s6.jpg','XB04','KT','TG06')";
$results = mysqli_query($conn,$DataSACH) or die (mysqli_error($conn));

    DongKetNoi($conn);
