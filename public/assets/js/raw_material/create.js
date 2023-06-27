document.addEventListener("DOMContentLoaded", (event) => {
    /*
    Areas--------------------------------------------------------------
    */
    //Defino el arr con todos los checkBox
    const areasCheckboxArr = document.querySelectorAll("input[type=checkbox]");
    //Defino el input hidden
    const areasInputHidden = document.querySelector("#areas");

    //Defino un array con los values de los check box
    const areasCheckboxValuesArr = {};

    //Agrego un event listener a cada checkbox
    areasCheckboxArr.forEach((checkbox) => {
        //Agrego cada checkboz al array
        areasCheckboxValuesArr[checkbox.id] = false;

        //Agrego event listener a cada check box
        checkbox.addEventListener("change", (e) => {
            console.log(e.target);
            //Defino el id y el valor
            const id = e.target.id;
            const value = e.target.checked;
            console.log(id, value);

            //LLamo la funcion de cambio de la check box
            checkBoxChange({
                id: id,
                value: value,
            });
        });
    });

    //Agrego el array de valores al input hideden
    areasInputHidden.value = JSON.stringify(areasCheckboxValuesArr);

    //Creo una función para modificar el array de áreas al modificar un checkbox
    function checkBoxChange({ id, value }) {
        areasCheckboxValuesArr[id] = value;
        areasInputHidden.value = JSON.stringify(areasCheckboxValuesArr);
    }

    /*
    Componentes----------------------------------------------------------
     */
});
