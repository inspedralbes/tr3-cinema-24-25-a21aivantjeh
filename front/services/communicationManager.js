const config = useRuntimeConfig();
const HOST = config.public.apiUrl;

export async function getPeliculas() {
    const URL = `http://localhost:8000/api/movies`

    try {
        const response = await fetch(URL, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) {
            throw new Error(`Error al obtener las peliculas: ${response.statusText}`);
        }

        const movies = await response.json();
        return movies;
    } catch (error) {
        console.error("Error a la peticion de las peliculas:", error);
    }
}

export async function getShowingMovies() {
    const URL = `http://localhost:8000/api/showtimes`

    try {
        const response = await fetch(URL, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) {
            throw new Error(`Error al obtener las peliculas en cartelera: ${response.statusText}`);
        }

        const movies = await response.json();
        return movies;
    } catch (error) {
        console.error("Error a la peticion de las peliculas en cartelera:", error);
    }
}

export async function getUpcomingMovies() {
    const URL = `http://localhost:8000/api/coming-soon`

    try {
        const response = await fetch(URL, {
            method: "GET",
            headers: {
                "Content-type": "application/json",
            },
        });

        if (!response.ok) {
            throw new Error(`Error al obtener las peliculas en cartelera: ${response.statusText}`);
        }

        const movies = await response.json();
        return movies;
    } catch (error) {
        console.error("Error en la peticion de las proximas peliculas:", error);
    }
}