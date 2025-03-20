import { useAuthStore } from "../store/authStore";

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

export async function registerUser(userData) {
    const URL = `${HOST}/register`;
    const authStore = useAuthStore();

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
        
        const data = await response.json();
        authStore.login(data.user, data.user.token);
        alert("Usuario registrado correctamente");
        return data;

    } catch (error) {
        // console.error("Error al registrar el usuario:", error);
        throw error;
    }
}

export async function loginUser(userData) {
    const URL = `${HOST}/login`;

    try {
        const response = await fetch (URL, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(userData),
        });

        if(!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData?.message || "Error al hacer el login del usuario"); 
        }

        const data = await response.json();
        alert("Usuari logeado con exito!")
        return data;

    } catch (error) {
        throw error;
    }
}

export async function comprarTicket(ticketDetails) {
    const URL = `${HOST}/buy-ticket`;
    console.log("Ticket details:", ticketDetails);

    // try {
    //     const response = await fetch(URL, {
    //         method: "POST",
    //         headers: {
    //             "Content-Type": "application/json",
    //             "Accept": "application/json"
    //         },
    //         body: JSON.stringify(ticketDetails),
    //     });

    //     if (!response.ok) {
    //         const errorData = await response.json();  
    //         throw new Error(errorData?.message || "Error al comprar el ticket"); 
    //     }
        
    //     const data = await response.json();
    //     return data;

    // } catch (error) {
    //     throw error;
    // }
}