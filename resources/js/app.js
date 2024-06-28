import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";
import { mostraAnteprima, mostraToast, nascondiToast } from "./function/function";


const fileElem = document.querySelector('.ms_file');
const toastElem = document.querySelector('.ms_toast');
const picker = document.getElementById('picker');

if(toastElem) {

    toastElem.classList.toggle('ms_hidden');

    setTimeout(mostraToast, 200);
    
    const time = setTimeout(nascondiToast, 5000);
}

if(fileElem) {

    fileElem.addEventListener('change', mostraAnteprima);

}


if(picker) {
    const inputPicker = document.getElementById('inputPicker');
    picker.addEventListener('input', ()=> {
        inputPicker.value = "Colore scelto: " + picker.value;
    })
}

