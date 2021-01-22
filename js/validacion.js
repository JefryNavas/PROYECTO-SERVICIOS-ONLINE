(function () {
    $(document).ready(function () {
        // Formularios de iniciar sesión y registrarse
        let regis = document.getElementsByName("formularioregistrar");
        let iniciar = document.getElementsByName("formularioiniciar");
        // funcion validar formulario 
        function validar(formulario) {

            $(formulario).validate({
                // Especificación de las reglas para validar
                rules: {
                    servicio: {
                        required: true
                    },
                    lugar: {
                        required: true,
                    },
                    nombre: {
                        required: true,
                    },
                    edad: {
                        required: true,

                    },
                    email: {
                        required: true,
                        email: true // se comprueba que cumplan con las propiedades del email.
                    },
                    password1: {
                        required: true,
                        minlength: 5 // se plantea que la contraseña debe tener una longitud minima de 5
                    },
                    password2: {

                        required: true,
                        equalTo: "#id_pwd"
                        // se plantea que la contraseña debe tener una longitud minima de 5
                    }

                },
                // se establecen los mensajes que se mostrarán en caso de que no cumplan las condiciones


                messages: {
                    servicio: {
                        required: "Porfavor selecciona un item"
                    },
                    lugar: {
                        required: "Porfavor selecciona un item"
                    },
                    nombre: {
                        required: "Por favor un nombre"
                    },
                    edad: {
                        required: "Por favor tu edad"

                    },
                    password1: {
                        required: "Por favor proporcione una contraseña",
                        minlength: "Su contraseña debe tener al menos 5 caracteres."
                    },
                    password2: {
                        required: "Confirma contaseña",
                        equalTo: "Las contraseñas no son iguales"

                    },

                    email: "Correo electrónico no válido"
                },
                // se ejecuta la comprobación de que todos los campos estén correctos y despliega un alert


                submitHandler: function (form) {
                    form.submit();

                    
                }
            });
        }
        // Ejecución de los dos formularios 
        validar(iniciar);
        validar(regis);

    });
}())
