// react-app/src/EmpleadoForm.js
import React from 'react';
import { useFormik } from 'formik';
import * as Yup from 'yup';

const EmpleadoForm = () => {
    const formik = useFormik({
        initialValues: {
            emp_nombre: '',
            emp_apellido: '',
            emp_dni: '',
            emp_fecha_inicio: '',
            emp_domicilio: '',
            emp_contacto: '',
            emp_email: '',
            emp_fecha_nac: '',
            rol_id: '',
        },
        validationSchema: Yup.object({
            emp_nombre: Yup.string().required('Nombre es requerido'),
            emp_apellido: Yup.string().required('Apellido es requerido'),
            emp_dni: Yup.string().required('DNI es requerido'),
            emp_fecha_inicio: Yup.string().required('Fecha de Inicio es requerida'),
            emp_domicilio: Yup.string().required('Domicilio es requerido'),
            emp_contacto: Yup.string().required('Contacto es requerido'),
            emp_email: Yup.string().email('Email inválido').required('Email es requerido'),
            emp_fecha_nac: Yup.string().required('Fecha de Nacimiento es requerida'),
            rol_id: Yup.string().required('Rol es requerido'),
        }),
        onSubmit: values => {
            // Enviar los datos al servidor
            fetch('/ruta/a/tu/proyecto/api/crearEmpleado', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(values),
            })
                .then(response => response.json())
                .then(data => {
                    // Manejo de la respuesta
                    console.log(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        },
    });

    return (
        <form onSubmit={formik.handleSubmit}>
            <div className="form-group">
                <label htmlFor="emp_nombre">Nombre</label>
                <input
                    type="text"
                    className={`form-control ${formik.touched.emp_nombre && formik.errors.emp_nombre ? 'is-invalid' : ''}`}
                    id="emp_nombre"
                    name="emp_nombre"
                    onChange={formik.handleChange}
                    onBlur={formik.handleBlur}
                    value={formik.values.emp_nombre}
                />
                {formik.touched.emp_nombre && formik.errors.emp_nombre ? (
                    <div className="invalid-feedback">{formik.errors.emp_nombre}</div>
                ) : null}
            </div>

            <div className="form-group">
                <label htmlFor="emp_apellido">Apellido</label>
                <input
                    type="text"
                    className={`form-control ${formik.touched.emp_apellido && formik.errors.emp_apellido ? 'is-invalid' : ''}`}
                    id="emp_apellido"
                    name="emp_apellido"
                    onChange={formik.handleChange}
                    onBlur={formik.handleBlur}
                    value={formik.values.emp_apellido}
                />
                {formik.touched.emp_apellido && formik.errors.emp_apellido ? (
                    <div className="invalid-feedback">{formik.errors.emp_apellido}</div>
                ) : null}
            </div>

            <div className="form-group">
                <label htmlFor="emp_dni">DNI</label>
                <input
                    type="text"
                    className={`form-control ${formik.touched.emp_dni && formik.errors.emp_dni ? 'is-invalid' : ''}`}
                    id="emp_dni"
                    name="emp_dni"
                    onChange={formik.handleChange}
                    onBlur={formik.handleBlur}
                    value={formik.values.emp_dni}
                />
                {formik.touched.emp_dni && formik.errors.emp_dni ? (
                    <div className="invalid-feedback">{formik.errors.emp_dni}</div>
                ) : null}
            </div>

            <div className="form-group">
                <label htmlFor="emp_fecha_inicio">Fecha de Inicio</label>
                <input
                    type="date"
                    className={`form-control ${formik.touched.emp_fecha_inicio && formik.errors.emp_fecha_inicio ? 'is-invalid' : ''}`}
                    id="emp_fecha_inicio"
                    name="emp_fecha_inicio"
                    onChange={formik.handleChange}
                    onBlur={formik.handleBlur}
                    value={formik.values.emp_fecha_inicio}
                />
                {formik.touched.emp_fecha_inicio && formik.errors.emp_fecha_inicio ? (
                    <div className="invalid-feedback">{formik.errors.emp_fecha_inicio}</div>
                ) : null}
            </div>

            <div className="form-group">
                <label htmlFor="emp_domicilio">Domicilio</label>
                <input
                    type="text"
                    className={`form-control ${formik.touched.emp_domicilio && formik.errors.emp_domicilio ? 'is-invalid' : ''}`}
                    id="emp_domicilio"
                    name="emp_domicilio"
                    onChange={formik.handleChange}
                    onBlur={formik.handleBlur}
                    value={formik.values.emp_domicilio}
                />
                {formik.touched.emp_domicilio && formik.errors.emp_domicilio ? (
                    <div className="invalid-feedback">{formik.errors.emp_domicilio}</div>
                ) : null}
            </div>

            <div className="form-group">
                <label htmlFor="emp_contacto">Contacto</label>
                <input
                    type="text"
                    className={`form-control ${formik.touched.emp_contacto && formik.errors.emp_contacto ? 'is-invalid' : ''}`}
                    id="emp_contacto"
                    name="emp_contacto"
                    onChange={formik.handleChange}
                    onBlur={formik.handleBlur}
                    value={formik.values.emp_contacto}
                />
                {formik.touched.emp_contacto && formik.errors.emp_contacto ? (
                    <div className="invalid-feedback">{formik.errors.emp_contacto}</div>
                ) : null}
            </div>

            <div className="form-group">
                <label htmlFor="emp_email">Email</label>
                <input
                    type="email"
                    className={`form-control ${formik.touched.emp_email && formik.errors.emp_email ? 'is-invalid' : ''}`}
                    id="emp_email"
                    name="emp_email"
                    onChange={formik.handleChange}
                    onBlur={formik.handleBlur}
                    value={formik.values.emp_email}
                />
                {formik.touched.emp_email && formik.errors.emp_email ? (
                    <div className="invalid-feedback">{formik.errors.emp_email}</div>
                ) : null}
            </div>

            <div className="form-group">
                <label htmlFor="emp_fecha_nac">Fecha de Nacimiento</label>
                <input
                    type="date"
                    className={`form-control ${formik.touched.emp_fecha_nac && formik.errors.emp_fecha_nac ? 'is-invalid' : ''}`}
                    id="emp_fecha_nac"
                    name="emp_fecha_nac"
                    onChange={formik.handleChange}
                    onBlur={formik.handleBlur}
                    value={formik.values.emp_fecha_nac}
                />
                {formik.touched.emp_fecha_nac && formik.errors.emp_fecha_nac ? (
                    <div className="invalid-feedback">{formik.errors.emp_fecha_nac}</div>
                ) : null}
            </div>

            <div className="form-group">
                <label htmlFor="rol_id">Rol</label>
                <select
                    className={`form-control ${formik.touched.rol_id && formik.errors.rol_id ? 'is-invalid' : ''}`}
                    id="rol_id"
                    name="rol_id"
                    onChange={formik.handleChange}
                    onBlur={formik.handleBlur}
                    value={formik.values.rol_id}
                >
                    <option value="">Seleccione un rol</option>
                    {/* Aquí puedes iterar sobre los roles disponibles */}
                </select>
                {formik.touched.rol_id && formik.errors.rol_id ? (
                    <div className="invalid-feedback">{formik.errors.rol_id}</div>
                ) : null}
            </div>

            <button type="submit" className="btn btn-primary">Crear</button>
        </form>
    );
};

export default EmpleadoForm;
