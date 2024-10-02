function formatCardNumber(input) {
    // Remover cualquier caracter que no sea número
    let cardNumber = input.value.replace(/\D/g, '');

    // Agregar guiones después de cada 4 dígitos
    cardNumber = cardNumber.replace(/(\d{4})(?=\d)/g, '$1-');

    // Asignar el valor formateado al input
    input.value = cardNumber;
}



function formatExpirationDate(input) {
    // Remover cualquier carácter que no sea número
    let expirationDate = input.value.replace(/\D/g, '');

    // Verificar si los primeros dos dígitos (el mes) están dentro del rango 01-12
    if (expirationDate.length >= 2) {
        let month = parseInt(expirationDate.substring(0, 2), 10);
        
        // Corregir el mes si es mayor que 12 o menor que 1
        if (month > 12) {
            expirationDate = '12' + expirationDate.substring(2);
        } else if (month < 1) {
            expirationDate = '01' + expirationDate.substring(2);
        }
    }

    // Verificar los últimos dos dígitos (el año)
    if (expirationDate.length >= 5) {
        let year = parseInt(expirationDate.substring(3), 10);
        year += 2000; // Convertir a año completo (ej. 25 a 2025)
        
        // Obtener la fecha actual
        const today = new Date();
        const currentMonth = today.getMonth() + 1; // Los meses son 0-indexados
        const currentYear = today.getFullYear();

        // Comparar la fecha ingresada con la fecha actual
        if (year < currentYear || (year === currentYear && month < currentMonth)) {
            // Si la fecha es anterior, corregirla al próximo mes
            const nextMonth = currentMonth === 12 ? 1 : currentMonth + 1;
            const nextYear = currentMonth === 12 ? currentYear + 1 : currentYear;

            expirationDate = (nextMonth < 10 ? '0' + nextMonth : nextMonth) + '/' + (nextYear % 100).toString().padStart(2, '0');
        }
    }

    // Agregar la barra después de los primeros 2 dígitos
    if (expirationDate.length > 2) {
        expirationDate = expirationDate.substring(0, 2) + '/' + expirationDate.substring(2);
    }

    // Asignar el valor formateado al input
    input.value = expirationDate;
}



function onlyText(input) {
    // Remover todo lo que no sea letras o espacios
    input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
}