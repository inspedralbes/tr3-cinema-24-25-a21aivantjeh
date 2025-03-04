# 🎬 Cinema-App

## 📋 Documentació

### 🎯 Objectius
Desenvolupar una aplicació web intuïtiva i eficient que permeti als usuaris comprar entrades per a un cinema. La plataforma ha de permetre la consulta de la cartellera de pel·lícules, la selecció de butaques disponibles i la compra d'entrades en línia. L’aplicació proporcionarà una experiència d’usuari òptima tant per a espectadors com per a l’administració del cinema, facilitant la gestió de la projecció de pel·lícules diàries i l’optimització dels recursos.

### 🏛️ Arquitectura Bàsica

#### 🔧 Tecnologies Utilitzades
- **Frontend**: Vue.js + Nuxt.js
- **Backend**: Laravel
- **WebSockets**: Node.js + WebSockets
- **Base de Dades**: MySQL

#### 🔄 Interrelació entre els Diversos Components

1. **Frontend i Backend:**
   - El **frontend** (Vue.js) es comunica amb el **backend** mitjançant **API RESTful** per obtenir dades de la cartellera de pel·lícules, les butaques disponibles i per realitzar la compra d'entrades.
   - Les peticions HTTP utilitzen mètodes com **GET**, **POST** i **PUT** per interactuar amb el servidor.
   - Quan un usuari selecciona una pel·lícula i reserva butaques, el **frontend** envia una petició al **backend** per validar la disponibilitat de les butaques i registrar la compra.
   - El **backend**, mitjançant **Laravel**, respon a aquestes sol·licituds amb dades estructurades en format **JSON**.

2. **Backend i Base de Dades:**
   - El servidor **Laravel** interactua amb la base de dades **SQL (MySQL)** o **NoSQL (MongoDB)** per emmagatzemar les pel·lícules disponibles, les butaques reservades, i les dades d’usuaris i compres.

3. **Comunicació en Temps Real (Opcional, amb Socket.io):**
   - Si s'inclou la funcionalitat de **comunicació en temps real**, **Socket.io** permetrà una connexió bidireccional entre el **frontend** i el **backend**, actualitzant la disponibilitat de butaques mentre els usuaris les seleccionen. Aquesta connexió enviarà actualitzacions en temps real a tots els clients connectats.

### 🛠️ Com Crear l'Entorn de Desenvolupament
Per crear l'entorn de desenvolupament, segueix aquests passos:
1. Clona el repositori.
2. Executa `docker-compose up` per crear els contenidors.
3. Instala les dependències del backend amb `composer install` i del frontend amb `npm install`.
4. Configura la base de dades a `config/database.php` (MySQL o MongoDB).
5. Executa les migracions de la base de dades amb `php artisan migrate`.

### 🚀 Com Desplegar l'Aplicació a Producció
1. Desplega el backend i frontend a un servidor (per exemple, en **Clouding.io**).
2. Configura el servidor web amb **NGINX** per dirigir les sol·licituds cap al backend i frontend.
3. Configura un entorn de producció amb **Docker**.
4. Desa la URL de producció al fitxer de configuració.

### 🛠️ Llistat d'Endpoints de l'API del Backend

#### 🛣️ Rutes

- `GET /api/movies` - Obtenir la llista de pel·lícules.
- `POST /api/reserve` - Realitzar una reserva de butaques.
- `GET /api/reservations` - Obtenir totes les reserves d’un usuari.

#### 📑 Exemples de JSON de Petició

- **Crear una reserva:**
```json
{
  "movie_id": 1,
  "seats": [1, 2, 3],
  "user_id": 101
}