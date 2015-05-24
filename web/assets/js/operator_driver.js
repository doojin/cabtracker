$(document).ready(function() {
    var fullNameField = $('#full-name');
    var loginField = $('#login');

    fullNameField.on('input', updateLogin);

    updateLogin();

    function updateLogin() {
        var fullName = fullNameField.val();
        var newLogin = companyId + '_' + fullName.replace(/ /g, '.').toLowerCase();

        loginField.val(newLogin);
    }
});