Sistema de Gestión de Eventos y Reservas
Roles en la Organización de Eventos
- Administrador de Reservas: Responsable de gestionar todas las reservas. Sus tareas incluyen la edición, cancelación y modificación de las reservas existentes.
- Encargado de Reservas: Actúa como el punto de contacto principal con los clientes. Se encarga de recibir los pagos correspondientes y de mantener actualizada la lista de invitados asociada a cada reserva.
- Encargado de Revisión: Su función es garantizar que cada mesa reservada tenga un único titular. Debe verificar que no haya duplicados en los nombres de los clientes.
- Encargado de Control en Puerta: Supervisa el ingreso de los clientes en el evento utilizando un código QR que se proporcionará a cada asistente, junto con los datos necesarios para el control de acceso.
- Encargado de Control de Pagos: Se asegura de que todos los pagos estén completados y confirmados antes del evento, evitando cualquier inconveniente en el proceso de acceso.
- Encargado de control de entrega de consumo: Su función controlar la entrega del consumo con el QR de un solo uso por mesa.
- Personal administrativo de control de reportes: Su tarea es ver las reservas asociadas y ver las visitas en vivo.
Requerimientos del Sistema
- pantalla de Registro de Usuarios: Permite la creación y gestión de perfiles de usuarios en el sistema.
- pantalla de Administración de Espacios y Mesas: Facilita la organización y división de los distintos espacios y sectores del lugar donde se llevará a cabo el evento.
- pantalla de Personal Encargado de Gestión de Reservas: Relacionadores responsables de la atención y seguimiento de las reservas, solo pueden ver sus reservas que hicieron y cuando ya no pueden hacer mas reservas.
- pantalla de para parámetros para reservas: El administrador establece los parámetros del sistema, como precios, número de mesas, capacidad de asistentes por mesa, numero de sectores, capacidad, bebidas disponibles para las reservas, mensaje personalizado para el gafete del QR.
- pantalla de Invitados por Mesa: Permite la gestión y registro de los invitados asignados a cada mesa, como del consumo elegido para esa mesa,  gestionado por Encargado de Reservas, donde al realizar la reserva debe generar un QR por invitado con su nombre completo, CI, fecha de nacimiento, mesa, sector, el QR debe generarse por tipo de mesa en modo gafete en PDF con un arte personalizado que se subirá cada semana los datos del QR deben estar al medio del gafete, también debe generar un gafete por cada consumo que es de uso único, con los datos de consumo, mesa, sector, y al final tener un mensaje personalizado de advertencia de condiciones de la mesa que se define en la pantalla de parámetros; y debe tener notificación de al momento de realizar la reserva debe estar cancelado en su totalidad, y darle un mensaje que el es encargado de proporcionar los pdf a los invitados.
- Pantalla de Determinar el Sector de Reserva: Ayuda a identificar y seleccionar el sector correspondiente para cada reserva va de la mano de la pantalla de Invitados por Mesa.
- Pantalla de lectura Códigos QR por Asistente: es una pantalla donde solo los encargados de control de puertas pueden abrir su celular y en el navegador web pueden leer el QR de asistencia, que es de uso unico.
- función de Búsqueda de Clientes: Permite localizar rápidamente a los clientes en el sistema para facilitar el autocompletado en la pantalla de invitados por mesa.
- Pantalla de Asistencia General: Contador que registra el total de asistentes al evento.
- Pantalla de Calendario de Eventos: Visualiza y gestiona las fechas y horarios de los eventos programados donde debe requerir los parámetros del sistema por fecha.
- pantalla de generación de reportes por eventos en resumen: Genera informes sobre la actividad y asistencia de cada evento.
- Pantalla de detalle de Invitados: Gestión de los datos de los invitados asociados a cada reserva.
- pantalla de Asignación de Permisos: Asigna diferentes permisos a los usuarios del sistema, un usuario puede tener varios permisos a distintas pantallas.
- pantalla de Contabilización y Asistencias en Vivo: Muestra el contador de asistentes y permite registrar las asistencias.
- pantalla de Historial de Reservas: Muestra el historial de reservas realizadas.
- pantalla de Reportes y Estadísticas: Genera reportes y estadísticas de reservas y asistencias.
- pantalla de Autenticación y Autorización: Autentica y autoriza a los usuarios para acceder al sistema.
- pantalla de Registro de Accesos: Registra los accesos, altas, bajas y modificaciones realizadas en el sistema.
- pantalla de Registro Público: Permite a las personas registrarse y obtener un QR de asistencia sin necesidad de reserva.

Sistema de Reserva de Mesas en Sectores
Requisitos

- Desarrollar un sistema OpenSource en PHP para hacer reservas de mesas en sectores.
- El sistema debe ser personalizable en el módulo de parámetros con el número de sectores, mesas por sector y capacidad de personas por mesa.
- Solo personas específicas encargadas de las reservas pueden hacer reservas y registrar a los asistentes.
- Los clientes no pueden reservar directamente, solo los encargados de reservas una vez confirmado el pago de esta.
