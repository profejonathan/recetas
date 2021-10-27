let cmbCategoria = document.getElementById('cmbCategoria');
let cmbCategoriaAgrupada = document.getElementById('cmbCategoriaAgrupada');
let modalReceta = new bootstrap.Modal(document.getElementById('modalReceta'), {})

cmbCategoria.addEventListener('change', ()=>{
    let idcategoria = cmbCategoria.value

    cmbCategoriaAgrupada.innerHTML = "";
    if ( idcategoria != 0){
        let url = `getCategoriaAgrupada.php?categoria=${idcategoria}`;
        fetch(url)
        .then(response =>response.json())
        .then( data => {
            data.forEach(grupo => {
                let option = document.createElement('option');
                option.setAttribute('value', grupo.idcategoriaAgrupadas)
                option.innerText = grupo.titulo
                cmbCategoriaAgrupada.appendChild(option);
            });
        })
    }
})

const eliminarReceta = (id) => {
    let respuesta = confirm('Confirma eliminar permanentemente la receta');
    if (respuesta) {
        console.log('Eliminado ', id)
        let url = `eliminarReceta.php?idreceta=${id}`;
        fetch(url)
        .then(response =>response.text())
        .then( data => {
            console.log(data)
            location.reload();
        })
    } else {
        console.log('NO ELIMINO')
    }
} 

const verReceta = (id) =>{
    console.log('Cargando Recera', id);
    modalReceta.show();
}