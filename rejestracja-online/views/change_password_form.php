<?php
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$ownerLogin = OWNER_LOGIN;

$user_id = $_SESSION["prawid_uzyt_id"];

if (isset($user_id)) {
    ?>
   
        <div id="changePasswordForm"></div>
   


    <script>
        $(function () {

            const sendRequest = function (value) {
                const invalidEmail = 'test@dx-email.com';
                const d = $.Deferred();
                setTimeout(() => {
                    d.resolve(value !== invalidEmail);
                }, 1000);
                return d.promise();
            };

            const changePasswordMode = function (name) {
			const editor = formWidget.getEditor(name);
			editor.option('mode', editor.option('mode') === 'text' ? 'password' : 'text');
		};

            var changePasswordForm = $("#changePasswordForm").dxForm({
                formData: {},
                colCount: 1,
                labelLocation: "top",
                showValidationSummary: true,
                validationGroup: 'changePasswordGroup',
                items: [
                    {
                        dataField: "currentPassword",
                        label: { text: "Obecne hasło" },
                        editorType: "dxTextBox",
                        editorOptions: {
                            mode: "password"
                        },
                        validationRules: [
                            {
                                type: "required",
                                message: "Obecne hasło jest wymagane"
                            }
                        ]
                    },
                    {
                        dataField: "newPassword",
                        label: { text: "Nowe hasło" },
                        editorType: "dxTextBox",
                        editorOptions: {
                            mode: "password",
                            showClearButton: true,
                            buttons: [{
                                name: "password-toggle",
                                location: "after",
                                options: {
                                    icon: "images/icons/eye.png",
                                    type: 'default',
                                    onClick: () => changePasswordMode('newPassword'),
                                }
                            }]
                        },
                        validationRules: [
                            {
                                type: "required",
                                message: "Nowe hasło jest wymagane"
                            },
                            {
                                type: "stringLength",
                                min: 6,
                                message: "Hasło musi mieć co najmniej 6 znaków"
                            }
                        ]
                    },
                    {
                        dataField: "confirmPassword",
                        label: { text: "Potwierdź hasło" },
                        editorType: "dxTextBox",
                        editorOptions: {
                            mode: "password",
                            showClearButton: true,
                            buttons: [{
                                name: "password-toggle",
                                location: "after",
                                options: {
                                    icon: "images/icons/eye.png",
                                    type: 'default',
                                    onClick: () => changePasswordMode('confirmPassword'),
                                }
                            }]
                        },
                        validationRules: [
                            {
                                type: "required",
                                message: "Potwierdzenie hasła jest wymagane"
                            },
                            {
                                type: "compare",
                                comparisonTarget: function () {
                                    return changePasswordForm.option("formData").newPassword;
                                },
                                message: "Hasła nie pasują do siebie"
                            }
                        ]
                    },
                    {
                        itemType: "button",
                        horizontalAlignment: "left",
                        buttonOptions: {
                            text: "Zmień hasło",
                            type: "success",
                            useSubmitBehavior: true,
                            onClick: function (e) {
                                var formData = changePasswordForm.option("formData");

                                $.ajax({
                                    type: 'POST',
                                    url: 'views/change_password.php',
                                    dataType: "json",
                                    data: {
                                        currentPassword: formData.currentPassword,
                                        newPassword: formData.newPassword,
                                        confirmPassword: formData.confirmPassword
                                    },
                                    success: function (response) {
                                        if (response.status === "success") {
                                            DevExpress.ui.notify({
                                                message: response.message,
                                                width: 230,
                                                position: {
                                                    my: "top",
                                                    at: "top",
                                                    of: "#container"
                                                }
                                            }, "success", 5000);
                                            $("#content").load("views/user_data.php");
                                            changePasswordForm.resetValues();
                                        } else if (response.status === "failure") {
                                            DevExpress.ui.notify({
                                                message: response.message,
                                                width: 230,
                                                position: {
                                                    my: "top",
                                                    at: "top",
                                                    of: "#container"
                                                }
                                            }, "error", 5000);
                                        }
                                    },
                                    error: function (xhr, status, error) {
                                        var errorMessage = xhr.responseText; // Retrieve the error message from the response
                                        DevExpress.ui.notify('Wystąpił błąd podczas aktualizacji.' + errorMessage + ' Proszę spróbować ponownie.', 'error', 222000);
                                    }
                                });

                            }
                        }
                    }
                ]
            }).dxForm("instance");


        });
    </script>

    <?php
} else {
    // Handle the case where the user is not logged in
    echo "Please log in to access this page.";
}
?>
