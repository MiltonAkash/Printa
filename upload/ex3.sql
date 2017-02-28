drop table item_list;
drop table receipts; 
drop table products;
drop table customers;
create table customers(
 cid number(3) primary key,
 fname varchar2(15),
 lname varchar2(15));


  create table products(
  pid varchar2(20) primary key,
  flavor varchar2(12),
  food varchar2(12),
  price number(5,2));


 create table receipts
 (rno number(6) primary key,
 rdate date,
 cid number(3),
 constraint cid_fk foreign key(cid)
 references customers(cid));

 
 create table item_list(
 rno number(6),
 ordinal number(2),
 item varchar2(20),
 constraint rno_fk foreign key(rno) 
 references receipts(rno),
 constraint rno_cpk primary key(rno,ordinal),
constraint item_fk foreign key(item)
references products(pid));



