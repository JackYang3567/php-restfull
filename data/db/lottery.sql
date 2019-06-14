-- select * from code where to_days(time) = to_days(now())  &&  type like '%ks%'
-- select * from code where to_days(time) = to_days(now())  &&  type in ('bj28','jnd28')
-- select t.type_name as name ,p.*  from payamount p left join lottery_type t on p.type_id = t.id
-- select * from lottery_type
-- select l.name ,c.expect, c.code , c.time
-- from lottery l left join code c  on l.code = c.type  
-- left join lottery_type t on t.Id= l.type_id
-- where l.type_id = 7 && to_days(time) = to_days(now())

-- select * from code order by time desc
-- select * from lottery where type_id = 7
-- select * from lottery where code='bj28'
-- select * from code where  type='bj28' order by time desc limit 1
-- SELECT * FROM `lottery` WHERE `code` in (bj28,jnd28)

-- 支付金额设置
-- select * from code where DATE_SUB(CURDATE(), INTERVAL 3 DAY) <= date( time) -- 最近三天（今天，昨天，前天）
-- 会员member

 -- 访问api的token
 
 -- select * from payment
 -- select * from payment order by Id desc
 -- 支付payment
 -- 支付方式
 
 -- 支付payment
