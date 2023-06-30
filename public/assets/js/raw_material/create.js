document.addEventListener("DOMContentLoaded", (event) => {
    /*
    Componentes----------------------------------------------------------
     */
    //Defino la tabla y los arr
    const componentsTable = document.querySelector("#components-table");
    //Defino el body de la table
    const tBody = componentsTable.querySelector("tbody");

    let deleteButtons = componentsTable.querySelectorAll(".btnDeleteRow");
    let newRowButtons = componentsTable.querySelectorAll(".btnNewRow");

    //Defino el input de componentes
    let componentsInput = document.querySelector("#components");

    //Defino el array de los inputs
    let rowInputsArr = [];

    function getTrArray() {
        return tBody.querySelectorAll("tr");
    }

    function getParentTr(child) {
        return child.closest("tr");
    }

    function getTrIndex(tr) {
        //Obtengo el  index del TR
        return Array.from(tBody.children).indexOf(tr);
    }

    function updateComponentsInput() {
        componentsInput.value = JSON.stringify(rowInputsArr);
    }

    function insertNewRow(parentTr = null) {
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

        //Añado event listener a los inputs

        //Añado un event listener

        //inserto despues de donde se dió añadir y si no se dió añadir, simplemente inserto
        if (parentTr) {
            tBody.insertBefore(newTr, parentTr.nextSibling);
            const insertedTrIndex = getTrIndex(parentTr) + 1;
            rowInputsArr.splice(insertedTrIndex, 0, {
                name: "test",
                percentage: 34.4,
                casNumber: "354-345",
            });
        } else {
            tBody.appendChild(newTr);
            rowInputsArr.push({
                name: "",
                percentage: 0,
                casNumber: "",
            });
        }
        updateComponentsInput();
    }

    function updateRows() {}

    //Funciónn para que el boton borre la fila
    function addDeleteRowFunction(button) {
        button.addEventListener("click", (e) => {
            //Defino un arrat de tr
            const trArray = getTrArray();
            //Defino el tr padre
            const parentTr = getParentTr(e.target);

            //Obtengo el  index del TR
            const deletedTrIndex = getTrIndex(parentTr);

            //Elimino el TR solo si el trArray es mayor a 1
            if (trArray.length > 1) {
                parentTr.remove();
                //Actualizo el input
                rowInputsArr.splice(deletedTrIndex, 1);
                updateComponentsInput();
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
            //Defino un arrat de tr
            const trArray = getTrArray();
            //Defino el tr padre
            const parentTr = getParentTr(e.target);

            //Obtengo el  index del TR
            const trIndex = getTrIndex(parentTr);

            console.log(trIndex);

            insertNewRow(parentTr);
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

    //----------------------------------------------------------------
    //Inicializo la tabla
    insertNewRow();
});
