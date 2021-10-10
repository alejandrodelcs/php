let Espectador1 = {
    dni:9912053,
    nombre: "Alejandro"
}

let Espectador2 = {
    dni:1252543,
    nombre: "Alejandro"
}


let Pelicula1 = {
    nombre:"Volver al futuro",
    importe:850
}


let Pelicula2 = {
    nombre:"Cruela",
    importe:450
}

let Sala1 = {
    nombre="nada",
    aEspectadores:[Espectador1],
    pelicula:Pelicula1
}

let Sala2 = {
    nombre = "nada2",
    aEspectadores:[Espectador2],
    pelicula:Pelicula2
}


let Cine = {
    nombre:"Los rompe butacas",
    domicilio:"av. foco 102",
    aSalas:[Sala1,Sala2],
    function imprimirEstadistica(){

    }
}


