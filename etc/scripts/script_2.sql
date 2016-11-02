ALTER TABLE  `encontrista` ADD  `Justificativa` VARCHAR( 500 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;

UPDATE `encontrista` SET `Remedio`='Sim' where `Remedio`=1
UPDATE `encontrista` SET `Remedio`='Não' where `Remedio`=0

INSERT INTO  `retiro`.`comunidade` (`IdComunidade` ,`Nome`)
VALUES 
 ('1',  'Cristo Rei'),
 ('2',  'Jesus Ressuscitado'), 
 ('3',  'Nossa Senhora do Rosário'),
 ('4',  'Sagrada Família'), 
 ('5',  'Santa Clara de Assis'), 
 ('6',  'Santuário'), 
 ('7',  'São Benedito'), 
 ('8',  'São Marcos'), 
 ('9',  'São Sebastião');

 
UPDATE `encontrista` SET `Comunidade`='1' where `Comunidade`='Cristo Rei';
UPDATE `encontrista` SET `Comunidade`='2' where `Comunidade`='Jesus Ressuscitado';
UPDATE `encontrista` SET `Comunidade`='3' where `Comunidade`='Nossa Senhora do Rosário';
UPDATE `encontrista` SET `Comunidade`='4' where `Comunidade`='Sagrada FamÃ­lia';
UPDATE `encontrista` SET `Comunidade`='5' where `Comunidade`='Santa Clara de Assis';
UPDATE `encontrista` SET `Comunidade`='6' where `Comunidade`='Santuário';
UPDATE `encontrista` SET `Comunidade`='7' where `Comunidade`='SÃ£o Benedito';
UPDATE `encontrista` SET `Comunidade`='8' where `Comunidade`='SÃ£o Marcos';
UPDATE `encontrista` SET `Comunidade`='9' where `Comunidade`='SÃ£o SebastiÃ£o';

