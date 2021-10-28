let cmbCategoria = document.getElementById('cmbCategoria');
let cmbCategoriaAgrupada = document.getElementById('cmbCategoriaAgrupada');
let txtId = document.getElementById('inputId');
let txtNombre =  document.getElementById('inputNombre');
let txtIngredientes = document.getElementById('inputIngredientes');
let txtPasos = document.getElementById('textPasos');
let boxImg = document.getElementById('boxImg');

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

const verReceta = (idreceta) =>{
    console.log('Cargando Recera', idreceta);
    modalReceta.show();
    txtId.value = idreceta;
    cmbCategoriaAgrupada.innerHTML = "";

    let url = `getReceta.php?idreceta=${idreceta}`;
    fetch(url)
    .then(response =>response.json())
    .then( data => {
        console.log(data)
        if( data.length > 0){
            let receta = data[0];
            txtNombre.value = receta.nombre;
            txtIngredientes.value = receta.ingredientes;
            cmbCategoria.value = receta.idcategoria;


            txtPasos.value = receta.pasos

            let url = `getCategoriaAgrupada.php?categoria=${receta.idcategoria}`;
            fetch(url)
            .then(response =>response.json())
            .then( data => {
                data.forEach(grupo => {
                    let option = document.createElement('option');
                    option.setAttribute('value', grupo.idcategoriaAgrupadas)
                    option.innerText = grupo.titulo
                    cmbCategoriaAgrupada.appendChild(option);
                    cmbCategoriaAgrupada.value = receta.idcategoriaAgrupadas
                    boxImg.setAttribute('src', receta.fotourl);
                });
            })
        }
        
    })

}

const frmClear = ()=>{
    txtId.value = 0;
    txtNombre.value = '';
    txtIngredientes.value = '';
    cmbCategoriaAgrupada.innerHTML = "";
    cmbCategoria.value = '';
    cmbCategoriaAgrupada.value = '';
    txtPasos.value = ''
    boxImg.setAttribute('src', '');

}
