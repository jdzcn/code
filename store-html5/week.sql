SELECT * from store where date between datetime(date(datetime('now',strftime('-7 day','now'))),'+1 second')     
 
and datetime(date(datetime('now',(6 - strftime('7 day','now'))||' day','1 day')),'-1 second')    