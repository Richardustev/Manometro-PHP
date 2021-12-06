SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `manometro` (
  `id` int(50) NOT NULL,
  `valor_medicion` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `pozo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `manometro` (`id`, `valor_medicion`, `fecha`, `pozo`) VALUES
(1, '12.00', '2021-12-03 19:34:00', 'pozo-1'),
(2, '13.00', '2021-12-03 19:34:00', 'pozo-2'),
(3, '0.05', '2021-12-03 20:36:00', 'pozo-1'),
(4, '14.00', '2021-12-06 17:08:00', 'pozo-1');

CREATE TABLE `pozo` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pozo` (`id`, `nombre`) VALUES
(1, 'pozo-1'),
(2, 'pozo-2'),
(3, 'pozo-3'),
(4, 'Pozo-4');

ALTER TABLE `manometro`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pozo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `manometro`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `pozo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
