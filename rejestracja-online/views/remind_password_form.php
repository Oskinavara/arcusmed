<?php
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$email_from = SMTP_EMAIL_FROM;

?>
<p>Generowanie nowego hasła:</p>



<div id="remindPasswordForm"></div>


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

		var changePasswordForm = $("#remindPasswordForm").dxForm({
			formData: {},
			colCount: 1,
			labelLocation: "top",
			showValidationSummary: true,
			validationGroup: 'remindPasswordGroup',
			items: [
				{
					dataField: 'email',
					label: { text: 'Adres email' },
					validationRules: [{
						type: 'required',
						message: 'Adres email jest wymagany',
					}, {
						type: 'email',
						message: 'Adres email jest wymagany',
					}],
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
								url: "include/send_remind_email.php",
								method: 'POST',
								data: { recipient: formData.email },
								dataType: 'json',
								success: function (response) {
									if (response.status === "success") {



										DevExpress.ui.notify({
											message: "Twoje nowe hasło zostało wygenerowane i wysłane na podany adres email.",
											width: 500,
											position: {
												my: "top",
												at: "top",
												of: "#container"
											}
										}, "success", 2000);

										$.ajax({
													url: "views/choose_worker.php",
													method: "GET",
													success: function (response) {
														$("#content").html(response);
													},
													error: function () {
														$("#content").html("<p>Błąd wczytywania strony.</p>");
													}
												});


										


									} else if (response.status === "failure") {

										DevExpress.ui.notify({
											message: response.message,
											width: 500,
											position: {
												my: "top",
												at: "top",
												of: "#container"
											}
										}, "error", 2000);

									

									}
								},
								error: function (xhr, status, error) {


									var errorMessage = "Błąd serwera.";

									if (xhr.responseText) {
										// Retrieve the error message from the responseText
										errorMessage = xhr.responseText;
									}
									$("#content").html(errorMessage);

								}
							});

						}
					}
				}
			]
		}).dxForm("instance");












	});
</script>