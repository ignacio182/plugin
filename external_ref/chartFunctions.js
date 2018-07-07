
function showNotify(msg, title, type) {

    $(document).ready(function () {
        $.notify({
            // options
            title: title,
            message: msg
        },{
            // settings
            type: type,
            placement: {
                from: "top",
                align: "left"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 100,
            timer: 100000,
            animate: {
                enter: 'animated fadeInLeft',
                exit: 'animated fadeOutLeft'
            }
        });
    });
}

function getMessage(msg) {

    /*comunicacion-informar:parafrasear,explicar:7,15
    comunicacion-tarea:resumir_informacion:7,15
    comunicacion-requerir:informacion,clarificacion,ilustracion:2,11
    evaluacion-argumentacion:suponer,conciliar,concertar,inferir,proponer_excepciones:4.2,8
    evaluacion-mediar:mediacion_docente:4.2,8
    evaluacion-informar:sugerir,justificar,afirmar:4.2,8
    evaluacion-motivar:reforzar:4.2,8
    evaluacion-tarea:coordinar_procesos_grupales:4.2,8
    evaluacion-requerir:justificacion,opinion:0.5,4.5
    evaluacion-mantenimiento:requerir_confirmacion:0.5,4.5
    control-argumentacion:ofrecer_alternativa:1,2.2
    control-informar:guiar,elaborar:1,2.2
    control-mantenimiento:sugerir_accion:1,2.2
    control-tarea:requerir_cambio_de_enfoque:1,2.2
    control-requerir:elaboracion:0,5
    decision-reconocimiento1:aceptacion:6,20
    decision-reconocimiento2:rechazo:3,13
    tension-reconocimiento:apreciacion:3,14
    tension-argumentacion:dudar:0.5,5
    tension-mantenimiento:requerir_atencion:0.5,5
    reintegracion-motivar:animar:0,1.67
    reintegracion-mantenimiento:disculparsee,atender:0,1.67
    reintegracion-tarea:finalizar_participacion:0,1.67
    reintegracion-argumentacion:discrepar:0,7*/

    var message;
    switch (msg){
        case "comunicacion-informar":
            message = "1";
            break;
        case "comunicacion-tarea":
            message = "1";
            break;
        case "comunicacion-requerir":
            message = "3";
            break;
        case "evaluacion-argumentacion":
            message = "4";
            break;
        case "evaluacion-mediar":
            message = "5";
            break;
        case "evaluacion-informar":
            message = "6";
            break;
        case "evaluacion-motivar":
            message = "7";
            break;
        case "evaluacion-tarea":
            message = "8";
            break;
        case "evaluacion-requerir":
            message = "9";
            break;
        case "evaluacion-mantenimiento":
            message = "10";
            break;
        case "control-argumentacion":
            message = "11";
            break;
        case "control-informar":
            message = "12";
            break;
        case "control-mantenimiento":
            message = "13";
            break;
        case "control-tarea":
            message = "14";
            break;
        case "control-requerir":
            message = "15";
            break;
        case "decision-reconocimiento1":
            message = "16";
            break;
        case "decision-reconocimiento2":
            message = "17";
            break;
        case "tension-reconocimiento":
            message = "18";
            break;
        case "tension-argumentacion":
            message = "19";
            break;
        case "tension-mantenimiento":
            message = "20";
            break;
        case "reintegracion-motivar":
            message = "21";
            break;
        case "reintegracion-mantenimiento":
            message = "22";
            break;
        case "reintegracion-tarea":
            message = "23";
            break;
        case "reintegracion-argumentacions":
            message = "24";
            break;
        default:
            message = "default";
    }
    return message;
}