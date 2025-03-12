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