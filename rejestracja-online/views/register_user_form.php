<?php
session_start(); // Starting Session

require_once '../db_connect.php';
require_once '../config.php';

$company_name = COMPANY_NAME;

?>
<h3>Rejestracja</h3>
<p>Zarejestruj się, aby uzyskać pełny dostęp do Panelu pacjenta. Dzięki niemu będziesz mógł w łatwy i wygodny sposób
	przeglądać oraz rezerwować nowe terminy wizyt online.</p>
<div id="formContainer"></div>
<script>
	$(function () {

		function generateRandomString(length) {
			var characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			var result = '';
			for (var i = 0; i < length; i++) {
				var randomIndex = Math.floor(Math.random() * characters.length);
				result += characters.charAt(randomIndex);
			}
			return result;
		}




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
		const formWidget = $('#formContainer').dxForm({
			formData: {},
			colCount: 1,
			labelLocation: 'top',
			showValidationSummary: true,
			validationGroup: 'registerUserGroup',
			items: [{
				dataField: 'email',
				label: { text: 'Adres email' },
				validationRules: [{
					type: 'required',
					message: 'Adres email jest wymagany',
				}, {
					type: 'email',
					message: 'Adres email jest wymagany',
				}, {
					type: 'async',
					message: 'Adres e-mail jest już zarejestrowany',
					validationCallback(params) {
						return sendRequest(params.value);
					},
				}],
			}, {
				dataField: 'password',
				label: { text: 'Hasło' },
				editorOptions: {
					mode: 'password',
					onValueChanged() {
						const editor = formWidget.getEditor('confirmPassword');
						if (editor.option('value')) {
							editor.element().dxValidator('validate');
						}
					},
					buttons: [{
						name: 'password',
						location: 'after',
						options: {
							icon: 'images/icons/eye.png',
							type: 'default',
							onClick: () => changePasswordMode('password'),
						},
					}],
				},
				validationRules: [{
					type: 'required',
					message: 'Hasło jest wymagane',
				}],
			}, {
				name: 'confirmPassword',
				label: {
					text: 'Potwierdź hasło',
				},
				editorType: 'dxTextBox',
				editorOptions: {
					mode: 'password',
					buttons: [{
						name: 'password',
						location: 'after',
						options: {
							icon: 'images/icons/eye.png',
							type: 'default',
							onClick: () => changePasswordMode('confirmPassword'),
						},
					}],
				},
				validationRules: [{
					type: 'required',
					message: 'Należy potwierdzić hasło',
				}, {
					type: 'compare',
					message: "Hasło i potwierdzenie hasła nie są zgodne",
					comparisonTarget() {
						return formWidget.option('formData').password;
					},
				}],
			}, {
				dataField: 'name',
				editorType: 'dxTextBox',
				label: { text: 'Imię' },
				editorOptions: {
					placeholder: 'Wprowadź imię',
					showClearButton: true,
					validationRules: [{
						type: 'required',
						message: 'Imię jest wymagane'
					}]
				},
				validationRules: [{
					type: 'required',
					message: 'Imię jest wymagane',
				}, {
					type: 'pattern',
					pattern: '^[^0-9]+$',
					message: 'Nie możesz używać cyfr',
				}],
			}, {
				dataField: 'secondname',
				editorType: 'dxTextBox',
				label: { text: 'Drugie imię' },
				editorOptions: {
					placeholder: 'Wprowadź drugie imię',
					showClearButton: true
				}
			}, {
				dataField: 'surname',
				editorType: 'dxTextBox',
				label: { text: 'Nazwisko' },
				editorOptions: {
					placeholder: 'Wprowadź nazwisko',
					showClearButton: true,
					validationRules: [{
						type: 'required',
						message: 'Pole nazwisko jest wymagane'
					}]
				},
				validationRules: [{
					type: 'required',
					message: 'Pole nazwisko jest wymagane',
				}, {
					type: 'pattern',
					pattern: '^[^0-9]+$',
					message: 'Nie możesz używać cyfr',
				}],
			}, {
				dataField: 'phone_number',
				label: { text: 'Numer telefonu' },
				helpText: 'Np. 600500400 lub +48600500400',
				editorOptions: {
					maskInvalidMessage: 'The phone must have a correct format',
				},
				validationRules: [{
					type: 'required',
					message: 'Numer telefonu nie może być pusty',
				}, {
					type: 'pattern',
					pattern: /^\+?[0-9]{9,11}$/,
					message: 'Numer telefonu musi mieć 9 lub 11 cyfr',
				}],
			}, {
				template: "<div class='dx-form-text'>Właścicielem i administratorem serwisu jest <?php echo $company_name; ?> . Właściciel przywiązuje wielką wagę do ochrony prywatności w Internecie. Nie zbieramy Państwa danych osobowych za wyjątkiem sytuacji, gdy zostaną nam jednoznacznie przekazane, np. podczas zakadania konta. <?php echo $company_name; ?> jest wyłącznym właścicielem danych osobowych zgromadzonych w tym serwisie i będzie posługiwać się Państwa danymi osobowymi wyłącznie w celach związanych z technicznym funkcjonowaniem serwisu, rezerwacji terminów on-line oraz w celu komunikacji z Państwem. Nasza firma nie będzie sprzedawać, udostępniać oraz wydzierżawiać Państwa danych osobowych jakimkolwiek osobom trzecim, ani też zbywać ich w żaden inny sposób.</div>",
			},
			{
				itemType: 'simple',
				editorType: 'dxCheckBox',
				editorOptions: {
					text: "Wyrażam zgodę na przetwarzanie moich danych osobowych przez <?php echo $company_name; ?>, w celu korzystania z usługi rezerwacji terminów wizyt online. Oświadczam, iż dane zostały podane dobrowolnie po wcześniejszym zapoznaniu się z powyższą klauzulą informacyjną oraz pouczeniem dotyczącym prawa dostępu do treści moich danych i możliwości ich poprawienia. Jestem świadomy, iż moja zgoda może być w każdym czasie odwołana.",
					value: false,
				},
				validationRules: [{
					type: 'custom',
					message: 'Zgoda na RODO jest wymagana',
					validationCallback(params) {
						return params.value === true;
					},
				}, {
					type: 'required',
					message: 'Zgoda na RODO jest wymagana',
				}],
				name: 'rodoAgreement',
			},
			{
				itemType: 'button',
				horizontalAlignment: 'right',
				buttonOptions: {
					text: 'Zarejestruj',
					type: 'success',
					useSubmitBehavior: true,
					onClick: function (e) {
						var validationGroup = formWidget.validate();
						if (validationGroup.isValid) {
							// Send registration data to the server
							var formData = formWidget.option('formData');
							$.ajax({
								type: 'POST',
								url: 'views/register_user.php',
								data: formData,
								dataType: 'json',
								success: function (response) {

									if (response.status === "success") {

										var token = generateRandomString(32);
										var currentURL;




										$.ajax({
											url: "include/send_registration_email.php",
											method: "POST",
											data: {
												recipient: formData.email
											},
											dataType: "json",
											success: function (response) {



												$("#content").html("Rejestracja zakończona sukcesem!<br>Link weryfikacyjny wysłany! Sprawdź swoją skrzynkę e-mail i kliknij w link, aby potwierdzić swój adres.");




											},
											error: function (xhr, status, error) {

												var errorMessage = "Błąd serwera.";

												if (xhr.responseText) {
													// Retrieve the error message from the responseText
													errorMessage = xhr.responseText;
												}
												$("#content").html("Error fetching Joomla base URL:" + errorMessage);

											}
										});


										formWidget.resetValues();

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

									$("#content").html("Wystąpił błąd podczas rejestracji." + errorMessage + " Proszę spróbować ponownie.");
									DevExpress.ui.notify('Wystąpił błąd podczas rejestracji.' + errorMessage + ' Proszę spróbować ponownie.', 'error', 222000);
								}
							});
						}
					}
				}
			}]
		}).dxForm('instance');
	});
</script>