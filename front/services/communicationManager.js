const config = useRuntimeConfig();
const HOST = config.public.API_URL;

export async function getPeliculas() {
    const URL = `${HOST}/movies`

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
    const URL = `${HOST}/showtimes`

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
    const URL = `${HOST}/coming-soon`

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

export async function registerUser(userData, token) {
    const URL = `${HOST}/register`;

    try {
        const response = await fetch(URL, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                // "Authorization": `Bearer ${token}`
            },
            body: JSON.stringify(userData),
        });

        if (!response.ok) {
            const errorData = await response.json();  
            throw new Error(errorData?.message || "Error al registrar el usuario"); 
        }
        
        alert("Usuario registrado correctamente");
        window.location.href = '/';

    } catch (error) {
        // console.error("Error al registrar el usuario:", error);
        throw error;
    }
}