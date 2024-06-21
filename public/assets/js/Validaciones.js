document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    // Agregar validaciones en tiempo real
    const employeeFields = ['emp_nombre', 'emp_apellido', 'emp_dni', 'emp_fecha_inicio', 'emp_domicilio', 'emp_contacto', 'emp_email', 'emp_fecha_nac', 'rol_id'];
    const providerFields = ['prov_nombre', 'prov_telefono', 'prov_descripcion'];

    const allFields = [...employeeFields, ...providerFields];

    allFields.forEach(field => {
        const fieldElement = document.getElementById(field);
        if (fieldElement) {
            fieldElement.addEventListener('input', function () {
                validateField(field);
            });
        }
    });

    form.addEventListener('submit', function (event) {
        // Limpiar mensajes de error previos del backend
        const backendErrorElements = document.querySelectorAll('.backend-error-message');
        backendErrorElements.forEach(element => element.innerText = '');

        // Limpiar mensajes de error previos del frontend
        const errorElements = document.querySelectorAll('.error-message');
        errorElements.forEach(element => element.innerText = '');

        let isValid = true;

        // Validar cada campo
        allFields.forEach(field => {
            const fieldElement = document.getElementById(field);
            if (fieldElement && !validateField(field)) {
                isValid = false;
            }
        });

        if (!isValid) {
            event.preventDefault();
        }
    });

    function validateField(fieldId) {
        const value = document.getElementById(fieldId).value.trim();
        const validationFunctions = {
            emp_nombre: validateName,
            emp_apellido: validateName,
            emp_dni: validateDNI,
            emp_fecha_inicio: validateNotEmpty,
            emp_domicilio: validateNotEmpty,
            emp_contacto: validateContact,
            emp_email: validateEmail,
            emp_fecha_nac: validateNotEmpty,
            rol_id: validateNotEmpty,
            prov_nombre: validateName,
            prov_telefono: validateContact,
            prov_descripcion: validateNotEmpty
        };

        const errorMessage = validationFunctions[fieldId](value);
        const field = document.getElementById(fieldId);
        const errorElement = field.parentNode.querySelector('.error-message');

        if (errorMessage) {
            field.classList.remove('is-valid');
            field.classList.add('is-invalid');
            errorElement.innerText = errorMessage;
            return false;
        } else {
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
            errorElement.innerText = '';
        }
        return true;
    }

    function validateName(value) {
        if (value === '') {
            return 'Este campo no puede estar vacío.';
        } else if (/[^a-zA-Z\s]/.test(value)) {
            return 'Este campo solo puede contener letras.';
        }
        return '';
    }

    function validateDNI(value) {
        if (value === '') {
            return 'El DNI no puede estar vacío.';
        } else if (!/^\d{8}$/.test(value)) {
            return 'El DNI debe contener 8 números.';
        }
        return '';
    }

    function validateContact(value) {
        if (value === '') {
            return 'El contacto no puede estar vacío.';
        } else if (!/^\d{10}$/.test(value)) {
            return 'El contacto debe contener 10 números.';
        }
        return '';
    }

    function validateEmail(value) {
        if (value === '') {
            return 'El email no puede estar vacío.';
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
            return 'Debe ingresar un email válido.';
        }
        return '';
    }

    function validateNotEmpty(value) {
        if (value === '') {
            return 'Este campo no puede estar vacío.';
        }
        return '';
    }
});
