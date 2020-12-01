use crudpelicula;
--


INSERT INTO `peliculas` (`id`, `nombre`, `fechapublicacion`, `estado`, `turno`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'X Men: Dias del Futuro pasado', '2020-11-05', 'Activo', '15:30:00', 'uploads/Jhw332hmUJcYkduyPlqrAHgWqLznNOPBjRREN9wJ.jpeg', '2020-11-15 22:50:00', '2020-11-16 05:37:20'),
(2, 'Alicia en el Pais de las Maravillas', '2020-11-04', 'Inactivo', '16:00:00', 'uploads/wbxNSkZLfG3k0YTElONBHVIOwnQUlo309bkv6crn.jpeg', '2020-11-15 22:50:58', '2020-11-16 05:37:30'),
(3, 'Locos de Amor', '2020-02-19', 'Inactivo', '16:00:00', 'uploads/XA3sLBgiz3FaoyALu9YBDCbRhYBxm0VblFzYIF0e.jpeg', '2020-11-15 22:51:39', '2020-11-16 05:37:38'),
(4, 'Tortugas Ningas 2', '2020-11-12', 'Inactivo', '16:00:00', 'uploads/AHTycldbVdqLgSIwFaUrIpO26j2rsmk0rMJUecsm.jpeg', '2020-11-15 22:52:16', '2020-11-16 03:17:22');

-- --------------------------------------------------------


INSERT INTO `turnos` (`id`, `turno`, `estado`, `created_at`, `updated_at`) VALUES
(1, '13:30:00', 'Activo', '2020-11-15 22:48:26', '2020-11-15 22:48:26'),
(2, '15:00:00', 'Inactivo', '2020-11-15 22:48:33', '2020-11-15 22:48:33'),
(3, '15:30:00', 'Activo', '2020-11-15 22:48:42', '2020-11-15 22:48:42'),
(4, '16:00:00', 'Activo', '2020-11-15 22:48:48', '2020-11-15 22:48:48');

-- --------------------------------------------------------

