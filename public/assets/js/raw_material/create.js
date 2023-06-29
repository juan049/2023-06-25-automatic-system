document.addEventListener("DOMContentLoaded", (event) => {
    /*
    Componentes----------------------------------------------------------
     */
    //Defino la tabla y los arr
    const componentsTable = document.querySelector("#components-table");
    let deleteButtons = componentsTable.querySelectorAll(".btnDeleteRow");
    let newRowButtons = componentsTable.querySelectorAll(".btnNewRow");

    //Defino el array de los inputs
    const rowInputsArr = {};

    //Funciónn para que el boton borre la fila
    function addDeleteRowFunction(button) {
        button.addEventListener("click", (e) => {
            //Defino el body de la table
            const tBody = button.closest("tbody");
            //Defino un arrat de tr
            const trArray = tBody.querySelectorAll("tr");
            //Defino el tr padre
            const parentTr = e.target.closest("tr");

            //Elimino el TR solo si el trArray es mayor a 1
            if (trArray.length > 1) {
                parentTr.remove();
            }
        });
    }

    //A cada  boton le hago foreach y pongo un event listener
    deleteButtons.forEach((button) => {
        addDeleteRowFunction(button);
    });

    //Función para agregar nueva fila
    function addAddRowFunction(button) {
        button.addEventListener("click", (e) => {
            //Defino el body de la table
            const tBody = button.closest("tbody");
            //Defino un arrat de tr
            const trArray = tBody.querySelectorAll("tr");
            //Defino el tr padre
            const parentTr = e.target.closest("tr");

            //Creo la fila
            let newTr = document.createElement("tr");
            //Defino el html de la fila
            const rowInnerHtml = `
            <td>
                <button type="button" class="btn btn-success btnNewRow">
                    <i class="bi bi-plus-lg"></i>
                </button>
            </td>

            <td scope="col"><input type="text" class="inputComponentName"></td>
            <td scope="col"><input type="number" min=0 max=100 class="inputComponentPercentage"></td>
            <td scope="col"><input type="text" class="inputComponentCAS"></td>
            <td>
                <button type="button" class="btn btn-danger btnDeleteRow">
                    <i class="bi bi-x-lg fw-bold"></i>
                </button>
            </td>`;

            newTr.innerHTML = rowInnerHtml;
            //Añado la función de borrado
            addDeleteRowFunction(newTr.querySelector(".btnDeleteRow"));
            //Añado la función de agregar
            addAddRowFunction(newTr.querySelector(".btnNewRow"));

            //Añado

            //inserto despues de donde se dió añadir
            tBody.insertBefore(newTr, parentTr.nextSibling);
        });
    }

    newRowButtons.forEach((button) => {
        addAddRowFunction(button);
    });

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
});
