REM 1. Display the food details that is not purchased by any of customers.

select * 
from products 
where pid NOT IN (select item 
                 from item_list);

REM 2. Show the customer details who had placed more than 2 orders on the same date

select *
from customers
where cid in (select cid 
              from receipts 
	     having count(*)>2 
             group by(cid,rdate));

REM 3. Display the products details that is ordered for maximum by the customers

 select * 
 from products 
 where pid=(select item from item_list 
            group by item
             having count(*)=(select count(*)
                              from item_list
                              group by item
                              having count(*)>= all(select count(*)
                                                    from item_list
                                                    group by item)));

REM 4.Show the number of receipts that contain the product whose price is more than the average price of its food.

select count(distinct rno ) as "number of reciepts" 
from item_list 
where item in (select pid 
              from products outer 
               where price> (select avg(price)
                             from products 
                             group by food 
                             having food=outer.food));

REM 5.Display the customer details along with receipt number and date for the receipts that are dated on the last day of the receipt month 

select * from Customers
natural join (select rdate, cid
from receipts
where rdate=LAST_DAY(rdate));
            
REM 6.Display the receipt number(s) and its total price for the receipt(s) that contain Twist as one among five items. Include only the receipts with total price more than $25.

select i.rno, sum(price)
from item_list i, products p
where p.pid=i.item  and i.rno in
(select rno
from item_list
where item=(select pid 
            from products
            where food='Twist'))
group by i.rno
having sum(price)>25 and count(ordinal)=5;



REM 7.Display the details (customer details, receipt number, item) for the product that was purchased by the least number of customers.

select * 
from Customers c, Receipts r, item_list i
where c.cid=r.cid and i.rno=r.rno and i.item in(select item
                                                from item_list 
                                                having count(*) =(select min(count(*)) 
                                                                  from item_list group by item)
                                                                  group by item);



REM 8.Display the customer details along with the receipt number who ordered all the flavors of Meringue in the same receipt.

select c.cid,lname,fname,rno
from customers c,receipts r
where c.cid=r.cid and r.rno in(select rno 
                               from receipts 
                               where rno in(select rno 
                                            from item_list 
                                            join products on (pid = item )where item in(select pid 
                                                                                        from products 
                                                                                        where food='Meringue') 
                                                                                        group by rno having count(distinct item)=(select count(distinct flavor )
                                                                                                                                  from products 
                                                                                                                                  where food='Meringue'))) ;

REM 9.Display the product details of both Pie and Bear Claw.

select * from products
where food='Pie'
UNION
select * from products
where food='Bear Claw';

REM 10.Display the customers details who havent placed any orders

select *  
from customers 
minus (select * from customers
        where cid in( select cid 
                      from receipts ));

REM 11.Display the food that has the same flavor as that of the common flavor between the Meringue and Tart.

select food
from products
where flavor IN (select flavor 
                 from products 
                 where food ='Tart'
                 INTERSECT
                 select flavor 
                 from products
                 where food='Meringue') 
and food not in ('Tart','Meringue');
