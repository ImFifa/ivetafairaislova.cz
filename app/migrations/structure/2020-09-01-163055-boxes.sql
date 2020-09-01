
CREATE TABLE IF NOT EXISTS `boxes` (
                         `id` int NOT NULL,
                         `name` varchar(150) NOT NULL,
                         `note` varchar(255) NOT NULL DEFAULT '',
                         `content` mediumtext NOT NULL,
                         `base` int NOT NULL DEFAULT '0',
                         `hide` int NOT NULL DEFAULT '0',
                         `lang` varchar(2) NOT NULL DEFAULT 'cs'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `boxes` (`id`, `name`, `note`, `content`, `base`, `hide`, `lang`) VALUES
(1, 'about', '', '<p>Ke sportu jsem měla blízko už odmalička. Rodiče mě vedli k tomu, abych si vybrala sport, který mi bude přinášet radost.</p>\n<p>Už ve školce mě bavilo plavání. Při nástupu do první třídy jsem začala plavat za PK Příbram. Nejdříve jsem jenom plavala a pak se k tomu postupně přidala atletika a tenis. Několik let jsem dělala všechny tři sporty najednou, ale nakonec zvítězilo plavání, kterému se věnuji závodně až dosud.</p>\n<p>K triatlonu jsem se dostala vlastně náhodně. Při letních prázdninách, když nejsou plavecké tréninky, jsem se tak trochu nudila. Nedaleko od Příbrami se pořádal dětský triatlonový závod a tak jsem se rozhodla to vyzkoušet. Plavat a běhat jsem uměla dobře a kolo nebylo velký problém. První triatlon jsem absolvovala v 8 letech. Ze začátku jsem jezdila na triatlony jen o prázdninách. Kam jsem jela, tam jsem zvítězila a tak jsem se v roce 2013 zúčastnila MČR a v kategorii starších žákyň jsem získala mistrovský titul a tak to všechno začalo. Už tam mě před závodem oslovil Honza Vaněk, který je od té chvíle mým trenérem.</p>', 0, 0, 'cs'),
(2, 'achievement01', '', '<p><span><strong>5</strong><br />Mistryně ČR</span></p>', 0, 0, 'cs'),
(3, 'achievement02', '', '<p><span><strong>3</strong><br />Vítězka ČP</span></p>', 0, 0, 'cs'),
(4, 'achievement03', '', '<p><span><strong>2</strong><br />Mistrovství světa</span></p>', 0, 0, 'cs');
INSERT INTO `boxes` (`id`, `name`, `note`, `content`, `base`, `hide`, `lang`) VALUES
(5, 'achievement04', '', '<p><span><strong>TOP 10</strong><br />Mistrovství Evropy</span></p>', 0, 0, 'cs');
