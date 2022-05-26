
CREATE TABLE api_tokens (
    `token` varchar(512) NOT NULL,
    `create_date` timestamp DEFAULT now(),
    `owner` varchar(128) NULL DEFAULT NULL,
     usage_count INT(11) DEFAULT 0, 
     last_used_on datetime NULL DEFAULT NULL,
    PRIMARY KEY (`token`)
  );
  

  INSERT INTO api_tokens (token, owner) VALUES 
  ('QkgAVGXuebE9beJEV6iaMKRWf4eDAtALwi9FibuXvR37HYqEJuQKmVdv9eUEyx88','NSLS'),
  ('3o2fQgpAfxmQhPDsvhDThhyDMZZ7bRh7VcUGAn24UYJWnjVFDtnfZk77Go6NxB62','NSLS');


